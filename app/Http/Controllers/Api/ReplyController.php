<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Reply\StoreReplyRequest;
use App\Models\Reply;
use App\Models\Ticket;
use App\Services\ReplyService;

class ReplyController extends Controller
{
    public function store(StoreReplyRequest $request,Ticket $ticket,ReplyService $service) {
        $reply = $service->store(auth()->user(),$ticket,$request->message);

        return response()->json([
            'status'  => true,
            'message' => 'Reply added successfully',
            'data'    => $reply
        ], 201);
    }
}
