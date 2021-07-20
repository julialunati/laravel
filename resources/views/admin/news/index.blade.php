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
        @include('notifications.success')

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

                        @forelse ($newsList as $news)

                        <tr>
                            <td>{{ $news->id }}</td>
                            <td>{{ $news->category }}</td>
                            <td>{{ $news->title }}</td>
                            <td>{{ $news->description }}</td>
                            <td>{{ $news->created_at }}</td>
                            <td><a href="{{ route('admin.news.edit',['news' => $news ]) }}">edit</a>
                                &nbsp; | &nbsp;
                                <a href="javascript:;" class="delete" rel="{{ $news->id }}">delete</a>
                            </td>
                        </tr>


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

@push('js')

<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function() {

        const datatablesSimple = document.getElementById('datatablesSimple');
        if (datatablesSimple) {
            new simpleDatatables.DataTable(datatablesSimple);
        }

        const el = document.querySelectorAll(".delete");
        el.forEach(function(e, k) {
            e.addEventListener('click', function() {
                const rel = e.getAttribute("rel");
                if (confirm("Do you confirm elimination of the element with #ID " + rel + " ?")) {
                    submit("/admin/news/" + rel).then(() => {
                        location.reload();
                    })
                }
            });
        })
    });
    async function submit(url) {
        let response = await fetch(url, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        });
        let result = await response.json();
        return result.ok;
    }
</script>

@endpush