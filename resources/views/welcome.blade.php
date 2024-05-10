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
                                                        <a class="primary-link" href="#">{{ $booking->serviceProvider->name }}</a><span class="badge bg-success ms-1"><i class="mdi mdi-star align-middle"></i>4.8</span>
                                                    </h5>
                                                    <p class="text-muted mb-2">{{ $booking->serviceProvider->serviceType }}</p>
                                                    <ul class="list-inline mb-0 text-muted">
                                                        <li class="list-inline-item"><i class="mdi mdi-wallet"></i> ₱ 650 </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mt-2 mt-lg-0 d-flex flex-wrap align-items-start gap-1">
                                                    <span class="badge bg-soft-secondary fs-14 mt-1">{{ $booking->serviceProvider->serviceType }}</span><span class="badge bg-soft-secondary fs-14 mt-1">To pay</span><span class="badge bg-soft-secondary fs-14 mt-1"></span>
                                                    <div class="profile">
                                                        <!-- Additional profile information -->
                                                        <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#bookingModal{{ $booking->BookingID }}">
                                                            View details
                                                        </button>
                                                        <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#bookingModal{{ $booking->BookingID }}">
                                                            Done
                                                        </button>
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
