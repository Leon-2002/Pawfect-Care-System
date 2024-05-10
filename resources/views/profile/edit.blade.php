<x-app-layout>
    
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot> --}}
    
    {{-- @if (Auth::user()->role == 'employee' ){

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">


                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('employee.layout.create-employee-info')

                    </div>
                </div>
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>
    
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
    
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>

    }
        
    @else{ --}}

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>
    
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
    
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    {{-- }
        
    @endif --}}

    
    
    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.js"></script>
    <script type="text/javascript" src="https://f001.backblazeb2.com/file/buonzz-assets/jquery.ph-locations.js"></script>
    {{-- <script type="text/javascript">
        $(function() {
            var my_handlers = {
                fill_provinces: function() {
                    var region_code = $(this).val();
                    $('#province').ph_locations('fetch_list', [{ "region_code": region_code }]);
                },
                fill_cities: function() {
                    var province_code = $(this).val();
                    $('#city').ph_locations('fetch_list', [{ "province_code": province_code }]);
                },
                fill_barangays: function() {
                    var city_code = $(this).val();
                    $('#barangay').ph_locations('fetch_list', [{ "city_code": city_code }]);
                }
            };

            $('#region').on('change', my_handlers.fill_provinces);
            $('#province').on('change', my_handlers.fill_cities);
            $('#city').on('change', my_handlers.fill_barangays);

            // Initialize dropdowns
            $('#region').ph_locations({ 'location_type': 'regions' });
            $('#province').ph_locations({ 'location_type': 'provinces' });
            $('#city').ph_locations({ 'location_type': 'cities' });
            $('#barangay').ph_locations({ 'location_type': 'barangays' });

            // Fetch initial data for the region dropdown
            $('#region').ph_locations('fetch_list');
        });
    </script> --}}
</x-app-layout>
