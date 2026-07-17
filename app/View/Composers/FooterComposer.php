<?php

declare(strict_types=1);

namespace App\View\Composers;

use Illuminate\View\View;

class FooterComposer
{
    public function compose(View $view): void
    {
        $view->with('school', [
            'name' => school_setting('school_name', 'School CMS'),
            'address' => school_setting('school_address', '123 School Street, City, State'),
            'phone' => school_setting('school_phone', '+1 (555) 123-4567'),
            'email' => school_setting('school_email', 'info@schoolcms.test'),
        ]);
    }
}
