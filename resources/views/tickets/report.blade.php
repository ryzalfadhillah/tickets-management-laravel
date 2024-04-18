@extends('layout/main')
@section('menu-report', 'active')
@section('item-route', 'Tickets')
@section('menu-title', 'Ticket Report')
@section('content')
    <div class="container p-4 rounded bg-white">
        <div class="row">
            <div class="col-md-12">
                <table id="ticket-table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NOMOR TIKET</th>
                            <th>NAMA</th>
                            <th>Email</th>
                            <th>NO TELEPON</th>
                            <th>KATEGORI</th>
                            <th>TANGGAL TIKET</th>
                            <th>TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($tickets)
                            @foreach ($tickets->data as $ticket)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $ticket->no_ticket }}</td>
                                    <td>{{ $ticket->name }}</td>
                                    <td>{{ $ticket->email }}</td>
                                    <td>{{ $ticket->no_telp }}</td>
                                    @if ($ticket->category == 'Ekonomi')
                                        <td class="btn btn-warning ">{{ $ticket->category }}</td>
                                    @elseif ($ticket->category == 'Bisnis')
                                        <td class="btn btn-success ">{{ $ticket->category }}</td>
                                    @elseif ($ticket->category == 'Eksekutif')
                                        <td class="btn btn-primary ">{{ $ticket->category }}</td>
                                    @else
                                        <td>{{ $ticket->category }}</td>
                                    @endif
                                    <td>{{ $ticket->date_ticket }}</td>
                                    <td>{{ $ticket->total_ticket }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6">Tidak ada data tiket</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
