<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Register New User') }}
        </h2>
    </x-slot>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- First Name -->
            <div>
                <x-label for="first_name" :value="__('First Name')" />

                <x-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required autofocus />
            </div>

            <!-- First Name -->
            <div class="mt-4">
                <x-label for="middle_name" :value="__('Middle Name')" />

                <x-input id="middle_name" class="block mt-1 w-full" type="text" name="middle_name" :value="old('middle_name')" />
            </div>

            <div class="mt-4">
                <x-label for="last_name" :value="__('Last Name')" />

                <x-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" />
            </div>

            <div class="mt-4">
                <x-label for="contact_number" :value="__('Contact Number')" />

                <x-input id="contact_number" class="block mt-1 w-full" type="tel" name="contact_number" :value="old('contact_number')" pattern="[0-9]{3}[0-9]{4}[0-9]{3}" placeholder=""/>
            </div>
            <div class="mt-4">
                <x-label for="martial_status" :value="__('Martial Status')" />

                <x-input id="single" class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="radio" name="martial_status" :value="__('Single')"/><label class="form-check-label inline-block text-gray-800" for="single"> Single</label><br />
                <x-input id="married" class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="radio" name="martial_status" :value="__('Married')"/><label class="form-check-label inline-block text-gray-800" for="married"> Married</label><br />
                <x-input id="widowed" class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="radio" name="martial_status" :value="__('Widowed')"/><label class="form-check-label inline-block text-gray-800" for="widowed"> Widowed</label><br />
                <x-input id="divorced" class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="radio" name="martial_status" :value="__('Divorced')"/> <label class="form-check-label inline-block text-gray-800" for="divorced"> Divorced</label>

            </div>
            <div class="mt-4">
                <x-label for="date_of_birth" :value="__('Date Of Birth')" />
                <div class="relative">
                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                      <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                    </div>
                <x-input datepicker datepicker-format="yyyy/mm/dd" id="date_of_birth" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" name="date_of_birth" :value="old('date_of_birth')" placeholder="Select date"/>
                </div>
            </div>
            <div class="mt-4">
                <x-label for="date_of_anniversary" :value="__('Date Of Anniversary')" />
                <div class="relative">
                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                      <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                    </div>
                <x-input datepicker datepicker-format="yyyy/mm/dd" id="date_of_anniversary" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" name="date_of_anniversary" :value="old('date_of_anniversary')" placeholder="Select date"/>
                </div>
            </div>
            <div class="mt-4">
                <x-label for="date_of_joining" :value="__('Date Of Joining')" />
                <div class="relative">
                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                      <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                    </div>
                <x-input datepicker datepicker-format="yyyy/mm/dd" id="date_of_joining" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" name="date_of_joining" :value="old('date_of_joining')" placeholder="Select date"/>
                </div>
            </div>
            <div class="mt-4">
                <x-label for="role" :value="__('Select Role')" />
                <select id="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="role">
                    <option value="Admin">Admin</option>
                    <option value="Customer">Customer</option>
                    <option value="Account Manager">Account Manager</option>
                </select>
            </div>
            <div class="mt-4">
                <x-label for="department" :value="__('Select Department')" />
                <select id="department" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="department">
                    <option value="Information Techonology">Information Techonology</option>
                    <option value="Finance">Finance</option>
                    <option value="Marketing">Marketing</option>
                    <option value="Human Resource">Human Resource</option>
                    <option value="Marketing">Marketing</option>
                    <option value="Legal Department">Legal Department</option>
                </select>
                <div class="mt-4">
                    <x-label for="designation" :value="__('Select Designation')" />
                    <select id="designation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="designation">
                        <option value="Director">Director</option>
                        <option value="CEO">CEO</option>
                        <option value="COO">COO</option>
                        <option value="CFO">CFO</option>
                        <option value="CTO">CTO</option>
                        <option value="CMO">CMO</option>
                        <option value="Manager">Manager</option>
                        <option value="Employee">Employee</option>
                    </select>
            </div>

              <!-- Email Address -->
              <div class="mt-4">
                <x-label for="email" :value="__('Office Email (primary)')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

              <!-- Personal Email Address -->
              <div class="mt-4">
                <x-label for="personal_email_address" :value="__('Personal Email Address')" />

                <x-input id="personal_email_address" class="block mt-1 w-full" type="email" name="personal_email_address" :value="old('personal_email_address')" required />
            </div>


            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-app-layout>
