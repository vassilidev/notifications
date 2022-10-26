<?php

namespace App\Http\Livewire;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NotificationCenter extends Component
{
    use AuthorizesRequests;

    /**
     * @var string[]
     */
    protected $listeners = [
        'newNotification' => '$refresh',
    ];

    /**
     * @return View
     */
    public function render(): View
    {
        $notifications = Auth::user()->notifications()->latest()->take(10)->get();
        $notificationsCount = Auth::user()->unread_notifications_count;

        return view('livewire.notification-center', compact(
                'notifications',
                'notificationsCount')
        );
    }

    /**
     * @param DatabaseNotification $notification
     *
     * @return void
     * @throws AuthorizationException
     */
    public function markAsRead(DatabaseNotification $notification): void
    {
        $this->authorize('update', $notification);

        $notification->markAsRead();
    }

    /**
     * @param DatabaseNotification $notification
     *
     * @return void
     * @throws AuthorizationException
     */
    public function deleteNotification(DatabaseNotification $notification): void
    {
        $this->authorize('forceDelete', $notification);

        $notification->forceDelete();
    }
}
