@extends('layouts.app') @section('title', 'Contact') @section('content') <h1 style="color: #FF2D20;">Contactez-nous</h1>
<div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-top: 30px;">
    <div style="background: #f5f5f5; padding: 20px; border-left: 4px solid #FF2D20;">
        <h3>Email</h3>
        <p>{{ $contacts['email'] }}</p>
    </div>
    <div style="background: #f5f5f5; padding: 20px; border-left: 4px solid #FF2D20;">
        <h3>Téléphone</h3>
        <p>{{ $contacts['telephone'] }}</p>
    </div>
    <div style="background: #f5f5f5; padding: 20px; border-left: 4px solid #FF2D20;">
        <h3>Adresse</h3>
        <p>{{ $contacts['adresse'] }}</p>
    </div>
</div> @endsection
