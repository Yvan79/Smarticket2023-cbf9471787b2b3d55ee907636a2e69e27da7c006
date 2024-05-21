<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        //'id_rol',
        'id_empresa',
        'cod_usuario',
        'name',
        'email',
        'dni',
        'password',
        'est_usuario',
    ];
    
    public function setInicialesAttribute($value)
    {
        // Obtener las iniciales a partir del nombre.
        $iniciales = '';
        $name = trim($value);

        if (!empty($name)) {
            $name = explode(' ', $name);

            foreach ($name as $name) {
                $iniciales  .= strtoupper(substr($name, 0, 1));
            }
        }

        $this->attributes['cod_usuario'] = $iniciales ;
    }


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function adminlte_image(){
        return "https://picsum.photos/300/300";
    }
    public function adminlte_profile_url(){
        return "/profile";
    }
}
