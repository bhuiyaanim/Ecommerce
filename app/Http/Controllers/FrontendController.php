<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\NewsletterRequest;

use App\Model\Frontend\Newsletter;

class FrontendController extends Controller
{
    public function store_newsletter(NewsletterRequest $request)
    {
        $newsletter = new Newsletter;

        $newsletter->email = $request->email;
        $newsletter->save();

        $notification = array(
            'messege' => 'Thanks For Subscribing',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
