@extends('layouts.user')

@section('content')
    <div class="container mx-auto px-8 py-8">
        <div class="flex justify-between">
            <h1 class="text-2xl font-bold mb-4">List Notations</h1>
            <a href="{{ route('notes.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 float-end ">Add Notation</a>
        </div>

        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Id</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">University</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Critere</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Note</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>

            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            @forelse($notations as $notation)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $notation->id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $notation->user->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $notation->university->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $notation->notation_criterion->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $notation->note }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <a href="{{ route('notes.details',$notation) }}" class="text-blue-500 hover:text-blue-700">Consulter</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-6 py-4 whitespace-nowrap">Aucun enregistrement</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        {{ $notations->links() }}
    </div>
@endsection
{{-- --}}



