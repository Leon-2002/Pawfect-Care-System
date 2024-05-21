<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

     <!-- CSS-->
     <link rel="stylesheet" href="/Service Profile/style.css">
     <link rel="stylesheet" href="/template dashboard/styles.css" />

     <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- PRofile css-->
    
    
    <title>Service Profile</title>

    <!-- Icon Font Stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css" integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" />
</head>

<body>
  <style>
    body{
    
    background:#eee;
}
@media (min-width: 0) {
    .g-mr-15 {
        margin-right: 1.07143rem !important;
    }
}
@media (min-width: 0){
    .g-mt-3 {
        margin-top: 0.21429rem !important;
    }
}

.g-height-50 {
    height: 50px;
}

.g-width-50 {
    width: 50px !important;
}

@media (min-width: 0){
    .g-pa-30 {
        padding: 2.14286rem !important;
    }
}

.g-bg-secondary {
    background-color: #fafafa !important;
}

.u-shadow-v18 {
    box-shadow: 0 5px 10px -6px rgba(0, 0, 0, 0.15);
}

.g-color-gray-dark-v4 {
    color: #777 !important;
}

.g-font-size-12 {
    font-size: 0.85714rem !important;
}

.media-comment {
    margin-top:20px
}
  </style>
    <!--Wrapper-->
    <div class="d-flex" id="wrapper">
        @include('user.layout.sidebar')

        <!-- Page Content-->
        @include('user.layout.header')

        <div class="container">
            <div class="main-body">
            
                  
               {{-- @foreach ($user as $users)  --}}
                    
                
                  <div class="row gutters-sm">
                    <div class="col-md-4 mb-3">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex flex-column align-items-center text-center">
                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                            <div class="mt-3">
                              <h4>{{$user->name}}</h4>
                              <p class="text-secondary mb-1">{{$user->serviceType}}</p>
                              <p class="text-muted font-size-sm"> {{$user->barangay}} {{$user->city}}, {{$user->province}}</p>
                              {{-- <a href="/user/service/booking"><button class="btn btn-primary">Book Now</button></a> --}}

                              {{-- <a class="btn btn-primary" data-mdb-modal-init data-mdb-target="#bookmodal" data-mdb-button-init data-mdb-ripple-init">
                                Book now
                              </a> --}}
                              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bookmodal">
                                Book now
                              </button>
                              <button class="btn btn-outline-primary">Message</button>
                            </div>
                          </div>
                        </div>
                      </div>


                              <!-- Modal -->
           <div class="modal fade" id="bookmodal" tabindex="-1" aria-labelledby="bookmodalLabel" aria-hidden="true">
            <div class="modal-dialog  modal-lg d-flex justify-content-center" >
              <div class="modal-content w-100">
                <div class="modal-header">
                  <h5 class="modal-title" id="bookmodalLabel"> Book a service </h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                  <form method="POST" action="{{ route('booking.request') }}">
                    @csrf
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-outline mb-5">
                          <label class="form-label" for="name2">Service Provider</label>
                          <input type="text" id="name2" class="form-control" value="{{$user->name}}" readonly/>
                        </div>
                      </div>
                      <div class="col-md-6">

                    <div class="form-outline mb-4">
                      <label class="form-label" for="email2">Email address</label>
                      <input type="email" id="email2" class="form-control" value="{{$user->email}}" readonly />
                    </div>
                      </div>

                    </div>
                    

                    <div class="row">
                      <div class="col-md-6">
                          <div class="form-group mb-3">
                               {{-- for user Id --}}
                               <input type="hidden"  name="UserID" id="UserID" value="{{Auth::user()->id}}" required>
                                  {{-- for service provider Id --}}
                               <input type="hidden"  name="EmployeeID" id="EmployeeID" value="{{$user->id}}" required>
      
                              <label for="weight">Weight of Pet </label>
                              <select class="form-control"  name="petWeight" id="petWeight" required>
                                  <option value="10">5kg - 10kg</option>
                                  <option value="25">11kg - 25kg</option>
                                  <option value="40">25kg - 40kg</option>
                                  <option value="20">41kg - 50kg</option>
                              </select>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group mb-3">
                              <label>Service Type</label>
                              <div>
                                  @foreach(['pet boarding', 'pet sitting', 'pet grooming', 'pet healthcare', 'pet training'] as $serviceType)
                                      <label>
                                          <input type="checkbox" name="serviceTypes[]" value="{{ $serviceType }}">
                                          {{ ucwords(str_replace('_', ' ', $serviceType)) }}
                                      </label><br>
                                  @endforeach
                              </div>
                          </div>
                      </div>
      
      
                      
                  </div>

                    <div class="row">
                
                      <div class="col-md-6">
                          <div class="form-group mb-3">
                              <label for="StartTime">Date Start</label>
                              <input type="date" class="form-control" name= "StartTime" id="StartTime" required>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group mb-3">
                              <label for="EndTime">Date End</label>
                              <input type="date" class="form-control" name= "EndTime" id="EndTime" required>
                          </div>
                      </div>
                  </div>
          
                    <div class="row">
                      <div class="col-md-6">
                          <div class="form-group mb-3">
                              <label for="petType">Pet Type</label>
                              <select class="form-control" name="petType" id="petType" required>
                                  <option value="dog">Dog</option>
                                  <option value="cat">Cat</option>
                                  <option value="hamster">Hamster</option>
                                  <option value="parrot">Parrot</option>
                                  <option value="rabbit">Rabbit</option>
                                  <option value="fish">Fish</option>
                                  <option value="turtle">Turtle</option>
                                  <option value="guinea_pig">Guinea Pig</option>
                                  <option value="snake">Snake</option>
                                  <option value="ferret">Ferret</option>
                                  <option value="bird">Bird</option>
                                  <option value="horse">Horse</option>
                                  <option value="mouse">Mouse</option>
                                  <option value="lizard">Lizard</option>
                                  <!-- Add more animals as needed -->
                              </select>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <label for="displayAmount">Booking Amount</label>
                          <input type="text" id="displayAmount" class="form-control" readonly>
                      </div>
                  </div>
                  

                  <h3> Location</h3>
                  <hr>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group mb-3">
                        <label for="startDate">Region</label>
                        <input type="text" class="form-control" name="region" id="region" value="{{auth::user()->region}}" required>
                    </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group mb-3">
                        <label for="startDate">Province</label>
                        <input type="text" class="form-control" name="province" id="province" value="{{auth::user()->province}}" required>
                    </div>
                    </div>
                  </div>

                  <div class="row">

                    <div class="col-lg-6">
                      <div class="form-group mb-3">
                        <label for="startDate">City/Municipality</label>
                        <input type="text" class="form-control"  name="city" id="city" value="{{auth::user()->city}}" required>
                      </div>
                    </div>
                    
                    <div class="col-lg-6">
                      <div class="form-group mb-3">
                        <label for="startDate">Barangay</label>
                        <input type="text" class="form-control" name="barangay" id="barangay" value="{{auth::user()->barangay}}"required>
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label for="comments">Additional Comments</label>
                            <textarea class="form-control" name="comments" id="comments" rows="3"></textarea>
                        </div>
                    </div>
                    </div>


                  <hr>  
                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block"> Book now</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- Modal -->




                      <div class="card mt-3">
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Website</h6>
                            <span class="text-secondary">https://bootdey.com</span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github mr-2 icon-inline"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>Github</h6>
                            <span class="text-secondary">bootdey</span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>Twitter</h6>
                            <span class="text-secondary">@bootdey</span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>Instagram</h6>
                            <span class="text-secondary">bootdey</span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
                            <span class="text-secondary">bootdey</span>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-md-8">
                      <div class="card mb-3">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Full Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                              {{$user->name}}
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                              {{$user->email}}
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Phone</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                              {{$user->contact_number}}
                            </div>
                          </div>
                          
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Address</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                              {{$user->barangay}} {{$user->city}}, {{$user->province}}
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Backgorund</h6>
                                  </div>
                                  <div class="col-sm-9 text-secondary">
                                   Pet {{$user->serviceType}}
                                  </div>
                          </div>
                          <hr>
                        </div>
                      </div>
        
                      <div class="row">
                        <div class="col-sm-12 mb-3">
                          <div class="card h-100">
                            <div class="card-body">
                              <h2 class="d-flex align-items-center mb-3">About Me</h2>

                              <p>{{$user->description}}
                            </p>
                            </div>
                          </div>
                        </div>
                        
      


                    </div>
                  </div>
                  <H2 style="margin-top: 20px">Reviews({{ $totalReviewsCount}})   ⭐</H2>
                </div>
                
                @foreach ($reviews as $review)
                <div class="row">
                    <div class="col-md-12">
                        <div class="media g-mb-30 media-comment">
                            <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
                                <div class="g-mb-15">
                                    <div style="display: flex; align-items: center">
                                        <img class="d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15" src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Image Description">
                                        <h5 class="h5 g-color-gray-dark-v1 mb-0" style="font-size: 22px;">{{$review->employee->name}}</h5>
                                        <span class="g-color-black-dark-v5 g-font-size-24" style="margin-left: 20px; font-size: 22px;">{{ $review->star_rating }}⭐</span>
                                    </div>
                                </div>
                                <p>{{ $review->Comments }}</p>
                                <ul class="list-inline d-sm-flex my-0">
                                    <li class="list-inline-item g-mr-20">
                                        <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#!">
                                            <i class="fa fa-thumbs-up g-pos-rel g-top-1 g-mr-3"></i>
                                            178
                                        </a>
                                    </li>
                                    <li class="list-inline-item g-mr-20">
                                        <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#!">
                                            <i class="fa fa-thumbs-down g-pos-rel g-top-1 g-mr-3"></i>
                                            34
                                        </a>
                                    </li>
                                    <li class="list-inline-item ml-auto">
                                        <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#!">
                                            <i class="fa fa-reply g-pos-rel g-top-1 g-mr-3"></i>
                                            Reply
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            




              <!-- Pagination links -->
              <div  class="mt-4 pt-2 col-lg-12 d-flex justify-content-center" >
                {{ $reviews->links() }}
           </div>
          
 


        <!-- /#page-content-wrapper -->
      </div>

    </div>

  


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <Script>
      var el = document.getElementById("wrapper");
      var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </Script>


