@extends('layouts.crud')

@section('content')
<div>
    <div class="flex flex-col items-center min-h-screen pt-6 bg-gray-100 sm:justify-center sm:pt-0">

        <div class="w-full px-16 py-20 mt-6 overflow-hidden bg-white rounded-lg lg:max-w-4xl">

            <div class="mb-4">
                <h1 class="font-serif text-3xl font-bold underline decoration-gray-400"> Table</h1>
            </div>

            <div class="w-full px-6 py-4 bg-white rounded shadow-md ring-1 ring-gray-900/10">
                <form method="POST" action="#">
                    <!-- Title -->
                    <div>
                        <h3 class="text-2xl font-semibold">Information de table</h3>
                        <div class="flex items-center mb-4 space-x-2">
                            <span class="text-xs text-gray-500">Crée le {{$table->created_at}}</span><span class="text-xs text-gray-500">Editer le {{$table->updated_at}}</span>
                        </div>
                            <div class="flex flex-row justify-between ">
                                    <span class="text-sm text-gray-600">Id</span>
                                    <span class="text-sm text-gray-600">Salle</span>
                                    <span class="text-sm text-gray-600">Nom</span>
                            </div>
                            <div class="flex flex-row justify-between ">
                                <p class="text-base text-gray-700">{{$table->id}}</p>
                                <p class="text-base text-gray-700">{{ $room->name }}</p>
                                <p class="text-base text-gray-700">{{$table->name}}</p>
                            </div>
                            <div class="flex flex-row justify-between mt-4">
                                <span class="text-sm text-gray-600">Chaise</span>
                                <span class="text-sm text-gray-600">Statut</span>
                                    <span class="text-sm text-gray-600">Couvert</span>
                            </div>
                            <div class="flex flex-row justify-between">
                                <p class="text-base text-gray-700">{{ $table->status }}</p>
                                <p class="text-base text-gray-700">{{ $table->chair }}</p>
                                <p class="text-base text-gray-700">{{ $table->couvert }}</p>
                            </div>
                            <div class="flex flex-col items-center mt-4">
                        <span class="text-sm text-gray-600">Photo</span><img src="{{ $table->image }}" alt="{{$table->name}}"/></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection