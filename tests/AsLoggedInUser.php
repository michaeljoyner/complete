<?php
use App\User;

/**
 * Created by PhpStorm.
 * User: mooz
 * Date: 12/14/15
 * Time: 9:10 AM
 */
trait AsLoggedInUser
{

    /**
     * @before
     */
    public function logInAsUser()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
    }

}