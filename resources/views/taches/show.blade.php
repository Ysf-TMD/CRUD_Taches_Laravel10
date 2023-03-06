@extends("layouts.master")
@section('content')
    <div class="container">
        <div class="col-md-5 mx-auto">
            <h1 style="margin-top: 2rem" class="text-center ">Suppression d'un tâche</h1>

            <hr>
            <div class="card form-group ">
                <div class="card-block">
                    <h3 class="card-title">
                        @frdatetime($tache->expiration)
                        <span class="badge badge-danger">{{$tache->categorie}}</span>
                        @if($tache->accomplie == 'O')
                            <span class="tag red fa fa-check fa-2x"  aria-hidden="true"></span>
                        @endif
                    </h3>
                    <p class="card-text form-control  ">{{$tache->description}}</p>
                    <div class="container p-4 ">
                        <div class=" justify-content-center d-flex">
                            <form action="/taches/{{$tache->id}}" method="POST">
                                {!! csrf_field() !!}
                                {!! method_field('DELETE') !!}
                                <div class="text-center">
                                    <button class="btn btn-danger " type="submit" name="valide" value="valide">
                                        <span class="fas fa-trash-alt fa-2x" aria-hidden="true"></span>
                                    </button>

                                </div>
                            </form>
                            <form action="/taches" class="form-group"  method="GET">
                                <button class="btn btn-success mx-3" type="submit" name="annule" value="annule">
                                    <span class="fas fa-undo-alt fa-2x" aria-hidden="true"></span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
