@extends('base.base')

@section('title')
    Proyectos
@stop

@section('sidebar')
    @include('base.sidebar', array('current' => 'projects'))
@stop

@section('content')
    <section id="content" class="projects clear">
    <?php print_r($data['articles']); ?>
        <article class="project">
            <a href="#" class="link">
                <div class="project_img">
                    {{HTML::image('assets/img/project.jpg', 'project', ['class' => 'img'])}}
                </div>
                <div class="content">
                    <h2 class="title">Nombre de proyecto</h2>
                    <div class="short">
                        <p>Pequeña descripción del proyecto.</p>
                    </div>
                </div>
            </a>
        </article>
        <article class="project">
            <a href="#" class="link">
                <div class="project_img">
                    {{HTML::image('assets/img/project.jpg', 'project', ['class' => 'img'])}}
                </div>
                <div class="content">
                    <h2 class="title">Nombre de proyecto</h2>
                    <div class="short">
                        <p>Pequeña descripción del proyecto.</p>
                    </div>
                </div>
            </a>
        </article>
        <article class="project">
            <a href="#" class="link">
                <div class="project_img">
                    {{HTML::image('assets/img/project.jpg', 'project', ['class' => 'img'])}}
                </div>
                <div class="content">
                    <h2 class="title">Nombre de proyecto</h2>
                    <div class="short">
                        <p>Pequeña descripción del proyecto.</p>
                    </div>
                </div>
            </a>
        </article>
        <article class="project">
            <a href="#" class="link">
                <div class="project_img">
                    {{HTML::image('assets/img/project.jpg', 'project', ['class' => 'img'])}}
                </div>
                <div class="content">
                    <h2 class="title">Nombre de proyecto</h2>
                    <div class="short">
                        <p>Pequeña descripción del proyecto.</p>
                    </div>
                </div>
            </a>
        </article>
        <article class="project">
            <a href="#" class="link">
                <div class="project_img">
                    {{HTML::image('assets/img/project.jpg', 'project', ['class' => 'img'])}}
                </div>
                <div class="content">
                    <h2 class="title">Nombre de proyecto</h2>
                    <div class="short">
                        <p>Pequeña descripción del proyecto.</p>
                    </div>
                </div>
            </a>
        </article>
        <article class="project">
            <a href="#" class="link">
                <div class="project_img">
                    {{HTML::image('assets/img/project.jpg', 'project', ['class' => 'img'])}}
                </div>
                <div class="content">
                    <h2 class="title">Nombre de proyecto</h2>
                    <div class="short">
                        <p>Pequeña descripción del proyecto.</p>
                    </div>
                </div>
            </a>
        </article>
        <article class="project">
            <a href="#" class="link">
                <div class="project_img">
                    {{HTML::image('assets/img/project.jpg', 'project', ['class' => 'img'])}}
                </div>
                <div class="content">
                    <h2 class="title">Nombre de proyecto</h2>
                    <div class="short">
                        <p>Pequeña descripción del proyecto.</p>
                    </div>
                </div>
            </a>
        </article>
        <article class="project">
            <a href="#" class="link">
                <div class="project_img">
                    {{HTML::image('assets/img/project.jpg', 'project', ['class' => 'img'])}}
                </div>
                <div class="content">
                    <h2 class="title">Nombre de proyecto</h2>
                    <div class="short">
                        <p>Pequeña descripción del proyecto.</p>
                    </div>
                </div>
            </a>
        </article>
        <article class="project">
            <a href="#" class="link">
                <div class="project_img">
                    {{HTML::image('assets/img/project.jpg', 'project', ['class' => 'img'])}}
                </div>
                <div class="content">
                    <h2 class="title">Nombre de proyecto</h2>
                    <div class="short">
                        <p>Pequeña descripción del proyecto.</p>
                    </div>
                </div>
            </a>
        </article>
        <article class="project">
            <a href="#" class="link">
                <div class="project_img">
                    {{HTML::image('assets/img/project.jpg', 'project', ['class' => 'img'])}}
                </div>
                <div class="content">
                    <h2 class="title">Nombre de proyecto</h2>
                    <div class="short">
                        <p>Pequeña descripción del proyecto.</p>
                    </div>
                </div>
            </a>
        </article>
        <article class="project">
            <a href="#" class="link">
                <div class="project_img">
                    {{HTML::image('assets/img/project.jpg', 'project', ['class' => 'img'])}}
                </div>
                <div class="content">
                    <h2 class="title">Nombre de proyecto</h2>
                    <div class="short">
                        <p>Pequeña descripción del proyecto.</p>
                    </div>
                </div>
            </a>
        </article>
        <article class="project">
            <a href="#" class="link">
                <div class="project_img">
                    {{HTML::image('assets/img/project.jpg', 'project', ['class' => 'img'])}}
                </div>
                <div class="content">
                    <h2 class="title">Nombre de proyecto</h2>
                    <div class="short">
                        <p>Pequeña descripción del proyecto.</p>
                    </div>
                </div>
            </a>
        </article>
        <article class="project">
            <a href="#" class="link">
                <div class="project_img">
                    {{HTML::image('assets/img/project.jpg', 'project', ['class' => 'img'])}}
                </div>
                <div class="content">
                    <h2 class="title">Nombre de proyecto</h2>
                    <div class="short">
                        <p>Pequeña descripción del proyecto.</p>
                    </div>
                </div>
            </a>
        </article>
        <article class="project">
            <a href="#" class="link">
                <div class="project_img">
                    {{HTML::image('assets/img/project.jpg', 'project', ['class' => 'img'])}}
                </div>
                <div class="content">
                    <h2 class="title">Nombre de proyecto</h2>
                    <div class="short">
                        <p>Pequeña descripción del proyecto.</p>
                    </div>
                </div>
            </a>
        </article>
        <article class="project">
            <a href="#" class="link">
                <div class="project_img">
                    {{HTML::image('assets/img/project.jpg', 'project', ['class' => 'img'])}}
                </div>
                <div class="content">
                    <h2 class="title">Nombre de proyecto</h2>
                    <div class="short">
                        <p>Pequeña descripción del proyecto.</p>
                    </div>
                </div>
            </a>
        </article>
        <article class="project">
            <a href="#" class="link">
                <div class="project_img">
                    {{HTML::image('assets/img/project.jpg', 'project', ['class' => 'img'])}}
                </div>
                <div class="content">
                    <h2 class="title">Nombre de proyecto</h2>
                    <div class="short">
                        <p>Pequeña descripción del proyecto.</p>
                    </div>
                </div>
            </a>
        </article>
        <article class="project">
            <a href="#" class="link">
                <div class="project_img">
                    {{HTML::image('assets/img/project.jpg', 'project', ['class' => 'img'])}}
                </div>
                <div class="content">
                    <h2 class="title">Nombre de proyecto</h2>
                    <div class="short">
                        <p>Pequeña descripción del proyecto.</p>
                    </div>
                </div>
            </a>
        </article>
        <article class="project">
            <a href="#" class="link">
                <div class="project_img">
                    {{HTML::image('assets/img/project.jpg', 'project', ['class' => 'img'])}}
                </div>
                <div class="content">
                    <h2 class="title">Nombre de proyecto</h2>
                    <div class="short">
                        <p>Pequeña descripción del proyecto.</p>
                    </div>
                </div>
            </a>
        </article>
        <article class="project">
            <a href="#" class="link">
                <div class="project_img">
                    {{HTML::image('assets/img/project.jpg', 'project', ['class' => 'img'])}}
                </div>
                <div class="content">
                    <h2 class="title">Nombre de proyecto</h2>
                    <div class="short">
                        <p>Pequeña descripción del proyecto.</p>
                    </div>
                </div>
            </a>
        </article>
        <article class="project">
            <a href="#" class="link">
                <div class="project_img">
                    {{HTML::image('assets/img/project.jpg', 'project', ['class' => 'img'])}}
                </div>
                <div class="content">
                    <h2 class="title">Nombre de proyecto</h2>
                    <div class="short">
                        <p>Pequeña descripción del proyecto.</p>
                    </div>
                </div>
            </a>
        </article>
        <article class="project">
            <a href="#" class="link">
                <div class="project_img">
                    {{HTML::image('assets/img/project.jpg', 'project', ['class' => 'img'])}}
                </div>
                <div class="content">
                    <h2 class="title">Nombre de proyecto</h2>
                    <div class="short">
                        <p>Pequeña descripción del proyecto.</p>
                    </div>
                </div>
            </a>
        </article>
        <article class="project">
            <a href="#" class="link">
                <div class="project_img">
                    {{HTML::image('assets/img/project.jpg', 'project', ['class' => 'img'])}}
                </div>
                <div class="content">
                    <h2 class="title">Nombre de proyecto</h2>
                    <div class="short">
                        <p>Pequeña descripción del proyecto.</p>
                    </div>
                </div>
            </a>
        </article>
        <article class="project">
            <a href="#" class="link">
                <div class="project_img">
                    {{HTML::image('assets/img/project.jpg', 'project', ['class' => 'img'])}}
                </div>
                <div class="content">
                    <h2 class="title">Nombre de proyecto</h2>
                    <div class="short">
                        <p>Pequeña descripción del proyecto.</p>
                    </div>
                </div>
            </a>
        </article>
        <article class="project">
            <a href="#" class="link">
                <div class="project_img">
                    {{HTML::image('assets/img/project.jpg', 'project', ['class' => 'img'])}}
                </div>
                <div class="content">
                    <h2 class="title">Nombre de proyecto</h2>
                    <div class="short">
                        <p>Pequeña descripción del proyecto.</p>
                    </div>
                </div>
            </a>
        </article>
        <article class="project">
            <a href="#" class="link">
                <div class="project_img">
                    {{HTML::image('assets/img/project.jpg', 'project', ['class' => 'img'])}}
                </div>
                <div class="content">
                    <h2 class="title">Nombre de proyecto</h2>
                    <div class="short">
                        <p>Pequeña descripción del proyecto.</p>
                    </div>
                </div>
            </a>
        </article>
        <article class="project">
            <a href="#" class="link">
                <div class="project_img">
                    {{HTML::image('assets/img/project.jpg', 'project', ['class' => 'img'])}}
                </div>
                <div class="content">
                    <h2 class="title">Nombre de proyecto</h2>
                    <div class="short">
                        <p>Pequeña descripción del proyecto.</p>
                    </div>
                </div>
            </a>
        </article>
        <article class="project">
            <a href="#" class="link">
                <div class="project_img">
                    {{HTML::image('assets/img/project.jpg', 'project', ['class' => 'img'])}}
                </div>
                <div class="content">
                    <h2 class="title">Nombre de proyecto</h2>
                    <div class="short">
                        <p>Pequeña descripción del proyecto.</p>
                    </div>
                </div>
            </a>
        </article>
        <article class="project">
            <a href="#" class="link">
                <div class="project_img">
                    {{HTML::image('assets/img/project.jpg', 'project', ['class' => 'img'])}}
                </div>
                <div class="content">
                    <h2 class="title">Nombre de proyecto</h2>
                    <div class="short">
                        <p>Pequeña descripción del proyecto.</p>
                    </div>
                </div>
            </a>
        </article>
        <article class="project">
            <a href="#" class="link">
                <div class="project_img">
                    {{HTML::image('assets/img/project.jpg', 'project', ['class' => 'img'])}}
                </div>
                <div class="content">
                    <h2 class="title">Nombre de proyecto</h2>
                    <div class="short">
                        <p>Pequeña descripción del proyecto.</p>
                    </div>
                </div>
            </a>
        </article>
        <article class="project">
            <a href="#" class="link">
                <div class="project_img">
                    {{HTML::image('assets/img/project.jpg', 'project', ['class' => 'img'])}}
                </div>
                <div class="content">
                    <h2 class="title">Nombre de proyecto</h2>
                    <div class="short">
                        <p>Pequeña descripción del proyecto.</p>
                    </div>
                </div>
            </a>
        </article>
        <article class="project">
            <a href="#" class="link">
                <div class="project_img">
                    {{HTML::image('assets/img/project.jpg', 'project', ['class' => 'img'])}}
                </div>
                <div class="content">
                    <h2 class="title">Nombre de proyecto</h2>
                    <div class="short">
                        <p>Pequeña descripción del proyecto.</p>
                    </div>
                </div>
            </a>
        </article>
        <article class="project">
            <a href="#" class="link">
                <div class="project_img">
                    {{HTML::image('assets/img/project.jpg', 'project', ['class' => 'img'])}}
                </div>
                <div class="content">
                    <h2 class="title">Nombre de proyecto</h2>
                    <div class="short">
                        <p>Pequeña descripción del proyecto.</p>
                    </div>
                </div>
            </a>
        </article>
        <article class="project">
            <a href="#" class="link">
                <div class="project_img">
                    {{HTML::image('assets/img/project.jpg', 'project', ['class' => 'img'])}}
                </div>
                <div class="content">
                    <h2 class="title">Nombre de proyecto</h2>
                    <div class="short">
                        <p>Pequeña descripción del proyecto.</p>
                    </div>
                </div>
            </a>
        </article>
        <article class="project">
            <a href="#" class="link">
                <div class="project_img">
                    {{HTML::image('assets/img/project.jpg', 'project', ['class' => 'img'])}}
                </div>
                <div class="content">
                    <h2 class="title">Nombre de proyecto</h2>
                    <div class="short">
                        <p>Pequeña descripción del proyecto.</p>
                    </div>
                </div>
            </a>
        </article>
    </section><!-- /projects -->
@stop