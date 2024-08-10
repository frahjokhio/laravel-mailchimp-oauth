<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use MailchimpMarketing\ApiClient;

class MailchimpOAuthService
{
    public function fetchAccessToken($authorization_code)
    {
        $url = "https://login.mailchimp.com/oauth2/token";
        $context = stream_context_create([
            'http' => [
                'header' => "Content-type: application/x-www-form-urlencoded",
                'method' => 'POST',
                'content' => http_build_query([
                    'grant_type' => "authorization_code",
                    'client_id' => config('services.mailchimp.client_id'),
                    'client_secret' => config('services.mailchimp.client_secret'),
                    'redirect_uri' => route('mailchimp.oauth.callback'),
                    'code' => $authorization_code,
                ]),
            ],
        ]);

        $result = file_get_contents($url, false, $context);
        $decoded = json_decode($result);
        $access_token = $decoded->access_token;

        // fetch meta data
        $this->fetchtMetaData($access_token);
    }

    public function fetchtMetaData($access_token)
    {
        $url = "https://login.mailchimp.com/oauth2/metadata";
        $context = stream_context_create([
            'http' => [
                'header' => "Authorization: OAuth $access_token",
            ],
        ]);
        $result = file_get_contents($url, false, $context);
        $decoded = json_decode($result);
        
        // send api call to mailchimp
        $this->ping($access_token, $decoded->dc);
    }

    public function ping($access_token, $server)
    {
        $mailchimp = new ApiClient();
        $mailchimp->setConfig([
            'accessToken' => $access_token,
            'server' => $server,
        ]);

        $response = $mailchimp->ping->get();
        session()->flash('success', $response->health_status);
    }
}