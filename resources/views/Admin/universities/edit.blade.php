@extends('layouts.admin')

@section('content')
    <div class="container mx-auto py-8 ">
        <h1 class="text-2xl font-bold mb-4">Update University</h1>

        <form action="{{ route('admin.universities.update',$university->id) }}" method="POST" class="max-w-lg mx-auto">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" id="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                value="{{old('name', $university->name)}}">
                @error('title')
                <div>{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                          >{{old('name', $university->name)}}</textarea>
                @error('description')
                <div>{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                <input type="text" name="location" id="location" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                value="{{old('localisation', $university->location)}}">
                @error('location')
                <div>{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="website" class="block text-sm font-medium text-gray-700">Website</label>
                <input type="text" name="website" id="website" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                       value="{{old('website', $university->website)}}">
                @error('website')
                <div>{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="founded_date" class="block text-sm font-medium text-gray-700">Founded Date</label>
                <input type="text" name="founded_date" id="founded_date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                       value="{{old('name', $university->founded_date)}}">
                @error('founded_date')
                <div>{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update</button>
        </form>
    </div>
@endsection

