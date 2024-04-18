@extends('layout/main')
@section('menu-user', 'active')
@section('item-route', 'Master-admin')
@section('menu-title', 'Master Admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2>{{ isset($user) ? 'Edit' : 'Add New' }} Admin</h2>
                <form action="{{ isset($user) ? url('/master-admin/edit-process') : url('/master-admin/create') }}"
                    method="POST">
                    @csrf
                    @if (isset($user))
                        <input type="hidden" name="id" id="id" class="form-control" value="{{ $user->id }}">
                    @endif
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control"
                            value="{{ isset($user) ? $user->name : old('name') }}" placeholder="Masukan nama...">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control"
                            value="{{ isset($user) ? $user->email : old('email') }}" placeholder="Masukan Email...">
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control"
                            placeholder="Masukan Password...">
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">{{ isset($user) ? 'Update' : 'Add' }} Admin</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        var error = '{{ Session::has('error') }}';
        if (error) {
            Swal.fire({
                title: "Oops!",
                text: "{{ Session::get('error') }}",
                icon: "error"
            });
        }
    </script>
@endsection
