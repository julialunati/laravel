@extends('layouts.admin')

@section('title') Edit category - @parent @stop

@section('content')


<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit category</h1>

        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Form for editing category</li>
        </ol>

        @include('notifications.error')

    </div>
    <div class="container-fluid px-4">
        <form method="post" action="{{ route('admin.categories.update', ['category' => $category]) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $category->title }}">
            </div><br>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
    </div>
</main>

@endsection