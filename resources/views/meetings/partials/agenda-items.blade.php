<agenda-items
    :meeting="{{ $meeting }}"
    :authorized="{{ auth()->check() ?: 0 }}"
></agenda-items>

