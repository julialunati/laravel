@extends('layouts.admin')

@section('title') Control panel @stop

@section('content')


<main>

    <div class="container-fluid px-4">
        <h1 class="mt-4">Users control</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Appropriate Use of Administrator Access</li>
        </ol>

        @include('notifications.success')

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                List of users
            </div>

            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Date created</th>
                            <th>Is admin?</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <th>{{ $user->id }}</th>
                            <th>{{ $user->name }}</th>
                            <th>{{ $user->email }}</th>
                            <th>{{ $user->created_at }}</th>
                            <th>
                                <form method="post" action="{{ route('admin.users.update', ['user' => $user]) }}">
                                    @csrf
                                    @method('put')
                                    <div class="form-group">
                                        <select name="is_admin" id="is_admin" class="form-control">
                                            <option value="0" @if( $user->is_admin == 0 ) selected @endif>false</option>
                                            <option value="1" @if( $user->is_admin == 1 ) selected @endif>true</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-sm">Update</button>
                                </form>
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
    });
</script>

@endpush