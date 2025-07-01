<x-doctor-layout>
    <x-toast />
    <div class="mt-0 ">
        <div class="max-w-7xl mx-auto space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('doctor.profile.form-update-profile')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('doctor.profile.form-update-password')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('doctor.profile.form-delete-account')
                </div>
            </div>
        </div>
    </div>
</x-doctor-layout>
