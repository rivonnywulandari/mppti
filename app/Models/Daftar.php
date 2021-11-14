<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Daftar extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'daftar';
    protected $primaryKey = 'daftar_id';
    //protected $fillable=['users_id','jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'asal', 'alamat', 'alasan', 'kontribusi', 'kenapa', 'apakah', 'bersediakah', 'cv', 'ktm', 'krs', 'transkrip_nilai'];
    protected $fillable=['id','jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'asal', 'alamat', 'alasan', 'kontribusi', 'kenapa', 'apakah', 'bersediakah', 'filezip', 'status'];

    // public function krs()
    // {
    //     return $this->hasMany(Krs::class);
    // }   

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
