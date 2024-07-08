<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class rental extends Model
{
    use HasFactory;

    protected $guarded = ['rental_id'];
    protected $primaryKey = 'rental_id';
    public $incrementing = true; // Default true, memastikan primary key auto-increment
    protected $keyType = 'int'; // Default 'int', memastikan primary key bertipe integer

    public function feedback()
    {
        return $this->belongsTo(rental::class);
    }
    public function pembayarans()
    {
        return $this->belongsTo(pembayaran::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function mobil()
    {
        return $this->belongsTo(Mobil::class, 'plat_mobil', 'plat_mobil');
    }
}
