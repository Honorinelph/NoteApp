@extends('layouts.admin')

@section('content')
    <div class="container mx-auto py-8 ">
        <h1 class="text-2xl font-bold mb-4">Update Comments</h1>

        <form action="{{ route('admin.comments.update',$comment) }}" method="POST" class="max-w-lg mx-auto">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="user_id" class="block text-sm font-medium text-gray-700">User</label>
                <select name="user_id" id="user_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" @if($comment->user_id == $user->id) selected @endif>{{ $user->name }}</option>
                    @endforeach
                </select>
                @error('user_id')
                <div>{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="university_id" class="block text-sm font-medium text-gray-700">University</label>
                <select name="university_id" id="university_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @foreach($universities as $univ)
                        <option value="{{ $univ->id }}" @if($comment->university_id === $univ->id) selected @endif>{{ $univ->name }}</option>
                    @endforeach
                </select>
                @error('university_id')
                <div>{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                <input type="text" name="content" id="content" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                 value="{{old('content',$comment->content)}}">
                @error('content')
                <div>{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                <input type="date" name="date" id="date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                       value="{{old('date',$comment->date)}}">
                @error('date')
                <div>{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update</button>
        </form>
    </div>
@endsection

