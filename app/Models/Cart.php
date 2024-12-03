<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Cart extends Model
{
    use HasApiTokens, Notifiable;

    protected $table = 'cart';
    public $timestamps = false;

    protected $fillable = [
        'id_customer',
        'jenis_laundry',
        'jumlah',
    ];
}
