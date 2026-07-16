<?php

declare(strict_types=1);

namespace App\Actions\System;

use App\Models\Setting;

class UpdateSettingAction
{
    public function execute(string $key, mixed $value, string $group = 'general'): Setting
    {
        return Setting::updateOrCreate(
            ['key' => $key],
            ['value' => $value, 'group' => $group]
        );
    }
}
