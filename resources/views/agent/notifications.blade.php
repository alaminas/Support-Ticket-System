@extends('agent.layouts.app')
@section('title', translate('Notifications', 'notifications'))
@section('content')
    <div class="noti noti-lg">
        <div class="noti-body h-100">
            @if ($notifications->count() > 0)
                <div class="d-flex flex-column">
                    @foreach ($notifications as $notification)
                        @if ($notification->link)
                            <a href="{{ route('agent.notifications.view', $notification->id) }}"
                                class="noti-item {{ !$notification->status ? 'unread' : '' }}">
                                <div class="noti-item-img">
                                    <img src="{{ $notification->image }}" alt="{{ $notification->title }}">
                                </div>
                                <div class="noti-item-info">
                                    <p class="noti-item-text mb-0">{{ $notification->title }}</p>
                                    <span class="noti-item-time">{{ $notification->created_at->diffforhumans() }}</span>
                                </div>
                            </a>
                        @else
                            <div class="noti-item {{ !$notification->status ? 'unread' : '' }}">
                                <div class="noti-item-img">
                                    <img src="{{ $notification->image }}" alt="{{ $notification->title }}">
                                </div>
                                <div class="noti-item-info">
                                    <p class="noti-item-text mb-0">{{ $notification->title }}</p>
                                    <span class="noti-item-time">{{ $notification->created_at->diffforhumans() }}</span>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @else
                <div class="card-v text-center p-5">
                    <small class="text-muted mb-0">{{ translate('No notifications found', 'notifications') }}</small>
                </div>
            @endif
        </div>
    </div>
    {{ $notifications->links() }}
@endsection
