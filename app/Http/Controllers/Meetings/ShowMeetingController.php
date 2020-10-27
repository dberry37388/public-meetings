<?php

namespace App\Http\Controllers\Meetings;

use App\Http\Controllers\Controller;
use App\Models\Meeting;
use Illuminate\Http\Request;

class ShowMeetingController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $meetingId
     *
     * @return \Illuminate\View\View
     */
    public function __invoke(Request $request, int $meetingId)
    {
        $meeting = Meeting::find($meetingId);

        return view('meetings.show')->with(['meeting' => $meeting]);
    }
}
