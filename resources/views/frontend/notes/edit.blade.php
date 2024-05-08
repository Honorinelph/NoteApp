@extends('layouts.user')

@section('content')
    <div class="container mx-auto py-8 ">
        <h1 class="text-2xl font-bold mb-4">Edit Notation</h1>

        <form action="{{ route('notes.update', $note->id) }}" method="POST" class="max-w-lg mx-auto">
            @csrf
            @method('PUT') <!-- Ajout de cette ligne pour indiquer que vous effectuez une requête PUT -->

            <div class="mb-4">
                <label for="user_id" class="block text-sm font-medium text-gray-700">User</label>
                <select name="user_id" id="user_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" @if($note->user_id == $user->id) selected @endif>{{ $user->name }}</option>
                    @endforeach
                </select>
                @error('user_id')
                <div>{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="university_id" class="block text-sm font-medium text-gray-700">University</label>
                <select name="university_id" id="university_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @foreach($universities as $university)
                        <option value="{{ $university->id }}" @if($note->university_id === $university->id) selected @endif>{{ $university->name }}</option>
                    @endforeach
                </select>
                @error('university_id')
                <div>{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="notation_criterion_id" class="block text-sm font-medium text-gray-700">Criteria</label>
                <select name="notation_criterion_id" id="notation_criterion_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @foreach($criteres as $critere)
                        <option value="{{ $critere->id }}" @if($note->notation_criterion_id ===$critere->id) selected @endif>{{ $critere->name }}</option>
                    @endforeach
                </select>
                @error('notation_criterion_id')
                <div>{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="note" class="block text-sm font-medium text-gray-700">Note</label>
                <input type="number" name="note" id="note" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                       value="{{ $note->note }}">
                @error('note')
                <div>{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                <input type="date" name="date" id="date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                       value="{{ $note->date }}" >
                @error('date')
                <div>{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update</button> <!-- Modifier le texte du bouton de "Create" à "Update" -->
        </form>
    </div>
@endsection
