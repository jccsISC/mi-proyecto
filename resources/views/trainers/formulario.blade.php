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