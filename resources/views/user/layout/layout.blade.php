
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


</style>
<body>
    <div class="d-flex" id="wrapper">
        @include('user.layout.sidebar')

        <!-- Page Content -->
        @include('user.layout.header')

    



        

    
            </div>

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