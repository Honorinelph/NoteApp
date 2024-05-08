@extends('layouts.user')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Historique des notations</div>

                    <div class="card-body">
                        @if ($notations->isEmpty())
                            <p>Aucune notation disponible.</p>
                        @else
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Université</th>
                                    <th>Critère</th>
                                    <th>Note</th>
                                    <th>Date de notation</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($notations as $notation)
                                    <tr>
                                        <td>{{ optional($notation->university)->name }}</td>
                                        <td>{{ optional($notation->notation_criterion)->name }}</td>
                                        <td>{{ optional($notation->user)->name }}</td>
                                        <td>{{ $notation->note }}</td>

                                        <td>{{ $notation->created_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $notations->links() }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
