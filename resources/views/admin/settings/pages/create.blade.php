@extends('admin.layouts.form')
@section('section', admin_trans('Settings'))
@section('title', admin_trans('New Page'))
@section('back', route('admin.settings.pages.index'))
@section('content')
    <form id="vironeer-submited-form" action="{{ route('admin.settings.pages.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-lg-8">
                <div class="card p-2 mb-3">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">{{ admin_trans('Title') }} </label>
                            <input type="text" name="title" id="create_slug" class="form-control"
                                value="{{ old('title') }}" required autofocus />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">{{ admin_trans('Slug') }} </label>
                            <input type="text" name="slug" id="show_slug" class="form-control"
                                value="{{ old('slug') }}" required />
                            <small class="text-muted">{{ admin_trans('To create a contact page set slug as') }}
                                <strong>{{ admin_trans('contact-us') }}</strong></small>
                        </div>
                        <div class="ckeditor-lg mb-3">
                            <label class="form-label">{{ admin_trans('Body') }} </label>
                            <textarea name="body" rows="10" class="form-control ckeditor">{{ old('content') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">{{ admin_trans('Short description') }} </label>
                            <textarea name="short_description" rows="6" class="form-control"
                                placeholder="{{ admin_trans('50 to 200 character at most') }}">{{ old('short_description') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @push('top_scripts')
        <script>
            "use strict";
            let GET_SLUG_URL = "{{ route('admin.settings.pages.slug') }}";
        </script>
    @endpush
    @push('styles_libs')
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap/select/bootstrap-select.min.css') }}">
    @endpush
    @push('scripts_libs')
        <script src="{{ asset('assets/vendor/libs/bootstrap/select/bootstrap-select.min.js') }}"></script>
    @endpush
    @include('admin.includes.ckeditor')
@endsection
