@extends("layouts.master")
@section('content')
    {{-- Affiche les erreurs --}}
    @if ($errors->any())
        <div class="alert alert-danger" style="margin-top: 2rem">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {{--
    formulaire de saisie d'une tâche la fonction 'route' utilise un nom de route 'csrf_field' ajoute un champ caché qui permet de vérifier
    que le formulaire vient du serveur.
    --}}
    <form action="{{route("taches.store")}}" method="POST" class="justify-content-center  mx-auto col-md-4 " >

        {!! csrf_field() !!}
        <div class="text-center" style="margin-top: 2rem">
            <h1><i class="far fa-edit"></i> Création d'une tâche</h1>
            <hr class="mt-2 mb-2">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label"><strong>Date D'expiration</strong></label>
            <span class="input-group-addon mx-2">
                        <i class="far fa-calendar"></i>
            </span>
            <input type="date" class="form-control" name="expiration">

        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label"><strong>Catégorie</strong></label>
            <span class="input-group-addon mx-2">
                        <i class="far fa-edit"></i>
            </span>
            <input type="text" class="form-control" name="categorie">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label"><strong>Accomplie </strong></label>
            <span class="input-group-addon mx-2">
                        <i class="far fa-question"></i>
            </span>
            <div class="btn-group btn-group-toggle  col-md-4 mx-5 " data-toggle="buttons" >
                <label class="btn btn-outline-primary form-group " >
                    <input type="radio" name="accomplie" value = "O" id="accomplie-on">
                    Oui
                </label>
                <label class="btn btn-outline-primary form-group" >
                    <input type="radio" name="accomplie" value = "N" id="accomplie-off"> Non
                </label>
            </div>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label"><strong>Description : </strong></label>
            <textarea name="description" id="description" rows="6" class="form-control"  placeholder="Description.."></textarea>

        </div>


        <div class="mb-3 text-center">
            <button type="submit" class="btn btn-success w-50">valider</button>
        </div>



    </form>
    {{--<form action="{{url("/var")}}" method="GET">
        --}}{{--{!! csrf_field() !!}--}}{{--

        <div class="text-center" style="margin-top: 2rem">
            <h3><i class="far fa-edit"></i> Création d'une tâche</h3>
            <hr class="mt-2 mb-2">
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label" for="expiration">
                <strong>Date d'expiration: </strong>
            </label>
            <div class="col-md-3">
                <div class="input-group date ">
                    <span class="input-group-addon mx-2">
                        <i class="far fa-calendar"></i>
                    </span>
                    <input type="date"  name="" id=""  class="form-control" placeholder="Catégorie">
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label" for="expiration">
                <strong>Catégorie :  </strong>
            </label>
            <div class="col-md-3 my-2">
                <div class="input-group mx-1 ">
                     <span class="input-group-addon mx-1">
                        <i class="far fa-edit"></i>
                    </span>
                    <input type="text"  name="categorie"  class="form-control">
                </div>
            </div>
        </div>
        <div class="form-group ">
            <label class="col-md-2 form-control-label " for="select">
                <strong>Accomplie ?</strong>
            </label>
            <div class="btn-group btn-group-toggle  col-md-4 mx-5 " data-toggle="buttons" >
                <label class="btn btn-outline-primary form-control " @accomplie(old(accomplie)) active @endaccomplie>
                    <input type="radio" name="accomplie" value = "O" id="accomplie-on">
                    Oui
                </label>
                <label class="btn btn-outline-primary form-control" @accomplie(old(accomplie)) @elseactive @endaccomplie>
                    <input type="radio" name="accomplie" value = "N" id="accomplie-off"> Non
                </label>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label" for="textarea-input">
                <strong>
                    Description :
                </strong>
            </label>
            <div class="col-md-3 mt-2 ">
                <textarea name="description" id="description" rows="6" class="form-control"  placeholder="Description.."></textarea>
            </div>
        </div>
        <div class="text-center">
            <button class="btn btn-success w-50 my-3" type="submit">Valide</button>
        </div>
    </form>--}}
@endsection
