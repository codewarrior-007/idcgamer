<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\FormField;
use App\Models\UserStatusHistory;
use App\Models\FormFieldCondition;
use FormBuilder;

class FormOnboardingEoInsuranceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sort = 0;

        $page = FormBuilder::createPage('Errors & Omissions (E&O) Insurance', UserStatusHistory::STATUS_EO_INSURANCE);

        // registered rep question

        $section = FormBuilder::createSection('Do you currently have E&O Insurance?', $page->id, $sort++);
        FormBuilder::addSubline($section, "While E&O Insurance isn't required to start writing business, it is required by half of our carriers. For more info, go to <a href='http://www.calsurance.com/sfglife' target='_blank'>http://www.calsurance.com/sfglife</a>");
        $eoSelect = FormBuilder::createField('', FormField::TYPE_SELECT, FormField::WIDTH_HALF, $section->id, 'Please Select', 1, 0, 1, FormField::SELECT_BOOL);

        // user has insurance

        $section = FormBuilder::createSection('Upload a copy of your E&O certificate', $page->id, $sort++, $eoSelect->id, FormField::SELECT_BOOL_YES);
        FormBuilder::createField('', FormField::TYPE_UPLOAD, FormField::WIDTH_FULL, $section->id, '');

        // if user does not have insurance, next button is still enabled
    }
}
