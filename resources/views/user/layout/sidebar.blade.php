
<link rel="stylesheet" href="dashboard template/assets/css/style.css">
<!-- =============== Navigation ================ -->

    {{-- <div class="navigation">
        <ul>
            <li>
                <a href="#">
                    <span class=" fa fa-paw icon">
                       
                    </span>
                    <span class="title">Tempaw Care</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <span class="icon">
                        <ion-icon name="home-outline"></ion-icon>
                    </span>
                    <span class="title">Dashboard</span>
                </a>
            </li>

            <li>
                <a href="/redirects/customer">
                    <span class="icon">
                        <ion-icon name="people-outline"></ion-icon>
                    </span>
                    <span class="title">Customers</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <span class="icon">
                        <ion-icon name="chatbubble-outline"></ion-icon>
                    </span>
                    <span class="title">Messages</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <span class="icon">
                        <ion-icon name="help-outline"></ion-icon>
                    </span>
                    <span class="title">Help</span>
                </a>
            </li>

            <li>
                <a href="redirects/settings">
                    <a href="{{ route('profile.show') }}">
                
                    <span class="icon">
                        <ion-icon name="settings-outline"></ion-icon>
                    </span>
                    <span class="title">Settings</span>
                </a>
            </li>

            <li>
               
                <a href="#">
                    <span class="icon">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                    </span>
                    <span class="title">Password</span>
                </a>
            </li>

            <li>
                     <a href="{{ route('logout') }}">
                
                    <span class="icon">
                        <ion-icon name="log-out-outline"></ion-icon>
                    </span>
                    <span class="title">Sign Out</span>
                </a>
            </li>
        </ul>
    </div> --}}


     <!-- Sidebar -->
        <div class="" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i
                    class="fas fa-user-secret me-2"></i>TempawCare</div>
            <div class="list-group list-group-flush my-3">
                <a href="{{asset('/dashboard')}}" class=" list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-tachometer-alt me-2"></i>Home</a>
                <a href="/user/personalBooking" class=" list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-tachometer-alt me-2"></i>Select Provider</a>
                <a href="/user/service" class=" list-group-item list-group-item-action bg-transparent second-text fw-bold "><i
                        class="fas fa-project-diagram me-2"></i>Service Provider</a>
                        <a href="/user/bookings" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                            class="fas fa-book me-2"></i> Random booking</a>
                <a href="/user/recent-Activity" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                class="fas fa-history me-2"></i>Recent Activity</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-comment-dots me-2"></i>Messages</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                    class="fas fa-bell me-2"></i>Notifications</a>
                <a href="{{ route('logout') }}" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                        class="fas fa-power-off me-2"></i>Logout</a>
            </div>
        </div>
        
        
      
    

    