@extends('main_views.website_view')
@section('title')
    Profile
@endsection
@section('main')
    @include('sub_views (Website).components.successtoast')
    <div class="container mx-auto p-4">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h1 class="text-2xl font-semibold mb-4">Profile</h1>

            <!-- Profile Update Form -->
            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('PUT')

                <!-- Name -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required
                        autofocus
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    @error('name')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="disabled-input" aria-label="disabled input" disabled
                        value="{{ old('email', $user->email) }}"
                        class="mt-1  block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">

                </div>
                <!-- address -->
                <div class="mb-4">
                    <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                    <input type="text" name="address" id="address" value="{{ old('address', $user->address) }}"
                        required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    @error('address')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex items-center justify-end">
                    <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded">
                        Save Changes
                    </button>
                </div>
            </form>

            <hr class="my-6">

            <!-- Password Update Form -->
            <form method="POST" action="{{ route('profile.password.update') }}">
                @csrf
                @method('PUT')

                <h2 class="text-xl font-semibold mb-4">Change Password</h2>

                <!-- Current Password -->
                <div class="mb-4">
                    <label for="current_password" class="block text-sm font-medium text-gray-700">Current Password</label>
                    <input type="password" name="current_password" id="current_password" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    @error('current_password')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- New Password -->
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">New Password</label>
                    <input type="password" name="password" id="password" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    @error('password')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Confirm New Password -->
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm New
                        Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>

                <div class="flex items-center justify-end">
                    <button type="submit" class="bg-green-500 text-white font-bold py-2 px-4 rounded">
                        Update Password
                    </button>
                </div>
            </form>

            <hr class="my-6">

            <!-- Delete Account Form -->
            <form method="POST" action="{{ route('profile.destroy') }}">
                @csrf
                @method('DELETE')

                <h2 class="text-xl font-semibold mb-4">Delete Account</h2>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <input type="password" name="password" id="password" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    @error('password')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex items-center justify-end">
                    <button type="submit" class="bg-red-500 text-white font-bold py-2 px-4 rounded">
                        Delete Account
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
