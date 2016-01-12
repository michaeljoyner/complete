<?php
use App\Importing\ImportResult;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * Created by PhpStorm.
 * User: mooz
 * Date: 1/6/16
 * Time: 8:32 AM
 */
class ArticleImportResultTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @test
     */
    public function the_highest_article_id_in_the_results_can_be_retrieved()
    {
        ImportResult::create(['article_id' => 1, 'imported' => 1]);
        ImportResult::create(['article_id' => 2, 'imported' => 0]);
        ImportResult::create(['article_id' => 3, 'imported' => 0]);
        ImportResult::create(['article_id' => 72, 'imported' => 1]);
        ImportResult::create(['article_id' => 9, 'imported' => 1]);
        ImportResult::create(['article_id' => 5, 'imported' => 0]);

        $this->assertEquals(72, ImportResult::getLatestImportId());
    }

    /**
     * @test
     */
    public function it_can_return_an_array_of_ids_lower_than_the_given_limit_but_not_in_db()
    {
        ImportResult::create(['article_id' => 1, 'imported' => 1]);
        ImportResult::create(['article_id' => 7, 'imported' => 1]);
        ImportResult::create(['article_id' => 4, 'imported' => 0]);
        ImportResult::create(['article_id' => 3, 'imported' => 0]);
        ImportResult::create(['article_id' => 12, 'imported' => 0]);
        ImportResult::create(['article_id' => 9, 'imported' => 1]);

        $expected = [2,5,6,8,10,11,13,14,15];

        $this->assertEquals($expected, ImportResult::getMissingIdsUpToLimit(15));
    }

    /**
     * @test
     */
    public function it_can_get_a_list_of_ids_missing_from_result_set()
    {
        ImportResult::create(['article_id' => 1, 'imported' => 1]);
        ImportResult::create(['article_id' => 7, 'imported' => 1]);
        ImportResult::create(['article_id' => 4, 'imported' => 0]);
        ImportResult::create(['article_id' => 3, 'imported' => 0]);
        ImportResult::create(['article_id' => 12, 'imported' => 0]);
        ImportResult::create(['article_id' => 9, 'imported' => 1]);

        $expected = [2,5,6,8,10,11];

        $this->assertEquals($expected, ImportResult::getMissingIds());
    }
}