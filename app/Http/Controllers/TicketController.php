<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        $request = Request::create(url('api/tickets'), 'GET');
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('X-API-KEY', 'bootcamp9');
        $response = app()->make('router')->dispatch($request);
        $data = json_decode($response->getContent());
        return view('tickets.report', ['tickets' => $data]);
    }

    public function create()
    {
        $dataCategory = Category::all();
        return View('tickets.create', ['ticketCategory' => $dataCategory]);
    }

    public function store(Request $request)
    {
        $request = Request::create(url('api/buy-ticket'), 'POST');
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('X-API-KEY', 'bootcamp9');
        $response = app()->make('router')->dispatch($request);
        if ($response->exception == null) {
            return Redirect('/ticket-create')->with('success', 'Berhasil membeli tiket!');
        } else {
            return Redirect('/ticket-create')->with('error', 'Periksa kembali data tiket anda!');
        }
    }
}
