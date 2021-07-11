@extends('layouts.main')

@section('content')



<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">

            <div>
                <h2>Contact form</h2>
            </div><br>

            @if($errors->any())
            @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
            @endif

            <form method="post" action="{{ route('news.store') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Full name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                </div><br>
                <div class="form-group">

                    <label for="number">Contact number</label>
                    <input type="number" class="form-control" id="number" name="number" value="{{ old('number') }}">

                </div><br>
                <div class="form-group">
                    <label for="request">Your request/proposal</label>
                    <textarea class="form-control" id="request" name="request">{{ old('request') }}</textarea>
                </div><br>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form><br>
        </div>
    </div>
</div>

@endsection