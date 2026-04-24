@extends('layouts.app')

@section('title', 'Nos Services') 

@section('styles')
<style>
    .services {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
    }

    .service {
        background: white;
        padding: 20px;
        border-radius: 10px;
        border-left: 5px solid #FF2D20;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        transition: transform 0.2s;
    }

    .service:hover {
        transform: translateY(-5px);
    }

    .service h3 {
        margin-top: 0;
        color: #333;
    }

    .prix {
        color: #FF2D20;
        font-weight: bold;
        font-size: 18px;
    }
</style>
@endsection

@section('content')
<h1>Nos Services</h1>

<div class="services">
    @foreach ($services as $service)
        <div class="service">
            <h3>{{ $service['nom'] }}</h3>
            <p class="prix">Prix : {{ $service['prix'] }}</p>
        </div>
    @endforeach
</div>
@endsection
