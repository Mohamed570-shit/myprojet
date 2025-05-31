@extends('layouts.app')

@section('content')
    <div style="max-width:800px; margin:40px auto;">
        <div style="display:flex; justify-content:flex-end; margin-bottom:20px;">
            <a href="{{ route('clients.create') }}">
                <button style="background:#388e3c; color:#fff; border:none; padding:10px 20px; border-radius:7px; font-size:1rem;">
                    Ajouter client
                </button>
            </a>
        </div>
        <h2 style="text-align:center; margin-bottom:30px;">Liste des clients</h2>
        <table style="width:100%; border-collapse:collapse;">
            <thead>
                <tr style="background:#f5f5f5;">
                    <th style="padding:10px; border:1px solid #ddd;">ID</th>
                    <th style="padding:10px; border:1px solid #ddd;">Nom</th>
                    <th style="padding:10px; border:1px solid #ddd;">Email</th>
                    <th style="padding:10px; border:1px solid #ddd;">Téléphone</th>
                    <th style="padding:10px; border:1px solid #ddd;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clients as $client)
                    <tr>
                        <td style="padding:10px; border:1px solid #ddd;">{{ $client->id }}</td>
                        <td style="padding:10px; border:1px solid #ddd;">{{ $client->nom }}</td>
                        <td style="padding:10px; border:1px solid #ddd;">{{ $client->email }}</td>
                        <td style="padding:10px; border:1px solid #ddd;">{{ $client->telephone }}</td>
                        <td style="padding:10px; border:1px solid #ddd;">
                            <a href="{{ route('clients.edit', $client->id) }}">
                                <button style="background:#2196f3; color:#fff; border:none; padding:5px 12px; border-radius:5px; font-size:0.95rem;">Modifier</button>
                            </a>
                            <form action="{{ route('clients.destroy', $client->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Voulez-vous vraiment supprimer ce client ?')" style="background:#e53935; color:#fff; border:none; padding:5px 12px; border-radius:5px; font-size:0.95rem;">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection