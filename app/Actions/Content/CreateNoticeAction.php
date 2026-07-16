<?php

declare(strict_types=1);

namespace App\Actions\Content;

use App\Enums\NoticeStatus;
use App\Models\Notice;

class CreateNoticeAction
{
    public function execute(array $data): Notice
    {
        if (!isset($data['status'])) {
            $data['status'] = NoticeStatus::Draft;
        }

        if (isset($data['is_pinned']) && $data['is_pinned']) {
            Notice::where('is_pinned', true)->update(['is_pinned' => false]);
        }

        return Notice::create($data);
    }
}
