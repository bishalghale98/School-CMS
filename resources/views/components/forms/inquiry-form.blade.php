<div
    x-data="inquiryForm()"
    class="max-w-2xl mx-auto"
>
    <form @submit.prevent="submit">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-sm font-medium mb-1">Student Name *</label>
                <input type="text" x-model="form.student_name" class="w-full border rounded px-3 py-2">
                <template x-if="errors.student_name">
                    <p class="text-red-500 text-sm mt-1" x-text="errors.student_name[0]"></p>
                </template>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Applying Class *</label>
                <input type="text" x-model="form.applying_class" class="w-full border rounded px-3 py-2">
                <template x-if="errors.applying_class">
                    <p class="text-red-500 text-sm mt-1" x-text="errors.applying_class[0]"></p>
                </template>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Parent Name *</label>
                <input type="text" x-model="form.parent_name" class="w-full border rounded px-3 py-2">
                <template x-if="errors.parent_name">
                    <p class="text-red-500 text-sm mt-1" x-text="errors.parent_name[0]"></p>
                </template>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Mobile *</label>
                <input type="text" x-model="form.mobile" class="w-full border rounded px-3 py-2">
                <template x-if="errors.mobile">
                    <p class="text-red-500 text-sm mt-1" x-text="errors.mobile[0]"></p>
                </template>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Email</label>
                <input type="email" x-model="form.email" class="w-full border rounded px-3 py-2">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Previous School</label>
                <input type="text" x-model="form.previous_school" class="w-full border rounded px-3 py-2">
            </div>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Address *</label>
            <textarea x-model="form.address" rows="3" class="w-full border rounded px-3 py-2"></textarea>
            <template x-if="errors.address">
                <p class="text-red-500 text-sm mt-1" x-text="errors.address[0]"></p>
            </template>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Message</label>
            <textarea x-model="form.message" rows="3" class="w-full border rounded px-3 py-2"></textarea>
        </div>
        <button type="submit" class="bg-blue-900 text-white px-6 py-2 rounded hover:bg-blue-800" x-text="submitting ? 'Submitting...' : 'Submit Inquiry'"></button>
    </form>

    <div x-show="success" class="mt-4 p-4 bg-green-100 text-green-800 rounded">
        Your inquiry has been submitted successfully. We will contact you soon.
    </div>
</div>

<script>
    function inquiryForm() {
        return {
            form: {
                student_name: '',
                applying_class: '',
                parent_name: '',
                mobile: '',
                email: '',
                address: '',
                previous_school: '',
                message: '',
            },
            errors: {},
            submitting: false,
            success: false,
            async submit() {
                this.submitting = true;
                this.errors = {};
                this.success = false;
                try {
                    const response = await fetch('{{ route('admissions.store') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json',
                        },
                        body: JSON.stringify(this.form),
                    });
                    if (response.ok) {
                        this.success = true;
                        this.form = { student_name: '', applying_class: '', parent_name: '', mobile: '', email: '', address: '', previous_school: '', message: '' };
                    } else {
                        const data = await response.json();
                        this.errors = data.errors || {};
                    }
                } catch (e) {
                    this.errors = { _: ['An unexpected error occurred.'] };
                } finally {
                    this.submitting = false;
                }
            },
        };
    }
</script>
