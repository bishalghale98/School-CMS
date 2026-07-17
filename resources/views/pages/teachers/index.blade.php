@extends('layouts.public')

@php
    $crumbs = [['label' => 'Teachers & Staff', 'url' => null]];
    $teacherDepts = $teachers->pluck('department')->unique()->filter()->values();
    $staffDepts = $staff->pluck('department')->unique()->filter()->values();
@endphp

@section('title', 'Teachers & Staff')

@section('content')
    <section class="bg-light-gray border-b border-border">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6 py-12 lg:py-24">
            <h1 class="text-3xl lg:text-5xl font-bold text-academic-blue">Teachers & Staff</h1>
            <p class="text-lg text-muted mt-2">Meet our dedicated team of educators and staff</p>
        </div>
    </section>

    <section class="py-12 lg:py-24">
        <div class="max-w-[1280px] mx-auto px-5 lg:px-6">
            <div x-data="memberFilter()">
                <div class="flex gap-2 mb-8 p-1 bg-light-gray rounded-xl w-fit">
                    <button @click="tab = 'teachers'; filter = ''" :class="tab === 'teachers' ? 'bg-white shadow-sm text-slate-dark' : 'text-muted hover:text-slate-dark'" class="px-5 py-2 rounded-lg text-sm font-medium transition-all">
                        Teachers ({{ $teachers->count() }})
                    </button>
                    <button @click="tab = 'staff'; filter = ''" :class="tab === 'staff' ? 'bg-white shadow-sm text-slate-dark' : 'text-muted hover:text-slate-dark'" class="px-5 py-2 rounded-lg text-sm font-medium transition-all">
                        Staff ({{ $staff->count() }})
                    </button>
                </div>

                <div x-show="tab === 'teachers'" x-transition>
                    @if ($teacherDepts->count())
                        <div class="flex flex-wrap gap-2 mb-6">
                            <button @click="filter = ''" :class="!filter ? 'bg-academic-blue text-white' : 'bg-light-gray text-muted hover:bg-gray-200'" class="px-4 py-1.5 rounded-full text-sm font-medium transition-colors">All</button>
                            @foreach ($teacherDepts as $dept)
                                <button @click="filter = '{{ $dept }}'" :class="filter === '{{ $dept }}' ? 'bg-academic-blue text-white' : 'bg-light-gray text-muted hover:bg-gray-200'" class="px-4 py-1.5 rounded-full text-sm font-medium transition-colors">{{ $dept }}</button>
                            @endforeach
                        </div>
                    @endif

                    @if ($teachers->count())
                        <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                            @foreach ($teachers as $teacher)
                                <div x-show="!filter || '{{ $teacher->department }}' === filter" class="bg-white border border-border rounded-2xl p-6 text-center hover:shadow-md transition-shadow">
                                    <div class="w-20 h-20 rounded-full bg-light-gray mx-auto mb-4 overflow-hidden flex items-center justify-center">
                                        @if (false)
                                            <img src="" alt="{{ $teacher->name }}" class="w-full h-full object-cover">
                                        @else
                                            <svg class="w-8 h-8 text-muted" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        @endif
                                    </div>
                                    <h3 class="font-semibold text-slate-dark">{{ $teacher->name }}</h3>
                                    <p class="text-xs text-academic-blue font-medium">{{ $teacher->position }}</p>
                                    @if ($teacher->department)
                                        <p class="text-xs text-muted mt-1">{{ $teacher->department }}</p>
                                    @endif
                                    @if ($teacher->qualification)
                                        <p class="text-xs text-muted mt-1">{{ $teacher->qualification }}</p>
                                    @endif
                                    <button @click="openProfile({{ $teacher->id }}, 'teacher')" class="mt-3 text-xs font-medium text-academic-blue hover:underline">View Profile</button>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <x-ui.empty-state title="No teachers listed" description="Teacher profiles will be added soon." />
                    @endif
                </div>

                <div x-show="tab === 'staff'" x-transition x-cloak>
                    @if ($staffDepts->count())
                        <div class="flex flex-wrap gap-2 mb-6">
                            <button @click="filter = ''" :class="!filter ? 'bg-academic-blue text-white' : 'bg-light-gray text-muted hover:bg-gray-200'" class="px-4 py-1.5 rounded-full text-sm font-medium transition-colors">All</button>
                            @foreach ($staffDepts as $dept)
                                <button @click="filter = '{{ $dept }}'" :class="filter === '{{ $dept }}' ? 'bg-academic-blue text-white' : 'bg-light-gray text-muted hover:bg-gray-200'" class="px-4 py-1.5 rounded-full text-sm font-medium transition-colors">{{ $dept }}</button>
                            @endforeach
                        </div>
                    @endif

                    @if ($staff->count())
                        <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                            @foreach ($staff as $member)
                                <div x-show="!filter || '{{ $member->department }}' === filter" class="bg-white border border-border rounded-2xl p-6 text-center hover:shadow-md transition-shadow">
                                    <div class="w-20 h-20 rounded-full bg-light-gray mx-auto mb-4 overflow-hidden flex items-center justify-center">
                                        @if (false)
                                            <img src="" alt="{{ $member->name }}" class="w-full h-full object-cover">
                                        @else
                                            <svg class="w-8 h-8 text-muted" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        @endif
                                    </div>
                                    <h3 class="font-semibold text-slate-dark">{{ $member->name }}</h3>
                                    <p class="text-xs text-academic-blue font-medium">{{ $member->position }}</p>
                                    @if ($member->department)
                                        <p class="text-xs text-muted mt-1">{{ $member->department }}</p>
                                    @endif
                                    <button @click="openProfile({{ $member->id }}, 'staff')" class="mt-3 text-xs font-medium text-academic-blue hover:underline">View Profile</button>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <x-ui.empty-state title="No staff listed" description="Staff profiles will be added soon." />
                    @endif
                </div>
            </div>

            {{-- Profile Modal --}}
            <x-ui.modal name="member-profile" title="Profile" maxWidth="lg">
                <template x-if="profile">
                    <div>
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-20 h-20 rounded-full bg-light-gray overflow-hidden shrink-0 flex items-center justify-center">
                                <img :src="profile.photo" :alt="profile.name" class="w-full h-full object-cover" x-show="profile.photo">
                                <svg class="w-8 h-8 text-muted" x-show="!profile.photo" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-slate-dark text-lg" x-text="profile.name"></h3>
                                <p class="text-sm text-academic-blue" x-text="profile.position"></p>
                                <p class="text-xs text-muted" x-text="profile.department" x-show="profile.department"></p>
                            </div>
                        </div>
                        <p class="text-sm text-muted" x-text="profile.qualification" x-show="profile.qualification"></p>
                        <p class="text-sm text-muted mt-2" x-text="profile.biography" x-show="profile.biography"></p>
                        <div class="flex gap-4 mt-4">
                            <a :href="'mailto:' + profile.email" class="text-sm text-academic-blue hover:underline" x-show="profile.email" x-text="profile.email"></a>
                            <span class="text-sm text-muted" x-text="profile.phone" x-show="profile.phone"></span>
                        </div>
                    </div>
                </template>
            </x-ui.modal>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    document.addEventListener('alpine:init', () => {
        @php
            $teachersData = $teachers->map(fn($t) => [
                'id' => $t->id, 'name' => $t->name, 'position' => $t->position,
                'department' => $t->department, 'qualification' => $t->qualification,
                'biography' => $t->biography, 'email' => $t->email, 'phone' => $t->phone,
                'photo' => '',
            ]);
            $staffData = $staff->map(fn($s) => [
                'id' => $s->id, 'name' => $s->name, 'position' => $s->position,
                'department' => $s->department, 'qualification' => $s->qualification,
                'biography' => $s->biography, 'email' => $s->email, 'phone' => $s->phone,
                'photo' => '',
            ]);
        @endphp
        const teachers = @json($teachersData->toArray());
        const staff = @json($staffData->toArray());

        Alpine.data('memberFilter', () => ({
            tab: 'teachers',
            filter: '',
            profile: null,
            openProfile(id, type) {
                const list = type === 'teacher' ? teachers : staff;
                this.profile = list.find(m => m.id === id) || null;
                if (this.profile) {
                    window.dispatchEvent(new CustomEvent('open-modal-member-profile'));
                }
            }
        }));
    });
</script>
@endpush