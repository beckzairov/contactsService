@extends('layout.app')

@section('content')
<div class="flex justify-center">
    <div class="w-6/12 bg-white p-6 rounded-lg">
        <p class="mb-2 text-gray-800">
            Добавить новый клиент
        </p>
        @if(session()->has('message'))
            <div class="bg-green-200 rounded text-green-500 mb-4 pl-2">
                {{ session()->get('message') }}
            </div>
        @endif
        <form action="{{ route('contacts.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="contact" class="sr-only">Contact</label>
                <input type="text" name="name" id="contact" placeholder="Ф.И.О" autocomplete="off"  class="bg-gray-100 border-2 w-full p-4 rounded-lg focus:outline-none focus:ring focus:border-blue-300 @error('name') border-red-500 @enderror" value="{{ old('name') }}">
            
                @error('name')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="phone" class="sr-only">Номер телефон</label>
                <input type="text" name="phone" id="phone" placeholder="Телефон" autocomplete="off" class="bg-gray-100 border-2 w-full p-4 rounded-lg focus:outline-none focus:ring focus:border-blue-300 @error('phone') border-red-500 @enderror" value="{{ old('phone') }}">
            
                @error('phone')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>   
                @enderror
            </div>

            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Добавить</button>
            </div>
        </form>
    </div>
</div>
@endsection