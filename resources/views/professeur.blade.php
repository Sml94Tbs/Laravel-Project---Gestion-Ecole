@extends('template')
@section('titre')
    Gestion École
@endsection
@section('h1')
    Liste des professeurs
@endsection
@section('contenu')
    @if (session()->has('info'))
    <div class="alert alert-info alert-dismissible fade show js-alert" role="alert">
        <strong>{{ session('info') }}</strong>
    </div>
    @endif
    <div class="container">
        <div class="d-flex mx-auto col-2">
            <a href="{{route('profs.create')}}" class="btn btn-primary">Ajouter un professeur</a>
        </div>
        @foreach ($profs as $prof)
            <div class="row">
                <div class="d-inline-flex align-items-center justify-content-center">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{$prof->prenom}} {{$prof->nom}}</h4>
                            <h6 class="card-subtitle mb-2 text-body-secondary">Matière : {{$prof->matiere}}</h6>
                            <p class="card-text">
                                <ul>
                                    @foreach ($prof->classes as $classe)
                                        <li>{{$classe->libelle}} : {{$classe->pivot->nbHeures}} heures</li>
                                    @endforeach
                                </ul>
                            </p>
                        </div>
                    </div>
                    <div class="col">
                        <form action="{{ route('profs.destroy', $prof->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </div>
                </div>
                
            </div>
        @endforeach
        <div class="d-flex justify-content-center">
            {!! $profs->links() !!}
        </div>
        <div class="col-6">
            <a href="/" class="btn btn-danger">Retour a l'accueil</a>
        </div>
    </div>
@endsection