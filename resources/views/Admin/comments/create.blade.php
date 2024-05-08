@extends('layouts.admin')

@section('content')
    <div class="container mx-auto py-8 ">
        <h1 class="text-2xl font-bold mb-4">Add University</h1>

        <form action="{{ route('admin.comments.store') }}" method="POST" class="max-w-lg mx-auto">
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
                <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                <input type="text" name="content" id="content" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" >
                @error('content')
                <div>{{ $message }}</div>
                @enderror
            </div>



            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create</button>
        </form>
    </div>
@endsection
