<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crud extends Model
{
    use HasFactory;
    //protected $table = 'data_cruds';
    public $timestamps = false;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'kode',
        'nama',
        'alamat',
    ];
}
