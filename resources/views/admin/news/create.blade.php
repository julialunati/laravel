@extends('layouts.admin')

@section('title') Add news - @parent @stop

@section('content')


<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Add news</h1>

        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Form for inserting news</li>
        </ol>

        @include('notifications.error')

    </div>
    <div class="container-fluid px-4">
        <form method="post" action="{{ route('admin.news.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
            </div><br>
            <div class="form-group">
                <label for="category">Category</label>
                <select name="category_id" id="category" class="form-control">
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if(old('category_id') == $category->id) selected @endif>
                        {{$category->title}}
                    </option>
                    @endforeach
                </select>
            </div><br>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control" id="image" name="image">
            </div><br>
            @include('notifications.errorImage')
            <div class="form-group">
                <label for="source">Source ID</label>
                <input type="number" class="form-control" id="source" name="source_id" value="{{ old('source_id') }}">
            </div><br>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="draft" @if(old('status')==='draft' ) selected @endif>draft</option>
                    <option value="published" @if(old('status')==='published' ) selected @endif>published</option>
                    <option value="blocked" @if(old('status')==='blocked' ) selected @endif>blocked</option>
                </select>
            </div><br>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
            </div><br>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
    </div>
</main>

@endsection