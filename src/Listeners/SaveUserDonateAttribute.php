<?php

namespace TageCode\Donate\Listeners;

use Flarum\User\Event\Saving;
use Flarum\User\Exception\PermissionDeniedException;
use Illuminate\Support\Arr;

class SaveUserDonateAttribute
{
    /**
     * @param Saving $event
     *
     * * @throws PermissionDeniedException
     */
    public function handle(Saving $event)
    {
        $user = $event->user;
        $data = $event->data;
        $actor = $event->actor;

        $isSelf = $actor->id === $user->id;
        $canEdit = $actor->can('edit', $user);
        $attributes = Arr::get($data, 'attributes', []);

        if (isset($attributes['donate'])) {
            if (!$isSelf) {
                $actor->assertPermission($canEdit);
            }
            $user->donate = $attributes['donate'];
            $user->save();
        }
    }
}
