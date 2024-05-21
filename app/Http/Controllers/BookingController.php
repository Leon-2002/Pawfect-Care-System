<?php

namespace App\Http\Controllers;

use App\Models\Bookkings;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Review;
use App\Models\Bookings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    //
    // public function create(Request $request)
    // {
    //     // Validation and input processing here
        
    //     // Create a booking record without assigning a worker initially
    //     $booking = Bookings::create([
    //         'UserID' => $request->input('UserID'),
    //         'ServiceID' => null,
    //         'StartTime' => $request->input('StartTime'),
    //         'EndTime' => $request->input('EndTime'),
    //         'region' => $request->input('region'),
    //         'province' => $request->input('province'),
    //         'city' => $request->input('city'),
    //         'barangay' => $request->input('barangay'),
    //         'petWeight' => $request->input('petWeight'),
    //         'serviceType' => $request->input('serviceType'),
    //         'comments' => $request->input('comments'),
    //         'status' => 'pending', // Default status
    //         'EmployeeID' => null,
    //     ]);

    //     // Redirect to a page where the system will search for available workers
    // notify()->success('Your booking has been submitted successfully. Please wait for Service provider.', 'Booking Submitted');
    // return view('user.dashboard');
        
    // }


    public function create(Request $request)
    {
        // Validation and input processing here
        
        $request->validate([
            // Other validation rules
            'agree_terms' => 'required|accepted',
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
            'ServiceID' => null,
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
            'EmployeeID' => null,
            'amount' => $amount, // Include the calculated amount
            'payment_status' => 'pending', // Default payment status
            
        ]);
    
        // Redirect to a page where the system will search for available workers
        notify()->success('Your booking has been submitted successfully. Please wait for the service provider.', 'Booking Submitted');
        return view('user.dashboard');
    }





    public function viewBookings()
    {
        // Assuming the authenticated user is a service provider/employee
        $employeeID = auth()->user()->id; // Replace with the actual field used for employee ID
    
        // Get the city of the authenticated service provider/employee
        $city = auth()->user()->city; // Replace with the actual field used for the city
    
        // Fetch all bookings in the same city with their details
        $employeeBookings = Bookings::where('city', $city)
        ->where('status', 'pending')       
        // ->where('StartTime', '>', now())
        ->paginate(10);


        // Fetch all bookings in the same city with their details
        $personalBooking = Bookings::where('EmployeeID', $employeeID)
        ->where('status', 'pending')       
        // ->where('StartTime', '>', now())
        ->paginate(10);

        // You can pass $bookingsInCity to a view or process it as needed
        return view('employee.customer', compact('employeeBookings', 'personalBooking', ));

    }

//     public function selectProvider($BookingID)
//     {
//         // Retrieve the booking
//         $booking = Bookings::findOrFail($BookingID);

//         // Search for available workers based on the booking details
//         $availableWorkers = User::where('role', 'employee')
//             ->where('status', 'available')
//             ->where('serviceType', 'like', '%' . $booking->serviceType . '%')
//             ->get();

//         // Pass the available workers and the booking details to the view
//         return view('user.service', compact('availableWorkers', 'booking'));
//     }


//     public function confirmBooking(Request $request)
// {
//     // Retrieve the booking
//     $booking = Bookings::findOrFail($request->input('BookingID'));
//     // Retrieve the user
   

//     // Assign the selected worker to the booking
//     $booking->update([
//         'EmployeeID' => $request->input('EmployeeID'),
//         'status' => 'confirmed',
//     ]);
    
//     // Additional logic for sending notifications, processing payments, etc.

//     notify()->success('Your booking has been submitted successfully. Please wait for employee\'s approval.', 'Booking Submitted');
//     return view('user.dashboard');
    
// }

// emplyee accept or reject 
public function customer()
    {
        // Assuming you have an authenticated user (employee)
        $employee = Auth::user();

        // Retrieve bookings where the employee is chosen as the worker
        $employeeBookings = $employee->bookings()->where('status', 'confirmed')->get();

        // Pass $employeeBookings to the view
        return view('employee.customer', ['employeeBookings' => $employeeBookings]);
    }

public function show($bookingId)
{
    $booking = Bookings::findOrFail($bookingId);

    // Retrieve a list of bookings (or clients) for display
    // $bookingsList = Bookings::all(); // Adjust this query based on your requirements
    $bookingsList = Bookings::where('EmployeeID', auth()->user()->id)->get();

    if (request()->expectsJson()) {
        return response()->json(['booking' => $booking, 'bookingsList' => $bookingsList]);
    }

    return view('employee.customer', compact('booking', 'bookingsList'));
}

// public function acceptBooking($bookingId) 
// {
//     // Retrieve the booking
//     $booking = Bookings::findOrFail($bookingId);

//     // Update the booking status to 'accepted'
//     $booking->update(['status' => 'Accepted']);

