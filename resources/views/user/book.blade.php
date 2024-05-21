<!DOCTYPE html>
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="/template dashboard/styles.css" />
    <title>Bootstap 5 Responsive Admin Dashboard</title>


    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">

</head>
<style>

[class^=flaticon-]:before,
[class*=" flaticon-"]:before,
[class^=flaticon-]:after,
[class*=" flaticon-"]:after {
    font-size: inherit;
    margin-left: 0;
}

body {
      background-color: #f8f9fa;
    }

    .booking-form {
      max-width: 700px;
      margin: 50px auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
</style>
<body>
    <div class="d-flex" id="wrapper">
        @include('user.layout.sidebar')

        <!-- Page Content -->
        @include('user.layout.header')

    

        <div class="container">
    <div class="booking-form" style="border-radius: 5%">
        <h2  class="mb-4" style="text-align: center; margin: 20px 0px;">Pet Service Random Booking</h2>

        <form method="post" action="/user/bookings/create">
            
            @csrf

           

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                         {{-- for user Id --}}
                         <input type="hidden"  name="UserID" id="UserID" value="{{Auth::user()->id}}" required>

                        <label for="weight">Weight of Pet</label>
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


            <div class="row">
                
                <h3>Location</h3>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                            <label for="startDate">Region</label>
                            <input type="text" class="form-control" name="region" id="region" value="{{Auth::user()->region}}" required>
                        </div>
                </div>

                <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="startDate">Province</label>
                            <input type="text" class="form-control" name="province" id="province" value="{{Auth::user()->province}}" required>
                        </div>
                </div>

                <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                            <label for="startDate">City/Municipality</label>
                            <input type="text" class="form-control"  name="city" id="city" value="{{Auth::user()->city}}" required>
                    </div>
                </div>
          
                <div class="col-md-6">
                    <div class="form-group mb-3">
                            <label for="startDate">Barangay</label>
                            <input type="text" class="form-control" name="barangay" id="barangay" value="{{Auth::user()->barangay}}"required>
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


                <div class="form-group">
                    <input type="checkbox" name="agree_terms" id="agree_terms" required>
                    <label for="agree_terms">I agree to the terms and conditions</label>
                </div>

                <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#termsModal">
                    View Terms and Conditions
                </button>
                

            <div class="row">
                <div class="col-md-12">
                <button type="submit" class="btn btn-primary mb-3">Book Now</button> 
                    {{-- <a href="/user/booking/service" type="submit" class="btn btn-primary mb-3">Book Now</a> --}}
                </div>
            </div>
        </form>

    </div>

</div>
</div>

           <!-- Terms and conditions Modal -->
<div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="termsModalLabel">Terms and Conditions - Pet Care Services</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <h2 style="text-align: center">Introduction</h2>
                <p>Welcome to our Pet Care System! These terms and conditions outline the rules and regulations for the use of our services, including Boarding, Sitting, and Grooming, provided by TempawCare. By accessing and using our services, you accept and agree to abide by these terms.</p>

                <h2 style="text-align: center">Definitions</h2>
                <ul>
                    <li><strong>We:</strong>TempawCare.</li>
                    <li><strong>Services:</strong> Collectively refers to Boarding, Sitting, Grooming, and any other pet care services provided by the Company.</li>
                    <!-- Add other definitions as needed -->
                </ul>

                <h2 style="text-align: center">Service Agreement</h2>
                <h4>Booking and Payment:</h4>
                <ul>
                    <li>Clients must book services in advance and provide accurate information about their pets.</li>
                    <li>Payment for services is due at the time of booking.</li>
                </ul>

                <h4>Cancellation Policy:</h4>
                <ul>
                    <li>Clients must notify us of any cancellations at least 2 hours before the scheduled service to receive a refund or credit.</li>
                </ul>

                <h4>Health and Vaccinations:</h4>
                <ul>
                    <li>Pets must be in good health and up-to-date on vaccinations.</li>
                    <li>Clients must provide proof of vaccinations upon request.</li>
                </ul>

                <h4>Emergency Situations:</h4>
                <ul>
                    <li>In the event of an emergency, we will make every effort to contact the client. If unavailable, the Company is authorized to seek emergency veterinary care for the pet at the client's expense.</li>
                </ul>

                <!-- Repeat the pattern for Boarding, Sitting, Grooming, Liability and Indemnity, and Miscellaneous sections -->
                <!-- Boarding -->
                <h2 style="text-align: center">Boarding</h2>

                <h3>Boarding Facility:</h3>
                <ul>
                    <li>Our boarding facility is designed to provide a safe and comfortable environment for pets.</li>
                    <li>Pets will be provided with adequate food, water, and shelter.</li>
                </ul>

                <h3>Health and Well-being:</h3>
                <ul>
                    <li>We will take reasonable care of each pet, but the client acknowledges that boarding may involve inherent risks, and the Company is not liable for unforeseen incidents.</li>
                </ul>

                <!-- Sitting -->
                <h2 style="text-align: center">Sitting</h2>

                <h3>In-Home Sitting:</h3>
                <ul>
                    <li>Our sitting services may include in-home visits to care for pets.</li>
                    <li>Clients must provide necessary access to the pet's living areas.</li>
                </ul>

                <h3>Key and Access:</h3>
                <ul>
                    <li>Clients must provide a secure means of access to their homes for our pet sitters.</li>
                    <li>We will safeguard keys and access information.</li>
                </ul>

                <!-- Grooming -->
                <h2 style="text-align: center">Grooming</h2>

                <h4>Grooming Services:</h4>
                <ul>
                    <li>Grooming services will be performed with care and in accordance with the client's specifications.</li>
                    <li>Clients must inform us of any health or behavioral issues that may affect the grooming process.</li>
                </ul>

                <h4>Matted Coats and Health Issues:</h4>
                <ul>
                    <li>In cases of severely matted coats or health issues, we reserve the right to refuse or modify grooming services to prioritize the pet's well-being.</li>
                </ul>

                <!-- Liability and Indemnity -->
                <h2 style="text-align: center">Liability and Indemnity</h2>

                <h4>Liability:</h4>
                <ul>
                    <li>The Company is not liable for injury, loss, or damage to pets unless due to our negligence.</li>
                    <li>Clients are responsible for any harm caused by their pets to other pets, individuals, or property.</li>
                    <li>The Company is not liable for the actions or negligence of Service Providers.</li>
                    <li>Service Providers are responsible for any harm or damage caused to clients, pets, or property during the provision of services.</li>
                    <li>Service Providers agree to indemnify and hold the Company harmless from any claims, damages, or liabilities arising from their services.</li>
                </ul>

                <h4>Indemnity:</h4>
                <ul>
                    <li>Clients agree to indemnify and hold the Company harmless from any claims, damages, or liabilities arising from the use of our services.</li>
                </ul>

                <!-- Miscellaneous -->
                <h2 style="text-align: center">Miscellaneous</h2>

                <h4>Changes to Terms:</h4>
                <ul>
                    <li>The Company reserves the right to update or modify these terms and conditions at any time. Clients will be notified of significant changes.</li>
                </ul>

                <h4>Applicable Law:</h4>
                <ul>
                    <li>These terms and conditions are governed by and construed in accordance with the laws of [Your Jurisdiction].</li>
                </ul>

                <p>By using our services, clients acknowledge that they have read, understood, and agreed to these terms and conditions.</p>

                <p>For any questions or concerns, please contact us at 0912356789.</p>

                <p>Thank you for choosing TempawCare for your pet care needs!</p>

            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

        

    
            </div>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            {{-- <script>
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
            
                    // Iterate through selected service types
                    $.each(selectedServiceTypes, function(index, serviceType){
                        // Customize the logic based on each service type
                        switch (serviceType) {
                            case 'pet boarding':
                                basePrice += 500 * numberOfDays; // Additional cost for each day of boarding
                                break;
                            case 'pet sitting':
                                basePrice += 500 * numberOfDays; // Additional cost for each day of sitting
                                basePrice += 100; // Additional cost for transportation in pet sitting
                                break;
                            case 'pet training':
                                basePrice += 500 * numberOfDays; // Additional cost for each day of training
                                break;
                            case 'pet grooming':
                                basePrice += 500; // Additional cost for pet grooming
                                break;
                            case 'pet healthcare':
                                basePrice += 500; // Additional cost for pet healthcare
                                break;
                            // Add more cases as needed
                        }
                    });
            
                    var amount = basePrice + petWeight;
            
                    // Display the calculated amount
                    $('#displayAmount').val(amount.toFixed(2) + ' PHP');
                }
            
                // Attach the calculateAmount function to relevant form elements
                $('#petWeight, input[name="serviceTypes[]"], #StartTime, #EndTime').on('change', calculateAmount);
            </script>
             --}}

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




            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
            <script>
                var el = document.getElementById("wrapper");
                var toggleButton = document.getElementById("menu-toggle");
        
                toggleButton.onclick = function () {
                    el.classList.toggle("toggled");
        
                var active = document.querySelectorAll('list-group-item');
                    $(active).ready(function () {
                    // Add click event listener to each link
                    $('list-group-item').on('click', function () {
                        // Remove active class from all links
                        $('list-group-item').removeClass('active');
                        // Add active class to the clicked link
                        $(this).addClass('active');
                    });
                });
        
                };
            </script>
        </body>
        
        </html>