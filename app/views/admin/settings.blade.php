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
                        {{HTML::image('assets/img/profile.jpg', 'asaelx', ['class' => 'img'])}}
                    </div><!-- /photo -->
                    <div class="name">
                        Asael Jaimes
                    </div><!-- /name -->
                    <div class="location">
                        <i class="fa fa-map-marker"></i>
                        Mérida, México
                    </div><!-- /location -->
                    <div class="bio">
                        Diseñador · Desarrollador<br>Me creo mucho y le llevo la contraria a todo.
                    </div><!-- /bio -->
                </div><!-- /hero -->
            </div><!-- /group -->
            <div class="group">
                <a href="#" class="btn blue-btn"><i class="fa fa-twitter"></i> Alrighty, then</a>
            </div><!-- /group -->
    </section><!-- /settings -->
@stop