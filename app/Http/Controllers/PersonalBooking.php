<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
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





}
