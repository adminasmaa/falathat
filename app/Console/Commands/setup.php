<?php

namespace App\Console\Commands;

use App\Models\Language;
use App\Models\Role;
use App\Models\Setting;
use App\Models\User;
use App\Services\Roles\RolesGenerator;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

/**
 *
 */
class setup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:setup {--fresh}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Build CRM also, Seed our database with needed data.';

    /**
     * @var array
     */
    protected array $setupFileContent = [
        'run-migration' => FALSE,
        'run-seeder' => FALSE,
        'generate-roles' => FALSE,
        'generate-super-admin' => FALSE,
        'generate-languages' => FALSE,
        'generate-settings' => FALSE
    ];

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->withErrorHandling(function () {
            $this->freshSetupCheck();
            $this->setSetupFileContent();
            foreach ($this->setupFileContent as $option => $status) {
                $method = Str::camel($option);
                if ($this->validateNotSetupBefore($option) && method_exists($this, $method))
                    $this->{$method}();
            }
            $this->completeSetup();
        });
    }

    /**
     * Handle expected errors
     *
     * @param $callback
     */
    protected function withErrorHandling($callback)
    {
        try {
            $callback();
        } catch (\Exception $exception) {
            $this->error($exception->getMessage());
        }
    }

    /**
     * Run all migrations.
     */
    protected function runMigration()
    {
        //Artisan::call('migrate:fresh');

        $this->updateSetupFile('run-migration');
    }

    /**
     * Run all migrations.
     */
    protected function runSeeder()
    {
        Artisan::call('db:seed');

        $this->updateSetupFile('run-seeder');
    }

    /**
     * Generate modules' roles.
     */
    protected function generateRoles()
    {
        // Generate and store all dashboard permissions.
        RolesGenerator::GenerateAndStorePermissions(['Dashboard']);

        // Create basic role and assign all permissions to it.
        RolesGenerator::Create((!Role::count() ? RolesGenerator::BASIC_ROLE : Role::find(1)));

        $this->updateSetupFile('generate-roles');
    }

    /**
     * Generate super-admin user to manage our CRM.
     */
    protected function generateSuperAdmin()
    {
        $superAdmin = User::firstOrCreate(
            ['id' => 1],
            [
                'name' => 'Admin',
                'email' => 'root-user@falazat.com',
                'password' => bcrypt('secret'),
                'status' => TRUE
            ]
        );
        $superAdmin->roles()->sync(1);

        $this->updateSetupFile('generate-super-admin');
    }

    /**
     * Run all default languages.
     */
    protected function generateLanguages()
    {
        $english_language = Language::firstOrCreate(['code' => 'en'], ['code' => 'en', 'required' => 1, 'default' => 1]);
        $arabic_language = Language::firstOrCreate(['code' => 'ar'], ['code' => 'ar', 'required' => 1, 'default' => 1]);

        $english_language->translations()->sync([
            $english_language->id => ['name' => 'English'],
            $arabic_language->id => ['name' => 'الانجليزية']
        ]);

        $arabic_language->translations()->sync([
            $english_language->id => ['name' => 'Arabic'],
            $arabic_language->id => ['name' => 'العربية']
        ]);

        $this->updateSetupFile('generate-super-admin');
    }

    /**
     * Run all default setting keys.
     */
    protected function generateSettings()
    {
        // Services Section
        $serviceSectionTitle = Setting::firstOrCreate(
            ['key' => 'services_section_title', 'col' => 6, 'type' => 'text', 'section' => 'Services Section']
        );
        if (!$serviceSectionTitle->translations->count())
            $serviceSectionTitle->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);

        $serviceSectionImage = Setting::firstOrCreate(
            ['key' => 'services_section_image', 'col' => 12, 'type' => 'file', 'section' => 'Services Section']
        );
        if (!$serviceSectionImage->translations->count())
            $serviceSectionImage->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);

        // First Service
        $serviceSectionFirstServiceIcon = Setting::firstOrCreate(
            ['key' => 'first_service_icon', 'col' => 6, 'type' => 'text', 'section' => 'Services Section']
        );
        if (!$serviceSectionFirstServiceIcon->translations->count())
            $serviceSectionFirstServiceIcon->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);

        $serviceSectionFirstServiceTitle = Setting::firstOrCreate(
            ['key' => 'first_service_title', 'col' => 6, 'type' => 'text', 'section' => 'Services Section']
        );
        if (!$serviceSectionFirstServiceTitle->translations->count())
            $serviceSectionFirstServiceTitle->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);

        $serviceSectionFirstServiceBrief = Setting::firstOrCreate(
            ['key' => 'first_service_brief', 'col' => 6, 'type' => 'textarea', 'section' => 'Services Section']
        );
        if (!$serviceSectionFirstServiceBrief->translations->count())
            $serviceSectionFirstServiceBrief->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);
        // First Service

        // Second Service
        $serviceSectionSecondServiceIcon = Setting::firstOrCreate(
            ['key' => 'second_service_icon', 'col' => 6, 'type' => 'text', 'section' => 'Services Section']
        );
        if (!$serviceSectionSecondServiceIcon->translations->count())
            $serviceSectionSecondServiceIcon->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);

        $serviceSectionSecondServiceTitle = Setting::firstOrCreate(
            ['key' => 'second_service_title', 'col' => 6, 'type' => 'text', 'section' => 'Services Section']
        );
        if (!$serviceSectionSecondServiceTitle->translations->count())
            $serviceSectionSecondServiceTitle->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);

        $serviceSectionSecondServiceBrief = Setting::firstOrCreate(
            ['key' => 'second_service_brief', 'col' => 6, 'type' => 'textarea', 'section' => 'Services Section']
        );
        if (!$serviceSectionSecondServiceBrief->translations->count())
            $serviceSectionSecondServiceBrief->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);
        // Second Service

        // Third Service
        $serviceSectionThirdServiceIcon = Setting::firstOrCreate(
            ['key' => 'third_service_icon', 'col' => 6, 'type' => 'text', 'section' => 'Services Section']
        );
        if (!$serviceSectionThirdServiceIcon->translations->count())
            $serviceSectionThirdServiceIcon->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);

        $serviceSectionThirdServiceTitle = Setting::firstOrCreate(
            ['key' => 'third_service_title', 'col' => 6, 'type' => 'text', 'section' => 'Services Section']
        );
        if (!$serviceSectionThirdServiceTitle->translations->count())
            $serviceSectionThirdServiceTitle->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);

        $serviceSectionThirdServiceBrief = Setting::firstOrCreate(
            ['key' => 'third_service_brief', 'col' => 6, 'type' => 'textarea', 'section' => 'Services Section']
        );
        if (!$serviceSectionThirdServiceBrief->translations->count())
            $serviceSectionThirdServiceBrief->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);
        // Third Service

        // Fourth Service
        $serviceSectionFourthServiceIcon = Setting::firstOrCreate(
            ['key' => 'fourth_service_icon', 'col' => 6, 'type' => 'text', 'section' => 'Services Section']
        );
        if (!$serviceSectionFourthServiceIcon->translations->count())
            $serviceSectionFourthServiceIcon->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);

        $serviceSectionFourthServiceTitle = Setting::firstOrCreate(
            ['key' => 'fourth_service_title', 'col' => 6, 'type' => 'text', 'section' => 'Services Section']
        );
        if (!$serviceSectionFourthServiceTitle->translations->count())
            $serviceSectionFourthServiceTitle->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);

        $serviceSectionFourthServiceBrief = Setting::firstOrCreate(
            ['key' => 'fourth_service_brief', 'col' => 6, 'type' => 'textarea', 'section' => 'Services Section']
        );
        if (!$serviceSectionFourthServiceBrief->translations->count())
            $serviceSectionFourthServiceBrief->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);
        // Fourth Service


        // Levels Section
        $levelsSectionTitle = Setting::firstOrCreate(
            ['key' => 'levels_section_title', 'col' => 6, 'type' => 'text', 'section' => 'Levels Section']
        );
        if (!$levelsSectionTitle->translations->count())
            $levelsSectionTitle->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);

        $levelsSectionSubTitle = Setting::firstOrCreate(
            ['key' => 'levels_section_subtitle', 'col' => 6, 'type' => 'text', 'section' => 'Levels Section']
        );
        if (!$levelsSectionSubTitle->translations->count())
            $levelsSectionSubTitle->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);

        // First Level
        $levelSectionFirstLevelTitle = Setting::firstOrCreate(
            ['key' => 'first_level_title', 'col' => 6, 'type' => 'text', 'section' => 'Levels Section']
        );
        if (!$levelSectionFirstLevelTitle->translations->count())
            $levelSectionFirstLevelTitle->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);

        $levelSectionFirstLevelBrief = Setting::firstOrCreate(
            ['key' => 'first_level_brief', 'col' => 6, 'type' => 'textarea', 'section' => 'Levels Section']
        );
        if (!$levelSectionFirstLevelBrief->translations->count())
            $levelSectionFirstLevelBrief->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);
        // First Level

        // Second Level
        $levelSectionSecondLevelTitle = Setting::firstOrCreate(
            ['key' => 'second_level_title', 'col' => 6, 'type' => 'text', 'section' => 'Levels Section']
        );
        if (!$levelSectionSecondLevelTitle->translations->count())
            $levelSectionSecondLevelTitle->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);

        $levelSectionSecondLevelBrief = Setting::firstOrCreate(
            ['key' => 'second_level_brief', 'col' => 6, 'type' => 'textarea', 'section' => 'Levels Section']
        );
        if (!$levelSectionSecondLevelBrief->translations->count())
            $levelSectionSecondLevelBrief->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);
        // Second Level

        // Third Level
        $levelSectionThirdLevelTitle = Setting::firstOrCreate(
            ['key' => 'third_level_title', 'col' => 6, 'type' => 'text', 'section' => 'Levels Section']
        );
        if (!$levelSectionThirdLevelTitle->translations->count())
            $levelSectionThirdLevelTitle->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);

        $levelSectionThirdLevelBrief = Setting::firstOrCreate(
            ['key' => 'third_level_brief', 'col' => 6, 'type' => 'textarea', 'section' => 'Levels Section']
        );
        if (!$levelSectionThirdLevelBrief->translations->count())
            $levelSectionThirdLevelBrief->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);
        // Third Level

        // Fourth Level
        $levelSectionFourthLevelTitle = Setting::firstOrCreate(
            ['key' => 'fourth_level_title', 'col' => 6, 'type' => 'text', 'section' => 'Levels Section']
        );
        if (!$levelSectionFourthLevelTitle->translations->count())
            $levelSectionFourthLevelTitle->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);

        $levelSectionFourthLevelBrief = Setting::firstOrCreate(
            ['key' => 'fourth_level_brief', 'col' => 6, 'type' => 'textarea', 'section' => 'Levels Section']
        );
        if (!$levelSectionFourthLevelBrief->translations->count())
            $levelSectionFourthLevelBrief->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);
        // Fourth Level

        // Fifth Level
        $levelSectionFifthLevelTitle = Setting::firstOrCreate(
            ['key' => 'fifth_level_title', 'col' => 6, 'type' => 'text', 'section' => 'Levels Section']
        );
        if (!$levelSectionFifthLevelTitle->translations->count())
            $levelSectionFifthLevelTitle->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);

        $levelSectionFifthLevelBrief = Setting::firstOrCreate(
            ['key' => 'fifth_level_brief', 'col' => 6, 'type' => 'textarea', 'section' => 'Levels Section']
        );
        if (!$levelSectionFifthLevelBrief->translations->count())
            $levelSectionFifthLevelBrief->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);
        // Fifth Level

        // Home Section
        $homeSectionStartedSince = Setting::firstOrCreate(
            ['key' => 'we_started_since', 'col' => 6, 'type' => 'text', 'section' => 'Home Section']
        );
        if (!$homeSectionStartedSince->translations->count())
            $homeSectionStartedSince->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);

        $homeSectionStudents = Setting::firstOrCreate(
            ['key' => 'children_in_classes', 'col' => 6, 'type' => 'text', 'section' => 'Home Section']
        );
        if (!$homeSectionStudents->translations->count())
            $homeSectionStudents->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);

        // Home Branch Section
        $homeSectionBranchTitle = Setting::firstOrCreate(
            ['key' => 'branch_section_title', 'col' => 6, 'type' => 'text', 'section' => 'Home Section']
        );
        if (!$homeSectionBranchTitle->translations->count())
            $homeSectionBranchTitle->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);

        $homeSectionBranchSubTitle = Setting::firstOrCreate(
            ['key' => 'branch_section_subtitle', 'col' => 6, 'type' => 'textarea', 'section' => 'Home Section']
        );
        if (!$homeSectionBranchSubTitle->translations->count())
            $homeSectionBranchSubTitle->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);

        // Home News Section
        $homeSectionNewsTitle = Setting::firstOrCreate(
            ['key' => 'news_section_title', 'col' => 6, 'type' => 'text', 'section' => 'Home Section']
        );
        if (!$homeSectionNewsTitle->translations->count())
            $homeSectionNewsTitle->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);

        $homeSectionNewsSubTitle = Setting::firstOrCreate(
            ['key' => 'news_section_subtitle', 'col' => 6, 'type' => 'textarea', 'section' => 'Home Section']
        );
        if (!$homeSectionNewsSubTitle->translations->count())
            $homeSectionNewsSubTitle->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);

        // Home Contact Section
        $homeSectionContactTitle = Setting::firstOrCreate(
            ['key' => 'contact_section_title', 'col' => 6, 'type' => 'text', 'section' => 'Home Section']
        );
        if (!$homeSectionContactTitle->translations->count())
            $homeSectionContactTitle->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);

        $homeSectionContactSubTitle = Setting::firstOrCreate(
            ['key' => 'contact_section_subtitle', 'col' => 6, 'type' => 'textarea', 'section' => 'Home Section']
        );
        if (!$homeSectionContactSubTitle->translations->count())
            $homeSectionContactSubTitle->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);

        $homeSectionContactGoogleMap = Setting::firstOrCreate(
            ['key' => 'contact_section_google_map', 'col' => 6, 'type' => 'text', 'section' => 'Home Section']
        );
        if (!$homeSectionContactGoogleMap->translations->count())
            $homeSectionContactGoogleMap->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);

        // Contact Us Section
        $communicationSectionFacebook = Setting::firstOrCreate(
            ['key' => 'communication_section_facebook', 'col' => 6, 'type' => 'text', 'section' => 'Communication Section']
        );
        if (!$communicationSectionFacebook->translations->count())
            $communicationSectionFacebook->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);

        $communicationSectionTwitter = Setting::firstOrCreate(
            ['key' => 'communication_section_twitter', 'col' => 6, 'type' => 'text', 'section' => 'Communication Section']
        );
        if (!$communicationSectionTwitter->translations->count())
            $communicationSectionTwitter->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);

        $communicationSectionInstagram = Setting::firstOrCreate(
            ['key' => 'communication_section_instagram', 'col' => 6, 'type' => 'text', 'section' => 'Communication Section']
        );
        if (!$communicationSectionInstagram->translations->count())
            $communicationSectionInstagram->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);

        $communicationSectionLinkedIn = Setting::firstOrCreate(
            ['key' => 'communication_section_linkedin', 'col' => 6, 'type' => 'text', 'section' => 'Communication Section']
        );
        if (!$communicationSectionLinkedIn->translations->count())
            $communicationSectionLinkedIn->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);

        $communicationSectionAddress = Setting::firstOrCreate(
            ['key' => 'communication_section_address', 'col' => 6, 'type' => 'textarea', 'section' => 'Communication Section']
        );
        if (!$communicationSectionAddress->translations->count())
            $communicationSectionAddress->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);

        $communicationSectionEmail = Setting::firstOrCreate(
            ['key' => 'communication_section_email', 'col' => 6, 'type' => 'text', 'section' => 'Communication Section']
        );
        if (!$communicationSectionEmail->translations->count())
            $communicationSectionEmail->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);

        $communicationSectionPhone = Setting::firstOrCreate(
            ['key' => 'communication_section_phone', 'col' => 6, 'type' => 'text', 'section' => 'Communication Section']
        );
        if (!$communicationSectionPhone->translations->count())
            $communicationSectionPhone->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);

        $communicationSectionTime = Setting::firstOrCreate(
            ['key' => 'communication_section_time', 'col' => 6, 'type' => 'text', 'section' => 'Communication Section']
        );
        if (!$communicationSectionTime->translations->count())
            $communicationSectionTime->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);


        // About Page Vision
        $aboutPageVisionTitle = Setting::firstOrCreate(
            ['key' => 'vision_section_title', 'col' => 6, 'type' => 'text', 'section' => 'About Page']
        );
        if (!$aboutPageVisionTitle->translations->count())
            $aboutPageVisionTitle->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);

        $aboutPageVisionBody = Setting::firstOrCreate(
            ['key' => 'vision_section_body', 'col' => 6, 'type' => 'textarea', 'section' => 'About Page']
        );
        if (!$aboutPageVisionBody->translations->count())
            $aboutPageVisionBody->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);
        // About Page Vision

        // About Page Message
        $aboutPageMessageTitle = Setting::firstOrCreate(
            ['key' => 'message_section_title', 'col' => 6, 'type' => 'text', 'section' => 'About Page']
        );
        if (!$aboutPageMessageTitle->translations->count())
            $aboutPageMessageTitle->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);

        $aboutPageMessageBody = Setting::firstOrCreate(
            ['key' => 'message_section_body', 'col' => 6, 'type' => 'textarea', 'section' => 'About Page']
        );
        if (!$aboutPageMessageBody->translations->count())
            $aboutPageMessageBody->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);
        // About Page Message

        // About Page Goals
        $aboutPageGoalsTitle = Setting::firstOrCreate(
            ['key' => 'goals_section_title', 'col' => 6, 'type' => 'text', 'section' => 'About Page']
        );
        if (!$aboutPageGoalsTitle->translations->count())
            $aboutPageGoalsTitle->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);

        // First Goal
        $aboutPageFirstGoalTitle = Setting::firstOrCreate(
            ['key' => 'first_goal_title', 'col' => 6, 'type' => 'text', 'section' => 'About Page']
        );
        if (!$aboutPageFirstGoalTitle->translations->count())
            $aboutPageFirstGoalTitle->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);

        $aboutPageFirstGoalImage = Setting::firstOrCreate(
            ['key' => 'first_goal_image', 'col' => 12, 'type' => 'file', 'section' => 'About Page']
        );
        if (!$aboutPageFirstGoalImage->translations->count())
            $aboutPageFirstGoalImage->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);

        $aboutPageFirstGoalBody = Setting::firstOrCreate(
            ['key' => 'first_goal_body', 'col' => 6, 'type' => 'textarea', 'section' => 'About Page']
        );
        if (!$aboutPageFirstGoalBody->translations->count())
            $aboutPageFirstGoalBody->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);
        // First Goal

        // Second Goal
        $aboutPageSecondGoalTitle = Setting::firstOrCreate(
            ['key' => 'second_goal_title', 'col' => 6, 'type' => 'text', 'section' => 'About Page']
        );
        if (!$aboutPageSecondGoalTitle->translations->count())
            $aboutPageSecondGoalTitle->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);

        $aboutPageSecondGoalImage = Setting::firstOrCreate(
            ['key' => 'second_goal_image', 'col' => 12, 'type' => 'file', 'section' => 'About Page']
        );
        if (!$aboutPageSecondGoalImage->translations->count())
            $aboutPageSecondGoalImage->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);

        $aboutPageSecondGoalBody = Setting::firstOrCreate(
            ['key' => 'second_goal_body', 'col' => 6, 'type' => 'textarea', 'section' => 'About Page']
        );
        if (!$aboutPageSecondGoalBody->translations->count())
            $aboutPageSecondGoalBody->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);
        // Second Goal

        // Third Goal
        $aboutPageThirdGoalTitle = Setting::firstOrCreate(
            ['key' => 'third_goal_title', 'col' => 6, 'type' => 'text', 'section' => 'About Page']
        );
        if (!$aboutPageThirdGoalTitle->translations->count())
            $aboutPageThirdGoalTitle->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);

        $aboutPageThirdGoalImage = Setting::firstOrCreate(
            ['key' => 'third_goal_image', 'col' => 12, 'type' => 'file', 'section' => 'About Page']
        );
        if (!$aboutPageThirdGoalImage->translations->count())
            $aboutPageThirdGoalImage->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);

        $aboutPageThirdGoalBody = Setting::firstOrCreate(
            ['key' => 'third_goal_body', 'col' => 6, 'type' => 'textarea', 'section' => 'About Page']
        );
        if (!$aboutPageThirdGoalBody->translations->count())
            $aboutPageThirdGoalBody->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);
        // Third Goal

        // Principles Section
        $principlesSectionTitle = Setting::firstOrCreate(
            ['key' => 'principles_section_title', 'col' => 6, 'type' => 'text', 'section' => 'Principles Section']
        );
        if (!$principlesSectionTitle->translations->count())
            $principlesSectionTitle->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);

        $principlesSectionSubTitle = Setting::firstOrCreate(
            ['key' => 'principles_section_subtitle', 'col' => 6, 'type' => 'text', 'section' => 'Principles Section']
        );
        if (!$principlesSectionSubTitle->translations->count())
            $principlesSectionSubTitle->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);

        // First Principle
        $principlesSectionFirstPrincipleTitle = Setting::firstOrCreate(
            ['key' => 'first_principle_title', 'col' => 6, 'type' => 'text', 'section' => 'Principles Section']
        );
        if (!$principlesSectionFirstPrincipleTitle->translations->count())
            $principlesSectionFirstPrincipleTitle->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);

        $principlesSectionFirstPrincipleBrief = Setting::firstOrCreate(
            ['key' => 'first_principle_brief', 'col' => 6, 'type' => 'textarea', 'section' => 'Principles Section']
        );
        if (!$principlesSectionFirstPrincipleBrief->translations->count())
            $principlesSectionFirstPrincipleBrief->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);
        // First Principle

        // Second Principle
        $principlesSectionSecondPrincipleTitle = Setting::firstOrCreate(
            ['key' => 'second_principle_title', 'col' => 6, 'type' => 'text', 'section' => 'Principles Section']
        );
        if (!$principlesSectionSecondPrincipleTitle->translations->count())
            $principlesSectionSecondPrincipleTitle->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);

        $principlesSectionSecondPrincipleBrief = Setting::firstOrCreate(
            ['key' => 'second_principle_brief', 'col' => 6, 'type' => 'textarea', 'section' => 'Principles Section']
        );
        if (!$principlesSectionSecondPrincipleBrief->translations->count())
            $principlesSectionSecondPrincipleBrief->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);
        // Second Principle

        // Third Principle
        $principlesSectionThirdPrincipleTitle = Setting::firstOrCreate(
            ['key' => 'third_principle_title', 'col' => 6, 'type' => 'text', 'section' => 'Principles Section']
        );
        if (!$principlesSectionThirdPrincipleTitle->translations->count())
            $principlesSectionThirdPrincipleTitle->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);

        $principlesSectionThirdPrincipleBrief = Setting::firstOrCreate(
            ['key' => 'third_principle_brief', 'col' => 6, 'type' => 'textarea', 'section' => 'Principles Section']
        );
        if (!$principlesSectionThirdPrincipleBrief->translations->count())
            $principlesSectionThirdPrincipleBrief->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);
        // Third Principle

        // Fourth Principle
        $principlesSectionFourthPrincipleTitle = Setting::firstOrCreate(
            ['key' => 'fourth_principle_title', 'col' => 6, 'type' => 'text', 'section' => 'Principles Section']
        );
        if (!$principlesSectionFourthPrincipleTitle->translations->count())
            $principlesSectionFourthPrincipleTitle->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);

        $principlesSectionFourthPrincipleBrief = Setting::firstOrCreate(
            ['key' => 'fourth_principle_brief', 'col' => 6, 'type' => 'textarea', 'section' => 'Principles Section']
        );
        if (!$principlesSectionFourthPrincipleBrief->translations->count())
            $principlesSectionFourthPrincipleBrief->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);
        // Fourth Principle

        // Fifth Principle
        $principlesSectionFifthPrincipleTitle = Setting::firstOrCreate(
            ['key' => 'fifth_principle_title', 'col' => 6, 'type' => 'text', 'section' => 'Principles Section']
        );
        if (!$principlesSectionFifthPrincipleTitle->translations->count())
            $principlesSectionFifthPrincipleTitle->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);

        $principlesSectionFifthPrincipleBrief = Setting::firstOrCreate(
            ['key' => 'fifth_principle_brief', 'col' => 6, 'type' => 'textarea', 'section' => 'Principles Section']
        );
        if (!$principlesSectionFifthPrincipleBrief->translations->count())
            $principlesSectionFifthPrincipleBrief->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);
        // Fifth Principle

        // Members Page
        $membersPageTitle = Setting::firstOrCreate(
            ['key' => 'member_page_title', 'col' => 6, 'type' => 'text', 'section' => 'Members Page']
        );
        if (!$membersPageTitle->translations->count())
            $membersPageTitle->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);

        $membersPageSubTitle = Setting::firstOrCreate(
            ['key' => 'member_page_subtitle', 'col' => 6, 'type' => 'text', 'section' => 'Members Page']
        );
        if (!$membersPageSubTitle->translations->count())
            $membersPageSubTitle->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);

        $membersPageBrief = Setting::firstOrCreate(
            ['key' => 'member_page_brief', 'col' => 6, 'type' => 'textarea', 'section' => 'Members Page']
        );
        if (!$membersPageBrief->translations->count())
            $membersPageBrief->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);

        $membersPageSecondTitle = Setting::firstOrCreate(
            ['key' => 'member_page_second_title', 'col' => 6, 'type' => 'text', 'section' => 'Members Page']
        );
        if (!$membersPageSecondTitle->translations->count())
            $membersPageSecondTitle->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);

        $membersPageSecondBrief = Setting::firstOrCreate(
            ['key' => 'member_page_second_brief', 'col' => 6, 'type' => 'textarea', 'section' => 'Members Page']
        );
        if (!$membersPageSecondBrief->translations->count())
            $membersPageSecondBrief->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);
        // Members Page

        // Translation Keys
        $translationText = config('translations.keys');
        foreach ($translationText as $key => $type) {
            $translationsKey = Setting::firstOrCreate(
                ['key' => $key, 'col' => 3, 'type' => $type, 'section' => 'Translations']
            );
            if (!$translationsKey->translations->count())
                $translationsKey->translations()->sync([1 => ['value' => ''], 2 => ['value' => '']]);
        }

        $this->updateSetupFile('generate-settings');
    }

    /**
     * Mark the setup as completed
     */
    protected function completeSetup()
    {
        file_put_contents($this->getSetupFilePath(), json_encode($this->setupFileContent));

        $this->info('Setup is completed');
    }

    /**
     * Get the lock file name
     *
     * @return string
     */
    protected function getSetupFilePath()
    {
        return storage_path('setup.json');
    }

    /**
     * @return void
     */
    private function setSetupFileContent(): void
    {
        $this->setupFileContent = $this->getSetupFileContent();
    }

    /**
     * Prepare setup file content.
     *
     * @return array
     */
    private function getSetupFileContent(): array
    {
        return file_exists($this->getSetupFilePath())
            ? json_decode(file_get_contents($this->getSetupFilePath()), TRUE)
            : $this->setupFileContent;
    }

    /**
     * @return void
     */
    protected function updateSetupFile($option): void
    {
        $this->setupFileContent = Collection::make($this->setupFileContent)
            ->map(fn($value, $key) => $key === $option ?: $value)->toArray();
    }

    /**
     * @return bool
     */
    protected function validateNotSetupBefore($option): bool
    {
        return !Collection::make($this->setupFileContent)
            ->filter(fn($value, $key) => $key === $option)[$option];
    }

    /**
     * @return void
     */
    protected function freshSetupCheck(): void
    {
        if ($this->option('fresh'))
            !file_exists($this->getSetupFilePath()) ?: unlink($this->getSetupFilePath());
    }
}
