@extends('admin.base.base')

@section('title')
    Articles
@stop

@section('topbar')
    @include('admin.base.topbar')
@stop

@section('content')
    <section id="content" class="articles center clear">
        <h1 class="title">Articles</h1>
        <ul class="articles_list list">
            <li class="article item">
                <a href="#" class="link">Título de artículo</a>
                <div class="actions">
                    <ul class="options">
                        <li class="option">
                            <a href="#" class="btn blue-btn"><i class="fa fa-pencil"></i> Edit</a>
                        </li><!-- /option -->
                        <li class="option">
                            <a href="#" class="btn red-btn"><i class="fa fa-trash-o"></i> Delete</a>
                        </li><!-- /option -->
                    </ul><!-- /options -->
                </div><!-- /actions -->
            </li><!-- /item -->
        </ul><!-- /articles_list -->
    </section><!-- /articles -->
@stop