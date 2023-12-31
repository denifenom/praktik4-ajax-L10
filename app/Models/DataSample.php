<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSample extends Model
{
    use HasFactory;
    public $timestamps = false;

        /**
         * fillable
         *
         * @var array
         */
        protected $fillable = [
            'nomor',
            'nama',
            'alamat',
            'telp',
            'email',
        ];

}
