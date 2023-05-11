@extends('layouts.admin')
@section('body')
    <div class="row text-center">
        @if (session('created_user'))
            <div class="alert alert-success">
                {{session('created_user')}}
            </div>
        @endif

        <div class="container-md">
            <div class="nav-scroller py-1 mb-2">
                <div class="col-md-9 px-0 mx-auto">
                    <nav class="nav d-flex justify-content-between">
                        @foreach($categories as $category)
                            <a class="p-2 link-secondary" href="/?category={{$category->id}}">{{$category->name}}</a>
                        @endforeach
                            <a class="p-2 link-secondary" href="/">All</a>
                    </nav>
                </div>
            </div>
            <main class="container-md">
                <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
                    <div class="col-md-6 px-0">
                        <h1 class="display-4 fst-italic">Title of a longer featured blog post</h1>
                        <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly
                            and efficiently about what’s most interesting in this post’s contents.</p>
                        <p class="lead mb-0"><a href="#" class="text-white fw-bold">Continue reading...</a></p>
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-6">
                        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                            <div class="col p-4 d-flex flex-column position-static">
                                <strong class="d-inline-block mb-2 text-primary">{{$firstPost->category->name}}</strong>
                                <h3 class="mb-0">{{$firstPost->title}}</h3>
                                <div class="mb-1 text-muted">{{$firstPost->created_at->diffForHumans()}}</div>
                                <p class="card-text mb-auto">{{Str::limit($firstPost->body,'50','...')}}</p>
                                <a href="{{route('posts.show',$firstPost->id)}}" class="stretched-link">Continue reading</a>
                            </div>
                            <div class="col-auto d-none d-lg-block">
                                <svg class="bd-placeholder-img" width="200" height="250"
                                     xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail"
                                     preserveAspectRatio="xMidYMid slice" focusable="false">
                                    <title>Placeholder</title>
                                    <rect width="100%" height="100%" fill="#55595c"></rect>
                                    <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                                </svg>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div
                            class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                            <div class="col p-4 d-flex flex-column position-static">
                                <strong class="d-inline-block mb-2 text-success">{{$secondPost->category->name}}</strong>
                                <h3 class="mb-0">{{$secondPost->title}}</h3>
                                <div class="mb-1 text-muted">{{$secondPost->created_at->diffForHumans()}}</div>
                                <p class="mb-auto">{{Str::limit($secondPost->body,'50','...')}}</p>
                                <a href="{{route('posts.show',$secondPost->id)}}" class="stretched-link">Continue reading</a>
                            </div>
                            <div class="col-auto d-none d-lg-block">
                                <svg class="bd-placeholder-img" width="200" height="250"
                                     xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail"
                                     preserveAspectRatio="xMidYMid slice" focusable="false">
                                    <title>Placeholder</title>
                                    <rect width="100%" height="100%" fill="#55595c"></rect>
                                    <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row g-5">
                    <div class="col-md-8">
                        <h3 class="pb-4 mb-4 fst-italic border-bottom">
                            From the Firehose
                        </h3>
                        @foreach ($posts as $post)
                        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                            <article class="blog-post">
                                <h5 class="text-secondary" >{{$post->category?->name}}</h5>
                                <h2 class="blog-post-title"><a
                                        href="{{route('posts.show',$post->id)}}">{{$post->title}}</a></h2>
                                <p class="blog-post-meta">{{$post->created_at}} by <a href="#">{{$post->user->name}}</a>
                                </p>

                                <p>{{Str::limit($post->body,'50','...')}}</p>
                            </article>
                        </div>
                        @endforeach
                        <div class="row">
                            <div class="col-md-6">
                                {{ $posts->links('pagination::bootstrap-5') }}
                            </div>
                        </div>

                    </div>

                    <div class="col-md-4">
                        <div class="position-sticky" style="top: 2rem;">
                            <div class="p-4 mb-3 bg-light rounded">
                                <h4 class="fst-italic">About</h4>
                                <p class="mb-0">Customize this section to tell your visitors a little bit about your
                                    publication, writers, content, or something else entirely. Totally up to you.</p>
                            </div>

                            <div class="p-4">
                                <h4 class="fst-italic">Archives</h4>
                                <ol class="list-unstyled mb-0">
                                    @foreach($dates as $date)
                                    <li><a href="/?date={{$date}}">{{$date}}</a></li>
                                    @endforeach
                                </ol>
                            </div>

                            <div class="p-4">
                                <h4 class="fst-italic">Elsewhere</h4>
                                <ol class="list-unstyled">
                                    <li><a href="#">GitHub</a></li>
                                    <li><a href="#">Twitter</a></li>
                                    <li><a href="#">Facebook</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

            </main>
        </div>

@endsection
