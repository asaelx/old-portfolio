@extends('base.base')

@section('title')
    Artículo
@stop

@section('sidebar')
    @include('base.sidebar', array('current' => 'projects'))
@stop

@section('content')
    <section id="content" class="article clear">
        <article>
            <div class="hero_cover">
                <div class="hero_img">
                    {{HTML::image('assets/img/hero_img.jpg', 'Artículo', ['class' => 'img'])}}
                </div>
                <div class="center">
                    <div class="header">
                        <h1 class="title">Art of ParaNorman Vynil</h1>
                        <span class="details">Por Asael Jaimes | Martes, 9 de Diciembre 2014</span>
                    </div>
                </div>
            </div><!-- /hero_cover -->
            <div class="content center">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut libero neque, varius at mauris semper, vehicula pretium purus. Nullam egestas quis justo id tempor. Sed et odio id quam finibus molestie. Aenean in mi dui. Nam at dictum nulla, vitae venenatis orci. Proin lobortis sit amet sapien ut vehicula. Nulla sagittis ullamcorper fermentum. Nam dictum ligula nec tincidunt efficitur.</p>
                {{HTML::image('assets/img/img.jpg', 'img')}}
            </div><!-- /content -->
        </article>
    </section><!-- /article -->
@stop