<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index(Request $request)
    {
        return Ticket::where('user_id', $request->user()->id)
            ->with('replies.user')
            ->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string'
        ]);

        $ticket = Ticket::create([
            'user_id' => $request->user()->id,
            'title' => $data['title'],
            'description' => $data['description'],
            'status' => 'open'
        ]);

        return response()->json($ticket, 201);
    }

    public function update(Request $request, Ticket $ticket)
    {
        if ($ticket->user_id !== $request->user()->id) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $ticket->update(
            $request->only('title', 'description')
        );

        return response()->json($ticket);
    }

    public function close(Ticket $ticket)
    {
        $ticket->update(['status' => 'closed']);

        return response()->json(['message' => 'Ticket closed']);
    }
}
