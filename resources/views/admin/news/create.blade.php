@extends('layouts.admin')

@section('title') Add news - @parent @stop

@section('content')


<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Add news</h1>

        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Form for inserting news</li>
        </ol>
        @if($errors->any())
        @foreach($errors->all() as $error)
        <div class="alert alert-danger">{{ $error }}</div>
        @endforeach
        @endif
    </div>
    <div class="container-fluid px-4">
        <form method="post" action="{{ route('admin.news.store') }}">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
            </div><br>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="draft" @if(old('status') === 'draft') selected @endif>draft</option>
                    <option value="published" @if(old('status') === 'published') selected @endif>published</option>
                    <option value="blocked" @if(old('status') === 'blocked') selected @endif>blocked</option>
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