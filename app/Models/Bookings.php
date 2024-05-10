<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    use HasFactory;

    protected $primaryKey = 'BookingID';

    // protected $fillable = [
    //     'UserID', 'PetID', 'ServiceID', 'StartTime', 'EndTime', 'Status', 'EmployeeID',
    // ];

    protected $guarded =[];

    public function user()
    {
        return $this->belongsTo(User::class, 'UserID');
    }

    // public function pet()
    // {
    //     return $this->belongsTo(pets::class, 'PetID');
    // }

    public function service()
    {
        return $this->belongsTo(Service::class, 'ServiceID');
    }

    public function review()
    {
        return $this->hasOne(Review::class, 'BookingID');
    }

    public function employeeService()
    {
        return $this->hasOne(EmployeeService::class, 'user_id', 'user_id')->where('service_id', $this->service_id);
    }

    public function bookings()
{
    // return $this->hasMany(Bookings::class, 'EmployeeID');
    return $this->belongsTo(User::class, 'UserID');
}

public function users()
{
    // return $this->hasMany(Bookings::class, 'EmployeeID');
    
    return $this->belongsTo(User::class, 'UserID');
}
public function serviceProvider()
    {
        return $this->belongsTo(User::class, 'EmployeeID');
    }

    public function service_provider()
    {
        return $this->belongsTo(User::class, 'EmployeeID');
    }

    // public function create(Request $request)
    // {
    //     // Validation and input processing here

    //     $booking = Bookings::create([
    //         'UserID' => $request->input('UserID'),
    //         'ServiceID' => $request->input('ServiceID'),
    //         'EmployeeID' => $request->input('EmployeeID'),
    //         'StartTime' => $request->input('StartTime'),
    //         'EndTime' => $request->input('EndTime'),
    //         // Other fields
    //     ]);

    //     // Handle the rest of the booking creation logic

    //     return response()->json(['message' => 'Booking created successfully', 'data' => $booking]);
    // }
}
