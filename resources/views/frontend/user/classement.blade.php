@extends('layouts.user')

@section('content')
    <div class="m-4">
        <a href="{{ route('rankings.classement') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 my-4 rounded ">
            Back
        </a>
    </div>
    <div class="flex justify-center items-center h-screen">
        <div class="max-w-6xl w-full px-4 py-8 bg-gray-100 shadow-md rounded-lg">
            <h1 class="text-3xl font-semibold text-center mb-8">Classements des universités</h1>

            <!-- Formulaire pour sélectionner les critères -->
            <form action="{{ route('rankings.classement') }}" method="GET" class="mb-8">
                @csrf
                <div class="flex flex-wrap items-center">
                    @foreach ($criteriaOptions as $criterion)
                        <label class="inline-flex items-center mr-4 mb-2">
                            <input type="checkbox" name="criteria[]" value="{{ $criterion->id }}" class="form-checkbox">
                            <span class="ml-2">{{ $criterion->name }}</span>
                        </label>
                    @endforeach
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Filtrer</button>
            </form>

            <!-- Affichage des universités classées -->
            <table class="w-full border-collapse mb-8">
                <thead class="bg-blue-500 text-white">
                <tr>
                    <th class="py-2">Position</th>
                    <th class="py-2">Université</th>
                    <th class="py-2">Description</th>
                    <th class="py-2">Localisation</th>
                    <th class="py-2">Site Web</th>
                    <th class="py-2">Note</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($rankedUniversities as $index => $university)
                    <tr class="hover:bg-gray-100">
                        <td class="py-2">{{ $index + 1 }}</td>
                        <td class="py-2">{{ $university->university->name }}</td>
                        <td class="py-2">{{ $university->university->description }}</td>
                        <td class="py-2">{{ $university->university->location }}</td>
                        <td class="py-2"><a href="{{ $university->university->website }}" class="text-blue-500" target="_blank">{{ $university->university->website }}</a></td>
                        <td class="py-2">{{ $university->note }}</td>
                    </tr>
                @endforeach
                {{ $rankedUniversities->links() }}
                </tbody>
            </table>
        </div>
    </div>
@endsection
