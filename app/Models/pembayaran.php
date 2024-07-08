<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembayaran extends Model
{
    use HasFactory;

    protected $guarded = ['payment_id'];
    protected $primaryKey = 'payment_id';
    public $incrementing = true; // Default true, memastikan primary key auto-increment
    protected $keyType = 'int'; // Default 'int', memastikan primary key bertipe integer


}
