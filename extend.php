<?php

/*
 * This file is part of tagecode/donate.
 *
 * Copyright (c) 2021 tagecode.
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace TageCode\Donate;

use Flarum\Extend;
use Flarum\Api\Serializer\UserSerializer;
use Flarum\User\Event\Saving;
use TageCode\Donate\Listeners\AddUserDonateAttribute;
use TageCode\Donate\Listeners\SaveUserDonateAttribute;

return [
    (new Extend\Frontend('forum'))
        ->js(__DIR__ . '/js/dist/forum.js')
        ->css(__DIR__ . '/less/forum.less'),
    (new Extend\Frontend('admin'))
        ->js(__DIR__ . '/js/dist/admin.js')
        ->css(__DIR__ . '/less/admin.less'),
    new Extend\Locales(__DIR__ . '/locale'),

    (new Extend\ApiSerializer(UserSerializer::class))
        ->attributes(AddUserDonateAttribute::class),

    (new Extend\Event())
        ->listen(Saving::class, SaveUserDonateAttribute::class),
];
