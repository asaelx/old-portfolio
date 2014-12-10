@extends('admin.base.base')

@section('title')
    Settings
@stop

@section('topbar')
    @include('admin.base.topbar')
@stop

@section('content')
    <section id="settings" class="content center clear">
        <h1 class="title">Settings</h1>
            <div class="group">
                <div class="hero">
                    <div class="photo">
                        {{HTML::image(Auth::user()->photo, Auth::user()->username, ['class' => 'img'])}}
                    </div><!-- /photo -->
                    <div class="name">
                        {{Auth::user()->name}}
                    </div><!-- /name -->
                    <div class="location">
                        <i class="fa fa-map-marker"></i>
                        {{Auth::user()->location}}
                    </div><!-- /location -->
                    <div class="bio">
                        {{Auth::user()->bio}}
                    </div><!-- /bio -->
                </div><!-- /hero -->
            </div><!-- /group -->
            <div class="group">
                <a href="#" class="btn blue-btn"><i class="fa fa-twitter"></i> Alrighty, then</a>
            </div><!-- /group -->
    </section><!-- /settings -->
@stop