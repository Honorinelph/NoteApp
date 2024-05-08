@extends('layouts.user')

@section('content')
    <div class="container mx-auto px-8 py-8 ">
        <h1 class="text-2xl font-bold mb-4">Add Mark</h1>

        <div class="container bg-amber-50 shadow-sm">
            <form action="{{ route('notes.store') }}" method="POST" class="max-w-lg mx-auto">
                @csrf
                <div class="mb-4">
                    <label for="user_id" class="block text-sm font-medium text-gray-700">User</label>
                    <select name="user_id" id="user_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" >
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" >{{ $user->name }}</option>
                        @endforeach
                    </select>
                    @error('user_id')
                    <div>{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="university_id" class="block text-sm font-medium text-gray-700">University</label>
                    <select name="university_id" id="university_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" >
                        @foreach($universities as $university)
                            <option value="{{ $university->id }}"  >{{ $university->name }}</option>
                        @endforeach
                    </select>
                    @error('university_id')
                    <div>{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="notation_criterion_id" class="block text-sm font-medium text-gray-700">Criteres</label>
                    <select name="notation_criterion_id" id="notation_criterion_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" >
                        @foreach($criteres as $critere)
                            <option value="{{ $critere->id }}">{{ $critere->name }}</option>
                        @endforeach
                    </select>
                    @error('notation_criterion_id')
                    <div>{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="note" class="block text-sm font-medium text-gray-700">Choose a mark between 1 to 5</label>
                    <select name="note" id="note" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    @error('note')
                    <div>{{ $message }}</div>
                    @enderror
                </div>


                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create</button>
            </form>
        </div>
    </div>
@endsection


