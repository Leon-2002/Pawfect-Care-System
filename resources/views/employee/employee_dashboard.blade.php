
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
</head>

<body>
    <div class="d-flex" id="wrapper">
        @include('employee.layout.sidebar')

        <!-- Page Content -->
        @include('employee.layout.header')

                @auth
                @if (Auth::user() && Auth::user()->region == '')
                    <x-notify::notify type="warning" />
                    @notifyJs
                @endif
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
                                    <th scope="col">Customer</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($recentActivities as $activity)
                                    <tr>
                                        <td>{{ date('F j, Y', strtotime($activity->StartTime))}}</td>
                                        <td>{{ $activity->serviceType }}</td>
                                        <td>{{ $activity->user->name }}</td>
                                        <td>${{ number_format($activity->amount, 2) }}</td>
                                        @if ($activity->status == "canceled")
                                            <td><span class="badge bg-danger">Canceled</span></td>
                                        @elseif($activity->status == "Accepted")
                                            <td><span class="badge bg-warning text-dark">In Progress</span></td>
                                        @else
                                            <td><span class="badge bg-success">{{ $activity->status }}</span></td>
                                        @endif
                                    </tr>
                                @endforeach
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