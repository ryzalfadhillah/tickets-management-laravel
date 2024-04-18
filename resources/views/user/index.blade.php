@extends('layout/main')
@section('menu-user', 'active')
@section('item-route', 'Master-admin')
@section('menu-title', 'Master Admin')
@section('content')
    <div class="container p-4 rounded bg-white">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-end mb-3">
                    <a href="/master-admin/create" class="btn text-white" style="background-color: #007F73">Tambah Admin</a>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>Admin</td>
                                <td>
                                    <a href="{{ url('/master-admin/edit/' . $user->id) }}" class="btn btn-primary">Edit</a>
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#deleteModal{{ $user->id }}">Delete</button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="deleteModal{{ $user->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah Anda yakin ingin menghapus {{ $user->name }}?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Batal</button>
                                                    <a href="{{ url('/master-admin/delete/' . $user->id) }}"
                                                        class="btn btn-danger">Hapus</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Tampilkan pagination -->
                <div class="d-flex justify-content-center">
                    {{ $users->links() }}
                </div>
                {{-- {{ $users->links() }} --}}
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    {{-- <script>
        var msg = '{{ Session::get('login_success') }}';
        var exist = '{{ Session::has('login_success') }}';
        if (exist) {
            alert(msg);
        }
    </script> --}}
@endsection
