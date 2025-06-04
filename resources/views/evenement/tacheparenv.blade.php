@extends('layouts.app')

@section('content')
<div style="max-width:800px; margin:40px auto;">
    <h2 style="text-align:center; margin-bottom:30px;">Tâches par événement</h2>
    
    <form action="{{ route('evenements.tacheparev') }}" method="GET" style="margin-bottom:30px; text-align:center;">
        <select name="evenement_id" id="evenement_id" style="padding:8px; width:300px; margin-right:10px;" onchange="this.form.submit();">
            <option value="">-- Choisir un événement --</option>
            @foreach($evenements as $evenement)
                <option value="{{ $evenement->id }}" {{ request('evenement_id') == $evenement->id ? 'selected' : '' }}>
                    {{ $evenement->nom }} ({{ $evenement->date }})
                </option>
            @endforeach
        </select>
    </form>
    
    @if(request('evenement_id'))
        @php
            $evenementId = request('evenement_id');
            $evenementSelectionne = $evenements->firstWhere('id', $evenementId);
            $taches = isset($tachesParEvenement[$evenementId]) ? $tachesParEvenement[$evenementId] : collect();
        @endphp
        
        <div style="margin-bottom:20px;">
            <h3>Tâches pour l'événement : {{ $evenementSelectionne->nom }}</h3>
            <div style="margin-bottom:20px;">
                <strong>Événement:</strong> {{ $evenementSelectionne->nom }}<br>
                <strong>Type:</strong> {{ $evenementSelectionne->type }}<br>
                <strong>Date:</strong> {{ $evenementSelectionne->date }}<br>
                <strong>Lieu:</strong> {{ $evenementSelectionne->lieu }}<br>
                <strong>Nombre de tâches:</strong> {{ $taches->count() }}
            </div>
            
            @if($taches->count() > 0)
                <table border="1" cellpadding="5" cellspacing="0" style="width:100%;">
                    <thead>
                        <tr style="background:#f5f5f5;">
                            <th style="padding:10px; border:1px solid #ddd;">ID</th>
                            <th style="padding:10px; border:1px solid #ddd;">Description</th>
                            <th style="padding:10px; border:1px solid #ddd;">Statut</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($taches as $tache)
                            <tr>
                                <td style="padding:10px; border:1px solid #ddd;">{{ $tache->id }}</td>
                                <td style="padding:10px; border:1px solid #ddd;">{{ $tache->description }}</td>
                                <td style="padding:10px; border:1px solid #ddd;">{{ $tache->statut }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div style="text-align:center; padding:20px; background:#f9f9f9; border:1px solid #ddd;">
                    Cet événement n'a aucune tâche.
                </div>
            @endif
        </div>
    @elseif($tachesParEvenement->count() > 0)
        <h3 style="margin-top:30px;">Résumé des tâches par événement</h3>
        <table border="1" cellpadding="5" cellspacing="0" style="width:100%;">
            <thead>
                <tr style="background:#f5f5f5;">
                    <th style="padding:10px; border:1px solid #ddd;">Événement</th>
                    <th style="padding:10px; border:1px solid #ddd;">Nombre de tâches</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tachesParEvenement as $evenementId => $taches)
                    @php
                        $evenement = $evenements->firstWhere('id', $evenementId);
                    @endphp
                    @if($evenement)
                        <tr>
                            <td style="padding:10px; border:1px solid #ddd;">
                                <a href="{{ route('evenements.tacheparev', ['evenement_id' => $evenementId]) }}">
                                    {{ $evenement->nom }}
                                </a>
                            </td>
                            <td style="padding:10px; border:1px solid #ddd;">{{ $taches->count() }}</td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    @else
        <div style="text-align:center; padding:20px; background:#f9f9f9; border:1px solid #ddd;">
            Aucune tâche n'a été trouvée dans le système.
        </div>
    @endif
</div>
@endsection