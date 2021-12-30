<?php

namespace TageCode\Donate\Listeners;

use Flarum\Api\Serializer\UserSerializer;
use Flarum\User\User;

class AddUserDonateAttribute
{
    /**
     * @param UserSerializer $serializer
     * @param User $user
     * @param array $attributes
     *
     * @return array
     */
    public function __invoke(UserSerializer $serializer, User $user, array $attributes): array
    {
        $attributes += [
            'donate' => $user->donate,
        ];

        return $attributes;
    }
}
