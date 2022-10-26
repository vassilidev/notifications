<li class="nav-item dropdown no-caret d-none d-sm-block me-3 dropdown-notifications">
    <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownAlerts"
       href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
       <span>
            <i class="fas fa-bell"></i>
           @unless($notificationsCount === 0)
               <sup class="fw-bolder">{{ $notificationsCount }}</sup>
           @endunless
       </span>
    </a>
    <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up">
        <h6 class="dropdown-header dropdown-notifications-header">
            <i class="fas fa-bell me-2"></i>
            Alerts Center
        </h6>

        @foreach($notifications as $notification)
            <div wire:key="notification-{{ $notification->id }}" class="dropdown-item dropdown-notifications-item">
                <div class="dropdown-notifications-item-content">
                    <div class="dropdown-notifications-item-content-details">
                        {{ $notification->created_at->diffForHumans() }}
                    </div>
                    <div class="dropdown-notifications-item-content-text">
                        {{ $notification->data['message'] }}
                    </div>
                    <div class="dropdown-notifications-item-content-details">
                        @unless($notification->read_at)
                            <button class="btn btn-sm btn-primary" wire:click.stop="markAsRead({{ $notification }})">
                                Mark as read
                            </button>
                        @endunless
                        <button wire:click.stop="deleteNotification({{ $notification }})"
                                class="btn btn-xs btn-danger btn-icon">
                            <i class="fas fa-sm fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
        <a class="dropdown-item dropdown-notifications-footer" href="{{ route('panel.notifications.index') }}">
            View All Alerts
        </a>
    </div>
</li>