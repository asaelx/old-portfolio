@extends('admin.base.base')

@section('title')
    Articles
@stop

@section('topbar')
    @include('admin.base.topbar')
@stop

@section('content')
    <section id="articles" class="content center clear">
        <h1 class="title">Articles</h1>
        <ul class="articles_list list">
            @if ($articles->count())
                @foreach ($articles as $article)
                <li class="article item">
                    <a href="{{URL::to('admin/article/' . $article->id)}}" class="link">{{$article->title}}</a>
                    <div class="actions">
                        <ul class="options">
                            <li class="option">
                                <a href="{{URL::to('admin/article/' . $article->id)}}" class="btn blue-btn"><i class="fa fa-pencil"></i> Edit</a>
                            </li><!-- /option -->
                            <li class="option">
                                <a href="{{URL::to('admin/article/delete/' . $article->id)}}" class="btn red-btn"><i class="fa fa-trash-o"></i> Delete</a>
                            </li><!-- /option -->
                        </ul><!-- /options -->
                    </div><!-- /actions -->
                </li><!-- /item -->
                @endforeach
            @else
                <li class="article item">
                    No articles. <a href="{{URL::to('admin/article')}}">Write!</a>
                </li><!-- /item -->
            @endif
        </ul><!-- /articles_list -->
    </section><!-- /articles -->
@stop