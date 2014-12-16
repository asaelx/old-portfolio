@extends('base.base')

@section('title')
    {{$data['article']->title}}
@stop

@section('sidebar')
    @include('base.sidebar', array('current' => 'projects'))
@stop

@section('content')
    <section id="content" class="article clear">
        <article>
            <div class="hero_cover">
                <div class="hero_img">
                    {{HTML::image('uploads/originals/' . $data['article']->media->url, $data['article']->media->title, ['class' => 'img'])}}
                </div>
                <div class="center">
                    <div class="header">
                        <h1 class="title">{{$data['article']->title}}</h1>
                        <span class="details">Por {{$data['article']->user->name}} | Martes, 9 de Diciembre 2014</span>
                    </div>
                </div>
            </div><!-- /hero_cover -->
            <div class="content center">
                {{Markdown::parse($data['article']->content)}}
                <ul class="share">
                    <li class="item">
                        <a href="" class="twitter link"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li class="item">
                        <a href="" class="facebook link"><i class="fa fa-facebook"></i></a>
                    </li>
                </ul><!-- /share -->
            </div><!-- /content -->
        </article>
    </section><!-- /article -->
@stop