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
    <form action="{{route("taches.update",$tach->id)}}" method="POST" class="justify-content-center  mx-auto col-md-4 " >

        {!! csrf_field() !!}
        {!! method_field('PUT') !!}
        <div class="text-center" style="margin-top: 2rem">


            <h3><i class="far fa-edit"></i> Modification d'une tâche</h3>
            <hr class="mt-2 mb-2">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label"><strong>Modifier Votre Date D'expiration</strong></label>
            <span class="input-group-addon mx-2">
                        <i class="far fa-calendar"></i>
            </span>
            <input type="date" class="form-control" name="expiration" value="{{$tach->expiration}}">

        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label"><strong>Modifier Votre Catégorie</strong></label>
            <span class="input-group-addon mx-2">
                        <i class="far fa-edit"></i>
            </span>
            <input type="text" class="form-control" name="categorie" value="{{$tach->categorie}}">
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
            <label for="exampleInputEmail1" class="form-label"><strong> Modifier votre Description : </strong></label>
            <textarea name="description" id="description" rows="6" class="form-control"  placeholder="Description.." >{{$tach->description}}</textarea>

        </div>


        <div class="mb-3 text-center d-flex">
            <button type="submit" class="btn btn-warning mx-1 w-50">Valider</button>
            <button type="submit" class="btn btn-success mx-1 w-50">Anuuler</button>
        </div>



    </form>
    {{--<form action="--}}{{--{{route('taches.update', ['id' => $tach->id])}}--}}{{--" method="POST">
        {!! csrf_field() !!}
        {!! method_field('PUT') !!}
        <div class="text-center">
            <h3><i class="far fa-edit"></i> Modification d'une tâche</h3>
            <hr class="mt-2 mb-2">
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label" for="select"><strong>Date d'expiration : </strong></label>
            <div class="col-md-3">
                <div class="input-group date">
                    <span class="input-group-addon">
                        <i class="far fa-calendar-alt"></i>
                    </span>
                    <input type="text" class="form-control" name="expiration" value="{{ $tach->expiration }}" placeholder="aaaa-mm-jj">
                </div>
            </div>
        </div>
        <div class="form-group row">
            --}}{{-- categorie--}}{{--
            --}}{{-- Accomplie--}}{{--
        </div>
        --}}{{-- Description--}}{{--
        <div class="form-group row">
        </div>
        <div class="text-center">
            <button class="btn btn-warning" type="submit" name="valide" value="valide">Valide</button>
            <button class="btn btn-success" type="submit" name="annule" value="annule">Annule</button>
        </div>
    </form>--}}
@endsection
