@extends('layouts.main')

@section('content')


<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">

            @foreach ($facts as $fact)
            <div>
                <h2 class="post-title"><a href="{{ route('news.detalize', ['option' => $city, 'id' => $fact['id']]) }}">{{ $fact['title'] }}</a></h2>
                <p>{{ $fact['description'] }}</p>
                <p class="post-meta">
                    Posted by
                    <a href="#!">Admin</a>
                    {{ now()->format('d-m-y h:i') }}
                </p>
                <!-- Divider-->
                <hr class="my-4" />
            </div>
            @endforeach

            <!-- Pager-->
            <div class="d-flex justify-content-end mb-4">
                <a class="btn btn-primary text-uppercase" href="#!">Older Posts →</a>
            </div>
        </div>
    </div>
</div>

@endsection