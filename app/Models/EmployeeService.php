<?php

namespace App\Models;

use App\Models\Bookings;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmployeeService extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relationship with the Service model.
     */
    public function service()
    {
        return $this->belongsTo(EmployeeService::class, 'service_id');
    }

    public function bookings()
    {
        return $this->hasMany(Service::class, 'service_ID');
    }
}
