<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
use App\User;
use App\IdentityProvider;

class LineLoginController extends Controller
{
    public function index() {
        // state生成
        $state = Str::random(40);
        \Cookie::queue('state', $state, 100);

        // nonce生成
        $nonce = Str::random(40);
        \Cookie::queue('nonce', $nonce,100);

        // LINE認証 
        $uri ="https://access.line.me/oauth2/v2.1/authorize?response_type=code";
        // $uri ="https://access.line.me/dialog/oauth/weblogin?response_type=code";
        $client_id_uri = "&client_id=".config('services.line.key');
        $redirect_uri ="&redirect_uri=".config('services.line.redirect');
        $state_uri = "&state=".$state;
        $scope_uri="&scope=openid%20profile";
        $prompt_uri = "&prompt=consent";
        $nonce_uri = "&nonce=";

        return redirect($uri.$client_id_uri.$redirect_uri.$state_uri.$scope_uri.$prompt_uri.$nonce_uri);

    }
    
    public function callback(Request $request)
    {
        //LINEからアクセストークンを取得
        $accessToken = $this->getAccessToken($request);
        //プロフィール取得
        $profile = $this->getProfile($accessToken);

        $account = IdentityProvider::whereProviderName('line')
                    ->whereProviderId($profile->userId)
                    ->first();
        if($account)
        {
            Auth::login($account->user, true);
            return redirect('/events');

        }else{
            $user=User::create([
                'name'=>$profile->displayName
                ]);
            $user->IdentityProviders()->create([
                'provider_id'=>$profile->userId,
                'provider_name'=>'line'
                ]);
            Auth::login($user, true);
            return redirect('/events');
        }
    }    
        //LINEからアクセストークンを取得
    public function getAccessToken($req)
    {
        $headers = [ 'Content-Type: application/x-www-form-urlencoded' ];
        $post_data = array(
        'grant_type'    => 'authorization_code',
        'code'          => $req['code'],
        'redirect_uri'  => config('services.line.redirect'),
        'client_id'     => config('services.line.key'),
        'client_secret' => config('services.line.secret')
        );
        $url = 'https://api.line.me/oauth2/v2.1/token';

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($post_data));
        $res = curl_exec($curl);
        curl_close($curl);

        $json = json_decode($res);
        $accessToken = $json->access_token;

        return $accessToken;
    }

    // プロフィール取得
    public function getProfile($at)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $at));
        curl_setopt($curl, CURLOPT_URL, 'https://api.line.me/v2/profile');
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $res = curl_exec($curl);
        curl_close($curl);

        $json = json_decode($res);

        return $json;
    }


    
        



}
