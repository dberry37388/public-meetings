<?php declare(strict_types=1);

namespace App\Http\Controllers\Meetings\Api;

use App\Models\Agenda;
use Illuminate\Http\Request;

class UpdateAgendaItem
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
        $item = Agenda::find($request->agenda_id);

        if ($item) {
            $item->update([
                'topic' => $request->topic,
                'description' => $request->description
            ]);

            return response()->json([
                'message' => 'Item was updated.'
            ], 204);
        }

        return response()->json([
            'message' => 'Could not update agenda item.'
        ], 404);
    }
}
