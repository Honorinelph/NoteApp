@extends('layouts.user')

@section('content')
    <div class="mx-auto px-8 py-8">
        <div class="flex justify-between">
            <h1 class="text-2xl font-bold mb-4">Note Details</h1>

            <a href="{{ route('notes.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md mb-4 float-end">Back</a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-amber-50 shadow-lg overflow-hidden">
                <tbody class="text-gray-700">
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap font-bold">University</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $notation->university->name }}</td>
                </tr>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap font-bold">Criterion</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $notation->notation_criterion->name }}</td>
                </tr>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap font-bold">User</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $notation->user->name }}</td>

                </tr>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap font-bold">Note</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $notation->note }}</td>
                </tr>

                </tbody>
            </table>
        </div>
    </div>

@endsection
