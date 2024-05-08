@extends('layouts.admin')

@section('content')
    <div class="container mx-auto py-8 ">
        <h1 class="text-2xl font-bold mb-4">Update Notation Criterion</h1>

        <form action="{{ route('admin.criteres.update',$critere) }}" method="POST" class="max-w-lg mx-auto">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" id="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                value="{{old('name', $critere->name)}}">
                @error('name')
                <div>{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                          >{{old('description', $critere->description)}}</textarea>
                @error('description')
                <div>{{ $message }}</div>
                @enderror
            </div>


            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update</button>
        </form>
    </div>
@endsection

