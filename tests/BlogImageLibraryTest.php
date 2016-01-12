<?php
use App\Blog\MediaLibrary;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * Created by PhpStorm.
 * User: mooz
 * Date: 12/15/15
 * Time: 10:31 AM
 */
class BlogImageLibraryTest extends TestCase
{
    use DatabaseTransactions, TestsImageUploads, AsLoggedInUser;

    /**
     * @test
     */
    public function an_image_file_can_be_uploaded_and_successfully_associated_with_a_library()
    {
        $this->withoutMiddleware();
        $response = $this->call('POST', '/admin/api/blog/images', [], [], [
            'file' => $this->prepareFileUpload('tests/testpic1.png', 'testpic1')
        ]);
        $this->assertEquals(200, $response->status());

        $library = MediaLibrary::firstOrFail();

        $this->assertEquals(1, $library->getMedia()->count(), 'should be one image in library');

        $library->clearMediaCollection();
    }

}