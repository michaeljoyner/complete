<?php
/**
 * Created by PhpStorm.
 * User: mooz
 * Date: 12/15/15
 * Time: 10:51 AM
 */

namespace App\Http\Controllers\Admin;

use App\Blog\MediaLibrary;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BlogImageUploadsController extends Controller
{
    public function storeImage(Request $request)
    {
        $library = $this->getMediaLibrary();
        $image = $library->addImage($request->file('file'));

        return response()->json([
            'location' => $image->getUrl('web')
        ]);
    }

    private function getMediaLibrary()
    {
        $library = MediaLibrary::first();

        if(! $library) {
            return MediaLibrary::create(['name' => 'image-library']);
        }

        return $library;
    }
}