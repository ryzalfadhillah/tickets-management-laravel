<?php

namespace App\Repositories;

use App\Http\Resources\TicketCategoryResource;
use App\Http\Resources\TicketDetailResource;
use App\Http\Resources\TicketResource;
use App\Models\Category;
use App\Models\Ticket;
use App\Models\TicketDetail;
use Illuminate\Support\Facades\DB;

class TicketRepository
{
    protected $ticket;

    public function __construct(Ticket $ticket)
    {
        $this->ticket = $ticket;
    }

    public function GetTicket($id = null)
    {
        $data =  DB::table('tickets')
            ->join('ticket_details', 'tickets.id', '=', 'ticket_details.ticket_header_id')
            ->join('categories', 'ticket_details.tiket_category', '=', 'categories.id')
            ->select('tickets.*', 'ticket_details.*', 'categories.name as category')
            ->get();
        return $data;
    }

    public function store($request)
    {
        $ticketHeader = Ticket::create([
            'no_ticket' => $request->no_ticket,
            'name' => $request->name,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'address' => $request->address,
            'date_ticket' => $request->date_ticket
        ]);

        TicketDetail::create([
            'ticket_header_id' => $ticketHeader->id,
            'tiket_category' => $request->tiket_category,
            'total_ticket' => $request->total_ticket
        ]);
        return $ticketHeader;
    }
}
