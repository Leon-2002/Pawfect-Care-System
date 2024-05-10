
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
    <link rel="stylesheet" href="/profile_templates/styles.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">

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


</style>
<body>
  
    <div class="d-flex" id="wrapper">
        @include('user.layout.sidebar')

        <!-- Page Content-->
        @include('user.layout.header')

        <form action="{{ route('profile.update', [Auth::user()->id]) }}" method="POST">
            @csrf
            @method('PUT')
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                    <span class="font-weight-bold">{{ Auth::user()->name }}</span>
                    <span class="text-black-50">{{ Auth::user()->email }}</span><span> </span>
                    <br>
                    <p><b>Address:</b> <span>Agdangan Quezon</span></p>
                     <p><b>Background :</b> <span>Pet Sitter</span></p>
                </div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">Name</label><input type="text" class="form-control" placeholder="first name" value="{{ Auth::user()->name }}"></div>
                        <div class="col-md-6"><label class="labels">Surname</label><input type="text" class="form-control" value="{{ Auth::user()->email }}" placeholder="surname"></div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">Email ID</label><input type="text" class="form-control" placeholder="enter email id" value="{{ Auth::user()->email }}"></div>
                        <div class="col-md-6"><label class="labels">Mobile Number</label><input type="text" class="form-control" placeholder="enter phone number" value=""></div>
                       
                    </div>
                    <div class="row mt-6">
                         <div class="col-md-12 "><label class="labels">Regions </label><br><select name="region" id="region"></select></div>
                        <div class="col-md-12 mt-2"><label class="labels">Province</label><br><select name="Province" id="province"></select></div>
                        <div class="col-md-6  mt-2"><label class="labels">Cities</label><br><select name="city" id="city" value="calamba"></select></div>
                        <div class="col-md-6  mt-2"><label class="labels">Barangay</label><br><select name="Barangay" id="barangay"></select></div>
                    </div>

                    <div class="row">
                        
                    </div>

                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Save Profile</button></div>
                </div>
            </div>
            {{-- <div class="col-md-4">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center experience"><span>Edit Experience</span><span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Experience</span></div><br>
                    <div class="col-md-12"><label class="labels">Experience in Designing</label><input type="text" class="form-control" placeholder="experience" value=""></div> <br>
                    <div class="col-md-12"><label class="labels">Additional Details</label><input type="text" class="form-control" placeholder="additional details" value=""></div>
                </div>
            </div> --}}
        </div>
    </form>
    
    
    </div>


    




    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.js"></script>
    <!-- script type="text/javascript" src="../../jquery.ph-locations.js"></script -->
    <script type="text/javascript" src="https://f001.backblazeb2.com/file/buonzz-assets/jquery.ph-locations.js"></script>
    <script type="text/javascript">
        
        var my_handlers = {

            fill_provinces:  function(){

                var region_code = $(this).val();
                $('#province').ph_locations('fetch_list', [{"region_code": region_code}]);
                
            },

            fill_cities: function(){

                var province_code = $(this).val();
                $('#city').ph_locations( 'fetch_list', [{"province_code": province_code}]);
            },


            fill_barangays: function(){

                var city_code = $(this).val();
                $('#barangay').ph_locations('fetch_list', [{"city_code": city_code}]);
            }
        };

        $(function(){
            $('#region').on('change', my_handlers.fill_provinces);
            $('#province').on('change', my_handlers.fill_cities);
            $('#city').on('change', my_handlers.fill_barangays);

            $('#region').ph_locations({'location_type': 'regions'});
            $('#province').ph_locations({'location_type': 'provinces'});
            $('#city').ph_locations({'location_type': 'cities'});
            $('#barangay').ph_locations({'location_type': 'barangays'});

            $('#region').ph_locations('fetch_list');
        });
    </script>
       

    <!-- /#page-content-wrapper -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>