<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Employee Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
                {{ __("Update your account's profile information and email address.") }}
            </p>
        </header>


    <form method="post" action="profile/store" class="mt-6 space-y-6">
        @csrf

       

        <div>
            <x-input-label for="ServiceName" />
            <select name="ServiceName" id="ServiceName">
            <option value="Pet Sitter">Pet Sitter</option>
            <option value="PEt Boarding">PEt boarding</option>
            <option value="Pet Grooming">Pet Grooming</option>
            <option value="Pet Healtcare">Pet Healthcare</option>
            <option value="Pet Healtcare">Pet Healthcare</option>
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('ServiceName')" />
        </div>


        <div>
            <x-input-label for="Price" :value="__('Price')" />
            <x-text-input id="Price" name="Price" type="decimal" class="mt-1 block w-full"  required autofocus autocomplete="Price" />
            <x-input-error class="mt-2" :messages="$errors->get('Price')" />
        </div>

        <div>
            <x-input-label for="Description"  :value="__('Description')" />
            <input id="Description" name="Description" type="textarea" class="mt-1 block w-full"  required autofocus autocomplete="Description" />
            <x-input-error class="mt-2" :messages="$errors->get('Description')" />
        </div>

         
        <x-input id="employeeID" name="employeeID" type="hidden" class="mt-1 block w-full"  value="{{ Auth::user()->id}}" required autofocus autocomplete="description" />
        
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