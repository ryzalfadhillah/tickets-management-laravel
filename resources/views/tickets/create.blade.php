@extends('layout/main')
@section('menu-ticket', 'active')
@section('item-route', 'Tickets')
@section('menu-title', 'Add Ticket')
@section('content')
    <div class="bg-white d-flex flex-col justify-content-center rounded p-4">
        <form action="{{ url('ticket-create') }}" style="width: 80%" method="POST">
            @csrf
            <input type="hidden" name="no_ticket" id="no_ticket" class="form-control">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="no_telp">Phone Number</label>
                <input type="text" name="no_telp" id="no_telp" class="form-control">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea name="address" id="address" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="date_ticket">Date</label>
                <input type="date" name="date_ticket" id="date_ticket" class="form-control">
            </div>
            <div class="form-group">
                <label for="total_ticket">Total Ticket</label>
                <input type="number" min="1" name="total_ticket" id="total_ticket" class="form-control">
            </div>
            <div class="form-group">
                <label for="tiket_category">Category</label>
                <fieldset class="form-group">
                    <select class="form-select p-2" id="tiket_category" name="tiket_category">
                        @foreach ($ticketCategory as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </fieldset>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
@section('scripts')
    <script>
        // Fungsi untuk menghasilkan UUID
        function generateUUID() {
            // Membuat versi UUID v4 secara acak
            return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
                var r = Math.random() * 16 | 0,
                    v = c == 'x' ? r : (r & 0x3 | 0x8);
                return v.toString(16);
            });
        }

        // Mendapatkan elemen input dengan id "no_ticket"
        var inputElement = document.getElementById("no_ticket");

        // Memperbarui nilai value dengan UUID yang dihasilkan
        inputElement.value = generateUUID();
    </script>

    <script>
        // Mendapatkan elemen input dengan id "date_ticket"
        var dateInput = document.getElementById("date_ticket");

        // Mendapatkan tanggal hari ini dalam format YYYY-MM-DD (yang diperlukan untuk input tanggal)
        var today = new Date().toISOString().split('T')[0];

        // Mengatur nilai minimal input tanggal menjadi hari ini
        dateInput.setAttribute('min', today);
    </script>

    <script>
        var exist = '{{ Session::has('success') }}';
        if (exist) {
            Swal.fire({
                title: "Congrats!",
                text: "{{ Session::get('success') }}",
                icon: "success"
            });
        }

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
