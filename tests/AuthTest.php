<?php
use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * Created by PhpStorm.
 * User: mooz
 * Date: 12/13/15
 * Time: 10:04 AM
 */
class AuthTest extends TestCase
{

    use DatabaseTransactions;

    /**
     * @test
     */
    public function a_registered_user_can_login()
    {
        $user = factory(User::class)->create(['email' => 'mooz@example.com', 'password' => 'password']);

        $this->visit('/admin/login')
            ->type('mooz@example.com', 'email')
            ->type('password', 'password')
            ->press('Login')
            ->seePageIs('/admin');
    }

    /**
     * @test
     */
    public function a_logged_in_user_can_log_out()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);

        $this->visit('/admin')
            ->seePageIs('/admin')
            ->visit('/admin/logout');

        $this->visit('/admin')
            ->seePageIs('/admin/login');
    }
}