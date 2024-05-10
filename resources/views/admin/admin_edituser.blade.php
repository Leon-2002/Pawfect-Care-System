<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <x-guest-layout>
        
        <form method="POST" action="{{ route('users.update', ['user' => $user->id]) }}">
            @csrf
            @method('PUT')
            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
    
            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $user->email )" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
    
            <!--For user/employee  selection-->
            <div class="mt-4">
                <x-input-label for="role" value="{{ __('Register as: ') }}" />
               <select  id="role" name="role" class="block mt-1 w-full" type="text" value="old('role',$user->role )" >
                <option value="user">User</option>
                <option value="employee">Employee</option>
               </select> 
    
            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
    
                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" 
                                value="old('password',$user->password )"/>
                                
    
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
    
        
    
            <div class="flex items-center justify-end mt-4">
    
                <x-primary-button class="ms-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </x-guest-layout>
    
</body>
</html>