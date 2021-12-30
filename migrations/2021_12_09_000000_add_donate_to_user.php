<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\Builder;

return [
    'up' => function (Builder $schema) {
        if (!$schema->hasColumn('users', 'donate')) {
            $schema->table('users', function (Blueprint $table) use ($schema) {
                $table->string('donate', 255)
                    ->nullable()
                    ->comment('User\'s donation link.');
            });
        }
    },
    'down' => function (Builder $schema) {
        $schema->table('users', function (Blueprint $table) use ($schema) {
            $table->dropColumn('donate');
        });
    }
];
