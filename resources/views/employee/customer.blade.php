
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
</head>

<body>
    <div class="d-flex" id="wrapper">
        @include('employee.layout.sidebar')

        <!-- Page Content -->
        @include('employee.layout.header')


                <div class="container">
                    
                    <!-- employee/customer.blade.php -->
                    @if(isset($employeeBookings) && count($employeeBookings) > 0)
                    <h3 style="text-align: center">Choose your Bookings</h3>
                    <!-- Your table or other HTML content -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Booking Date</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Service Type</th>
                                <th>Amount</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employeeBookings as $booking)
                                <tr>
                                    <th>{{ date('F j, Y', strtotime($booking->StartTime)) }}</th>
                                    <td>{{ $booking->user->name }}</td>
                                    <td>{{ $booking->user->email }}</td>
                                    <td>{{ $booking->serviceType }}</td>
                                    <td> ₱ {{ $booking->amount }}</td>
                                    <td>
                                        {{-- <a href="{{ route('booking.show', ['bookingId' => $booking->BookingID]) }}" class="btn btn-info btn-sm">View details</a> --}}
                                        <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#bookingModal{{ $booking->BookingID }}">
                                            View details
                                        </button>
                                        {{-- <form method="post" action="{{ route('accept.booking', ['bookingId' => $booking->BookingID]) }}" style="display: inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-success btn-sm">Accept</button>
                                        </form> --}}
                                        <form method="post" action="{{ route('accept.booking', ['bookingId' => $booking->BookingID]) }}" style="display: inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-success btn-sm">Accept</button>
                                        </form>
                                        {{-- <form method="post" action="{{ route('reject.booking', ['bookingId' => $booking->BookingID]) }}" style="display: inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Reject</button>
                                        </form> --}}

                                    

                 <!-- Modal -->
            <div  class="modal fade" id="bookingModal{{ $booking->BookingID }}" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true""
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
                                                <p class="text-muted">{{ $booking->user->name }} </p>
                                             </div>
                                             <div class="col-6 mb-3">
                                                 <h6>Email</h6>
                                                 <p class="text-muted">{{ $booking->user->email }}</p>
                                             </div>
                                         </div>
                                         <div class="row pt-1">
                                             <div class="col-6 mb-3">
                                                 <h6>Pet Weight</h6>
                                                 <p class="text-muted">{{ $booking->petWeight }}kg</p>
                                             </div>
                                             <div class="col-6 mb-3">
                                                 <h6>Service Type</h6>
                                                 <p class="text-muted">{{ $booking->serviceType }}</p>
                                             </div>
                                         </div>
                                         <div class="row pt-1">
                                            <div class="col-6 mb-3">
                                                <h6>Start date </h6>
                                                <p class="text-muted">{{ date('F j, Y', strtotime($booking->StartTime)) }}</p>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <h6>End Date</h6>
                                                <p class="text-muted">{{ date('F j, Y', strtotime($booking->EndTime)) }}</p>
                                            </div>
                                        </div>

                                        <div class="row pt-1">
                                            <div class="col-6 mb-3">
                                                <h6>Pet Type </h6>
                                                <p class="text-muted">{{ $booking->petType }}</p>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <h6>Amount</h6>
                                                <p class="text-muted"> ₱ {{ $booking->amount }}</p>
                                            </div>
                                        </div>
                                            <h6><b>Location</b></h6>
                                         <hr class="mt-0 mb-4">

                                         <div class="row pt-1">
                                            <div class="col-6 mb-3">
                                                <h6>Barangay</h6>
                                                <p class="text-muted">{{ $booking->barangay }}</p>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <h6>city</h6>
                                                <p class="text-muted">{{ $booking->city }}</p>
                                            </div>
                                        </div>
                                        <div class="row pt-1">
                                           <div class="col-6 mb-3">
                                               <h6>Province </h6>
                                               <p class="text-muted">{{ $booking->province }}</p>
                                           </div>
                                           <div class="col-6 mb-3">
                                               <h6>Region</h6>
                                               <p class="text-muted">{{ $booking->region }}</p>
                                           </div>
                                        </div>
                                        <h6><b>Comment</b></h6>
                                         <hr class="mt-0 mb-4">
                                         <p class="text-muted">
                                            {{ $booking->comments }}
                                         </p>
                                         {{-- <div class="d-flex justify-content-start">
                                             <a href="#!"><i class="fab fa-facebook-f fa-lg me-3"></i></a>
                                             <a href="#!"><i class="fab fa-twitter fa-lg me-3"></i></a>
                                             <a href="#!"><i class="fab fa-instagram fa-lg"></i></a>
                                         </div> --}}
                                     </div>
                                 </div>
                             </div>
                         </div>
                         
                         <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <!-- Add additional buttons or actions here -->
                        </div>
                     </div>
                 </div>
             </div>

         </div>
     </div>
 </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-center mt-4">
                        {{ $employeeBookings->links() }}
                    </div>
                @else
                    <h3 style="text-align: center;">No bookings Found</h3>
                @endif
                   
                                {{-- <h1>Booking Details</h1>

                                <p>Booking ID: {{ $book->id }}</p>
                                <!-- Display other booking details -->
                                
                                <!-- Button to trigger the modal -->
                                <button type="button" data-bs-toggle="modal" data-bs-target="#bookingDetailsModal">
                                    View Details
                                </button>
                                
                                <!-- Booking Details Modal -->
                                <div class="modal fade" id="bookingDetailsModal" tabindex="-1" aria-labelledby="bookingDetailsModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="bookingDetailsModalLabel">Booking Details</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Content loaded via AJAX -->
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            
                            {{-- @endforeach  --}}
                       
                        </tbody>
                    </table>
                </div>
    <!-- /#page-content-wrapper -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    {{-- <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
    <script>
        $(document).ready(function () {
            $('[data-bs-target="#bookingDetailsModal"]').on('click', function () {
                var bookingId = {{ $booking->id }};
    
                $.ajax({
                    url: '/bookings/' + bookingId,
                    type: 'GET',
                    dataType: 'json',
                    success: function (response) {
                        // Update modal content with booking details
                        $('.modal-body').html('Booking ID: ' + response.booking.id + '<br>Other details: ' + response.booking.otherDetails);
                    },
                    error: function (error) {
                        console.error('Error loading booking details:', error.responseText);
                    }
                });
            });
        });
    </script> --}}
</body>

</html>