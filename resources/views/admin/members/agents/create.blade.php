@extends('admin.layouts.form')
@section('section', admin_trans('Members'))
@section('title', admin_trans('New Agent'))
@section('back', route('admin.members.agents.index'))
@section('container', 'container-max-lg')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ admin_trans('Agent details') }}
        </div>
        <div class="card-body p-4">
            <form id="vironeer-submited-form" action="{{ route('admin.members.agents.store') }}" method="POST">
                @csrf
                <div class="row g-3 mb-2">
                    <div class="col-lg-6">
                        <label class="form-label">{{ admin_trans('First Name') }} </label>
                        <input type="firstname" name="firstname" class="form-control form-control-lg"
                            value="{{ old('firstname') }}" required>
                    </div>
                    <div class="col-lg-6">
                        <label class="form-label">{{ admin_trans('Last Name') }} </label>
                        <input type="lastname" name="lastname" class="form-control form-control-lg"
                            value="{{ old('lastname') }}" required>
                    </div>
                    <div class="col-lg-12">
                        <label class="form-label">{{ admin_trans('E-mail Address') }} </label>
                        <input type="email" name="email" class="form-control form-control-lg"
                            value="{{ old('email') }}" required>
                    </div>
                    <div class="col-lg-12">
                        <label class="form-label">{{ admin_trans('Departments') }} </label>
                        <select name="departments[]" class="form-select form-select-lg selectpicker" data-live-search="true"
                            multiple title="{{ admin_trans('Choose') }}">
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-12">
                        <label class="form-label">{{ admin_trans('Password') }} </label>
                        <div class="input-group">
                            <input id="randomPasswordInput" type="text" class="form-control form-control-lg"
                                name="password" required>
                            <button id="copy-btn" class="btn btn-secondary" type="button"
                                data-clipboard-target="#randomPasswordInput"><i class="far fa-clone"></i></button>
                            <button id="randomPasswordBtn" class="btn btn-secondary" type="button"><i
                                    class="fa-solid fa-rotate me-2"></i>{{ admin_trans('Generate') }}</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @push('styles_libs')
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap/select/bootstrap-select.min.css') }}">
    @endpush
    @push('scripts_libs')
        <script src="{{ asset('assets/vendor/libs/clipboard/clipboard.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/libs/bootstrap/select/bootstrap-select.min.js') }}"></script>
    @endpush
@endsection
