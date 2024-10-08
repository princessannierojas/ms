<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Members</title>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
        @vite('resources/css/app.css')
    </head>
    <body class="bg-#e0e0e2 animate-fade_in">
        @include('manager.header')
        @include('manager.sidebar')
        <div class="pb-16 animate-fade_in"> <!-- Added padding-bottom -->
            <!--  -->
            <div class="px-10 mt-8">
                <h1 class="font-inter text-3xl font-extrabold"> Members </h1>
            </div>

            <div class="flex flex-wrap px-10 mt-7 font-inter">
                <div class="w-full mb-4">
                      
                <div class="flex w-full justify-end mt-8 sm:mt-0 sm:w-auto sm:ml-4 mb-2 font-inter">
                    <form action="{{ url('/add_member') }}" method="POST" class="flex w-full max-w-md"> <!-- Added w-full and max-w-xl to the form -->
                        @csrf
                        <div class="relative flex-1 mr-2">
                            <input type="search" name="email" id="search-dropdown" class="block p-2 w-full text-sm text-gray-900 bg-gray-200 rounded-lg border border-gray-300 focus:outline-none focus:border-gray-300" placeholder="Enter email address" required />
                        </div>
                        <button id="add_member_btn" type="submit" class="mb-2 text-white bg-gradient-to-r from-black via-gray-800 to-gray-900 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-gray-300 dark:focus:ring-gray-800 font-medium rounded-lg text-sm px-5 py-2 text-center">
                            Add
                        </button>
                    </form>
                </div>


                    <div class="bg-[#ececec] border border-[#cdcdcd] relative overflow-x-auto shadow-xl rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Role
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Status
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($members as $member)
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap">
                                    <img class="w-10 h-10 rounded-full" src="{{ asset($member->profile_picture) }}" alt="{{ $member->first_name }} image">
                                    <div class="ps-3">
                                        <div class="text-base font-semibold">
                                            {{ $member->first_name . ' ' . $member->last_name }}
                                        </div>
                                        <div class="font-normal text-gray-500">{{ $member->email }}</div>
                                    </div>
                                </th>
                                <td class="px-6 py-4">{{ $member->role }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> {{ $member->role }}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <a href="#" class="font-medium text-red-600 hover:underline">Remove</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </body>
</html>
