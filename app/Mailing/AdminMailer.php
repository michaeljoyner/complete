<?php
/**
 * Created by PhpStorm.
 * User: mooz
 * Date: 1/11/16
 * Time: 10:57 AM
 */

namespace App\Mailing;


class AdminMailer extends Mailer
{
    public function sendSiteMessage($input)
    {
        $subject = 'Message via CompleteLiving site';
        $to = ['stephjoyner18@gmail.com' => 'Steph Joyner'];
        $from = [$input['email'] => $input['name']];
        $view = 'email.sitemessage';
        $data = [
            'enquiry' => $input['enquiry'],
            'name' => $input['name'],
            'email' => $input['email']
        ];

        $this->sendTo($to, $from, $subject, $view, compact('data'));
    }
}