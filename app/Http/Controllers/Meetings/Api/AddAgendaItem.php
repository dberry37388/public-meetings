<?php declare(strict_types=1);

namespace App\Http\Controllers\Meetings\Api;

use App\Models\Agenda;
use Illuminate\Http\Request;

class AddAgendaItem
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request)
    {
        // TODO needs validation, and authorization
        $agendaItem = Agenda::create([
            'topic' => $request->topic,
            'description' => $request->description,
            'meeting_id' => $request->meeting_id
        ]);

        // TODO should return an api resource
        return response()->json([
            'message' => 'Item was updated.',
            'data' => $agendaItem
        ], 201);
    }
}
