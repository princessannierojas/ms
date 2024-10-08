<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Log In</title>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
        @vite('resources/css/app.css')
    </head>
    <body>
        <!-- component -->
        <div class="flex h-screen">
            <!-- Left Pane -->
            <div class="w-full bg-#e0e0e2 font-inter lg:w-1/2 flex items-center justify-center">
                <div class="max-w-md w-full p-5 lg:p-0 animate-fade_in">
                @if(Session::has("error"))
                    <div class="p-4 mb-4 border border-red-400 text-sm text-red-700 rounded relative bg-red-100" role="alert">
                        <strong>Oops!</strong> {{ Session::get("error") }}
                    </div>
                @endif
                @if(Session::has("success"))
                    <div class="p-4 mb-4 border border-green-400 text-sm text-green-700 rounded relative bg-green-100" role="alert">
                        <strong>Success!</strong> {{ Session::get("success") }}
                    </div>
                @endif
                    <h1 class="text-3xl font-bold mb-1 text-black">Welcome!</h1>
                    <h1 class="text-l font-semibold mb-6 text-black-500">Enter your credentials to access your account.</h1>
                    
                    <form action="{{ url('/login_process') }}" method="POST" class="space-y-6">
                    @csrf
                        <div>
                            <label for="email" class="block text-sm font-semibold text-black">Email Address</label>
                            <input type="text" id="email" name="email" placeholder="Enter your email address" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-#171717 sm:text-sm placeholder-#828282-50 bg-#f4f4f4" required>
                        </div>
                        <div>
                            <label for="password" class="block text-sm font-semibold text-black">Password</label>
                            <input type="password" id="password" name="password" placeholder="Enter your password" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-#171717 sm:text-sm placeholder-#828282-50 bg-#f4f4f4" required>
                        </div>
                        <div>
                            <button type="submit" class="w-full bg-#171717 hover:bg-#2C2C2C text-white text-medium font-medium py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition-colors duration-150">
                                Log In
                            </button>
                        </div>
                        <div class="text-sm text-gray-600 text-center">
                            <p>Don't have an account? <a href="{{ url('/sign_up_form') }}" class="text-black underline">Sign up!</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Right Pane -->
            <div class="hidden lg:flex items-center justify-center flex-1 bg-white text-black">
                <div class="w-full h-full">
                    <img src="{{ asset('images/cover.jpg') }}" alt="Cover Image" class="w-full h-screen object-cover">
                </div>
            </div>
        </div>
    </body>
</html>