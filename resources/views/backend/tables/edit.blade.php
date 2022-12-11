@extends('layouts.crud')

@section('content')
<!-- Create Post -->
<div>
    <div class="flex flex-col items-center min-h-screen bg-gray-100 sm:justify-center sm:pt-0">
            
        <div class="w-full px-16 py-20 mt-6 overflow-hidden bg-white rounded-lg lg:max-w-4xl">
            <div class="mb-4">
                <h1 class="font-serif text-3xl font-bold underline decoration-gray-400">
                    Editer une table
                </h1>
            </div>

            <div class="w-full px-6 py-4 bg-white rounded shadow-md ring-1 ring-gray-900/10">
                <form method="POST" action="/tables/{{$table->id}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!-- name -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700" for="name">
                            Nom
                        </label>

                        <input value="{{$table->name}}" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="name" placeholder="table" />
                    </div>
                    <!-- status -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700" for="status">
                            Statut
                        </label>

                        <input value="{{ $table->status }}" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="status" placeholder="statut" />
                    </div>

                    <!-- chairs number -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700" for="chair">
                        Nombre de chaises
                        </label>

                        <input value="{{ $table->chair }}" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="number" name="chair" placeholder="" />
                    </div>

                    <!-- couvert number -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700" for="couvert">
                        Nbr de couvert
                        </label>

                        <input value="{{ $table->couvert }}" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="number" name="couvert" placeholder="" />
                    </div>
                    <!-- Table Image -->
                    <div>                        
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image">Uploader l'image</label>
                        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file" name="image"/>

                    </div>
                    <!-- Rooms -->
                    <div>                        
                        
                        <label for="room_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Choisissez une salle</label>
                        <select id="room_id" name="room_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach ($rooms as $room )
                            <option value="{{$room->id}}" {{ $table->category_id === $room->id ? 'selected' :''}} >
                                {{$room->name}}</option>
                            @endforeach
                        </select>


                    </div>

                    <div class="flex items-center justify-start mt-4 gap-x-2">
                        <button type="submit" class="px-6 py-2 text-sm font-semibold rounded-md shadow-md text-sky-100 bg-sky-500 hover:bg-sky-700 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection