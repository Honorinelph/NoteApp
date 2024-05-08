@extends('layouts.user')

@section('content')
    <div class="container mx-auto px-8 py-8">
        <div class="mb-4">
            <a href="{{ route('rankings.classement') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 my-4 rounded ">Consulter le classement</a>

        </div>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Id</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Location</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">WebSite</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            @forelse($universities as $university)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $university->id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $university->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $university->location }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $university->website }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <a href="{{ route('universities.detail',$university) }}" class="text-blue-500 hover:text-blue-700">Consulter</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="px-6 py-4 whitespace-nowrap">Aucun enregistrement</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        {{ $universities->links() }}
    </div>
@endsection

