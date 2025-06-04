@extends('layouts.app')

@section('content')
    <div style="text-align:center; margin-top:40px;">
        <h1 style="font-size:3rem; font-weight:300;">Bienvenue à votre système de gestion des événements</h1>
        <p style="font-size:1.2rem; color:#555;">Gérez vos événements efficacement</p>
    </div>

    <div style="display:flex; flex-wrap:wrap; justify-content:center; gap:20px; margin-top:40px;">
        <a href="{{ route('evenements.list') }}">
            <button style="background:#2196f3; color:#fff; border:none; padding:20px 30px; border-radius:10px; font-size:1.1rem;">Liste des événements</button>
        </a>
        <a href="{{ route('clients.list') }}">
            <button style="background:#388e3c; color:#fff; border:none; padding:20px 30px; border-radius:10px; font-size:1.1rem;">Liste des clients</button>
        </a>
        <a href="{{ route('prestataires.list') }}">
            <button style="background:#00bcd4; color:#fff; border:none; padding:20px 30px; border-radius:10px; font-size:1.1rem;">Liste des prestataires</button>
        </a>
        <a href="{{ route('evenements.parType') }}">
            <button style="background:#ffc107; color:#222; border:none; padding:20px 30px; border-radius:10px; font-size:1.1rem;">Événements par type</button>
        </a>
        <a href="{{ route('evenements.parPrestataire') }}">
            <button style="background:#757575; color:#fff; border:none; padding:20px 30px; border-radius:10px; font-size:1.1rem;">Événements par prestataire</button>
        </a>
    
        <a href="{{ route('clients.reservationparclien') }}">
            <button style="background:#e53935; color:#fff; border:none; padding:20px 30px; border-radius:10px; font-size:1.1rem;">Détails des réservations par client</button>
        </a>
    </div>

    <div style="display:flex; flex-wrap:wrap; justify-content:center; gap:20px; margin-top:30px;">
    <a href="{{ route('evenements.tacheparev') }}">
        <button style="background:#00bcd4; color:#fff; border:none; padding:20px 30px; border-radius:10px; font-size:1.1rem;">Tâches par événement</button>
    </a>
        <button style="background:#ffc107; color:#222; border:none; padding:20px 30px; border-radius:10px; font-size:1.1rem;">Clients avec plusieurs événements</button>
        <button style="background:#212121; color:#fff; border:none; padding:20px 30px; border-radius:10px; font-size:1.1rem;">Nombre de réservations par prestataire</button>
        <button style="background:#2196f3; color:#fff; border:none; padding:20px 30px; border-radius:10px; font-size:1.1rem;">Événements avec budget > 5000</button>
        <button style="background:#e53935; color:#fff; border:none; padding:20px 30px; border-radius:10px; font-size:1.1rem;">Événements proches de la date</button>
    </div>
@endsection