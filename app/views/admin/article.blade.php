@extends('admin.base.base')

@section('title')
    Article
@stop

@section('topbar')
    @include('admin.base.topbar')
@stop

@section('content')
    @if ($article)
        <?php
        $action = ['AdminController@updateArticle', $article->id];
        $title = $article->title;
        $content = $article->content;
        $img = $article->media;
        ?>
    @else
        <?php
        $action = 'AdminController@saveArticle';
        $title = Input::old('title');
        $content = Input::old('content');
        ?>
    @endif
    <section id="article" class="content center clear">
        <h1 class="title clear">Article <a href="{{URL::to('admin/articles')}}" class="btn blue-btn"><i class="fa fa-arrow-left"></i> Go back</a></h1>
        {{Form::open(['action' => $action, 'class' => 'article_form form', 'autocomplete' => 'off', 'files' => true])}}
        <div class="group">
            {{Form::text('title', $title, ['required' => 'required', 'placeholder' => 'Title', 'class' => 'text'])}}
        </div><!-- /group -->
        <div class="group">
            {{Form::textarea('content', $content, ['required' => 'required', 'placeholder' => 'Content', 'class' => 'textarea'])}}
        </div><!-- /group -->
        <div class="group">
            <div class="drop_file clear">
                Background
                <i class="fa fa-upload"></i>
                {{Form::file('bg', ['class' => 'file'])}}
                <div class="file_preview">
                    @if ($img)
                        {{HTML::image($img->url, $img->title, ['class' => 'img'])}}
                    @endif
                </div><!-- /file_preview -->
            </div><!-- /drop_file -->
        </div><!-- /group -->
        <div class="group clear">
            {{Form::submit('Done', ['class' => 'btn green-btn submit'])}}
        </div><!-- /group -->
        {{Form::close()}}
    </section><!-- /article -->
@stop