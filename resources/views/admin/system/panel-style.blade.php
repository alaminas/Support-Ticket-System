@extends('admin.layouts.form')
@section('section', admin_trans('System'))
@section('title', admin_trans('Panel Style'))
@section('content')
    <form id="vironeer-submited-form" action="{{ route('admin.system.panel-style') }}" method="POST">
        @csrf
        <div class="card mb-3">
            <div class="card-header">
                {{ admin_trans('Colors') }}
            </div>
            <div class="card-body">
                <div class="row g-3">
                    @foreach ($settings->system->colors as $key => $value)
                        <div class="col-lg-6 col-xl-4">
                            <label class="form-label">{{ ucfirst(str($key)->replace('_', ' ')) }} </label>
                            <div class="colorpicker">
                                <input type="text" name="system[colors][{{ $key }}]"
                                    class="form-control coloris" value="{{ $value }}" required>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                {{ admin_trans('Custom CSS') }}
            </div>
            <div class="card-body p-0">
                <textarea name="custom_css" id="css-editor" class="form-control">{{ $customCssFile }}</textarea>
            </div>
        </div>
    </form>
    @push('styles_libs')
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/coloris/coloris.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/codemirror/codemirror.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/codemirror/monokai.min.css') }}">
    @endpush
    @push('scripts_libs')
        <script src="{{ asset('assets/vendor/libs/coloris/coloris.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/libs/codemirror/codemirror.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/libs/codemirror/css.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/libs/codemirror/sublime.min.js') }}"></script>
    @endpush
@endsection
