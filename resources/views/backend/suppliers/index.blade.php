<!-- View stored in resources/views/greeting.blade.php -->
@extends('layouts.crud')

@section('content')

<div class="max-w-4xl mx-auto mt-8">


    <div class="flex justify-start">
        <a href="{{ route('dashboard') }}" class="px-4 py-2 font-bold text-gray-800 bg-gray-300 rounded-l hover:bg-gray-400">Back</a>
    </div>
    <div class="flex justify-end mt-10">
        <a href="{{ route('suppliers.create') }}" class="px-2 py-1 bg-blue-500 rounded-md text-sky-100 hover:bg-blue-700">+ Ajouter Un Fournisseur</a>
    </div>


    <div class="flex flex-col mt-10">
        <div class="flex flex-col">
            <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">

                

                <table class="min-w-full">
                    <tr>
                        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Name</th>
                        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Téléphone</th>
                        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Address</th>
                        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Email</th>
                        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50" width="180px">Action</th>
                    </tr>
                    <tbody class="bg-white">
                        @foreach ($suppliers as $supplier)
                        <tr>

                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{$supplier->name}}

                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $supplier->phone }}

                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $supplier->address }}

                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $supplier->email }}

                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">

                                    <a class="text-indigo-600 hover:text-indigo-900" href="/suppliers/{{$supplier->id}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </a>

                                    <a href="/suppliers/{{$supplier->id}}/edit" class="text-gray-600 text-indigo-600 hover:text-indigo-900">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                    <form action="/suppliers/{{$supplier->id}} " method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-6 h-6 text-red-600 hover:text-red-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>

                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection