@extends('admin.base.base')

@section('title')
    Articles
@stop

@section('topbar')
    @include('admin.base.topbar')
@stop

@section('content')
    <section id="content" class="articles clear">
        <ul class="articles_list list">
            <li class="article item">
                <a href="#" class="link">Título de artículo</a>
                <div class="actions">
                    <ul class="options">
                        <li class="option">
                            <a href="#" class="btn link"></a>
                        </li><!-- /option -->
                    </ul><!-- /options -->
                </div><!-- /actions -->
            </li><!-- /item -->
        </ul><!-- /articles_list -->
    </section><!-- /articles -->
@stop