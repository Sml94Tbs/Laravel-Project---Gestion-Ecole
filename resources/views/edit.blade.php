@extends('template')
@section('titre')
    Gestion Ecole
@endsection
@section('h1')
    Modifier un élève
@endsection
@section('contenu')
    <section class="container">
        <form action="{{ route('eleve.update', $eleve->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            {{-- Nom --}}
            <div class="mb-3">
                <label for="nom" class="form-label">Entrez un nom</label>
                <input type="text" class="form-control  @error('nom') is-invalid @enderror" name="nom" id="nom"
                    placeholder="Votre nom" value="{{ old('nom', $eleve->nom) }}">
                @error('nom')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            {{-- Prenom --}}
            <div class="mb-3">
                <label for="prenom" class="form-label">Entrez un prénom</label>
                <input type="text" class="form-control  @error('prenom') is-invalid @enderror" name="prenom"
                    id="prenom" placeholder="Votre prenom" value="{{ old('prenom', $eleve->prenom) }}">
                @error('prenom')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            {{-- Date de Naissance --}}
            <div class="mb-3">
                <label for="dateNaiss" class="form-label">Entrez votre date de naissance</label>
                <input type="date" class="form-control @error('dateNaiss') is-invalid @enderror"  name="dateNaiss"
                    id="dateNaiss" value="{{ old('dateNaiss', $eleve->dateNaiss) }}">
                @error('dateNaiss')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            {{-- Classe --}}
            <div class="mb-3">
                <label for="classe_id" class="label">Classe</label>
                <select name="classe_id" id="classe_id" class="form-select">
                    @foreach ($classes as $classe)
                        <option value="{{old('libelle', $classe->id)}}">{{$classe->libelle}}</option>
                    @endforeach    
                </select></div>
            {{-- Mail --}}
            <div class="mb-3">
                <label for="email" class="form-label">Votre Email</label>
                <input type="mail" class="form-control @error('email') is-invalid @enderror"  name="email"
                    id="email" placeholder="Votre email" value="{{ old('email', $eleve->email) }}">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            {{-- Photo --}}
            <div class="mb-3">
                <label for="image" class="form-label">Ajouter une image</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror"  name="image"
                    id="image" placeholder="Votre image" value="{{ old('image', $eleve->image) }}">
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="control">
                <button class="btn btn-outline-primary" type="submit">Envoyer</button>
            </div>
        </form>
        <a href="{{ url()->previous()}}" class="btn btn-danger">Retour</a>
    </section>
@endsection