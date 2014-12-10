<aside id="sidebar">
    <div class="hero">
        <div class="hero_bg">
            {{HTML::image($data['user']->bg, 'asaelx background', ['class' => 'img'])}}
        </div>
        <div class="content">
            <div class="photo">
                {{HTML::image($data['user']->photo, 'asaelx')}}
            </div><!-- /photo -->
            <h1 class="name">{{$data['user']->name}}</h1>
            <div class="location">
                <i class="fa fa-map-marker"></i>
                {{$data['user']->location}}
            </div><!-- /location -->
            <div class="bio">
                {{$data['user']->bio}}
            </div><!-- /bio -->
        </div><!-- /content -->
    </div><!-- /hero -->
    <nav>
        <ul class="ul">
            <li class="option">
                <a href="{{URL::to('/')}}" class="link active">Trabajos <i class="fa fa-angle-right"></i></a>
            </li>
        </ul>
    </nav><!-- /nav -->
    <div class="instagram">
        <h3 class="title"><a href="//instagram.com/asaelx" target="_blank" class="link"><i class="fa fa-instagram"></i>Instagram</a></h3>
        <ul id="instafeed"></ul><!-- /instafeed -->
    </div>
    <footer>
        Diseño y desarrollo por Asael Jaimes
    </footer>
</aside>