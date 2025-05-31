@extends('layouts.app')

@section('content')
    <div style="max-width:800px; margin:40px auto;">
        <h2 style="text-align:center; margin-bottom:30px;">Liste des événements</h2>
        <table style="width:100%; border-collapse:collapse;">
            <thead>
                <tr style="background:#f5f5f5;">
                    <th style="padding:10px; border:1px solid #ddd;">ID</th>
                    <th style="padding:10px; border:1px solid #ddd;">Nom</th>
                    <th style="padding:10px; border:1px solid #ddd;">Type</th>
                    <th style="padding:10px; border:1px solid #ddd;">Lieu</th>
                    <th style="padding:10px; border:1px solid #ddd;">Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($evenements as $evenement)
                    <tr>
                        <td style="padding:10px; border:1px solid #ddd;">{{ $evenement->id }}</td>
                        <td style="padding:10px; border:1px solid #ddd;">{{ $evenement->nom }}</td>
                        <td style="padding:10px; border:1px solid #ddd;">{{ $evenement->type }}</td>
                        <td style="padding:10px; border:1px solid #ddd;">{{ $evenement->lieu }}</td>
                        <td style="padding:10px; border:1px solid #ddd;">{{ $evenement->date }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection