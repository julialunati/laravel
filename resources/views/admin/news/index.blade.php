@extends('layouts.admin')

@section('title') List of news - @parent @stop

@section('content')


<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">News</h1>
        <a href="{{ route('admin.news.create')}}" class="btn btn-primary" style="float: right;">Add news</a>

        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">List of news</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                List of news
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Date added</th>
                            <th>Control</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($news as $city => $facts)
                        @foreach ($facts as $fact)
                        <tr>
                            <td>{{ $loop->parent->index }}</td>
                            <td>{{ $city }}</td>
                            <td>{{ $fact['title'] }}</td>
                            <td>{{ $fact['description'] }}</td>
                            <td>{{ now()->format('d-m-y h:i') }}</td>
                            <td><a href="{{ route('admin.news.edit',['id' => $loop->parent->index ]) }}">edit</a> &nbsp; | &nbsp; <a href="">delete</a></td>
                        </tr>


                        @endforeach

                        @empty

                        <p> No news</p>

                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

@endsection