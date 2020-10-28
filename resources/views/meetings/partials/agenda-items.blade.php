<div id="agenda-items" class="pr-md-4">
    <h2 class="mb-4"> Meeting Agenda</h2>

    <ul class="list-group">
        @forelse($meeting->agendaItems as $agendaItem)
            <li class="list-group-item">
                <div>
                    <h5 class="mb-1">
                        {{ $agendaItem->topic }}
                    </h5>
                </div>

                <p class="mb-1">
                    {{ $agendaItem->description }}
                </p>
            </li>
        @empty
            <li class="list-group-item">
                No responses received!
            </li>
        @endforelse
    </ul>
</div>
