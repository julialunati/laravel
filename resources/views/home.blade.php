@extends('layouts.admin')

@section('title') Account - @parent @stop

@section('content')


<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Admin account</h1>

        <div>
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            <div class="alert alert-light" role="alert">
                Hi, {{ Auth::user()->name }}, nice to see you again!
            </div>

        </div>

    </div>

</main>

@endsection