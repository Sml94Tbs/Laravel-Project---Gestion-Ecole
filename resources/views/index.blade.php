@extends('template')
@section('titre')
    Gestion Ecole
@endsection
@section('h1')
    Liste des élèves
@endsection
@section('contenu')
    @if (session()->has('info'))
        <div class="alert alert-info alert-dismissible fade show js-alert" role="alert">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    <section class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="select">
                    <select class="form-select" onchange="window.location.href = this.value">
                        <option value="{{ route('eleves.index')}}" @unless ($slug)
                            selected
                        @endunless> Toutes classes</option>
                        @foreach ($classes as $classe )
                            <option value="{{route('eleves.classe', $classe->slug )}}" {{$slug == $classe->slug ? 'selected' : ''}}>
                                {{$classe->libelle}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($eleves as $eleve)
                    <tr>
                        <th scope="row">{{ $eleve->id }}</th>
                        <td>{{ $eleve->nom }}</td>
                        <td>{{ $eleve->prenom }}</td>
                        <td><a href="{{ route('eleve.show', $eleve->id) }}"><button type="button"
                                    class="btn btn-success">Voir</button></a></td>
                        <td><a href="{{ route('eleve.edit', $eleve->id) }}"><button type="button"
                                    class="btn btn-warning">Modifier</button></a></td>
                        <td>
                            <form action="{{ route('eleve.destroy', $eleve->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <a href="{{ route('eleve.create') }}" class="btn btn-success">Ajouter un élève</a>
                    <a href="{{route('pdf')}}"  class="btn btn-info">Générer un PDF</a>
                    <a href="/" class="btn btn-danger">Retour a l'accueil</a>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                {!! $eleves->links() !!}
            </div>
        </div>
    </section>
@endsection
