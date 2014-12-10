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

    public function article($id = false){
        if(isset($id)):
            $article = Article::find($id);
            $media = Media::find($article->media);
            $article->media = $media;
            return View::make('admin.article')
                ->with('article', $article);
        endif;
        return View::make('admin.article');
    }

    public function articles(){
        $articles = Article::all();
        return View::make('admin.articles')
            ->with('articles', $articles);
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
            if(Input::hasFile('bg')):
                $destination = base_path() . '/uploads/';
                $file = Input::file('bg');
                $name = time() . '.' . $file->getClientOriginalExtension();
                $file->move($destination, $name);

                $media = new Media;
                $media->title = $file->getClientOriginalName();
                $media->url = 'uploads/' . $name;
                $media->type = 'image';
                if($media->save()):
                    $article = new Article;
                    $article->title = Input::get('title');
                    $article->content = Input::get('content');
                    $article->media = $media->id;
                    $article->user = Auth::user()->id;
                    if($article->save()):
                        return Redirect::to('admin/articles');
                    endif;
                endif;
            endif;
        endif;
    }

    public function updateArticle($id){
        $article = Article::find($id);
        if($article):
            $all = Input::all();

            $rules = [
                'title' => 'required',
                'content' => 'required'
            ];

            $validator = Validator::make($all, $rules);

            if($validator->fails()):
                $messages = $validator->messages();
                return Redirect::to('admin/article/' . $id);
            else:
                if(Input::hasFile('bg')):
                    $destination = base_path() . '/uploads/';
                    $file = Input::file('bg');
                    $name = time() . '.' . $file->getClientOriginalExtension();
                    $file->move($destination, $name);
                    $media = new Media;
                    $media->title = $file->getClientOriginalName();
                    $media->url = 'uploads/' . $name;
                    $media->type = 'image';
                    $media->save();
                endif;
                $article->title = Input::get('title');
                $article->content = Input::get('content');
                if(isset($media)) $article->media = $media->id;
                $article->save();
            endif;
        endif;
        return Redirect::to('admin/articles');
    }

    public function deleteArticle($id){
        $article = Article::find($id);
        if($article):
            $article->delete();
        endif;
        return Redirect::to('admin/articles');
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