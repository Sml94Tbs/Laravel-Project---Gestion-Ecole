@extends('template')
@section('titre')
    Gestion École
@endsection
@section('h1')
    Création d'un professeur
@endsection
@section('contenu')
    <section class="container">
        <form action="{{ route('profs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- nom --}}
            <div class="mb-3">
                <label for="nom" class="form-label">Entrez un nom</label>
                <input type="text" class="form-control" @error('nom') is-invalid @enderror name="nom" id="nom"
                    placeholder="Votre nom" value="{{ old('nom') }}">
                @error('nom')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            {{-- prenom --}}
            <div class="mb-3">
                <label for="prenom" class="form-label">Entrez un nom</label>
                <input type="text" class="form-control" @error('prenom') is-invalid @enderror name="prenom"
                    id="prenom" placeholder="Votre prenom" value="{{ old('prenom') }}">
                @error('prenom')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            {{-- matiere --}}
            <div class="mb-3">
                <label for="matiere" class="form-label">Entrez la matière</label>
                <input type="text" class="form-control"
                    @error('prenom')
                    is-invalid
                @enderror name="matiere" id="matiere"
                    placeholder="matière" value="{{ old('matiere') }}">
                </select>
            </div>
            {{-- Classes --}}
            <div class="mb-3">
                <label for="classes" class="form-label">Classe : </label><br>
                @php
                    $i = 0;
                @endphp
                @foreach ($classes as $classe)
                    <input 
                    type="checkbox" 
                    name="classe_id[]"
                     id="cbox{{ $i++ }}"
                    onclick="activation(id,{{ $classe->id }})" 
                    value="{{ $classe->id }}"> 
                    {{ $classe->libelle }}
                    <label>/ nombre de d'heure : </label> <input type="number" name="nbHeures[]" disabled='disabled'
                        id={{ $classe->id }} class="form-text"><br>
                @endforeach
            </div>
            <div class="d-flex justify-content-center">
                <button class="btn btn-outline-success m-2">Envoyez</button>
            </div>
        </form>
        <div class="d-flex justify-content-center">
            <a href="{{ route('profs.index') }}" class="btn btn-danger">Retour</a>
        </div>
    </section>
    
@endsection
