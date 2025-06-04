@extends('layouts.app')

@section('content')
    <div style="max-width:900px; margin:40px auto;">
        <h2>Détails des réservations par client</h2>
        @foreach($clients as $client)
            <div style="margin-bottom:30px; border:1px solid #ccc; padding:15px;">
                <strong>Client :</strong> {{ $client->nom }} ({{ $client->email }})<br>
                <strong>Téléphone :</strong> {{ $client->telephone }}<br>
                <strong>Nombre de réservations :</strong> {{ $client->reservations->count() }}
                @if($client->reservations->count())
                    <table border="1" cellpadding="6" cellspacing="0" style="margin-top:10px; width:100%;">
                        <thead>
                            <tr>
                                <th>ID réservation</th>
                                <th>Date réservation</th>
                                <th>Budget</th>
                                <th>Événement</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($client->reservations as $reservation)
                            <tr>
                                <td>{{ $reservation->id }}</td>
                                <td>{{ $reservation->date_reservation }}</td>
                                <td>{{ $reservation->budget }}</td>
                                <td>
                                    @if($reservation->evenement)
                                        {{ $reservation->evenement->nom ?? 'N/A' }}
                                    @else
                                        -
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <div>Aucune réservation pour ce client.</div>
                @endif
            </div>
        @endforeach
    </div>
@endsection