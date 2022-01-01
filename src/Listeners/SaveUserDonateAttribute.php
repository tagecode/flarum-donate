<?php

namespace TageCode\Donate\Listeners;

use Flarum\Foundation\ValidationException;
use Flarum\User\Event\Saving;
use Flarum\User\Exception\PermissionDeniedException;
use Illuminate\Contracts\Validation\Factory;
use Illuminate\Support\Arr;

class SaveUserDonateAttribute
{
    private $validator;

    public function __construct(Factory $validator)
    {
        $this->validator = $validator;
    }

    /**
     * @param Saving $event
     *
     * * @throws PermissionDeniedException
     * @throws ValidationException
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
            // Check donate is a url link.
            if (!empty($attributes['donate'])) {
                if (!filter_var($attributes['donate'],
                    FILTER_VALIDATE_URL, FILTER_FLAG_PATH_REQUIRED)) {
                    throw new ValidationException(['message' => 'Donate must be a complete url link.']);
                }

                $validator = $this->validator->make($attributes, [
                    'donate' => 'required|max:255'
                ]);
                if ($validator->fails()) {
                    throw new ValidationException(['message' => $validator->errors()->first()]);
                }
            }

            $user->donate = $attributes['donate'];
            $user->save();
        }
    }
}
