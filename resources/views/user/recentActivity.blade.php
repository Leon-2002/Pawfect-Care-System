
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <!-- Example link to Bootstrap CSS - adjust the path based on your project -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    
<script src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.6/js/dataTables.bootstrap5.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="/template dashboard/styles.css" />
    <title>Bootstap 5 Responsive Admin Dashboard</title>
    @notifyCss
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
</head>

<body>
    <style>
        .rate {
            float: left;
            height: 46px;
            padding: 0 10px;
            }
            .rate:not(:checked) > input {
            position:absolute;
            display: none;
            }
            .rate:not(:checked) > label {
            float:right;
            width:1em;
            overflow:hidden;
            white-space:nowrap;
            cursor:pointer;
            font-size:30px;
            color:#ccc;
            }
            .rated:not(:checked) > label {
            float:right;
            width:1em;
            overflow:hidden;
            white-space:nowrap;
            cursor:pointer;
            font-size:30px;
            color:#ccc;
            }
            .rate:not(:checked) > label:before {
            content: '★ ';
            }
            .rate > input:checked ~ label {
            color: #ffc700;
            }
            .rate:not(:checked) > label:hover,
            .rate:not(:checked) > label:hover ~ label {
            color: #deb217;
            }
            .rate > input:checked + label:hover,
            .rate > input:checked + label:hover ~ label,
            .rate > input:checked ~ label:hover,
            .rate > input:checked ~ label:hover ~ label,
            .rate > label:hover ~ input:checked ~ label {
            color: #c59b08;
            }
            .star-rating-complete{
               color: #c59b08;
            }
            .rating-container .form-control:hover, .rating-container .form-control:focus{
            background: #fff;
            border: 1px solid #ced4da;
            }
            .rating-container textarea:focus, .rating-container input:focus {
            color: #000;
            }
            .rated {
            float: left;
            height: 46px;
            padding: 0 10px;
            }
            .rated:not(:checked) > input {
            position:absolute;
            display: none;
            }
            .rated:not(:checked) > label {
            float:right;
            width:1em;
            overflow:hidden;
            white-space:nowrap;
            cursor:pointer;
            font-size:30px;
            color:#ffc700;
            }
            .rated:not(:checked) > label:before {
            content: '★ ';
            }
            .rated > input:checked ~ label {
            color: #ffc700;
            }
            .rated:not(:checked) > label:hover,
            .rated:not(:checked) > label:hover ~ label {
            color: #deb217;
            }
            .rated > input:checked + label:hover,
            .rated > input:checked + label:hover ~ label,
            .rated > input:checked ~ label:hover,
            .rated > input:checked ~ label:hover ~ label,
            .rated > label:hover ~ input:checked ~ label {
            color: #c59b08;
            }

            .table.bg-white.rounded.shadow-sm.table-hover {
  box-shadow: 0 4px 6px rgba(0, 0, 0, 5); /* Adjust values as needed */
}
   </style>  
    <div class="d-flex" id="wrapper">
        @include('user.layout.sidebar')

        <!-- Page Content -->
        @include('user.layout.header')

                @auth
                @if (Auth::user() && Auth::user()->region == '')
                    <x-notify::notify type="warning" />
                    @notifyJs
                @else
            @endauth
            <x-notify::notify />
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

                
                <div class="row my-5">
                    <h3 class="fs-4 mb-3">Recent activity</h3>
                    <div class="col">
                        <div class="d-flex justify-content-end pb-3">
                            <div class="form-inline">
                                <label class="text-muted mr-3" for="table-sort">Sort table</label>
                                <select class="form-control" id="table-sort">
                                    <option>All</option>
                                    <option>completed</option>
                                    <option>In progress</option>
                                    <option>canceled</option>
                                    
                                </select>
                            </div>
                        </div>
                        <table class="table bg-white rounded shadow-sm table-hover" id="acitivity-table">
                            <thead>
                                <tr>
                                    <th scope="col">Date</th>
                                    <th scope="col">Service</th>
                                    <th scope="col">Service Provider</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @if($recentActivities->isEmpty())
                                        <tr>
                                            <td colspan="7">No bookings yet.</td>
                                        </tr>
                                @endif
                                @foreach ($recentActivities as $activity)
                                    <tr>
                                        <td>{{ date('F j, Y', strtotime($activity->StartTime))}}</td>
                                        <td>{{  $activity->serviceType  }}</td>
                                       
                                            
                                        @if ($activity->service_provider)
                                            <td>{{ $activity->service_provider->name ?? 'waiting' }}</td>
                                        @else
                                            <td>waiting</td>
                                        @endif
                                       
                                        <td>${{ number_format($activity->amount, 2) }}</td>
                                        @if ($activity->status == "canceled")
                                            <td><span class="badge bg-danger">Canceled</span></td>
                                        @elseif($activity->status == "Accepted")
                                            <td><span class="badge bg-warning text-dark">In Progress</span></td>
                                        @elseif($activity->status == "rejected")
                                            <td><span class="badge bg-danger text-white">rejected</span></td>
                                        @else
                                            <td><span class="badge bg-success">{{ $activity->status }}</span></td>
                                        @endif


                                        <td>
                                            @if($activity->status != "pending")
                                                    @if($activity->isRated == "True")
                                                    <span class="badge bg-success">Rated</span>
                                                    
                                                    @else
                                                   <!-- Button to trigger modal -->
                                                            <button type="button" class="btn btn-outline-success " data-bs-toggle="modal" data-bs-target="#reviewModal{{ $activity->BookingID }}">
                                                                Rate
                                                            </button>
                                                            

                                                          

                                                        
                                                                            <!-- Modal for review form -->
                                                                                <div  class="modal fade" id="reviewModal{{ $activity->BookingID }}" tabindex="-1" aria-labelledby="reviewModalLabel{{ $activity->BookingID }}" aria-hidden="true">
                                                                                    <div class="modal-dialog">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header">
                                                                                                <h3 class="modal-title" id="reviewModalLabel">Submit Review</h3>
                                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                            </div>
                                                                                            <div class="modal-body">
                                                                                                <!-- Review form -->
                                                                                                
                                                                                                <form class="py-2 px-4" action="/user/recent-Activity/review" style="box-shadow: 0 0 10px 0 #ddd;" method="POST" autocomplete="off">
                                                                                                    @csrf
                                                                                                    <div class="form-group row">
                                                                                                        
                                                                                                        <input type="hidden" name="booking_id" value="{{ $activity->BookingID }}">
                                                                                                        <input type="hidden" name="EmployeeID" value="{{ $activity->service_provider->id }}">
                                                                                                        
                                                                                                        

                                                                                                        <div class="col">
                                                                                                            <div class="rate">
                                                                                                                <!-- Existing code for star ratings -->
                                                                                                                <input type="radio" id="star5" class="rate text-center mt-2 mb-4" name="rating" value="5"/>
                                                                                        <label for="star5" title="text">5 stars</label>
                                                                                        <input type="radio" checked id="star4" class="rate" name="rating" value="4"/>
                                                                                        <label for="star4" title="text">4 stars</label>
                                                                                        <input type="radio" id="star3" class="rate" name="rating" value="3"/>
                                                                                        <label for="star3" title="text">3 stars</label>
                                                                                        <input type="radio" id="star2" class="rate" name="rating" value="2">
                                                                                        <label for="star2" title="text">2 stars</label>
                                                                                        <input type="radio" id="star1" class="rate" name="rating" value="1"/>
                                                                                        <label for="star1" title="text">1 star</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="form-group row mt-4">
                                                                                                        <div class="col">
                                                                                                            <textarea class="form-control" name="comment" rows="6" placeholder="Comment" maxlength="200"></textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="mt-3 text-right">
                                                                                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                                                                                        <button type="submit" class="btn btn-sm py-2 px-3 btn-outline-primary">Submit</button>
                                                                                                    </div>
                                                                                                </form>
                                                                                                <!-- End of review form -->
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                    @endif
                                            
                                            @else
                                            <span class="badge bg-warning">Waiting</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>

                    
            
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

        new DataTable('#activity-table', {
             select: true
        });
    </script>
    
    {{-- sort table --}}
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    
</body>

</html>