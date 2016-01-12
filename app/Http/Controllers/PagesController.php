<?php

namespace App\Http\Controllers;

use App\Blog\Post;
use App\Blog\PostCategory;
use App\Mailing\AdminMailer;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{

    public function home()
    {
        return view('front.pages.home');
    }

    public function services()
    {
        return view('front.pages.services');
    }

    public function contact()
    {
        return view('front.pages.contact');
    }

    public function postContact(Request $request, AdminMailer $mailer)
    {
        $mailer->sendSiteMessage($request->only(['name', 'email', 'enquiry']));
        if($request->ajax()) {
            return response()->json('ok');
        }

        return redirect('/');
    }


}
