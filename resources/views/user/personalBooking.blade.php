
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
                        @if($employeelist->isEmpty())
                            <h3>No service provider has accepted your booking request.</h3>
                        @else
                            @foreach($employeelist as $employee)
                                <div class="candidate-list-box card mt-4" style="border-radius: 20px;">
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
                                                        <a href="{{ route('service-provider.profile', ['id' => $employee->id]) }}" class="primary-link" >{{ $employee->name }}</a><span class="badge bg-success ms-1"><i class="mdi mdi-star align-middle"></i>4.8</span>
                                                    </h5>
                                                    <p class="text-muted mb-2"></p>
                                                    <ul class="list-inline mb-0 text-muted">
                                                        <li class="list-inline-item"><i class="mdi mdi-wallet"></i> </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mt-2 mt-lg-0 d-flex flex-wrap align-items-start gap-1">
                                                    <span class="badge bg-soft-secondary fs-14 mt-1"></span><span class="badge bg-soft-secondary fs-14 mt-1"></span><span class="badge bg-soft-secondary fs-14 mt-1"></span>
                                                    <div class="profile">
                                                        <!-- Additional profile information -->
                                                        <button type="button" class="btn btn-info btn-sm" >
                                                            <a href="{{ route('service-provider.profile', ['id' => $employee->id]) }}">view Profile</a>
                                                        </button>
                                                            {{-- @if ($booking->payment_status == 'pending')
                                                                {{-- <form method="post" action="{{ route('pay.booking', ['bookingId' => $booking->BookingID]) }}" style="display: inline;">
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-primary btn-sm">Pay</button>
                                                                </form>
                                                            @elseif ($booking->payment_status == 'paid')
                                                                <button type="button" class="btn btn-success btn-sm">Done</button>
                                                            @endif
                                                        <form method="post" action="{{ route('cancel.user', ['bookingId' => $booking->BookingID]) }}" style="display: inline;">
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger btn-sm">Cancel</button>
                                                        </form> --}} 
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
                {{ $employeelist->links() }}
            </div>

          



       
        
        

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