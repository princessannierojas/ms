<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Meetings</title>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/css/meetings.css'])
    </head>
    <body class="bg-#e0e0e2">
        @include('manager.header')
        @include('manager.sidebar')
        <div class="pb-16 animate-fade_in"> <!-- Added padding-bottom -->
            <!-- MEETINGS & All, Pinned, Favorite -->
            <div class="px-10 mt-8">
                <h1 class="font-inter text-3xl font-extrabold"> Meetings </h1>
            </div>
            <div class="px-10 mt-7 font-inter">
                <div class="flex space-x-7">
                    <a href="#" class="text-black font-semibold relative group">
                        <span class="relative z-10">All</span>
                        <span class="block absolute bottom-[-10px] left-0 w-full h-1 bg-black scale-x-100 transition-transform duration-300 ease-in-out"></span>
                    </a>
                    <a href="#" class="text-#171717-73 hover:text-black font-medium hover:font-semibold relative group">
                        <span class="relative z-10">Pinned</span>
                        <span class="block absolute bottom-[-10px] left-0 w-full h-1 bg-black scale-x-0 transition-transform duration-300 ease-in-out group-hover:scale-x-100"></span>
                    </a>
                    <a href="#" class="text-#171717-73 font-medium hover:text-black hover:font-semibold relative group">
                        <span class="relative z-10">Favorite</span>
                        <span class="block absolute bottom-[-10px] left-0 w-full h-1 bg-black scale-x-0 transition-transform duration-300 ease-in-out group-hover:scale-x-100"></span>
                    </a>
                </div>
            </div>
            
            <!-- SEARCH BAR -->
            <div class="px-10 mt-9 font-inter flex flex-wrap items-center">
                <form class="flex items-center flex-1 space-x-0">
                    <div class="relative">
                        <button id="dropdown-button" type="button" class="shadow-sm inline-flex items-center py-2 px-3 text-sm font-medium text-center text-gray-900 bg-gray-200 border border-gray-300 rounded-l-lg focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M5 4a1 1 0 00-2 0v7.268a2 2 0 000 3.464V16a1 1 0 102 0v-1.268a2 2 0 000-3.464V4zM11 4a1 1 0 10-2 0v1.268a2 2 0 000 3.464V16a1 1 0 102 0V8.732a2 2 0 000-3.464V4zM16 3a1 1 0 011 1v7.268a2 2 0 010 3.464V16a1 1 0 11-2 0v-1.268a2 2 0 010-3.464V4a1 1 0 011-1z" />
                            </svg>
                        </button>
                        <div id="dropdown-menu" class="hidden absolute left-0 mt-2 w-48 bg-#ececec border border-gray-300 rounded-lg shadow-lg">
                            <ul class="py-1">
                                <li><a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Latest</a></li>
                                <li><a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Oldest</a></li>
                                <li><a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Alphabetically</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="relative flex-1 max-w-xs shadow-sm">
                        <input type="search" id="search-dropdown" class="block p-2 w-full text-sm text-gray-900 bg-gray-200 rounded-r-lg border border-gray-300 focus:outline-none focus:border-gray-300" placeholder="Search..." />
                        <button type="submit" class="absolute top-0 right-0 p-2 text-sm font-medium h-full text-black bg-gray-200 rounded-r-lg border border-gray-300">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                            <span class="sr-only">Search</span>
                        </button>
                    </div>
                </form>
                <!-- ADD NEW MEETING -->
                <div class="flex w-full justify-end mt-8 sm:mt-0 sm:w-auto sm:ml-4">
                    <button id="add_meeting_btn" type="button" class="text-white bg-gradient-to-r from-black via-gray-800 to-gray-900 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-gray-300 dark:focus:ring-gray-800 font-medium rounded-lg text-sm px-5 py-2 text-center">
                        Add New Meeting
                    </button>
                </div>
            </div>

            <!-- CARDS -->
            <div class="px-10 mt-7 font-inter">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($meetings_of_cliu as $meeting)
                        <div class="bg-[#ececec] border border-[#cdcdcd] rounded-lg shadow-xl overflow-hidden h-96">
                            <div class="card-content p-7">
                                <!-- First row with only the SVG icon -->
                                <div class="flex justify-end mb-3">
                                    <button class="dropdown-toggle hover:bg-gray-300 rounded-full p-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                        </svg>
                                    </button>
                                    <div class="dropdown-menu hidden absolute left-13 mt-8 w-40 bg-[#ececec] border border-gray-300 rounded-lg shadow-lg">
                                        <ul class="py-1">
                                            <li><a href="{{ url('/edit_notes/' . $meeting->id) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Edit Notes</a></li>
                                            <form action="{{ url('/delete_meeting/' . $meeting->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this meeting?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Delete Meeting</button>
                                            </form>
                                        </ul>
                                    </div>
                                </div>
                                <!-- MEETING NAME -->
                                <input type="hidden" name="meeting_id" value="{{ $meeting->id }}">
                                <div>
                                    <h2 class="text-xl font-bold">{{ $meeting->title }}</h2>
                                </div>
                                <!-- MEETING LOCATION -->
                                <div class="mt-4 ml-2 flex items-center">
                                    <img src="{{ asset('images/location.svg') }}" alt="Image Description" class="w-5 h-5">
                                    <span class="ml-2 text-sm text-[#484848]">{{ $meeting->location }}</span>
                                </div>
                                <!-- MEETING DATE AND TIME -->
                                <div class="mt-2 ml-2 flex items-center">
                                    <img src="{{ asset('images/calendar.svg') }}" alt="Image Description" class="w-5 h-5">
                                    @php
                                        $date = new DateTime($meeting->date);
                                        $date_new_format = $date->format('F d, Y');
                                        
                                        $time = new DateTime($meeting->time);
                                        $time_new_format = $time->format('h:i A');
                                    @endphp
                                    <span class="ml-2 text-sm text-[#484848]">{{ $date_new_format }} - {{ $time_new_format }}</span>
                                </div>
                                <!-- MEETING NOTES -->
                                <div class="truncate-notes mt-4">
                                    <p class="text-sm font-normal text-[#484848] italic">
                                        "{{ $meeting->notes }}"
                                    </p>
                                </div>
                                <!-- MEETING STATUS -->
                                <div class="meeting-status px-7 py-2 bg-violet-300 border-t border-gray-300 w-full">
                                    <p class="text-sm font-normal text-center mt-1 mb-1">Meeting status: Pending</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        @include('manager.add_meeting_form')
        @vite('resources/js/meetings.js')
    </body>
</html>
