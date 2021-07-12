@extends('layout.app')

@section('content')

    <div class="flex justify-center">
        <div class="w-10/12 md:w-8/12 lg:w-6/12 mr-4 bg-white p-6 rounded-lg inline">
            
            <form action="" method="GET">
                @csrf
                <div class="relative text-gray-600 focus-within:text-gray-400 mb-8 shadow-sm rounded">
                <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                    <button type="submit" class="p-1 focus:outline-none focus:shadow-outline">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </button>
                </span>
                <input type="text" name="search" class="py-2 text-sm text-black rounded-md pl-10 w-full focus:outline-none focus:ring focus:border-blue-300 focus:bg-white focus:text-gray-900" placeholder="Search..." autocomplete="off">
                </div>
            </form>
            
            @if(session()->has('deleteMsg'))
                <div class="bg-green-200 rounded text-green-500 mb-4 pl-2">
                    {{ session()->get('deleteMsg') }}
                </div>
            @endif

            @foreach ($contacts as $contact => $favorite)
                    <div class="mb-3 bg-white-800 rounded font-medium text-gray-800 shadow-md transition-all hover:bg-blue-700 hover:text-white"> 
                        <div class="relative">
                            <div class="absolute right-0 top-1">
                                <drop-down placement="right" class="flex justify-end mr-8">
                                        <!-- Button content -->
                                        <template v-slot:button>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mt-1" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                            </svg>
                                        </template>
                                    
                                        <!-- Opened dropdown content -->
                                        <template v-slot:content>
                                            <a class="flex w-full text-gray-500 items-center rounded px-2 py-1 my-1 hover:bg-gray-200 hover:no-underline hover:text-black" href="">Profile</a>
                                            <hr/>
                                            <form action="{{ route('logout') }}" method="post" class="my-1">
                                                @csrf
                                                <button class="flex w-full justify-between items-center text-gray-500 m-0 rounded px-2 py-1 hover:bg-red-600 hover:text-white">Logout</button>
                                            </form>
                                        </template>
                                </drop-down>
                                @if (isset($favorites[$contact]))
                                    <v-favorite favorite="{{$favorites[$contact]->pivot->contact_id}}" contact-id="{{$favorite->id}}"></v-favorite>
                                @else
                                    <v-favorite favorite="" contact-id="{{$favorite->id}}"></v-favorite>
                                @endif
                            </div>
                                
                            
                            <a href="{{route('contacts.show', $favorite->id)}}" class="hover:text-white hover:no-underline">  
                                <div class="m-2 p-6">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    {{$favorite->name}}
                                    <span class="text-gray-400 text-xs float-right inline mt-1">
                                        Added by:
                                        {{ $favorite->user->name }}
                                    </span>
                                    <p class="text-gray-400 text-xs text-right">
                                        {{ Carbon\Carbon::parse($favorite->created_at)->diffForHumans()}}
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
            @endforeach
            <div class="flex flex-col-reverse items-center md:flex-row justify-between">
                {{$contacts->links("pagination::bootstrap-4")}}
                <a href="{{route('contacts.index')}}" class="my-1 bg-blue-500 text-white rounded-lg px-4 py-1 float-right hover:no-underline">
                    Добавить новый клиент
                </a>
            </div>
        </div>
    </div>
@endsection