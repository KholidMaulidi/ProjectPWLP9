<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Mahasiswa as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table="mahasiswas"; 
    public $timestamps= false;
    protected $primaryKey = 'nim'; 
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'nim',
        'nama',
        'email',
        'tanggalLahir',
        'jurusan',
        'no_handphone',
        'kelas_id',
    ];

    public function kelas(){
        return $this->belongsTo(Kelas::class);
    }
};
