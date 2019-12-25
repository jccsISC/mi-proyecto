<?php

namespace App\Http\Controllers;

use App\Trainer;/*hacemos uso de nuestro modelo*/
use App\Http\Requests\StoreTrainerRequest;
use Illuminate\Http\Request;

class TrainerController extends Controller
{

    public function __construct()
    {
        return $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //jalamos los datos del modelo Trainer con all() consultamos todos los registros del modelo
        $trainers = Trainer::all();

        return view('trainers.index', compact('trainers'));//compact genera una array con la info que le mandamos
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //mostramos la vista para crear un nuevo entrenador
        return view('trainers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * Aqui es donde almacenamos a nuestro entrenador
     */
    public function store(StoreTrainerRequest $request)
    {
        
        //nos creamos una variable de nuestro modelo Trainer
        $trainer = new Trainer(); 

        //revisamos si estamos recibiendo un archivo con hasfile
        if($request->hasFile('avatar')){
            //asignamos ese avatar a nuestra variable $file
            $file = $request->file('avatar');
            /*creamos una variable para almacenar el nom del archivo nuevo y concatenamos la fecha del dia que suban el archivo
              con esto estaremos seguros de que el nom no se va a repetir*/
            $name = time().$file->getClientOriginalName();
            /*lo movemos a una carpeta de nuestro proyecto */
            $file->move(public_path().'/images/',$name);//mueve el archivo con este nombre
        }

       
        $trainer->name = $request->input('name');
        $trainer->slug = $request->input('slug');
        $trainer->avatar=$name;//lo tomamos de nuestra variable name
        $trainer->description=$request->input('description');
        $trainer->save();

        return redirect()->route('trainers.index')->with('status','Se ha creado correctamente');
        //return 'Saved';

        //aqui la peticion del post//return $request->all();
        //para mostrar solo el atributo que queramos
        //return $request->input('name');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     //esta es la que se encarga de mostrar un recurso en especifíco
    public function show(Trainer $trainer)//de esta manera estamos usando implicit binding directamente recibe el modelo y le asignamos una variable
    {
        //$trainer = Trainer::where('slug','=',$slug)->firstOrFail();//la funcion firstOrFail manda exception si no encuentra ese slug

        //$trainer = Trainer::find($id);//para que busque al entrenador por el id
        return view('trainers.show', compact('trainer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Trainer $trainer)
    {
        //aqui ocurren las modificaciones
        return view('trainers.edit',compact('trainer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trainer $trainer)
    {
        //aqui se actualiza todo
        $trainer->fill($request->except('avatar'));
        
        //revisamos si estamos reciviendo un archivo con hasfile
        if($request->hasFile('avatar')){
            //asignamos ese avatar a nuestra variable $file
            $file = $request->file('avatar');
            $name = time().$file->getClientOriginalName();
            $trainer->avatar = $name;//le asignamos el nuevo nombre del archivo
            /*lo movemos a una carpeta de nuestro proyecto */
            $file->move(public_path().'/images/',$name);//mueve el archivo con este nombre
        }
        
        $trainer->save();

        return redirect()->route('trainers.show', [$trainer])->with('status','Datos atualizados correctamente');
        //return 'se actualizó correctamente';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trainer $trainer)
    {

        //eliminar un archivo del proyecto
        $file_path = public_path().'/images/'.$trainer->avatar;//nos lanza la carpeta dode se encuentra la carpeta publica
        \File::delete($file_path);
        $trainer->delete();
        return redirect()->route('trainers.index')->with('status','Se eliminó correctamente');
        //return 'Ha sido eliminado';
    }
}
