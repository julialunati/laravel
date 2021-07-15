@extends('layouts.admin')

@section('title') Edit news - @parent @stop

@section('content')


<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit news</h1>

        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Form for editing news</li>
        </ol>

        @include('notifications.error')

    </div>
    <div class="container-fluid px-4">
        <form method="post" action="{{ route('admin.news.update', ['news' => $news]) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $news->title }}">
            </div><br>
            <div class="form-group">
                <label for="category">Category</label>
                <select name="category_id" id="category" class="form-control">
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if($category->id == $news->category_id) selected @endif>
                        {{$category->title}}
                    </option>
                    @endforeach
                </select>
            </div><br>
            <div class="form-group">
                <label for="source">Source ID</label>
                <input type="number" class="form-control" id="source" name="source_id" value="{{ $news->source_id }}">
            </div><br>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="draft" @if( $news->status ==='draft' ) selected @endif>draft</option>
                    <option value="published" @if( $news->status ==='published' ) selected @endif>published</option>
                    <option value="blocked" @if( $news->status ==='blocked' ) selected @endif>blocked</option>
                </select>
            </div><br>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description">{{ $news->description }}</textarea>
            </div><br>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
    </div>
</main>

@endsection