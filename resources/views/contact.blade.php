@extends('layout.app')

@section('content')
<div class="flex justify-center">
    <div class="w-10/12 md:w-8/12 lg:w-6/12 mr-4 bg-white p-6 rounded-lg inline">
        <div>
            <p class="text-gray-500 opacity-50">Ф.И.О</p>
            <v-edit csrf="{{ csrf_token() }}" update="{{route('contacts.update', $contacts->id)}}" phone="{{$contacts->name}}"></v-edit>
        </div>
        
        <p class="text-gray-500 opacity-50">Номер: </p>
        @foreach ($phone as $item)
            <div class="flex items-center my-2">
                <v-edit class="flex" csrf="{{ csrf_token() }}" update="{{route('phones.update', $item->id)}}" phone="{{$item->phone}}"></v-edit>
                @error('phone')
                    <div class="inline-block text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
                <form action="{{ route('phones.destroy', $item->id) }}" class="flex" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="inline">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 bg-red-500 text-white rounded p-0.5 mx-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                </form>
            </div>
        @endforeach
        @if(session()->has('message'))
            <div class="bg-green-200 rounded text-green-500 mb-4 pl-2">
                {{ session()->get('message') }}
            </div>
        @endif
        <form action="{{ route('phones.store', $contacts->id) }}" class="my-2" method="POST">
            @csrf
            <div class="mb-4">
                <label for="phone" class="sr-only">Номер телефон</label>
                <input type="text" name="phone" id="phone" placeholder="Телефон" autocomplete="off" class="bg-gray-100 border-2 w-full p-2.5 rounded-lg focus:outline-none focus:ring focus:border-blue-300 @error('phone') border-red-500 @enderror" value="{{ old('phone') }}">
            
                @error('phone')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>   
                @enderror
            </div>

            <div>
                <button type="submit" class="bg-blue-500 text-white px-2 py-2.5 rounded font-medium w-full">Добавить</button>
            </div>
        </form>
        <form action="{{route('contacts.destroy', $contacts->id)}}" method="POST" class="float-right">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 rounded-lg px-2 py-1 text-white">
                Удалить контакт
            </button>
        </form>
    </div>
</div>
@endsection