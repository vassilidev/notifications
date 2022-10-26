<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Notifications\DatabaseNotification;

class DatabaseNotificationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     *
     * @return bool
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User                 $user
     * @param DatabaseNotification $notification
     *
     * @return bool
     */
    public function view(User $user, DatabaseNotification $notification): bool
    {
        return $this->checkSelf($user, $$notification);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     *
     * @return bool
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User                 $user
     * @param DatabaseNotification $notification
     *
     * @return bool
     */
    public function update(User $user, DatabaseNotification $notification): bool
    {
        return $this->checkSelf($user, $notification);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User                 $user
     * @param DatabaseNotification $notification
     *
     * @return bool
     */
    public function delete(User $user, DatabaseNotification $notification): bool
    {
        return $this->checkSelf($user, $notification);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User                 $user
     * @param DatabaseNotification $notification
     *
     * @return bool
     */
    public function restore(User $user, DatabaseNotification $notification): bool
    {
        return $this->checkSelf($user, $notification);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User                 $user
     * @param DatabaseNotification $notification
     *
     * @return bool
     */
    public function forceDelete(User $user, DatabaseNotification $notification): bool
    {
        return $this->checkSelf($user, $notification);
    }

    /**
     * @param User                 $user
     * @param DatabaseNotification $notification
     *
     * @return bool
     */
    private function checkSelf(User $user, DatabaseNotification $notification): bool
    {
        return $notification->notifiable_type === User::class
            && $notification->notifiable_id === $user->id;
    }
}
