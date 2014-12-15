<?php

class AdminController extends BaseController{

    private $originals_path = '/uploads/originals/';
    private $thumbnails_path = '/uploads/thumbnails/';

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

    public function article($id = null){
        if($id):
            $article = Article::find($id);
            $media = Media::find($article->media_id);
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
            'title' => 'required|unique:articles',
            'short' => 'required|unique:articles',
            'content' => 'required',
            'bg' => 'required'
        ];

        $validator = Validator::make($all, $rules);

        if($validator->fails()):
            $messages = $validator->messages();
            return Redirect::to('admin/article')
                ->withErrors($validator);
        else:
            if(Input::hasFile('bg')):
                $destination = base_path() . $this->originals_path;
                $file = Input::file('bg');
                $name = time() . '.' . $file->getClientOriginalExtension();
                $file->move($destination, $name);

                Image::make(base_path() . $this->originals_path . $name)->fit(250)->save(base_path() . $this->thumbnails_path . $name);

                $media = new Media;
                $media->title = $file->getClientOriginalName();
                $media->url = $name;
                $media->type = 'image';
                if($media->save()):
                    $article = new Article;
                    $article->title = Input::get('title');
                    $article->slug = Str::slug(Input::get('title'));
                    $article->short = Input::get('short');
                    $article->content = Input::get('content');
                    $article->media_id = $media->id;
                    $article->user_id = Auth::user()->id;
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
                'title' => 'required|unique:articles',
                'short' => 'required|unique:articles',
                'content' => 'required'
            ];

            $validator = Validator::make($all, $rules);

            if($validator->fails()):
                $messages = $validator->messages();
                return Redirect::to('admin/article/' . $id);
            else:
                if(Input::hasFile('bg')):
                    $destination = base_path() . $this->originals_path;
                    $file = Input::file('bg');
                    $name = time() . '.' . $file->getClientOriginalExtension();
                    $file->move($destination, $name);

                    Image::make(base_path() . $this->originals_path . $name)->fit(250)->save(base_path() . $this->thumbnails_path . $name);

                    $media = new Media;
                    $media->title = $file->getClientOriginalName();
                    $media->url = $name;
                    $media->type = 'image';
                    $media->save();
                endif;
                $article->title = Input::get('title');
                $article->slug = Str::slug(Input::get('title'));
                $article->short = Input::get('short');
                $article->content = Input::get('content');
                if(isset($media)) $article->media_id = $media->id;
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

    public function uploadItem(){
        if(Input::hasFile('item')):
            $destination = base_path() . $this->originals_path;
            $file = Input::file('item');
            $name = time() . '.' . $file->getClientOriginalExtension();
            $file->move($destination, $name);

            Image::make(base_path() . $this->originals_path . $name)
                ->resize(null, 80, function ($constraint) {
                            $constraint->aspectRatio();
                            $constraint->upsize();
                        })
                ->save(base_path() . $this->thumbnails_path . $name);

            $media = new Media;
            $media->title = $file->getClientOriginalName();
            $media->url = $name;
            $media->type = 'image';
            $media->save();

            $response = [
                'title' => $media->title,
                'url' => $media->url,
                'type' => $media->type
            ];

            return Response::json($response, 200);

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

                        $original_photo = str_replace('_normal', '', $credentials->profile_image_url);
                        $photo = base_path() . '/uploads/originals/' . $credentials->screen_name . '.jpeg';
                        $thumbnail_photo = '/uploads/thumbnails/' . $credentials->screen_name . '.jpeg';
                        file_put_contents($photo, file_get_contents($original_photo));
                        Image::make($photo)->resize(64, 64)->save(base_path() . $thumbnail_photo);

                        $original_bg = $credentials->profile_banner_url;
                        $bg = base_path() . '/uploads/originals/' . $credentials->screen_name . '_bg.jpeg';
                        $thumbnail_bg = '/uploads/thumbnails/' . $credentials->screen_name . '_bg.jpeg';
                        file_put_contents($bg, file_get_contents($original_bg));
                        Image::make($bg)->fit(250)->save(base_path() . $thumbnail_bg);

                        $user->name = $credentials->name;
                        $user->bg = $thumbnail_bg;
                        $user->photo = $thumbnail_photo;
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