<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    //
    public function index()
    {
        $services = Service::all(); // You can modify this query based on your needs
        return view('profile.edit', compact('services'));
    }

    public function create()
    {
        return view('services.create');
    }

    public function store(Request $request)
    {

        // $user = auth()->user();

        $request->validate([
            'ServiceName' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'EmployeeID' => 'required|numeric',
            // Add more validation rules for other fields
        ]);

        // Service::create([
        //     'ServiceName' => $request->input('serviceName'),
        //     'Description' => $request->input('description'),
        //     'Price' => $request->input('price'),
        //     'EmployeeID' => $request->input('employeeID'), 
        //     // Add other fields as needed
        // ]);

        Service::create($request->all());

        return redirect('/profile')->with('status', 'profile-updated');
        // with('success', 'Service created successfully!');
    }
     public function edit($id)
     {
         $service = Service::findOrFail($id);
         return view('services.update', compact('service'));
     }
 
     public function update(Request $request, $id)
     {
         $request->validate([
             'serviceName' => 'required|string|max:255',
             'description' => 'required|string',
             'price' => 'required|numeric',
             // Add more validation rules for other fields
         ]);
 
         $service = Service::findOrFail($id);
         $service->update([
             'ServiceName' => $request->input('serviceName'),
             'Description' => $request->input('description'),
             'Price' => $request->input('price'),
             // Update other fields as needed
         ]);
 
         return redirect('/profile')->with('success', 'Service updated successfully!');
     }
}
