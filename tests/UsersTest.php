<?php
use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Artisan;

/**
 * Created by PhpStorm.
 * User: mooz
 * Date: 12/12/15
 * Time: 4:40 PM
 */
class UsersTest extends TestCase
{

    use DatabaseTransactions;

    /**
     * @test
     */
    public function a_user_can_be_registered()
    {
        $this->withoutMiddleware();

        $response = $this->call('POST', '/admin/users', [
            'name' => 'Mooz Joyner',
            'email' => 'joyner.michael@gmail.com',
            'password' => 'password',
            'password_confirmation' => 'password'
        ]);

        $this->assertEquals(302, $response->status(), 'successful post should result in a redirect');

        $this->seeInDatabase('users', [
            'name' => 'Mooz Joyner',
            'email' => 'joyner.michael@gmail.com'
        ]);
    }

    /**
     * @test
     */
    public function a_users_name_and_email_can_be_edited()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);

        $otherUser = factory(User::class)->create();

        $this->visit('/admin/users/'.$otherUser->id.'/edit')
            ->type('Mooz Joyner', 'name')
            ->type('mooz@example.com', 'email')
            ->press('Save Changes')
            ->seeInDatabase('users', [
                'id' => $otherUser->id,
                'name' => 'Mooz Joyner',
                'email' => 'mooz@example.com'
            ]);
    }

    /**
     * @test
     */
    public function a_user_can_be_deleted()
    {
        $users = factory(User::class, 2)->create();

        $this->withoutMiddleware();

        $response = $this->call('DELETE', '/admin/users/'.$users->last()->id);
        $this->assertEquals(302, $response->status());

        $this->notSeeInDatabase('users', [
            'id' => $users->last()->id
        ]);
    }

    /**
     * @test
     */
    public function the_final_user_cannot_be_deleted()
    {
        $user = factory(User::class)->create();

        $this->assertEquals(1, User::all()->count(), 'there should only be one user to start');

        $this->withoutMiddleware();
        $response = $this->call('DELETE', '/admin/users/'.$user->id);

        $this->assertEquals(302, $response->status());

        $this->seeInDatabase('users', [
            'id' => $user->id
        ]);
    }

}