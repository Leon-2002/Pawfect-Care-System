
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="/template dashboard/styles.css" />

    
    
    <!-- PRofile css-->
    <link rel="stylesheet" href="/Employee list/style.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    
    <title>Bootstap 5 Responsive Admin Dashboard</title>


    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css" integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" />
</head>

<body>
    <!-- Wrapper -->
<div class="d-flex" id="wrapper">
    @include('user.layout.sidebar')

    <!-- Page Content-->
    @include('user.layout.header')

    <section class="section">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">

                    <!-- Employee list-->
                    <div class="candidate-list">
                        @if($acceptedBookings->isEmpty())
                            <h3>No service provider has accepted your booking request.</h3>
                        @else
                            @foreach($acceptedBookings as $booking)
                                <div class="candidate-list-box card mt-4">
                                    <div class="p-4 card-body">
                                        <div class="align-items-center row">
                                            <div class="col-auto">
                                                <div class="candidate-list-images">
                                                    <a href="#"><img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="avatar-md img-thumbnail rounded-circle" /></a>
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="candidate-list-content mt-3 mt-lg-0">
                                                    <h5 class="fs-19 mb-0">
                                                        <a href="{{ route('service-provider.profile', ['id' => $booking->EmployeeID]) }}" class="primary-link" >{{ $booking->serviceProvider->name }}</a><span class="badge bg-success ms-1"><i class="mdi mdi-star align-middle"></i>4.8</span>
                                                    </h5>
                                                    <p class="text-muted mb-2">{{ $booking->serviceProvider->serviceType }}</p>
                                                    <ul class="list-inline mb-0 text-muted">
                                                        <li class="list-inline-item"><i class="mdi mdi-wallet"></i> ₱ {{$booking->amount}} </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mt-2 mt-lg-0 d-flex flex-wrap align-items-start gap-1">
                                                    <span class="badge bg-soft-secondary fs-14 mt-1">{{ $booking->serviceProvider->serviceType }}</span><span class="badge bg-soft-secondary fs-14 mt-1"> Payment status: {{$booking->payment_status}}</span><span class="badge bg-soft-secondary fs-14 mt-1"></span>
                                                    <div class="profile">
                                                        <!-- Additional profile information -->
                                                        <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#bookingModal{{ $booking->BookingID }}">
                                                            View details
                                                        </button>
                                                            @if ($booking->payment_status == 'pending')
                                                                <form method="post" action="{{ route('pay.booking', ['bookingId' => $booking->BookingID]) }}" style="display: inline;">
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-primary btn-sm">Pay</button>
                                                                </form>
                                                            @elseif ($booking->payment_status == 'paid')
                                                                <button type="button" class="btn btn-success btn-sm">Done</button>
                                                            @endif
                                                        <form method="post" action="{{ route('cancel.user', ['bookingId' => $booking->BookingID]) }}" style="display: inline;">
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger btn-sm">Cancel</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>

            <!-- Pagination links -->
            <div  class="mt-4 pt-2 col-lg-12 d-flex justify-content-center">
                {{ $acceptedBookings->links() }}
            </div>

            <!-- Modal -->
            @foreach($acceptedBookings as $booking)
                <!-- Modal -->
            <div  class="modal fade" id="bookingModal{{ $booking->BookingID }}" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true""
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Booking Information</h5>
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
                                        <h6><b>Service Provider Information</b></h6>
                                        <hr class="mt-0 mb-4">
                                        <div class="row pt-1">
                                            <div class="col-6 mb-3">
                                                <h6>Name</h6>
                                               <p class="text-muted">{{ $booking->serviceProvider->name}} </p>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <h6>Email</h6>
                                                <p class="text-muted">{{ $booking->serviceProvider->email }}</p>
                                            </div>
                                        </div>
                                        <div class="row pt-1">
                                            <div class="col-6 mb-3">
                                                <h6>Service Type</h6>
                                               <p class="text-muted">{{ $booking->serviceProvider->serviceType}} </p>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <h6>Description</h6>
                                                <p class="text-muted">{{ $booking->serviceProvider->description }}</p>
                                            </div>
                                        </div>
                                        <h6><b>Booking Information</b></h6>
                                        <hr class="mt-0 mb-4">
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




       
            @endforeach

        

        </div>
    </section>
</div>
<!-- /#page-content-wrapper -->

<script src="jquery.js"></script>
<script src="jquery.rateyo.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    
      <script>
        // page toggle
        var el = document.getElementById("wrapper");
      var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
        // for passing the employee ID
    //     $(document).ready(function() {
    //     $('.choose-worker').on('click', function() {
    //         var EmployeeId = $(this).data('Employee-id');

    //         // Perform AJAX request or redirect to confirmBooking with employeeId
    //         window.location.href = '/user/bookings/confirm?EmployeeId=' + EmployeeId;
    //     });
    // });
    z
    </script>

</body>

</html>