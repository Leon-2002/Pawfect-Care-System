<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Employee Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
                {{ __("Update your account's profile information and email address.") }}
            </p>
        </header>


    <form method="post" action="{{  route('services.update', Auth::user()->id)  }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="ServiceName" :value="__('ServiceName')" />
            <x-text-input id="ServiceName" name="ServiceName" type="ServiceName" class="mt-1 block w-full" :value="old('ServiceName', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>


        <div>
            <x-input-label for="Region" :value="__('Region')" />
            <x-text-input id="region" name="region" type="text" class="mt-1 block w-full" :value="old('name', $user->region)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('region')" />
        </div>

        <div>
            <x-input-label for="province" :value="__('province')" />
            <x-text-input id="province" name="province" type="text" class="mt-1 block w-full" :value="old('name', $user->province)" required autofocus autocomplete="province" />
            <x-input-error class="mt-2" :messages="$errors->get('province')" />
        </div>

        <div>
            <x-input-label for="city" :value="__('city')" />
            <x-text-input id="city" name="city" type="text" class="mt-1 block w-full" :value="old('name', $user->city)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('city')" />
        </div>

        <div>
            <x-input-label for="barangay" :value="__('barangay')" />
            <x-text-input id="barangay" name="barangay" type="text" class="mt-1 block w-full" :value="old('name', $user->barangay)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('barangay')" />
        </div>




      

        {{-- <div class="col-md-12 ">
            <label class="labels">Region </label>
            <br><select name="region" id="region"></select>
        </div>
        <div class="col-md-12 mt-2"><label class="labels">Province</label><br><select name="Province" id="province"></select></div>
        <div class="col-md-6  mt-2"><label class="labels">Cities</label><br><select name="city" id="city" value="calamba"></select></div>
        <div class="col-md-6  mt-2"><label class="labels">Barangay</label><br><select name="Barangay" id="barangay"></select></div> --}}

        
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