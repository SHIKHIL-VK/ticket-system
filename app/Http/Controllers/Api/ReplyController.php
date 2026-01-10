<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reply;
use App\Models\Ticket;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    public function store(Request $request, Ticket $ticket)
    {
        if ($ticket->status === 'closed') {
            return response()->json(['message' => 'Ticket closed'], 400);
        }

        $request->validate([
            'message' => 'required|string'
        ]);

        $reply = Reply::create([
            'ticket_id' => $ticket->id,
            'user_id' => $request->user()->id,
            'message' => $request->message
        ]);

        return response()->json($reply, 201);
    }
}
