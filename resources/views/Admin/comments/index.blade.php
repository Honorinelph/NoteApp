@extends('layouts.admin')

@section('content')
    <div class="container mx-auto px-8 py-8">
        <div class="flex justify-between">
            <h1 class="text-2xl font-bold mb-4">List of Comments</h1>
            <a href="{{ route('admin.comments.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 float-end ">Add Comment</a>
        </div>

        <table class="min-w-full bg-white shadow-lg overflow-hidden table-fixed">
            <thead class="bg-fuchsia-600 text-white ">
            <tr>
                <th scope="col" class="py-2 px-4">Id</th>
                <th scope="col" class="py-2 px-4">User</th>
                <th scope="col" class="py-2 px-4">University</th>
                <th scope="col" class="py-2 px-4">Content</th>
                <th scope="col" class="py-2 px-4">Date</th>

                <th scope="col" class="py-2 px-4">Actions</th>
            </tr>
            </thead>
            <tbody class="text-gray-700 justify-between">
            @foreach($comments as $comment)
                <tr>
                    <td class="py-2 px-4">{{ $comment->id }}</td>
                    <td class="py-2 px-4">{{ $comment->user->name }}</td>
                    <td class="py-2 px-4">{{ $comment->university->name }}</td>
                    <td class="py-2 px-4">{{ $comment->content }}</td>
                    <td class="py-2 px-4">{{ $comment->created_at }}</td>

                    <td class="py-2 px-4">
                        <a href="{{ route('admin.comments.edit', $comment) }}" class="text-yellow-500 hover:text-yellow-700 ml-2">Modifier</a>
                        <!-- Form pour la suppression -->
                        <form action="{{ route('admin.universities.destroy', $comment) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 ml-2">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection



