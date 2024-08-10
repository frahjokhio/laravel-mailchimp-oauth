<?php

namespace App\Http\Controllers;

use App\Http\Services\MailchimpOAuthService;
use Illuminate\Http\Request;

class MailchimpOAuthController extends Controller
{
    /**
     * Display the index page.
     */

    public function index()
    {
        return view('index');
    }

    /**
     * Handle the redirect logic.
     */
    public function redirect()
    {
        header('Location: https://login.mailchimp.com/oauth2/authorize?' . http_build_query([
            'response_type' => 'code',
            'client_id' => config('services.mailchimp.client_id'),
            'redirect_uri' => route('mailchimp.oauth.callback'),
        ]));
        exit();
    }

    /**
     * Handle the callback from mailchimp.
     *
     * @param Request $request
     */

    public function callback(Request $request)
    {
        $oauthService = app(MailchimpOAuthService::class)->fetchAccessToken($request->code);
        return redirect()->route('mailchimp.oauth.index');
    }
}