<script>
  function calculateAmount() {
      var basePrice = 10;
      var petWeight = parseFloat($('#petWeight').val());
      var startTime = new Date($('#StartTime').val());
      var endTime = new Date($('#EndTime').val());
      var numberOfDays = Math.ceil((endTime - startTime) / (1000 * 60 * 60 * 24));

      // Get selected service types
      var selectedServiceTypes = $('input[name="serviceTypes[]"]:checked').map(function(){
          return $(this).val();
      }).get();

      // Disable conflicting checkboxes
      if ($.inArray('pet boarding', selectedServiceTypes) !== -1) {
          $('input[name="serviceTypes[]"][value="pet sitting"]').prop('disabled', true);
      } else {
          $('input[name="serviceTypes[]"][value="pet sitting"]').prop('disabled', false);
      }

      if ($.inArray('pet sitting', selectedServiceTypes) !== -1) {
          $('input[name="serviceTypes[]"][value="pet boarding"]').prop('disabled', true);
      } else {
          $('input[name="serviceTypes[]"][value="pet boarding"]').prop('disabled', false);
      }

      // Iterate through selected service types
      $.each(selectedServiceTypes, function(index, serviceType){
          // Customize the logic based on each service type
          switch (serviceType) {
              case 'pet boarding':
              case 'pet sitting':
              case 'pet training':
                  basePrice += 500 * numberOfDays; // Additional cost for each day of boarding, sitting, or training
                  break;
              case 'pet grooming':
              case 'pet healthcare':
                  basePrice += 500; // Additional cost for pet grooming or healthcare
                  break;
              // Add more cases as needed
          }
      });

      if ($.inArray('pet sitting', selectedServiceTypes) !== -1) {
          basePrice += 100; // Additional cost for transportation in pet sitting
      }

      var amount = basePrice + petWeight;

      // Display the calculated amount in the read-only input field
      $('#displayAmount').val(amount.toFixed(2) + ' PHP');
  }

  // Attach the calculateAmount function to relevant form elements
  $('#petWeight, input[name="serviceTypes[]"], #StartTime, #EndTime').on('change', calculateAmount);
</script>
</body>
</html>