@extends('layouts.admin')

@section('title') Categories - @parent @stop

@section('content')


<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Categories</h1>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary" style="float: right;">Add category</a>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">List of news</li>
        </ol>

        @include('notifications.success')

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                List of categories
            </div>
            
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category</th>
                            <th>News quantity</th>
                            <th>Contol</th>

                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <th>{{ $category->id }}</th>
                            <th>{{ $category->title }}</th>
                            <th>{{ optional($category->news)->count() }}</th>
                            <th><a href="{{ route('admin.categories.edit',['category' => $category ]) }}">edit</a>
                                &nbsp; | &nbsp;
                                <a href="javascript:;" class="delete" rel="{{ $category->id }}">delete</a>
                            </th>
                        </tr>
                        @endforeach

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
                    submit("/admin/categories/" + rel).then(() => {
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