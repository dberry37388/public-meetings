<?php declare(strict_types=1);

namespace App\Http\Controllers\Meetings\Api;

use App\Models\Meeting;
use Illuminate\Http\Request;

class ToggleAgendaPrivacy
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
        $meeting = Meeting::find($request->meeting_id);

        if ($meeting) {
            $meeting->is_agenda_private = (int) $request->privacy;
            $meeting->save();

            return response()->json([
                'message' => 'Privacy was toggled'
            ], 200);
        }

        return response()->json([
            'message' => 'Could not update meeting.'
        ], 404);
    }
}
