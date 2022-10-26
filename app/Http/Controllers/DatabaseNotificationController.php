<?php

namespace App\Http\Controllers;

use Auth;
use Dflydev\DotAccessData\Data;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;

class DatabaseNotificationController extends Controller
{
    /**
     * @throws AuthorizationException
     */
    public function index()
    {
        $this->authorize('viewAny', new DatabaseNotification);

        $notifications = Auth::user()->notifications()->paginate();

        return view('pages.notifications.notificationsIndex', compact('notifications'));
    }

    /**
     * @return RedirectResponse
     */
    public function markAllReads(): RedirectResponse
    {
        Auth::user()->unreadNotifications->markAsRead();

        toast(__('All notifications have been marked as read !'), 'success');

        return redirect()->back();
    }

    /**
     * @return RedirectResponse
     */
    public function deleteAll(): RedirectResponse
    {
        Auth::user()->notifications()->delete();

        toast(__('All notifications have been deleted !'), 'success');

        return redirect()->back();
    }
}
