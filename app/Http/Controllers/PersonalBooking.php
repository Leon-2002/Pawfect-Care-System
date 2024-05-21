<?php

namespace App\Http\Controllers;

use notify;
use App\Models\User;
use App\Models\Bookings;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class PersonalBooking extends Controller
{
     /**
     * Fetch 10 random users with the role of "employee" and show them in a view.
     *
     * @return \Illuminate\View\View
     */
    public function getRandomEmployees()
    {
        // Fetch random users with the role of 'employee' and paginate the results
        $employees = User::where('role', 'employee')
            ->inRandomOrder()
            ->paginate(5);

        // Pass the employees data to the view
        return view('user.personalBooking')->with('employeelist', $employees);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $employeelist = User::where('name', 'LIKE', "%{$query}%")
            ->orWhere('province', 'LIKE', "%{$query}%")
            ->orWhere('city', 'LIKE', "%{$query}%")
            ->paginate(5);

        return view('user.personalBooking', compact('employeelist', 'query'));
    }

    public function submitBooking(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'petWeight' => 'required',
            'StartTime' => 'required|date',
            'EndTime' => 'required|date',
            'petType' => 'required',
            // Add validation rules for other fields
        ]);



        // Calculate amount based on pricing logic
        $basePrice = 10; // Adjust this based on your pricing logic
        $petWeight = $request->input('petWeight');
        $serviceType = $request->input('serviceType');
        $startTime = new Carbon($request->input('StartTime'));
        $endTime = new Carbon($request->input('EndTime'));
        $numberOfDays = $endTime->diffInDays($startTime);
    
        $selectedServiceTypes = $request->input('serviceTypes', []);

        foreach ($selectedServiceTypes as $serviceType) {
            // You can customize the logic further based on each service type
            switch ($serviceType) {
                case 'pet boarding':
                    $basePrice += 500 * $numberOfDays; // Additional cost for each day of boarding
                    break;
                case 'pet sitting':
                    $basePrice += 500 * $numberOfDays; // Additional cost for each day of sitting
                    $basePrice += 100; // Additional cost for transportation in pet sitting
                    break;
                case 'pet training':
                    $basePrice += 500 * $numberOfDays; // Additional cost for each day of training
                    break;
                case 'pet grooming':
                    $basePrice += 500; // Additional cost for pet grooming
                    break;
                case 'pet healthcare':
                    $basePrice += 500; // Additional cost for pet healthcare
                    break;
                // Add more cases as needed
            }
        }
    
        $amount = $basePrice + $petWeight;



       // Create a booking record with the calculated amount
       $booking = Bookings::create([
        'UserID' => $request->input('UserID'),
        'ServiceID' =>  null,
        'StartTime' => $request->input('StartTime'),
        'EndTime' => $request->input('EndTime'),
        'region' => $request->input('region'),
        'province' => $request->input('province'),
        'city' => $request->input('city'),
        'barangay' => $request->input('barangay'),
        'petWeight' => $petWeight,
        'petType' => $request->input('petType'),
        // 'serviceType' => $serviceType,
        'serviceType' => implode(', ', $selectedServiceTypes),
        'comments' => $request->input('comments'),
        'status' => 'pending', // Default status
        'EmployeeID' => $request->input('EmployeeID'),
        'amount' => $amount, // Include the calculated amount
        'payment_status' => 'pending', // Default payment status
        
    ]);

    

         // Redirect to a page where the system will search for available workers
         notify()->success('Your booking request has been submitted successfully. Please wait for service provider\'s approval.', 'Booking Submitted');
         return view('user.dashboard');
    }


}
