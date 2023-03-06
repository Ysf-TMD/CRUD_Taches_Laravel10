{{-- A partir du layout master --}}
@extends("layouts.master")
{{-- insertion de la section 'content' --}}
@section('content')
    <h1>Liste des tâches</h1>
    <div>
        {{-- Bouton pour pouvoir ajouter une nouvelle tâche --}}
        <p><a href="/taches/create" class="btn btn-primary" role="button">Ajouter une tâche</a></p>
    </div>
    {{-- On affiche un tableau si il y a des tâches ... --}}
    @if(!(count($taches) === 0))
        <table class="table">
            <thead style="background-color: #ddd; font-weight: bold;">
            <tr>
                <td class="header">Expiration</td>
                <td class="header">Catégorie</td>
                <td class="header">Description</td>
                <td class="header">Réalisée</td>
                <td>Modification/Suppression</td>
            </tr>
            </thead>
            <tbody>
            @foreach ($taches as $tache)
                <tr>
                    <td>{{$tache->expiration}}</td>
                    <td>{{$tache->categorie}}</td>
                    <td>{{$tache->description}}</td>
                    <td> {{-- affichage d'un icon qui indique si la tâche est accomplie ou pas --}}
                        @if($tache->accomplie == 'O')
                            <span class="far fa-check-square fa-2x" aria-hidden="true"></span>
                        @else
                            <span class="far fa-square fa-2x" aria-hidden="true"></span>
                        @endif
                    </td>
                    <td>{{-- affichage d'un bouton pour la modification et un bouton pour la suppression --}}
                        <div class="btn-group">
                            <a href="taches/{{$tache->id}}/edit" class="btn btn-warning" role="button">
                                <span class="far fa-edit fa-2x" aria-hidden="true"></span>
                            </a>
                            <a href="taches/{{$tache->id}}" class="btn btn-danger mx-1"  role="button">
                                <span class="far fa-trash-alt fa-2x" aria-hidden="true"></span>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-warning" role="alert">Aucune tâche dans la base</div>
    @endif
@endsection
