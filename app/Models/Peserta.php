<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;
    protected $table='peserta';
    protected $fillable = ['nim', 'nama', 'id_users', 'tgl_lahir'];
    public $timestamps = false; 


}
