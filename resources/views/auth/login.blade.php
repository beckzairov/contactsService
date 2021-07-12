@extends('layout.auth')

@section('content')
		<div class="bg-white rounded-lg flex justify-center flex-col items-center py-4 w-4/5 lg:w-1/2">
			<svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
			</svg>
			<p class="font-bold">Логин</p>
			@if (session('status'))
                <div class="bg-red-500 p-4 rounded-lg mb-6 text-white text-center">
                    {{session('status')}}
                </div>
            @endif
			<form action="{{ route('login') }}" method="POST" class="flex justify-center flex-col w-4/5 md:w-1/2 my-4">
				@csrf
				<div class="mb-4">
					<label for="email" class="sr-only">Эл. почта (example@mail.com)</label>
					<input type="email" name="email" id="email" placeholder="Эл. почта (example@mail.com)" autocomplete="off" class="bg-gray-100 border-2 w-full p-4 outline-none rounded-lg h-10 text-sm focus:border-2 focus:border-blue-500 @error('email') border-red-500 @enderror" value="{{ old('email') }}">
				
					@error('email')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
				</div>
				<div class="mb-4">
					<label for="password" class="sr-only">Пароль</label>
					<input type="password" name="password" id="password" placeholder="Пароль (8-25 символов)" class="bg-gray-100 border-2 w-full p-4 outline-none rounded-lg focus:border-2 h-10 text-sm focus:border-blue-500 @error('password') border-red-500 @enderror" value="">
				
					@error('password')
						<div class="text-red-500 mt-2 text-sm">
							{{ $message }}
						</div> 
					@enderror
				</div>
				<button type="submit" class="bg-indigo-500 px-2 py-1 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-opacity-50 text-white rounded-md">
					Логин
				</button>
			</form>
			<hr class="text-gray-500 w-4/5 md:w-1/2"/>
			<a href="{{route('register')}}" class="w-4/5 md:w-1/2">
				<button class="bg-white text-gray-400 border-2 mt-3 border-gray-400 py-1 rounded-md font-medium w-full">Ещё не зарегистрированы? <span class="text-purple-600">Регистрация</span></button>
			</a>
		</div>
@endsection