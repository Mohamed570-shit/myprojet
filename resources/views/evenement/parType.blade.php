@extends('layouts.app')

@section('content')
    <div style="max-width:800px; margin:40px auto;">
        <h2 style="text-align:center; margin-bottom:30px;">Événements par type</h2>
        
        <form action="{{ route('evenements.parType') }}" method="GET" style="margin-bottom:30px; text-align:center;">
            <select name="type" style="padding:8px; width:300px; margin-right:10px;">
                <option value="">Sélectionner un type</option>
                @foreach($types as $type)
                    <option value="{{ $type }}" {{ request('type') == $type ? 'selected' : '' }}>{{ $type }}</option>
                @endforeach
            </select>
            <button type="submit" style="background:#2196f3; color:#fff; border:none; padding:8px 20px; border-radius:5px;">Filtrer</button>
        </form>
        
        @if(count($evenements) > 0)
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
        @elseif(request('type'))
            <p style="text-align:center;">Aucun événement trouvé pour ce type.</p>
        @endif
    </div>
@endsection