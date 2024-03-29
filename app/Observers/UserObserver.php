<?php

namespace App\Observers;

use App\Rating;
use App\User;
use Illuminate\Support\Str;

class UserObserver
{
    public function creating(User $user): void
    {
        $user->uuid = $this->generateStringUnique();
		$user->commercial_name = $user->name;
		$user->slug = Str::slug($user->commercial_name);
		$user->coins = 5; ///////////// Cambiar
    }

    private function generateStringUnique(): string
    {
        $isUnique = false;
        $uuid = Str::random(5);
        $allUuid = $this->getAllUuid();

        if ($this->isUnique($allUuid, $uuid)) {
            return $uuid;
        }

        while (!$isUnique) {
            $uuid = Str::random(5);
            $isUnique = $this->isUnique($allUuid, $uuid);
        }

        return $uuid;
    }

    private function getAllUuid()
    {
        return User::select('uuid')->get();
    }

    private function isUnique($allUuid, $uuid): bool
    {
        return !$allUuid->contains('uuid', $uuid);
    }

    /**
     * Handle the user "created" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function created(User $user)
    {
        //
    }

    /**
     * Handle the user "updated" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        //
    }

    /**
     * Handle the user "deleted" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }

    /**
     * Handle the user "restored" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the user "force deleted" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
