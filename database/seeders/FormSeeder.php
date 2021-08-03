<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\FormField;
use App\Models\FormOption;
use App\Models\FormSection;
use App\Models\FormPage;
use App\Models\FormFieldCondition;

class FormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // mssql will not let us temporarily disable foreign key checks
        // so instead of recreating all the FKs to truncate, we'll just let the indicies grow
        // NOTE: if truncate is needed, you might have to rebuild the entire db
        // *just mssql things*
        FormOption::query()->delete();
        FormFieldCondition::query()->delete();
        FormField::query()->delete();
        FormSection::query()->delete();
        FormPage::query()->delete();

        // seed individual forms
        $this->call(FormAgentRegistrationSeeder::class);
        $this->call(FormOnboardingInitialSeeder::class);
        $this->call(FormOnboardingLicenseSeeder::class);
        $this->call(FormOnboardingLegalSeeder::class);
        $this->call(FormOnboardingAddressHistory::class);
        $this->call(FormOnboardingAntiMoneyLaundering::class);
        $this->call(FormOnboardingFinraSeeder::class);
        $this->call(FormOnboardingEoInsuranceSeeder::class);
        $this->call(FormOnboardingSuranceBaySeeder::class);

    }
}
