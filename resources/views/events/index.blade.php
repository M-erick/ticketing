<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Events') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div  class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                @foreach($events as $event)
                <div style="margin-bottom: 20px; display: flex; border-radius: 10px; overflow: hidden; background-color: white;">
                    <div style="flex-shrink: 0; width:55%; overflow: hidden; border-radius: 10px 0 0 10px; margin-right: 10px;">
                        <img src="{{ asset('storage/' . $event->image_path) }}" alt="Event Image" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <div style="width: 50%; padding: 20px; background-color: white; height: 100%;">
                        <h3 style="font-size: 1.5rem; margin-bottom: 10px;">{{ $event->title }}</h3>
                        <p style="font-size: 1rem; color: #666;">{{ $event->description }}</p>
                        <p style="font-size: 0.9rem; color: #999;">Starts: {{ $event->start_datetime }}</p>
                        <p style="font-size: 0.9rem; color: #999;">Ends: {{ $event->end_datetime }}</p>
                        <a href="{{ route('events.show', $event->id) }}" style="font-size: 1rem; color: #3498db; text-decoration: none;">Read More</a>
                    </div>
                </div>
                <div style="height: 10px; background-color: #f0f0f0; margin-bottom: 20px; "></div> <!-- Gray background gap -->
               @endforeach

            </div>

        </div>

    </div>
   
</x-app-layout>
