@extends('user.layouts.app')
@section('title', translate('Settings', 'settings'))
@section('content')
    <div class="card-v mb-4">
        <h5 class="mb-4">{{ translate('Account details', 'settings') }}</h5>
        <form action="{{ route('user.settings.details') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-section">
                <div class="row g-4 align-items-center mb-3">
                    <div class="col-auto">
                        <img id="preview-img-1" src="{{ $user->getAvatar() }}" alt="{{ $user->getName() }}"
                            class="rounded-circle border" width="80px" height="80px">
                    </div>
                    <div class="col-auto">
                        <button type="button" class="btn btn-outline-secondary btn-sm select-image-button"
                            data-id="1"><i
                                class="fas fa-camera me-2"></i>{{ translate('Choose Image', 'settings') }}</button>
                        <input id="image-targeted-input-1" type="file" name="avatar"
                            accept="image/png, image/jpg, image/jpeg" hidden>
                    </div>
                </div>
            </div>
            <div class="row g-3 mb-3">
                <div class="col-lg-6">
                    <label class="form-label">{{ translate('First Name', 'forms') }}</label>
                    <input type="lastname" name="lastname" class="form-control form-control-md"
                        value="{{ $user->lastname }}" required>
                </div>
                <div class="col-lg-6">
                    <label class="form-label">{{ translate('Last Name', 'forms') }}</label>
                    <input type="firstname" name="firstname" class="form-control form-control-md"
                        value="{{ $user->firstname }}" required>
                </div>
            </div>
            <div class="mb-4">
                <label class="form-label">{{ translate('Email address', 'forms') }}</label>
                <input type="email" name="email" class="form-control form-control-md" value="{{ $user->email }}">
            </div>
            <button class="btn btn-primary btn-md">{{ translate('Save Changes', 'settings') }}</button>
        </form>
    </div>
    <div class="card-v mb-4">
        <h5 class="mb-4">{{ translate('Change Password', 'settings') }}</h5>
        <form action="{{ route('user.settings.password') }}" method="POST">
            @csrf
            <div class="form-section">
                <div class="mb-3">
                    <label class="form-label">{{ translate('Password', 'forms') }}</label>
                    <input type="password" class="form-control form-control-md" name="current-password" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">{{ translate('New Password', 'forms') }}</label>
                    <input type="password" class="form-control form-control-md" name="new-password" required>
                </div>
                <div class="mb-4">
                    <label class="form-label">{{ translate('Confirm New Password', 'forms') }}</label>
                    <input type="password" class="form-control form-control-md" name="new-password_confirmation" required>
                </div>
                <button class="btn btn-primary btn-md ">{{ translate('Save Changes', 'settings') }}</button>
            </div>
        </form>
    </div>
    <div class="card-v">
        <h5 class="mb-4">{{ translate('2FA Authentication', 'settings') }}</h5>
        <div class="form-section">
            <p class="text-muted">
                {{ translate('2fa top description', 'settings') }}
            </p>
            <div class="my-3">
                <div class="row g-3 align-items-center">
                    @if (!$user->google2fa_status)
                        <div class="col-12 col-md-12 col-lg-auto col-xl-auto">
                            <div class="text-center mb-2">
                                {!! $QR_Image !!}
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-6 col-xl-3">
                            <div class="input-group mb-3">
                                <input id="input-link" type="text" class="form-control form-control-md"
                                    value="{{ $user->google2fa_secret }}" readonly>
                                <button class="btn btn-outline-primary btn-copy" data-clipboard-target="#input-link"><i
                                        class="far fa-clone"></i></button>
                            </div>
                            <a href="#" class="btn btn-primary btn-md w-100 " data-bs-toggle="modal"
                                data-bs-target="#towfactorModal">{{ translate('Enable 2FA Authentication', 'settings') }}</a>
                        </div>
                    @else
                        <div class="col-lg-3">
                            <a href="#" class="btn btn-danger btn-md w-100 " data-bs-toggle="modal"
                                data-bs-target="#towfactorDisableModal">{{ translate('Disable 2FA Authentication', 'settings') }}</a>
                        </div>
                    @endif
                </div>
            </div>
            <p class="text-muted mb-2">
                {{ translate('2fa bottom description', 'settings') }}:
            </p>
            <li class="mb-1"><a target="_blank"
                    href="https://apps.apple.com/us/app/google-authenticator/id388497605">{{ translate('Google Authenticator for iOS', 'settings') }}</a>
            </li>
            <li class="mb-1"><a target="_blank"
                    href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2&hl=en&gl=US">{{ translate('Google Authenticator for Android', 'settings') }}</a>
            </li>
            <li class="mb-1"><a target="_blank"
                    href="https://apps.apple.com/us/app/microsoft-authenticator/id983156458">{{ translate('Microsoft Authenticator for iOS', 'settings') }}</a>
            </li>
            <li class="mb-0"><a target="_blank"
                    href="https://play.google.com/store/apps/details?id=com.azure.authenticator&hl=en_US&gl=US">{{ translate('Microsoft Authenticator for Android', 'settings') }}</a>
            </li>
        </div>
    </div>
    @if (!$user->google2fa_status)
        <div class="modal fade" id="towfactorModal" aria-labelledby="towfactorModalLabel" data-bs-backdrop="static"
            data-bs-keyboard="false" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content p-4">
                    <div class="modal-header border-0 p-0 mb-3">
                        <h5 class="modal-title" id="createFolderModalLabel">{{ translate('OTP Code', 'forms') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('user.settings.2fa.enable') }}" method="POST">
                        @csrf
                        <div class="modal-body p-0">
                            <div class="mb-4">
                                <input type="text" name="otp_code" class="form-control form-control-md input-numeric"
                                    placeholder="• • • • • •" maxlength="6" required>
                            </div>
                            <div class="row justify-content-center g-3">
                                <div class="col-12 col-lg">
                                    <button type="button" class="btn btn-outline-primary btn-md w-100"
                                        data-bs-dismiss="modal">{{ translate('Close') }}</button>
                                </div>
                                <div class="col-12 col-lg">
                                    <button type="submit"
                                        class="btn btn-primary btn-md w-100 ">{{ translate('Enable', 'settings') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @else
        <div class="modal fade" id="towfactorDisableModal" tabindex="-1" aria-labelledby="towfactorDisableModalLabel"
            data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content p-4">
                    <div class="modal-header border-0 p-0 mb-3">
                        <h5 class="modal-title" id="createFolderModalLabel">{{ translate('OTP Code', 'forms') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('user.settings.2fa.disable') }}" method="POST">
                        @csrf
                        <div class="modal-body p-0">
                            <div class="mb-4">
                                <input type="text" name="otp_code" class="form-control form-control-md input-numeric"
                                    placeholder="• • • • • •" maxlength="6" required>
                            </div>
                            <div class="row justify-content-center g-3">
                                <div class="col-12 col-lg">
                                    <button type="button" class="btn btn-outline-danger btn-md w-100"
                                        data-bs-dismiss="modal">{{ translate('Close') }}</button>
                                </div>
                                <div class="col-12 col-lg">
                                    <button type="submit"
                                        class="btn btn-danger btn-md w-100">{{ translate('Disable', 'settings') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
    @push('scripts_libs')
        <script src="{{ asset('assets/vendor/libs/clipboard/clipboard.min.js') }}"></script>
    @endpush
@endsection
