<x-mail::message>
# Inquiry Received

Dear {{ $inquiry->parent_name }},

Thank you for your admission inquiry for **{{ $inquiry->student_name }}** for class **{{ $inquiry->applying_class }}**.

We have received your inquiry and our admissions team will contact you shortly at **{{ $inquiry->mobile }}**.

If you have any questions, please feel free to contact us.

Thanks,<br>
{{ school_setting('school_name') ?: 'The School' }}
</x-mail::message>
