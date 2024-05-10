<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $primaryKey = 'ServiceID';

    protected $fillable = [
        'ServiceName', 'Description', 'Price', 'UserID', 'StartTime', 'EndTime', 'EmployeeID'

        //'Region', 'Province', 'City', 'Barangay',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'UserID');
    }

    public function employee()
    {
        return $this->belongsTo(User::class, 'EmployeeID');
    }


    public function submit(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'serviceName' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'userID' => 'required|string',
        ]);

        // Create a new service record
        $service = new Service([
            'service_name' => $validatedData['serviceName'],
            'description' => $validatedData['description'],
            'price' => $validatedData['price'],
            'user_id' => $validatedData['userID'],
        ]);

        // Save the service record
        $service->save();

        // Redirect or return a response as needed
        return redirect('/')->with('success', 'Service submitted successfully!');
    }
}
