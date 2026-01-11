<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Ticket\TicketStoreRequest;
use App\Models\Ticket;
use App\Services\TicketService;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    protected TicketService $ticketService;

    public function __construct(TicketService $ticketService)
    {
        $this->ticketService = $ticketService;
    }
    public function index()
    {
        $tickets = $this->ticketService->list(auth()->user());

        return response()->json([
            'status' => true,
            'data'   => $tickets
        ]);
    }


    public function store(TicketStoreRequest $request)
    {
        $ticket = $this->ticketService->create(
            $request->validated(),
            auth()->id()
        );

        return response()->json([
            'success' => true,
            'message' => 'Ticket created successfully',
            'data' => $ticket
        ], 201);
    }

    public function update(TicketStoreRequest $request, Ticket $ticket)
    {
        abort_if($ticket->user_id !== auth()->id(), 403);
        abort_if($ticket->status === 'closed', 400, 'Ticket already closed');

        $ticket = $this->ticketService->update(
            $ticket,
            $request->validated()
        );

        return response()->json([
            'success' => true,
            'message' => 'Ticket updated successfully',
            'data' => $ticket,
        ]);
    }

    public function close(Ticket $ticket)
    {
        abort_if($ticket->user_id !== auth()->id(), 403);

        $ticket = $this->ticketService->close($ticket);

        return response()->json([
            'success' => true,
            'message' => 'Ticket closed successfully',
            'data' => $ticket,
        ]);
    }
}
