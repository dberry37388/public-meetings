<?php

namespace App\Http\Controllers\Meetings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Meetings\RsvpToMeetingRequest;
use App\Models\Meeting;
use App\Models\Rsvp;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RsvpToMeetingController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \App\Http\Requests\Meetings\RsvpToMeetingRequest  $request
     * @param  int  $meetingId
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(RsvpToMeetingRequest $request, int $meetingId)
    {
        $meeting = Meeting::find($meetingId);

        Rsvp::updateOrCreate([
            'email' => $request->get('email'),
            'meeting_id' => $meetingId
        ], [
            'response' => $request->get('response')
        ]);

        return redirect(route('showMeeting', $meetingId));
    }
}
