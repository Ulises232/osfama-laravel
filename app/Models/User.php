<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Relacion de uno a muchos

    public function orden_trabajos(){
        return $this->hasMany('App\Models\Orden_trabajo');
    }

    public function orden_camaras(){
        return $this->hasMany('App\Models\Orden_camara');
    }

    public function orden_alarmas(){
        return $this->hasMany('App\Models\Orden_alarma');
    }

    public function orden_cercas(){
        return $this->hasMany('App\Models\Orden_cerca');
    }

     //Relacion de uno a muchos inversa



    
}
