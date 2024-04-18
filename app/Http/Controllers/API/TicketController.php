<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\TicketRequest;
use App\Models\Ticket;
use App\Repositories\TicketRepository;
use Illuminate\Http\Request;

class TicketController extends Controller
{

    protected $ticketRepository;

    public function __construct(TicketRepository $ticketRepository)
    {
        $this->ticketRepository = $ticketRepository;
    }

    public function index(Request $request)
    {
        $data = $request->id === null ? $this->ticketRepository->GetTicket() : $this->ticketRepository->GetTicket($request->id);
        return response()->json([
            'data' => $data
        ]);
    }

    public function store(TicketRequest $request)
    {
        try {
            $data = $this->ticketRepository->store($request);
            return response()->json([
                'status' => true,
                'message' => 'Successfully buy ticket',
                'data' => $data
            ], 201);
        } catch (\Exception $ex) {
            return response()->json([
                'status' => false,
                'message' => $ex->getMessage(),
                'data' => []
            ], 400);
        }
    }
}
