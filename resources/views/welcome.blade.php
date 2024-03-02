<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        {{-- <link href="{{asset('app.css')}}" rel="stylesheet" /> --}}
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')

    
    </head>
    <body class="antialiased">
        <div class="flex justify-content-center sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            <form id='form' action="{{route('users')}}" method='post'>
                <div class="grid grid-cols-1 place-content-center p-4 bg-white dark:bg-black rounded-xl shadow-lg space-x-2 mt-1">
                    <label class="block p-4">
                        <span class="block text-sm font-medium ">Email</span>
                        <input type="text" name='email' class="mt-1 block w-full px-3 py-2 border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500" />
                        @error('email')
                            <div class="flex text-red-500">{{ $message }}</div>
                        @enderror
                    </label>
                </div>
        
                
                <div class="grid grid-cols-1 place-content-center p-4 bg-white dark:bg-black rounded-xl shadow-lg space-x-2 mt-1">
                    <label class="block p-4">
                        <span class="block text-sm font-medium">First Name</span>
                        <input type="text" name='firstName' class="mt-1 block w-full px-3 py-2 border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500" />
                        @error('firstName')
                            <div class="flex text-red-500">{{ $message }}</div>
                        @enderror
                    </label>
                </div>

                <div class="grid grid-cols-1 place-content-center p-4 bg-white dark:bg-black rounded-xl shadow-lg space-x-2 mt-1">
                    <label class="block p-4">
                        <span class="block text-sm font-medium">Last Name</span>
                        <input type="text" name='lastName' class="mt-1 block w-full px-3 py-2 border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500" />
                        @error('lastName')
                            <div class="flex text-red-500">{{ $message }}</div>
                        @enderror
                    </label>
                </div>

                @csrf
        
                <div class="grid grid-cols-1 place-content-center">
                    <input type='submit' style="border-radius: 30px" class="text-white bg-black " value="Submit"  />
                </div>
            </form>
            
        </div>
    </body>
</html>
