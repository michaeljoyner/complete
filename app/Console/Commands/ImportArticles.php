<?php

namespace App\Console\Commands;

use App\Blog\Post;
use App\Blog\PostCategory;
use App\Importing\ArticleReader;
use App\Importing\ImportResult;
use App\Importing\PageFetcher;
use App\User;
use Illuminate\Console\Command;

class ImportArticles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'articles:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';
    /**
     * @var ArticleReader
     */
    private $articleReader;

    private $archiveId = 1;

    /**
     * Create a new command instance.
     *
     */
    public function __construct(ArticleReader $articleReader)
    {
        parent::__construct();


        $this->articleReader = $articleReader;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $user = User::first();

        if(! $user) {
            $this->error('No user to import articles to');
            return;
        }

        $archives = PostCategory::where('name', 'archives')->first();
        if (!$archives) {
            $archives = PostCategory::create(['name' => 'archives', 'description' => 'old posts from prev site']);
        }
        $this->archiveId = $archives->id;

        $upperBound = intval($this->ask('What is the upper bound for the article ids?'));

        $articlesToFetch = collect(ImportResult::getMissingIdsUpToLimit($upperBound));

        $articlesToFetch->each(function ($id) use ($user) {
            try {
                $reader = $this->articleReader->getPage($id);
                $this->import($reader, $id, $user);
                ImportResult::create(['article_id' => $id, 'imported' => 1]);
            } catch (\Exception $e) {
                $this->error('Failed on article ' . $id . ' : ' . $e->getMessage());
                ImportResult::create(['article_id' => $id, 'imported' => 0]);
            }
        });
    }

    protected function import($reader, $id, $user)
    {
        if ($reader->getBody() === '') {
            $this->line('Article ' . $id . ' is vacant');

            return;
        }

        $attributes = [
            'title'            => $reader->getHeading(),
            'description'      => $reader->getSubHeading(),
            'published_at'     => $reader->getPublishedDate(),
            'published'        => 1,
            'body'             => $reader->getLeadImage() . $reader->getBody(),
            'is_archive'       => 1,
            'archive_id'       => $id
        ];

        $user->storePost($attributes, $this->archiveId);
        $this->info('Imported article ' . $id);
    }
}
