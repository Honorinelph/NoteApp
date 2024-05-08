@extends('layouts.user')

@section('content')
    <div class="container mx-auto px-8 py-8">
        <div class="flex justify-between">
            <h1 class="text-2xl font-bold mb-4">University Details</h1>

            <a href="{{ route('notes.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md mb-4 float-end">Give Mark</a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-amber-50 shadow-lg overflow-hidden">
                <tbody class="text-gray-700">
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap font-bold">Nom</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $university->name }}</td>
                </tr>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap font-bold">Description</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $university->description }}</td>
                </tr>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap font-bold">Site Web</td>
                    <td class="px-6 py-4 whitespace-nowrap"><a href="{{ $university->website }}" target="_blank">{{ $university->website }}</a></td>
                </tr>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap font-bold">Localisation</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $university->location }}</td>
                </tr>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap font-bold">Date de fondation</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $university->founded_date }}</td>
                </tr>
                </tbody>
            </table>
        </div>

        <!-- Formulaire pour laisser un commentaire -->
        <div class="mt-8 bg-gray-300 border border-b-blue-500">
            <h2 class="text-lg font-bold mb-4">Laisser un commentaire</h2>
            <form action="{{ route('universities.comments.store',['university' => $university->id]) }}" method="POST" >
                @csrf
                <div class="mb-4 ">
                    <label for="content" class="block text-sm font-medium text-gray-700">Commentaire :</label>
                    <textarea name="content" id="content" rows="3" class="form-textarea mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                </div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Envoyer</button>
            </form>
        </div>

        <!-- Affichage des commentaires -->
        <div class="mt-8 bg-gray-50">
            <h2 class="text-lg font-bold mb-4">Commentaires</h2>
            @forelse($university->comments as $comment)
                <div class="border-b mb-4 pb-4">
                    <p class="text-sm font-bold">{{ $comment->user->name }}</p>
                    <p class="text-gray-700">{{ $comment->content }}</p>
                </div>
            @empty
                <p>Aucun commentaire pour le moment.</p>
            @endforelse
        </div>
    </div>
@endsection
