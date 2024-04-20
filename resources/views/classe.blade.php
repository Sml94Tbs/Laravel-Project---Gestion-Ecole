@extends('template')
@section('titre')
    Gestion Ecole
@endsection
@section('h1')
    Les classes
@endsection
@section('contenu')
    <section class="container">
        @foreach ($classes as $classe)
            <ul class="list-group">
                <li class="list-group-item active" aria-current="true">{{$classe->libelle}}</li>
                @foreach ($classe->profs as $prof)
                    <li class="list-group-item">{{$prof->nom}} {{$prof->prenom}}</li>
                @endforeach
            </ul>
        @endforeach
        <div class="d-flex justify-content-center">
            {!! $classes->links() !!}
        </div>
        <div class="col-6">
            <a href="/" class="btn btn-danger">Retour a l'accueil</a>
        </div>
    </section>
@endsection