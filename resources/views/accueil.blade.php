@extends('template')
@section('titre')
    Gestion Ecole
@endsection

@section('h1')
    Gestion École !
@endsection

@section('contenu')
    <section class="container">
        <div class="d-flex justify-content-center ">
            <a class="btn btn-outline-primary m-2" href="eleve">Liste des élèves</a>
            <a class="btn btn-outline-primary m-2" href="profs">Liste des professeur</a>
            <a class="btn btn-outline-primary m-2" href="classe">Liste des classes</a>
        </div>
        <div class="d-flex justify-content-center">
            <img src="../photos/ecole.jpg" class="img-fluid rounded-5" alt="ecole">
        </div>
    </section>
@endsection