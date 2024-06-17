<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Makul extends Model
{
    use HasFactory;
    public $table="makul";
    protected $primaryKey = "kode_makul"; // custom primary key
    public $incrementing=false; // mematikan auto increment
    protected $keyType="string"; // custom type primary key (defaultnya autoincrement
    public $fillable = ['kode_makul','nama_makul','sks'];
}
