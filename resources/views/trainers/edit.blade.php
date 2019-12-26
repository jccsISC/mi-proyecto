@extends('layouts.app')
@section('title','Trainers Edit')


@section('content')
    
    @include('common.errors')

    <!--con method utilizamos el vervo para la request y con action accede a la ruta nuestra carpeta-->
    <form class="form-group" method="POST" action="/trainers/{{ $trainer->slug }}" enctype="multipart/form-data"><!--con este ultimo atributo a nuestro formulario ahora si enviará todo lo que contenga-->
        @method('PUT') <!--como no soporta acciones put o path o delete lo mandamos de forma oculta la peticion-->
        <!--directiva de blade para proteger ataques de peticiones maliciosas csrf-->
        @csrf 
     
        <div class="form-group">
    <label for="">Nombre</label>
    <input type="text" name="name" class="form-control" value="{{ $trainer->name }}"><!--le asignamos el nombre con el que se identificara st input-->
</div>

<div class="form-group">
    <label for="">Slug</label>
    <input type="text" name="slug" class="form-control" value="{{ $trainer->slug }}">
</div>

<img class="card-img-top rounded-circle mx-auto d-block" src="/images/{{ $trainer->avatar }}" style="width:150px; height=150px; background:#efefef; margin-top:20px; border: 1px solid #000;" alt="">

<div class="form-group">
    <label for="">Avatar</label>
    <input type="file" name="avatar">
</div>

<div class="form-group">
    <label for="">Descripción</label>
    <textarea name="description" id="description" class="form-control" placeholder="Escriba una descripción">{{ $trainer->description }}</textarea>
</div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
        
@endsection

