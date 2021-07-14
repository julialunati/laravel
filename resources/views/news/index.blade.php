@extends('layouts.main')

@section('content')

<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            @foreach ($categories as $category)
         
            <!-- Post preview-->
            <div class="post-preview">
                <a href="post.html">
                    <h2 class="post-title"><a href="{{ route('news.categorize', ['option' => $category->id]) }}">{{ $category->title }}</a></h2>
                </a>
                <p class="post-meta">
                    Posted by
                    <a href="#!">Admin</a>
                    {{ $category->created_at }}
                </p>
            </div>
            <!-- Divider-->
            <hr class="my-4" />

            @endforeach
            <!-- Pager-->
            <div class="d-flex justify-content-end mb-4">
                <a class="btn btn-primary text-uppercase" href="#!">Older Posts →</a>
            </div>
        </div>
    </div>
</div>

@endsection