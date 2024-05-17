<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Review;
use App\Models\Bookings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    //
    public function EmployeeDashboard(){    
        if (auth()->user()->region == '') {
            notify()->warning('Please update your Profile', 'Update your Profile');

            $serviceProviderId = Auth::id(); // Get the logged-in service provider's ID
        
            $recentActivities = Bookings::where('EmployeeID', $serviceProviderId)
                ->orderBy('created_at', 'desc')
                
                ->get();
    
            return view('employee.employee_dashboard', ['recentActivities' => $recentActivities]);

            
        }
        else{
            
            
            $serviceProviderId = Auth::id(); // Get the logged-in service provider's ID
        
            $recentActivities = Bookings::where('EmployeeID', $serviceProviderId)
                ->orderBy('created_at', 'desc')
                ->take(10)
                ->get();
    
            return view('employee.employee_dashboard', ['recentActivities' => $recentActivities]);


        }
       
    }
    
    public function EmployeeCustomer(){
        return view('employee.customer');
    }


    
// public function showProfile($id)
// {
//     // Fetch the service provider details based on the $id
//     $user = User::findOrFail($id);

//     // fetch the review data
//     // $reviews = Review::where('UserID', $id)->with('user')->get();


//     $reviews = $user->reviews; 
//     // Pass the data to the view
//     return view('user.service_profile', compact('user', 'reviews'));
// }

public function showProfile($id)
{
    // Fetch the service provider details based on the $id
    $user = User::findOrFail($id);

    // Fetch the associated reviews using the relationship defined in the User model
    // $reviews = $user->reviews;
    $reviews = Review::where('EmployeeID', $id)->paginate(2);

    $totalReviewsCount = Review::where('EmployeeID', $id)->count();
    

    // Pass the data to the view
    return view('user.service_profile', compact('user', 'reviews', 'totalReviewsCount'));
}


}
