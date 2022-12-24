@extends('layouts.crud')

@section('content')
<!-- Create Post -->
<div>
    <div class="flex flex-col items-center min-h-screen bg-gray-100 sm:justify-center sm:pt-0">
        <div class="flex justify-start py-2">
            <a href="/inventory" class="px-4 py-2 font-bold text-gray-800 bg-gray-300 rounded-l hover:bg-gray-400">Retour</a>
        </div>
        <div class="w-full px-16 py-20 mt-6 overflow-hidden bg-white rounded-lg lg:max-w-4xl">
            <div class="mb-4">
                <h1 class="font-serif text-3xl font-bold underline decoration-gray-400">
                    Ajouter un produit
                </h1>
            </div>

            <div class="w-full px-6 py-4 bg-white rounded shadow-md ring-1 ring-gray-900/10">
                <form method="POST" action="/inventory/store" enctype="multipart/form-data">
                    @csrf
                    <!-- name -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700" for="title">
                            Nom
                        </label>

                        <input class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="name" placeholder="product" />
                    </div>

                    <!-- quantity -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700" for="title">
                            Quantité
                        </label>

                        <input class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="number" name="quantity" placeholder="" />
                    </div>

                    <!-- price -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700" for="title">
                        Prix
                        </label>

                        <input class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="number" name="price" placeholder="" />
                    </div>
                    <!-- supplier -->
                    <div>                        
                        
                        <label for="supplier_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Choisissez un fournisseur</label>
                        <select id="supplier_id" name="supplier_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach ($suppliers as $supplier )
                            <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                            @endforeach
                        </select>


                    </div>

                    <div class="flex items-center justify-start mt-4 gap-x-2">
                        <button type="submit" class="px-6 py-2 text-sm font-semibold rounded-md shadow-md text-sky-100 bg-sky-500 hover:bg-sky-700 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">
                            Confirmé
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection