<?php

class AdminController extends BaseController{

    public function index(){
        return View::make('admin.login');
    }

    public function login(){
        if(Auth::check()):
            return Redirect::to('admin/articles');
        else:
            return View::make('admin.login');
        endif;
    }

    public function article(){
        return View::make('admin.article');
    }

    public function articles(){
        return View::make('admin.articles');
    }

    public function settings(){
        return View::make('admin.settings');
    }

    public function saveArticle(){
        $all = Input::all();

        $rules = [
            'title' => 'required',
            'content' => 'required'
        ];

        $validator = Validator::make($all, $rules);

        if($validator->fails()):
            $messages = $validator->messages();
            return Redirect::to('admin/article')
                ->withErrors($validator);
        else:
            $article = new Article;
            $article->title = Input::get('title');
            $article->content = Input::get('content');
            $article->media = 1;
            $article->user = 1;
            if($article->save()):
                return Redirect::to('admin/articles');
            endif;
        endif;
    }

    public function twitterLogin(){
        $sign_in_twitter = TRUE;
        $force_login = FALSE;
        $callback_url = URL::to('admin/twitterCallback');
        Twitter::set_new_config(array('token' => '', 'secret' => ''));
        $token = Twitter::getRequestToken($callback_url);
        if( isset( $token['oauth_token_secret'] ) ) {
            $url = Twitter::getAuthorizeURL($token, $sign_in_twitter, $force_login);

            Session::put('oauth_state', 'start');
            Session::put('oauth_request_token', $token['oauth_token']);
            Session::put('oauth_request_token_secret', $token['oauth_token_secret']);

            return Redirect::to($url);
        }
        return Redirect::to('admin/twitterError');
    }

    public function twitterCallback(){
        if(Session::has('oauth_request_token')) {
            $request_token = array(
                'token' => Session::get('oauth_request_token'),
                'secret' => Session::get('oauth_request_token_secret'),
            );

            Twitter::set_new_config($request_token);

            $oauth_verifier = FALSE;
            if(Input::has('oauth_verifier')) {
                $oauth_verifier = Input::get('oauth_verifier');
            }

            // getAccessToken() will reset the token for you
            $token = Twitter::getAccessToken( $oauth_verifier );
            if( !isset( $token['oauth_token_secret'] ) ) {
                return Redirect::to('admin')->with('flash_error', 'We could not log you in on Twitter.');
            }

            $credentials = Twitter::query('account/verify_credentials');
            if( is_object( $credentials ) && !isset( $credentials->error ) ) {
                $user = User::where('username', 'asaelx')->first();
                if($user):
                    if($user->username == $credentials->screen_name):
                        $user->name = $credentials->name;
                        $user->bg = $credentials->profile_banner_url;
                        $user->photo = $credentials->profile_image_url;
                        $user->location = $credentials->location;
                        $user->bio = $credentials->description;
                        $user->twitter_token = $token['oauth_token'];
                        $user->twitter_secret = $token['oauth_token_secret'];
                        if($user->save()):
                            Auth::login($user);
                            return Redirect::to('admin/articles')->with('flash_notice', "Congrats! You've successfully signed in!");
                        endif;
                    else:
                        return Redirect::to('admin')->with('flash_error', 'Crab! Something went wrong while signing you up!');
                    endif;
                else:
                    $user = new User;
                    $user->username = $credentials->screen_name;
                    $user->name = $credentials->name;
                    $user->bg = $credentials->profile_banner_url;
                    $user->photo = $credentials->profile_image_url;
                    $user->location = $credentials->location;
                    $user->bio = $credentials->description;
                    $user->twitter_token = $token['oauth_token'];
                    $user->twitter_secret = $token['oauth_token_secret'];
                    if($user->save()):
                        Auth::login($user);
                        return Redirect::to('admin/articles')->with('flash_notice', "Congrats! You've successfully signed in!");
                    endif;
                endif;
            }
            return Redirect::to('admin')->with('flash_error', 'Crab! Something went wrong while signing you up!');
        }
    }

    public function twitterError(){
        return 'error';
    }

    public function twitterLogout(){
        if(Auth::check()):
            Auth::logout();
            return Redirect::to('admin');
        endif;
    }

}