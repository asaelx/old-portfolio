@extends('admin.base.base')

@section('title')
    Article
@stop

@section('topbar')
    @include('admin.base.topbar')
@stop

@section('content')
    <section id="article" class="content center clear">
        <h1 class="title">Artículo</h1>
        {{Form::open(['action' => 'AdminController@saveArticle', 'class' => 'article_form form', 'autocomplete' => 'off'])}}
        <div class="group">
            {{Form::text('title', Input::old('title'), ['required' => 'required', 'placeholder' => 'Title', 'class' => 'text'])}}
        </div><!-- /group -->
        <div class="group">
            {{Form::textarea('content', Input::old('content'), ['required' => 'required', 'placeholder' => 'Content', 'class' => 'textarea'])}}
        </div><!-- /group -->
        <div class="group clear">
            {{Form::submit('Done', ['class' => 'btn green-btn submit'])}}
        </div><!-- /group -->
        {{Form::close()}}
    </section><!-- /article -->
@stop