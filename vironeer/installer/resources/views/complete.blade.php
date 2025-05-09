@extends('installer::layouts.app')
@section('title', installer_trans('Complete'))
@section('content')
    <div class="vironeer-steps-body">
        <p class="vironeer-form-info-text">
            {{ installer_trans('Enter your website and admin access details, make sure you remember the admin access path.') }}
        </p>
        <form id="completeForm" action="{{ route('installer.complete') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">{{ installer_trans('Website name') }} : <span class="required">*</span></label>
                <div class="input-group">
                    <input type="text" name="website_name" value="{{ old('website_name') }}"
                        class="form-control form-control-md" placeholder="{{ installer_trans('Website name') }}"
                        autocomplete="off" required>
                    <span class="input-group-text"><i class="fas fa-globe"></i></span>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">{{ installer_trans('Website URL') }} : <span class="required">*</span></label>
                <div class="input-group">
                    <input type="text" name="website_url" value="{{ old('website_url') ?? url('/') }}"
                        class="form-control form-control-md remove-spaces"
                        placeholder="{{ installer_trans('Website URL') }}" required>
                    <span class="input-group-text"><i class="fas fa-link"></i></span>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">{{ installer_trans('Admin email') }} : <span class="required">*</span></label>
                <div class="input-group rtl">
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control form-control-md"
                        placeholder="john@example.com" autocomplete="off" required>
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">{{ installer_trans('Admin password') }} : <span class="required">*</span></label>
                <div class="input-group rtl">
                    <input type="password" name="password" class="form-control form-control-md"
                        placeholder="{{ installer_trans('Password') }}" autocomplete="off" required>
                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                </div>
            </div>
            <div class="mb-4">
                <label class="form-label">{{ installer_trans('Confirm admin password') }} : <span
                        class="required">*</span></label>
                <div class="input-group rtl">
                    <input type="password" name="password_confirmation" class="form-control form-control-md"
                        placeholder="{{ installer_trans('Confirm password') }}" autocomplete="off" required>
                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                </div>
            </div>
        </form>
        <div class="d-flex justify-content-between align-items-center">
            <form action="{{ route('installer.complete.back') }}" method="POST">
                @csrf
                <button class="btn btn-dark btn-md"><i
                        class="fas fa-arrow-left me-2"></i>{{ installer_trans('Back') }}</button>
            </form>
            <button form="completeForm" class="btn btn-primary btn-md">{{ installer_trans('Finish') }}<i
                    class="fas fa-arrow-right ms-2"></i></button>
        </div>
    </div>
    @push('scripts')
        <script>
            $("#adminPath").on('input', function() {
                $(this).val($(this).val().replace(/[^a-zA-Z0-9 _]/g, ""));
            });
        </script>
    @endpush
@endsection
