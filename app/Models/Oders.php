<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oders extends Model
{
    use HasFactory;
    public function getOders($id)
    {
        return $this
            ->where('id_user','=',$id)
            ->orderBy('oders.id', 'desc')
            ->get();

    }

}
