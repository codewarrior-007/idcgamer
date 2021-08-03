<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\FormField;
use App\Models\UserStatusHistory;
use App\Models\FormFieldCondition;
use FormBuilder;

class FormOnboardingFinraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sort = 0;

        $page = FormBuilder::createPage('Financial Industry Regulatory Authority (FINRA)', UserStatusHistory::STATUS_FINRA_LICENSE);

        // registered rep question

        $section = FormBuilder::createSection('Are you a registered rep with FINRA?', $page->id, $sort++);
        $finraRepSelect = FormBuilder::createField('', FormField::TYPE_SELECT, FormField::WIDTH_HALF, $section->id, 'Please Select', 1, 0, 1, FormField::SELECT_BOOL);

        // user is registered

        $section = FormBuilder::createSection('Broker/Dealer Name', $page->id, $sort++, $finraRepSelect->id, FormField::SELECT_BOOL_YES);
        FormBuilder::createField('', FormField::TYPE_TEXT, FormField::WIDTH_HALF, $section->id, '');

        $section = FormBuilder::createSection('CRD Number', $page->id, $sort++, $finraRepSelect->id, FormField::SELECT_BOOL_YES);
        FormBuilder::createField('', FormField::TYPE_TEXT, FormField::WIDTH_HALF, $section->id, '');

        // if user is not registered, next button is still enabled

    }
}
