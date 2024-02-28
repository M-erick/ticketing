<x-app-layout>

    <style>
        /* CSS for Pagination Links */
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            list-style: none;
            padding: 0;
            margin: 20px 0; /* Adjust margin as needed */
        }
    
        .pagination li {
            margin: 0 5px;
        }
    
        .pagination a,
        .pagination span {
            display: inline-block;
            padding: 8px 12px;
            text-decoration: none;
            color: #3498db;
            border: 1px solid #3498db;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }
    
        .pagination a:hover {
            background-color: #3498db;
            color: #fff;
        }
    </style>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Events') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             {{-- success message --}}
             @if (session('success'))
             <div class="alert alert-success" id="success-alert">
                 {{ session('success') }}
             </div>
             <script>
                 // Add a timeout to hide the success message after 5 seconds (5000 milliseconds)
                 setTimeout(function() {
                     document.getElementById('success-alert').style.display = 'none';
                 }, 5000);
             </script>
         @endif
         
         @if (session('error'))
             <div class="alert alert-danger" id="error-alert">
                 {{ session('error') }}
             </div>
             <script>
                 // Add a timeout to hide the error message after 5 seconds (5000 milliseconds)
                 setTimeout(function() {
                     document.getElementById('error-alert').style.display = 'none';
                 }, 5000);
             </script>
         @endif
         
            <div  class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                @foreach($events_paginate as $event)
                <div style="margin-bottom: 20px; display: flex; border-radius: 10px; overflow: hidden; background-color: white;">
                    <div style="flex-shrink: 0; width:55%; overflow: hidden; border-radius: 10px 0 0 10px; margin-right: 10px;">
                        <img src="{{ asset('storage/' . $event->image_path) }}" alt="Event Image" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <div style="width: 50%; padding: 20px; background-color: white; height: 100%;">
                        <h3 style="font-size: 1.5rem; margin-bottom: 10px;">{{ $event->title }}</h3>
                        <p style="font-size: 1rem; color: #666;">{{substr($event->description, 0, 100)}} ...</p>
                        <p style="font-size: 0.9rem; color: #999;">Starts: {{ $event->start_datetime }}</p>
                        <p style="font-size: 0.9rem; color: #999;">Ends: {{ $event->end_datetime }}</p>
                        <a href="{{ route('events.show', $event->id) }}" style="font-size: 1rem; color: #3498db; text-decoration: none;">Read More</a>
                    </div>
                </div>
                <div style="height: 10px; background-color: #f0f0f0; margin-bottom: 20px; "></div> <!-- Gray background gap -->
               @endforeach
               <div class="pagination">
                {{ $events_paginate->links() }}
              </div>

            </div>

        </div>

    </div>
   
</x-app-layout>
