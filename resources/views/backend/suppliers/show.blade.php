@extends('layouts.crud')

@section('content')
<div>
    <div class="flex flex-col items-center min-h-screen pt-6 bg-gray-100 sm:justify-center sm:pt-0">

        <div class="w-full px-16 py-20 mt-6 overflow-hidden bg-white rounded-lg lg:max-w-4xl">

            <div class="mb-4">
                <h1 class="font-serif text-3xl font-bold underline decoration-gray-400">Fournisseur</h1>
            </div>

            <div class="w-full px-6 py-4 bg-white rounded shadow-md ring-1 ring-gray-900/10">
                <form method="POST" action="#">
                    <!-- Title -->
                    <div>
                        <h3 class="text-2xl font-semibold">Information du fournisseur</h3>
                        <div class="flex items-center mb-4 space-x-2">
                            <span class="text-xs text-gray-500">Crée le {{$supplier->created_at}}</span><span class="text-xs text-gray-500">Editer le {{$supplier->updated_at}}</span>
                        </div>
                            <div class="flex flex-row justify-between ">
                                    <span class="text-sm text-gray-600">Nom</span>
                                    <span class="text-sm text-gray-600">Téléphone</span>
                            </div>
                            <div class="flex flex-row justify-between ">
                                <p class="text-base text-gray-700">{{$supplier->name}}</p>
                                <p class="text-base text-gray-700">{{ $supplier->phone }}</p>
                            </div>
                            <div class="flex flex-row justify-between mt-4">
                                <span class="text-sm text-gray-600">Address</span>
                                <span class="text-sm text-gray-600">Email</span>
                            </div>
                            <div class="flex flex-row justify-between">
                                <p class="text-base text-gray-700">{{ $supplier->address }}</p>
                                <p class="text-base text-gray-700">{{ $supplier->email }}</p>
                            </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection