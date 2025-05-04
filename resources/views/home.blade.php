@extends('layouts.app')
@section('title', $settings->seo->title ?? '')
@section('content')
<header class="header">
    <div class="header-shape">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none">
            <path class="shape-fill" fill-opacity="1"
                d="M0,288L80,266.7C160,245,320,203,480,197.3C640,192,800,224,960,218.7C1120,213,1280,171,1360,149.3L1440,128L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z">
            </path>
        </svg>
    </div>
    <div class="wrapper" style="background-image: url({{ asset($settings->media->header_pattern) }});">
        <div class="container">
            <div class="wrapper-content">
                <div class="wrapper-container">
                    <div class="col-xl-8 mx-auto">
                        <h1 class="header-title" data-aos="fade-right" data-aos-duration="1000">
                            {{ translate('How We Can Help You?', 'home page') }}
                        </h1>
                        {{-- <p class="header-text" data-aos="fade-right" data-aos-duration="1000">
                                {{ translate('Start searching to find answers, or check our knowledge base', 'home page') }}
                        </p>
                        @if ($settings->actions->knowledgebase_status)
                        <div class="header-search search" data-aos="fade-up" data-aos-duration="1000">
                            <form action="{{ route('knowledgebase.search.page') }}" method="GET">
                                <div class="search-input">
                                    <button class="search-icon">
                                        <i class="fa fa-search"></i>
                                    </button>
                                    <input type="text" name="q"
                                        placeholder="{{ translate('Ask a Question or Enter a Keyword', 'knowledgebase') }}" />
                                </div>
                                <div class="search-results" data-simplebar>
                                    <div></div>
                                </div>
                            </form>
                        </div>
                        @endif --}}
                        @if (!auth()->user() || (auth()->user() && auth()->user()->isUser()))
                        <div class="card-v p-5" data-aos="zoom-in" data-aos-duration="1000">
                            <div class="row justify-content-between align-items-center g-4">
                                <div class="col-12 col-lg-8 text-center text-lg-start">
                                    <h4 class="mb-3 text-dark">{{ translate('Still no luck? We can help!', 'home page') }}</h4>
                                    <p class="text-muted mb-0">
                                        {{ translate('Open a ticket and we will contact you back as soon as possible.', 'home page') }}
                                    </p>
                                </div>
                                <div class="col-12 col-lg-auto d-flex justify-content-center">
                                    <a href="{{ auth()->user() ? route('user.tickets.create') : route('login') }}"
                                        class="btn btn-primary btn-lg">
                                        {{ translate('Open a ticket', 'home page') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>


@push('styles_libs')
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/aos/aos.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/simplebar/simplebar.min.css') }}">
@endpush
@push('scripts_libs')
<script src="{{ asset('assets/vendor/libs/aos/aos.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/simplebar/simplebar.min.js') }}"></script>
@endpush
@endsection