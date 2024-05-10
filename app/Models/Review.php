<?php

namespace App\Models;

use App\Models\Bookings;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;
    protected $primaryKey = 'ReviewID';

    // protected $fillable = [
    //     'BookingID', 'star', 'Comment',
    // ];

    protected $guarded =[];

    public function booking()
    {
        return $this->belongsTo(Bookings::class, 'BookingID');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