//     // Update the authenticated user's status to 'busy'
//     Auth::user()->update(['status' => 'busy']);

//     // Additional logic (notifications, etc.) can be added here
//     notify()->success('Booking accepted successfully', 'accepted');
//     return redirect()->route('employee.dashboard')->with('success', 'Booking accepted successfully');
    
// }
public function acceptBooking(Request $request, $bookingId)
{
    // Assuming the authenticated user is a service provider/employee
    $employeeId = auth()->user()->id; // Replace with the actual field used for employee ID

    // Update the booking record with the EmployeeID
    Bookings::where('BookingID', $bookingId)->update(['EmployeeID' => $employeeId,  'status' => 'Accepted']);

    // Your additional logic related to accepting the booking goes here

    // Optionally, you can redirect back with a success message
    notify()->success('Booking accepted successfully', 'accepted');
    return redirect()->route('employee.dashboard')->with('success', 'Booking accepted successfully');
}

    public function rejectBooking($bookingId)
    {
        // Retrieve the booking
        $booking = Bookings::findOrFail($bookingId);

        // Update the booking status to 'rejected'
        $booking->update(['status' => 'rejected']);

        // Additional logic (notifications, etc.) can be added here

        // return redirect()->back()->with('success', 'Booking rejected successfully');
        notify()->success('Booking rejected successfully', 'Rejected');
        return redirect()->route('employee.dashboard')->with('success', 'Booking rejected successfully');
    }


    public function showAcceptedBookings()
    {
        $acceptedBookings = Bookings::where('status', 'accepted')->where('UserID',  auth()->user()->id)->paginate(4);

        return view('user.service', compact('acceptedBookings'));
    }


    public function ShowClient()
    {
        $acceptedBookings = Bookings::where('status', 'accepted')->where('EmployeeID',  auth()->user()->id)->paginate(4);

        return view('employee.client', compact('acceptedBookings'));
    }


    public function profile($userId)
    {
        $user = User::find($userId);

        if (!$user) {
            abort(404); // or handle not found in your own way
        }

        return view('user.service_profile', compact('user'));
    }

    // for done button
    public function complete(Request $request, $bookingId)
    {
        $booking = Bookings::findOrFail($bookingId);
    
        // Update the status to 'completed'
        $booking->update(['status' => 'completed']);
    
        // Redirect or return a response as needed
        notify()->success('Booking Completed', 'Completed');
        return redirect()->route('employee.dashboard')->with('success', 'Booking completed successfully');
    }

    public function cancel(Request $request, $bookingId)
    {
        $booking = Bookings::findOrFail($bookingId);
    
        // Update the status to 'completed'
        $booking->update(['status' => 'canceled']);
    
        // Redirect or return a response as needed
        notify()->success('Booking canceled', 'Canceled');
        return redirect()->route('employee.dashboard')->with('success', 'Booking completed successfully');
    }
    public function Usercancel(Request $request, $bookingId)
    {
        $booking = Bookings::findOrFail($bookingId);
    
        // Update the status to 'completed'
        $booking->update(['status' => 'canceled']);
    
        // Redirect or return a response as needed
        notify()->success('Booking canceled', 'Canceled');
        return view('user.dashboard')->with('success', 'Booking completed successfully');
    }


    public function payBooking($bookingId)
    {
        $booking = Bookings::find($bookingId);

        // Check if the booking exists
        if (!$booking) {
            return view('user.dashboard')->with('error', 'Booking not found');
        }

        // Check if the booking is associated with the authenticated user
        if ($booking->UserID !== auth()->user()->id) {
            notify()->error('Unauthorized action', 'error');
            return view('user.dashboard')->with('error', 'Unauthorized action');
        }

        // Check if the booking has already been paid
        if ($booking->payment_status === 'paid') {
            
            return view('user.dashboard')->with('warning', 'Booking already paid');
        }

        // Implement the logic for the payment using Laravel Cashier
        try {
            // Update the booking payment status
            $booking->update([
                'payment_status' => 'paid',
            ]);
            notify()->success('Payment successful!', 'success');
            return view('user.dashboard')->with('success', 'Payment successful!');
        } catch (\Exception $e) {
            // Handle payment failure
            notify()->error('Payment failed!', 'Failed');
            return view('user.dashboard')->with('error', 'Payment failed: ' . $e->getMessage());
        }
    }


    public function reviewstore(Request $request){
        $review = new Review();
        $review->BookingID = $request->booking_id;
        $review->comments= $request->comment;
        $review->star_rating = $request->rating;
        $review->UserID = Auth::user()->id;
        $review->EmployeeID = $request->EmployeeID;
        $review->save();

        Bookings::where('BookingID', $request->booking_id)->update(['isRated' => "True"]);

        notify()->success('Booking Rated Successfully', 'Rated');
        return redirect()->back()->with('flash_msg_success','Your review has been submitted Successfully,');

        

    }
}
