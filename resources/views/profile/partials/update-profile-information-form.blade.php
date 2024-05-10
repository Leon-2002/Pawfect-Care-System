<section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Profile Information') }}
            </h2>
    
            <p class="mt-1 text-sm text-gray-600">
                {{ __("Update your account's profile information and email address.") }}
            </p>
        </header>
    
        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>
    
        <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
            @csrf
            @method('patch')
    
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>
            
            <div>
                <x-input-label for="contact_number" :value="__('contact_number')" />
                <x-text-input id="contact_number" name="contact_number" type="contact_number" class="mt-1 block w-full" :value="old('contact_number', $user->contact_number)" required autocomplete="contact_number" />
                <x-input-error class="mt-2" :messages="$errors->get('contact_number')" />
                    
            </div>

            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />
                    
           

            

            
                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div>
                        <p class="text-sm mt-2 text-gray-800">
                            {{ __('Your email address is unverified.') }}
    
                            <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                {{ __('Click here to re-send the verification email.') }}
                            </button>
                        </p>
    
                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 font-medium text-sm text-green-600">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </p>
                        @endif
                    </div>
                @endif
            </div>
    
            <div>
                <x-input-label for="Region" :value="__('Region')" />
                <x-text-input id="region" name="region" type="text" class="mt-1 block w-full" :value="old('Region', $user->region)" required autofocus autocomplete="Region" />
                <x-input-error class="mt-2" :messages="$errors->get('region')" />
            </div>
    
            <div>
                <x-input-label for="province" :value="__('province')" />
                <x-text-input id="province" name="province" type="text" class="mt-1 block w-full" :value="old('province', $user->province)" required autofocus autocomplete="province" />
                <x-input-error class="mt-2" :messages="$errors->get('province')" />
            </div>
    
            <div>
                <x-input-label for="city" :value="__('city')" />
                <x-text-input id="city" name="city" type="text" class="mt-1 block w-full" :value="old('city', $user->city)" required autofocus autocomplete="city" />
                <x-input-error class="mt-2" :messages="$errors->get('city')" />
            </div>
    
            <div>
                <x-input-label for="barangay" :value="__('barangay')" />
                <x-text-input id="barangay" name="barangay" type="text" class="mt-1 block w-full" :value="old('barangay', $user->barangay)" required autofocus autocomplete="barangay" />
                <x-input-error class="mt-2" :messages="$errors->get('barangay')" />
            </div>
            
            <x-text-input type="hidden" name="serviceType"  id="serviceType" value="" />
            <x-text-input type="hidden" name="description"  name="serviceType" value=""/>
            
            @if (Auth::user()->role == 'employee')
                <div>
                    <x-input-label for="serviceType" :value="__('serviceType')" />
                    {{-- <x-text-input id="serviceType" name="serviceType" type="text" class="mt-1 block w-full" :value="old('serviceType', $user->serviceType)" required autofocus autocomplete="serviceType" />
                    <x-input-error class="mt-2" :messages="$errors->get('serviceType')" /> --}}

                        <x-select id="serviceType" class="mt-1 block w-full" name="serviceType">
                            <option  selected disabled hidden  >{{ __('Choose an option') }}</option>
                            <option value="grooming">Pet Grooming</option>
                            <option value="boarding">Boarding</option>
                            <option value="sitting">Sitter</option>
                            <option value="training">Training</option>
                            <option value="healthcare">Pet Health Care</option>
                        </x-select>
                </div>
            
                <div>
                    <x-input-label for="description" :value="__('description')" />
                    <x-textarea id="description" name="description" class="mt-1 block w-full" value="">{{old('description') ?? $user->description}}</x-textarea>

                </div>
            
            @else
                <x-text-input type="hidden" name="serviceType"  id="serviceType" value="" />
                <x-text-input type="hidden" name="description"  name="serviceType" value=""/>
            
          
            @endif        
            
            
    
            
            <div class="flex items-center gap-4">
                <x-primary-button>{{ __('Save') }}</x-primary-button>
    
                @if (session('status') === 'profile-updated')
                    <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600"
                    >{{ __('Saved.') }}</p>
                @endif
            </div>
        </form>
    </section>
