@extends('layouts.admin')

@section('content')
    <div class="container mx-auto px-8 py-8">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Liste des universités</h1>
            <a href="{{ route('admin.universities.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Ajouter une université</a>
        </div>

        <table class="min-w-full bg-white shadow-lg overflow-hidden table-fixed">
            <thead class="bg-fuchsia-600 text-white">
            <tr>
                <th scope="col" class="py-2 px-4">Id</th>
                <th scope="col" class="py-2 px-4">Nom</th>
                <th scope="col" class="py-2 px-4">Site Web</th>
                <th scope="col" class="py-2 px-4">Localisation</th>
                <th scope="col" class="py-2 px-4">Date de fondation</th>
                <th scope="col" class="py-2 px-4">Description</th>
                <th scope="col" class="py-2 px-4">Actions</th>
            </tr>
            </thead>
            <tbody class="text-gray-700">
            @forelse($universities as $university)
                <tr>
                    <td class="py-2 px-4">{{ $university->id }}</td>
                    <td class="py-2 px-4">{{ $university->name }}</td>
                    <td class="py-2 px-4">{{ $university->website }}</td>
                    <td class="py-2 px-4">{{ $university->location }}</td>
                    <td class="py-2 px-4">{{ $university->founded_date }}</td>
                    <td class="py-2 px-4">{{ $university->description }}</td>
                    <td class="py-2 px-4">
                        <a href="{{ route('admin.criteres.show', $university) }}" class="text-blue-500 hover:text-blue-700" title="Voir">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </a>
                        <a href="{{ route('admin.universities.edit', $university) }}" class="text-yellow-500 hover:text-yellow-700 ml-2" title="Modifier">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </a>
                        <form action="{{ route('admin.universities.destroy', $university) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 ml-2" title="Supprimer">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="py-2 px-4" colspan="7">Aucun enregistrement trouvé</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        {{ $universities->links() }}
    </div>
@endsection
