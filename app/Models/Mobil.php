<?php

namespace App\Models;

use App\Models\rental;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mobil extends Model
{
    use HasFactory;

    protected $fillable = [
        'plat_mobil',
        'brand',
        'model',
        'year',
        'price_per_day',
        'status',
        'image_url',
    ];
    protected $primaryKey = 'plat_mobil';
    public $incrementing = true; // Default true, memastikan primary key auto-increment
    protected $keyType = 'string'; // Default 'int', memastikan primary key bertipe integer




    public function rentals()
    {
        return $this->hasMany(rental::class, 'plat_mobil', 'plat_mobil');
    }

    public function feedback()
    {
        return $this->belongsTo(rental::class);
    }
    // public function getRouteKeyName(): string
    // {
    //     return 'plat_mobil';
    // }

}
