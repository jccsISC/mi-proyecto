<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    //aqui va la logica de todas las validaciones del role de nuestro usuario

    //relacionando el modelo user con el modelo role
    public function roles(){
        return $this->belongsToMany('App\Role');
    }

     //validamos si el usuario contiene ese role
     public function hasRole($role){
         //aqui validamos si nuestro usuario dentro de la relacion role existe y que mande el primero q encuentre
        if($this->roles()->where('name',$role)->first()){
            return true;
        }
        return false;
    }
    //como el usuario puede tener varios roles aremos esta funcion por si tiene mas de un role
    public function hasAnyRole($roles){
        //validando si es un array de roles 
        if(is_array($roles)){
            foreach($roles as $role){
                if($this->hasRole($role)){
                    return true;
                }
            }

        }else{
            //validando si es solo un role
            if($this->hasRole($roles)){
                return true;
            }
        }

        return false;
    }

    //quien va a desencadenar todo el proceso
    public function authorizeRoles($roles){
        //si de esos roles tenemos uno pues true
        if($this->hasAnyRole($roles)){
            return true;
        }

        //si mi usuario no tiene roles entonces le retornamos lo siguiente:
        abort(401,"This action is unauthorized");//401 = no estas autorizado para llevar esa peticion
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
