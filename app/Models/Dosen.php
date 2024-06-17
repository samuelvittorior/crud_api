<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;
    public $table="dosen";
    protected $primaryKey = "nidn"; // custom primary key
    public $incrementing=false; // mematikan auto increment
    protected $keyType="string"; // custom type primary key (defaultnya autoincrement
    public $fillable = ['nidn','nama_dosen'];
}
