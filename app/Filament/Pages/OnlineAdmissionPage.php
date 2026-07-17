<?php

declare(strict_types=1);

namespace App\Filament\Pages;

use App\Models\Setting;
use BackedEnum;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use UnitEnum;

class OnlineAdmissionPage extends Page
{
    protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-document-text';
    protected static string | UnitEnum | null $navigationGroup = 'Admissions';
    protected static ?string $navigationLabel = 'Online Admission';
    protected static ?string $title = 'Online Admission Settings';
    protected static ?string $slug = 'online-admission';

    protected static ?string $description = 'Manage content displayed on the online admission page.';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill([
            'hero_title' => Setting::where('key', 'admission_hero_title')->first()?->value ?? 'Online Admission',
            'hero_subtitle' => Setting::where('key', 'admission_hero_subtitle')->first()?->value ?? 'Begin your child\'s journey with us.',
            'hero_badge' => Setting::where('key', 'admission_hero_badge')->first()?->value ?? 'Join Us',
            'process_heading' => Setting::where('key', 'admission_process_heading')->first()?->value ?? 'How It Works',
            'process_step_1_title' => Setting::where('key', 'admission_process_step_1_title')->first()?->value ?? 'Fill the Form',
            'process_step_1_desc' => Setting::where('key', 'admission_process_step_1_desc')->first()?->value ?? 'Complete the online inquiry form with your details.',
            'process_step_2_title' => Setting::where('key', 'admission_process_step_2_title')->first()?->value ?? 'We Contact You',
            'process_step_2_desc' => Setting::where('key', 'admission_process_step_2_desc')->first()?->value ?? 'Our admissions team reaches out within 2-3 days.',
            'process_step_3_title' => Setting::where('key', 'admission_process_step_3_title')->first()?->value ?? 'Campus Visit',
            'process_step_3_desc' => Setting::where('key', 'admission_process_step_3_desc')->first()?->value ?? 'Visit the campus, meet faculty, student assessment.',
            'process_step_4_title' => Setting::where('key', 'admission_process_step_4_title')->first()?->value ?? 'Confirm Admission',
            'process_step_4_desc' => Setting::where('key', 'admission_process_step_4_desc')->first()?->value ?? 'Submit documents and complete fee payment.',
            'documents_title' => Setting::where('key', 'admission_documents_title')->first()?->value ?? 'Required Documents',
            'documents_list' => Setting::where('key', 'admission_documents_list')->first()?->value ?? "Birth certificate (original + copy)\nPrevious school report cards (last 2 years)\nPassport-sized photographs (4 copies)\nParent/guardian ID proof\nTransfer certificate (if applicable)",
            'eligibility_title' => Setting::where('key', 'admission_eligibility_title')->first()?->value ?? 'Eligibility',
            'eligibility_list' => Setting::where('key', 'admission_eligibility_list')->first()?->value ?? "Age requirements per grade level apply\nPrevious academic records required for grade 2+\nAdmission subject to seat availability\nAll students must complete the assessment round\nFinal admission at the discretion of the school",
            'next_steps_title' => Setting::where('key', 'admission_next_steps_title')->first()?->value ?? 'What Happens After You Apply?',
            'cta_heading' => Setting::where('key', 'admission_cta_heading')->first()?->value ?? 'Need Help?',
            'cta_text' => Setting::where('key', 'admission_cta_text')->first()?->value ?? 'Our admissions team is ready to assist you.',
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Hero Section')
                    ->icon('heroicon-o-photo')
                    ->schema([
                        Grid::make(3)->schema([
                            TextInput::make('hero_badge')->label('Badge Text')->maxLength(50),
                            TextInput::make('hero_title')->label('Title')->maxLength(100),
                        ]),
                        TextInput::make('hero_subtitle')->label('Subtitle')->maxLength(255),
                    ]),

                Section::make('Process Steps (4 steps)')
                    ->icon('heroicon-o-list-bullet')
                    ->schema([
                        TextInput::make('process_heading')->label('Section Heading')->maxLength(100),
                        Grid::make(2)->schema([
                            TextInput::make('process_step_1_title')->label('Step 1 Title')->maxLength(50),
                            Textarea::make('process_step_1_desc')->label('Step 1 Description')->rows(2),
                            TextInput::make('process_step_2_title')->label('Step 2 Title')->maxLength(50),
                            Textarea::make('process_step_2_desc')->label('Step 2 Description')->rows(2),
                            TextInput::make('process_step_3_title')->label('Step 3 Title')->maxLength(50),
                            Textarea::make('process_step_3_desc')->label('Step 3 Description')->rows(2),
                            TextInput::make('process_step_4_title')->label('Step 4 Title')->maxLength(50),
                            Textarea::make('process_step_4_desc')->label('Step 4 Description')->rows(2),
                        ]),
                    ]),

                Section::make('Documents & Eligibility')
                    ->icon('heroicon-o-document-check')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('documents_title')->label('Documents Section Title')->maxLength(100),
                            Textarea::make('documents_list')->label('Documents (one per line)')->rows(5),
                            TextInput::make('eligibility_title')->label('Eligibility Section Title')->maxLength(100),
                            Textarea::make('eligibility_list')->label('Eligibility Criteria (one per line)')->rows(5),
                        ]),
                    ]),

                Section::make('CTA Section')
                    ->icon('heroicon-o-phone')
                    ->schema([
                        TextInput::make('cta_heading')->label('CTA Heading')->maxLength(100),
                        TextInput::make('cta_text')->label('CTA Text')->maxLength(255),
                    ]),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        $keys = [
            'hero_badge', 'hero_title', 'hero_subtitle',
            'process_heading',
            'process_step_1_title', 'process_step_1_desc',
            'process_step_2_title', 'process_step_2_desc',
            'process_step_3_title', 'process_step_3_desc',
            'process_step_4_title', 'process_step_4_desc',
            'documents_title', 'documents_list',
            'eligibility_title', 'eligibility_list',
            'cta_heading', 'cta_text',
        ];

        foreach ($keys as $key) {
            $settingKey = 'admission_' . $key;
            Setting::updateOrCreate(
                ['key' => $settingKey],
                ['value' => $data[$key] ?? '', 'group' => 'admission']
            );
        }

        Notification::make()
            ->title('Online admission settings saved successfully.')
            ->success()
            ->send();
    }
}
