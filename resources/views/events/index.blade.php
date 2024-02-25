<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Events') }}
        </h2>
    </x-slot>
    @foreach($events as $event)
        <div>
            <h3>{{ $event->title }}</h3>
            <p>{{ $event->description }}</p>
            <p>Starts: {{ $event->start_datetime }}</p>
            <p>Ends: {{ $event->end_datetime }}</p>
            <a href="{{ route('events.show', $event->id) }}">View Details</a>
        </div>
        <hr>
    @endforeach
</x-app-layout>
