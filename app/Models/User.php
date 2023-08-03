<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use App\Models\Oders;
use GuzzleHttp\Psr7\Request;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'birthday',
        'email',
        'password',
        'gender',
        'phone',
        'social',
        'token',
        'img',
        'level',
        'status',

    ];

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
        'password' => 'hashed',
    ];


    public function numberOderUser()
    {
        return $this->join('oders', 'users.id', '=', 'oders.id_user')
        ->select('oders.id_user', DB::raw('COUNT(oders.id_user) as number_user'))
        ->groupBy('oders.id_user')
        ->orderBy('users.id', 'desc')
            ->get();
    }

    public function getAllUsers()
    {
        return $this
    ->select('id', 'name','img','email','social','users.phone','gender','birthday','level','users.status')
    ->orderBy('users.id', 'desc')
    ->paginate(5);

    }
    public function getUser($id){

        return $this
            ->where('id','=',$id)
            ->first();
    }
    public function resetUser($id,$token){

        return $this
            ->where([['id','=',$id],['token','=',$token]])
            ->first();
    }
    public function resetPassword($condition){
        return $this
            ->where($condition)
            ->first();
    }



    public function delectUser($id){
        $oder = new Oders();
        $oder= $oder->getOders($id);
        if($oder->count() > 0){
                return false;
        }else{
            return $this->where('id', '=', $id)->delete();

        }
    }

    public function editUser($id,$values){
      return $this->where('id','=',$id)->update($values);

    }

}

