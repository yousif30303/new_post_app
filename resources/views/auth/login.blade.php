@extends('layouts.app')

@section('content')
        <div class="flex justify-center">
            <div class="w-4/12 bg-white p-6 rounded-lg mt-6">
                @session('status')
                <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800">
                    {{ session('status') }}
                </div>
                @endsession
                <form action="{{route('login')}}" method="post">
                    @csrf
                    <div class="mb-4">
                        <label for="email" class="sr-only">Email</label>
                        <input type="text" name="email" id="email" class="bg-gray-100 border-2 w-full p-4 rounded-lg" placeholder="Email" value="{{old("email")}}">
                    </div>
                    <div class="mb-4">
                        <label for="password" class="sr-only">Password</label>
                        <input type="password" name="password" id="password" class="bg-gray-100 border-2 w-full p-4 rounded-lg " placeholder="Choose Your Password">
                    </div>
                    <div class="mb-4">
                        <input type="checkbox" name="remember" id="remember" class="mr-2">
                        <label for="remember">Remember Me</label>
                    </div>
                    <div>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Login</button>
                    </div>
                    </form>
            </div>
        </div>

@endsection