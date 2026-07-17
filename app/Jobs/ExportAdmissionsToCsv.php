<?php

declare(strict_types=1);

namespace App\Jobs;

use App\Models\AdmissionInquiry;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Storage;

class ExportAdmissionsToCsv implements ShouldQueue
{
    use Queueable;

    public function handle(): void
    {
        $inquiries = AdmissionInquiry::all();

        $csv = "Student Name,Class,Parent Name,Mobile,Email,Address,Previous School,Message,Status,Submitted At\n";

        foreach ($inquiries as $inquiry) {
            $csv .= sprintf(
                '"%s","%s","%s","%s","%s","%s","%s","%s","%s","%s"' . "\n",
                str_replace('"', '""', $inquiry->student_name),
                str_replace('"', '""', $inquiry->applying_class),
                str_replace('"', '""', $inquiry->parent_name),
                str_replace('"', '""', $inquiry->mobile),
                str_replace('"', '""', $inquiry->email ?? ''),
                str_replace('"', '""', $inquiry->address),
                str_replace('"', '""', $inquiry->previous_school ?? ''),
                str_replace('"', '""', $inquiry->message ?? ''),
                $inquiry->status->value,
                $inquiry->created_at->toDateTimeString(),
            );
        }

        Storage::disk('local')->put('exports/admission-inquiries-' . now()->format('Y-m-d-His') . '.csv', $csv);
    }
}
