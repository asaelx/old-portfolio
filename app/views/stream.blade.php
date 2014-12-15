@extends('base.base')

@section('title')
    Proyectos
@stop

@section('sidebar')
    @include('base.sidebar', array('current' => 'projects'))
@stop

@section('content')
    <section id="content" class="projects clear">
        @if ($data['articles']->count())
            @foreach ($data['articles'] as $article)
                <article class="project">
                    <a href="{{URL::to('articulo/' . $article->slug)}}" class="link">
                        <div class="project_img">
                            {{HTML::image('uploads/thumbnails/' . $article->media->url, $article->title, ['class' => 'img'])}}
                        </div>
                        <div class="content">
                            <h2 class="title">{{$article->title}}</h2>
                            <div class="short">
                                <p>{{$article->short}}</p>
                            </div>
                        </div>
                    </a>
                </article><!-- /project -->
            @endforeach
        @endif
    </section><!-- /projects -->
@stop