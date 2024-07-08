<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class feedback extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'rating',
        'comment',
    ];
    protected $primaryKey = 'feedback_id';
    public $incrementing = true; // Default true, memastikan primary key auto-increment
    protected $keyType = 'int'; // Default 'int', memastikan primary key bertipe integer


    // public function mobils()
    // {
    //     return $this->belongsTo(rental::class, 'plat_mobil');
    // }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
