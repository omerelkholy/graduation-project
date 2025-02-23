<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#10b981] dark:text-[#10b981] leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-[#1f1f23] dark:bg-[#1f1f23] shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-[#1f1f23] dark:bg-[#1f1f23] shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-[#1f1f23] dark:bg-[#1f1f23] shadow sm:rounded-lg hover:bg-[#f5594d] focus:outline-none focus:ring-2 focus:ring-offset-2  transition ease-in-out duration-500 group">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
