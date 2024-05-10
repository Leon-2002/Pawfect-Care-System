<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Bookings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // user dashboards
    public function UserDashboard(){
        return view('user.dashboard');
    }

    // user dashboards
    public function UserProfile(){
        return view('user.user_profile');
    }





    // crud 
    public function index()
    {
        // $users = User::all();

        $users = User::where('role', '!=','admin')
        ->paginate(10);
        return view('admin.admin_dashboard', compact('users'));
    }

    public function create()
    {
        return view('admin.admin_adduser');
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|min:6',
            // Add other fields and validation rules as needed
        ]);

        // Create a new user
        User::create($request->all());
        notify()->success('User created successfully!', 'success');
        return redirect()->route('users.index')->with('success', 'User created successfully!');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('admin.admin_edituser', compact('user'));
        
    }

    // public function update(Request $request, User $user)
    // {
    //     // Validate the request
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|email|unique:users,email,' . $user->id . '|max:255',
    //         // Add other fields and validation rules as needed
    //     ]);

    //     // Update the user
    //     $user->update($request->all());
    //     notify()->success('User updated successfully!!', 'UPDATED');
    //     return redirect()->route('users.index')->with('success', 'User updated successfully!');
    // }

    public function update(Request $request, User $user)
{
    // Validate the request
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id . '|max:255',
        'password' => 'nullable|string|min:8', // Add password validation rules
        // Add other fields and validation rules as needed
    ]);

    // Update the user data
    $userData = [
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        // Add other fields as needed
    ];

    // Hash the password if it's present in the request
    if ($request->filled('password')) {
        $userData['password'] = bcrypt($request->input('password'));
    }

    $user->update($userData);

    notify()->success('User updated successfully!!', 'UPDATED');
    return redirect()->route('users.index')->with('success', 'User updated successfully!');
}


    public function destroy(User $user)
    {

        
        $user->delete();
        notify()->success('User deleted successfully!!', 'DELETED');
        return redirect()->route('users.index')->with('success', 'User deleted successfully!');;
    }
    
    
    public function UserActivity(){
        $user = auth()->user()->id;// Get the logged-in service provider's ID
        
        $recentActivities = Bookings::where('UserId', $user)
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();

        return view('user.recentActivity', ['recentActivities' => $recentActivities]);
    }
    
}
