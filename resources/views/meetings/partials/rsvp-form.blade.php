<div id="rsvp-form" class="mb-4">

    <h2>Can You Attend?</h2>

    <form action="{{ route('rsvpToMeeting', $meeting->id) }}" method="post">

        <p>
            Let the organizer know if you are able to attend the meeting by RSVPing below.
        </p>

        <div class="form-group">
            <label for="email">{{ __('Email Address') }}</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" autocomplete="email" placeholder="Enter email">

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="response">{{ __('Response') }}</label>
            <select name="response" id="response" class="form-control">
                <option value="Yes">Yes</option>
                <option value="No">No</option>
                <option value="Maybe">Maybe</option>
            </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">RSVP</button>
        </div>
        @csrf
    </form>
</div>
