<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    // Beri tahu Laravel bahwa primary key-nya bernama 'id'
    protected $primaryKey = 'id';

    // Beri tahu Laravel bahwa primary key-nya BUKAN angka auto-increment
    public $incrementing = false;

    // Beri tahu Laravel bahwa tipe primary key-nya adalah String
    protected $keyType = 'string';

    protected $fillable = ['id', 'nama'];
}
