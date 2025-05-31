@extends('layouts.app')

@section('content')
    <div style="max-width:500px; margin:40px auto;">
        <h2 style="text-align:center; margin-bottom:30px;">Modifier le client</h2>
        <form action="{{ route('clients.update', $client->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div style="margin-bottom:15px;">
                <label>Nom:</label>
                <input type="text" name="nom" value="{{ old('nom', $client->nom) }}" required style="width:100%; padding:8px;">
                @error('nom')
                    <div style="color:red;">{{ $message }}</div>
                @enderror
            </div>
            <div style="margin-bottom:15px;">
                <label>Email:</label>
                <input type="email" name="email" value="{{ old('email', $client->email) }}" required style="width:100%; padding:8px;">
                @error('email')
                    <div style="color:red;">{{ $message }}</div>
                @enderror
            </div>
            <div style="margin-bottom:15px;">
                <label>Téléphone:</label>
                <input type="text" name="telephone" value="{{ old('telephone', $client->telephone) }}" style="width:100%; padding:8px;">
                @error('telephone')
                    <div style="color:red;">{{ $message }}</div>
                @enderror
            </div>
            <div style="text-align:right;">
                <button type="submit" style="background:#2196f3; color:#fff; border:none; padding:10px 20px; border-radius:7px;">Modifier</button>
            </div>
        </form>
    </div>
@endsection