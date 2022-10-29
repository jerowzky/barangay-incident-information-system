<x-app-layout pageName="{{ __('New User') }}">
    <x-slot name="breadcrumbs">
        <x-breadcrumb-item label="Users" href="{{ route('users') }}" icon="user"/>
        <x-breadcrumb-item label="New User" icon="user-plus" iscurrent=true/>
    </x-slot>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                   <h4 class="card-title"> <i class="feather icon-user-plus"></i> {{ __('New User') }}</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('users.postcreate') }}" method="post" class="needs-validation @if($errors->any()) was-validated @endif" novalidate>
                        @csrf
                        {{--  Basic Information  --}}
                        <h5>Basic Information</h5>
                        <div class="form-row mb-3">
                            <div class="form-group col-md-4 fill">
                                <label for="first_name" class="floating-label">First Name<x-form.required-asterisk/></label>
                                <input type="text" name="first_name" id="first_name" class="form-control" value="{{ old('first_name') }}" required>
                            </div>
                            <div class="form-group col-md-4 fill">
                                <label for="middle_name" class="floating-label">Middle Name<x-form.optional-field/></label>
                                <input type="text" name="middle_name" id="middle_name" value="{{ old('middle_name') }}" class="form-control">
                            </div>
                            <div class="form-group col-md-4 fill">
                                <label for="last_name" class="floating-label">Last Name<x-form.required-asterisk/></label>
                                <input type="text" name="last_name" id="last_name" class="form-control" value="{{ old('last_name') }}" required>
                            </div>
                        </div>
                        <h5>Contact Information</h5>
                        {{--  Contact Information  --}}
                        <div class="form-row mb-3">
                            <div class="form-group col-md-6 fill">
                                <label for="email" class="floating-label">Email address<x-form.required-asterisk/></label>
                                <input type="text" name="email" id="email" class="form-control" autocomplete="email" value="{{ old('email') }}" required>
                            </div>
                            <div class="form-group col-md-6 fill">
                                <label for="contact_number" class="floating-label">Contact Number<x-form.optional-field/></label>
                                <input type="text" name="contact_number" id="contact_number" class="form-control" value="{{ old('contact_number') }}" autocomplete="mobile">
                            </div>
                        </div>
                        
                        <h5>Account Configuration</h5>
                        <div class="form-row">
                            <div class="form-group col-md-6 fill">
                                <label for="password" class="floating-label">Password<x-form.required-asterisk/></label>
                                <input type="password" name="password" id="password" class="form-control" autocomplete="new-password" required>
                            </div>
                            <div class="form-group col-md-6 fill">
                                <label for="password" class="floating-label">Retype Password<x-form.required-asterisk/></label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="role" class="floating-label">Role <x-form.required-asterisk/></label>
                            <select name="role" id="role" class="form-control" required>
                                @if(count($roles) > 0)
                                <option value=""></option>
                                @endif
                                @foreach ($roles as $roleName => $role)
                                    <option value="{{ $roleName }}" {{ old('role') == $roleName ? 'selected' : '' }}>{{ $role }}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="hidden" name="barangay_id" value="{{ auth()->user()->barangay_id }}">
                        
                        <div class="form-group text-center">
                            <button class="btn btn-outline-primary has-ripple">{{ __('Create User') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>