<?php

namespace App\Importing;

use Illuminate\Database\Eloquent\Model;

class ImportResult extends Model
{
    protected $table = 'import_results';

    protected $fillable = ['article_id', 'imported'];

    public static function getLatestImportId()
    {
        return static::all()->pluck('article_id')->max();
    }

    public static function getMissingIdsUpToLimit($limit)
    {
        $completeRange = collect(range(1,$limit));
        $actualRange = static::orderBy('article_id')->get()->pluck('article_id')->toArray();

        return array_values($completeRange->diff($actualRange)->toArray());
    }

    public static function getMissingIds()
    {
        $highest = static::getLatestImportId();

        return static::getMissingIdsUpToLimit($highest);
    }
}
