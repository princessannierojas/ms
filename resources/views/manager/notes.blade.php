<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Notes</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body class="bg-#e0e0e2">
    @include('manager.header')
    @include('manager.sidebar')
    <div class="px-10 mt-8">
        <h1 class="font-inter text-3xl font-extrabold">Edit Notes</h1>
    </div>
    <div class="px-10 mt-7 mb-10 font-inter">
        <div class="bg-#ececec border border-#cdcdcd rounded-lg shadow-xl p-7">
            <form action="{{ url('/update_meeting/' . $meeting_info->id) }}" method="POST">
                @csrf
                @method('PUT')
                <!-- MEETING NAME -->
                <div>
                    <h2 class="text-xl font-bold">{{ $meeting_info->title }}</h2>
                </div>
                <!-- MEETING LOCATION -->
                <div class="mt-4 ml-2 flex items-center">
                    <img src="{{ asset('images/location.svg') }}" alt="Image Description" class="w-5 h-5">
                    <span class="ml-2 text-sm text-#484848">{{ $meeting_info->location }}</span>
                </div>
                <!-- MEETING DATE AND TIME -->
                <div class="mt-2 ml-2 flex items-center">
                    <img src="{{ asset('images/calendar.svg') }}" alt="Image Description" class="w-5 h-5">
                    @php
                        $date = new DateTime($meeting_info->date);
                        $date_new_format = $date->format('F d, Y');
                        
                        $time = new DateTime($meeting_info->time);
                        $time_new_format = $time->format('h:i A');
                    @endphp
                    <span class="ml-2 text-sm text-#484848">{{ $date_new_format }} - {{ $time_new_format }}</span>
                </div>
                <!-- MEETING NOTES -->
                <div class="mt-4">
                    <textarea name="notes" class="w-full p-2 border border-gray-300 rounded-lg" rows="30">{{ $meeting_info->notes }}</textarea>
                </div>
                <!-- MEETING STATUS -->
                <div class="mt-3 text-end">
                    <button type="submit" class="text-white bg-gradient-to-r from-black via-gray-800 to-gray-900 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-gray-300 dark:focus:ring-gray-800 font-medium rounded-lg text-sm px-5 py-2 text-center">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
