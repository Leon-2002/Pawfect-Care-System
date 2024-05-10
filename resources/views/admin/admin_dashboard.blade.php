
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="/template dashboard/styles.css" />
    <title>Bootstap 5 Responsive Admin Dashboard</title>
    @notifyCss
</head>

<body>
    <div class="d-flex" id="wrapper">
        @include('admin.layout.sidebar')

        <!-- Page Content -->
        @include('admin.layout.header')


        <div class="notifications-container">
            <x-notify::notify />
        </div>
        
        @notifyJs
            <div class="container-fluid px-4">
                <div class="row g-3 my-2">
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">720</h3>
                                <p class="fs-5">Products</p>
                            </div>
                            <i class="fas fa-gift fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">4920</h3>
                                <p class="fs-5">Sales</p>
                            </div>
                            <i
                                class="fas fa-hand-holding-usd fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">255</h3>
                                <p class="fs-5">Comments</p>
                            </div>
                            <i class="fas fa-truck fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">%25</h3>
                                <p class="fs-5">Earnings</p>
                            </div>
                            <i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <h2>User Management</h2>
                    <a href="{{ route('users.create') }}" class="btn btn-success mb-2">Add User</a>
                
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>{{ $user->status }}</td>
                                    <td>
                                        {{-- <a href="{{ route('users.show', $user->id) }}" class="btn btn-info btn-sm" >View</a> --}}
                                        <a  class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#bookingModal{{ $user->id }}">Profile</a>
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <form action='/admin/dashboard/delete/{{$user->id}}' method="POST" style="display: inline;">

                                            @csrf
                                            @method('DELETE') 
                            
                                            <a class="btn btn-danger btn-sm">  <button type="submit" id="deleteButton" onclick="return confirm('Are you sure?')">Delete</button></a>
                                        </form>
                                    </td>
                                </tr>

                            
                                 <!-- Modal -->
                 <div  class="modal fade" id="bookingModal{{ $user->id  }}" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true""
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">User Profile</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row g-0">
                                    <div class="col-md-4 gradient-custom text-center text-white"
                                        style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp"
                                            alt="Avatar" class="img-fluid my-5" style="width: 80px;" />
                                        <h5>Marie Horwitz</h5>
                                        <p>Web Designer</p>
                                        <i class="far fa-edit mb-5"></i>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body p-4">
                                            <h6><b>Information</b></h6>
                                            <hr class="mt-0 mb-4">
                                            <div class="row pt-1">
                                                <div class="col-6 mb-3">
                                                    <h6>Name</h6>
                                                   <p class="text-muted">{{ $user->name }} </p>
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <h6>Email</h6>
                                                    <p class="text-muted">{{ $user->email }}</p>
                                                </div>
                                            </div>
                                            
                                           
                                            <div class="row pt-1">
                                                <div class="col-6 mb-3">
                                                    <h6>Role</h6>
                                                   <p class="text-muted">Pet {{ $user->role }} </p>
                                                </div>

                                                @if ($user->role == "employee")
                                                <div class="col-6 mb-3">
                                                    <h6>Service type</h6>
                                                   <p class="text-muted">{{ $user->serviceType }} </p>
                                                </div>
                                                @endif
                                            </div>
                                            
                                          
   
                                               <h6><b>Location</b></h6>
                                            <hr class="mt-0 mb-4">
   
                                            <div class="row pt-1">
                                               <div class="col-6 mb-3">
                                                   <h6>Barangay</h6>
                                                   <p class="text-muted">{{ $user->barangay }}</p>
                                               </div>
                                               <div class="col-6 mb-3">
                                                   <h6>city</h6>
                                                   <p class="text-muted">{{ $user->city }}</p>
                                               </div>
                                           </div>
                                           <div class="row pt-1">
                                              <div class="col-6 mb-3">
                                                  <h6>Province </h6>
                                                  <p class="text-muted">{{ $user->province}}</p>
                                              </div>
                                              <div class="col-6 mb-3">
                                                  <h6>Region</h6>
                                                  <p class="text-muted">{{$user->province }}</p>
                                              </div>
                                           </div>


                                           @if ($user->role == "employee")
                                           <div class="row pt-1">
                                               <div class="col-6 mb-3">
                                                   <h6>Service type</h6>
                                                  <p class="text-muted">{{ $user->serviceType }} </p>
                                               </div>
                                               
                                               <div class="col-12 mb-3">
                                                <h6><b>Description</b></h6>
                                                <hr class="mt-0 mb-4">
                                                <p class="text-muted">
                                                   {{ $user->description }}
                                                </p>
                                               </div>
                                           </div>
                                           @endif
                                          
                                            {{-- <div class="d-flex justify-content-start">
                                                <a href="#!"><i class="fab fa-facebook-f fa-lg me-3"></i></a>
                                                <a href="#!"><i class="fab fa-twitter fa-lg me-3"></i></a>
                                                <a href="#!"><i class="fab fa-instagram fa-lg"></i></a>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>  
                            
                            @endforeach

                           
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-center mt-4">
                        {{ $users->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };

                 // Add an event listener to the delete button
        document.getElementById('deleteButton').addEventListener('click', function () {
            // Simulate a user deletion action
            // In a real scenario, you might want to perform an AJAX request here

            // Trigger a success notification
            notify({
                type: 'success',
                title: 'User Deleted',
                message: 'The user has been deleted successfully!'
            });
        });


    </script>
</body>

</html>