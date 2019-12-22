@extends('layouts.app')
@section('title','Trainers Create')


@section('content')
        <!--si hay algun error entonces recorremos con un foreach el array de errores-->
        @if($errors->any())

            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
        @endif  
    

    <!--con method utilizamos el vervo para la request y con action accede a la ruta nuestra carpeta-->
    <form class="form-group" method="POST" action="/trainers" enctype="multipart/form-data"><!--con este ultimo atributo a nuestro formulario ahora si enviará todo lo que contenga-->
       <!--directiva de blade para proteger ataques de peticiones maliciosas csrf-->
        @csrf 
        <div class="form-group">
            <label for="">Nombre</label>
            <input type="text" name="name" class="form-control"><!--le asignamos el nombre con el que se identificara st input-->
        </div>

        <div class="form-group">
            <label for="">Slug</label>
            <input type="text" name="slug" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Avatar</label>
            <input type="file" name="avatar">
        </div>

        <div class="form-group">
            <label for="">Descripción</label>
            <textarea name="description" id="description" class="form-control" placeholder="Escriba una descripción"></textarea>
        </div>


        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
        
@endsection

