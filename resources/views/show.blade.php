@extends('template')
@section('titre')
    Gestion Ecole
@endsection
@section('h1')
    Liste des élèves
@endsection
@section('contenu')
    <section class="container">
        <div class="card">
            <header class="card-header">
                    <p class="card-header-title">
                        {{-- {{$eleve->image}} --}}
                        <img src="../photos/{{$eleve->image}}"> {{$eleve->nom}} {{$eleve->prenom}}
                    </p>
            </header>
            <div class="card-content">
                <div class="content">
                    <p>Date de naissance : {{ $eleve->dateNaiss}}</p>
                    <p>Email : {{ $eleve->email}}</p>
                </div>
            </div>
            <div class="d-flex">
                <a class="btn btn-info" href="{{ url()->previous()}}">Retour</a>
            </div>
        </div>
    </section>
@endsection