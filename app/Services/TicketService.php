<?php

namespace App\Services;

use App\Models\Ticket;
use App\Models\User;

class TicketService
{
    public function create(array $data, int $userId): Ticket
    {
        return Ticket::create([
            'user_id' => $userId,
            'title' => $data['title'],
            'description' => $data['description'],
            'status' => 'open'
        ]);
    }

    public function update(Ticket $ticket, array $data): Ticket
    {
        $ticket->update($data);
        return $ticket;
    }

    public function close(Ticket $ticket): Ticket
    {
        $ticket->update(['status' => 'closed']);
        return $ticket;
    }
    public function list(User $user)
    {
        if ($user->role === 'admin') {
            return Ticket::with('user')->latest()->get();
        }

        return Ticket::where('user_id', $user->id)
                     ->with('replies')
                     ->latest()
                     ->get();
    }
}
