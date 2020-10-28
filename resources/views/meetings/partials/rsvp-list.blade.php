<div id="rsvp-list" class="mt-4">
    <h2 class="mb-4"> RSVPs</h2>

    <ul class="list-group">
        @forelse($meeting->rsvps as $rsvp)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $rsvp->email }}
                <span class="badge badge-primary badge-pill">{{ $rsvp->response }}</span>
            </li>
        @empty
            <li class="list-group-item">
                No responses received!
            </li>
        @endforelse
    </ul>
</div>
