<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\FormField;
use App\Models\UserStatusHistory;
use App\Models\FormFieldCondition;
use App\Models\FormSection;
use FormBuilder;

class FormOnboardingAddressHistory extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // first portion of onboarding application form

        $page = FormBuilder::createPage('Address History', UserStatusHistory::STATUS_ADDRESS_HISTORY);
        FormBuilder::addSubline($page, 'Please provide your address history for the past 7 years. Gaps of more than 1 month may require a written explanation.');

        // confirm address

        $section = FormBuilder::createSection('Confirm Your Current Address', $page->id, 0, false, false, false, false, FormSection::FILLMODE_GOOGLE_AUTOCOMPLETE);
        FormBuilder::createField('Street Address', FormField::TYPE_TEXT, FormField::WIDTH_FULL, $section->id, 'Enter a location', 1, 0, 255, false, 'street');
        FormBuilder::createField('Address Line 2', FormField::TYPE_TEXT, FormField::WIDTH_FULL, $section->id, '', 0, 0, 255, false, 'addr2');
        FormBuilder::createField('City', FormField::TYPE_TEXT, FormField::WIDTH_HALF, $section->id, '', 1, 0, 255, false, 'city');
        FormBuilder::createField('State/Province', FormField::TYPE_TEXT, FormField::WIDTH_HALF, $section->id, '', 1, 0, 255, false, 'state');
        FormBuilder::createField('ZIP/Postal Code', FormField::TYPE_TEXT, FormField::WIDTH_HALF, $section->id, '', 1, 0, 255, false, 'zip');
        FormBuilder::createField('Country', FormField::TYPE_SELECT, FormField::WIDTH_HALF, $section->id, 'Please Select', 1, 0, 1, config('countries'), 'country');

        $fromDate = FormBuilder::createField('From', FormField::TYPE_DATE, FormField::WIDTH_THIRD, $section->id);
        FormBuilder::createField('To', FormField::TYPE_DATE, FormField::WIDTH_THIRD, $section->id);

        // $section = FormBuilder::createSection('From', $page->id, 1);
        // $fromDate = FormBuilder::createField('', FormField::TYPE_DATE, FormField::WIDTH_THIRD, $section->id);

        // $section = FormBuilder::createSection('To', $page->id, 2);
        // FormBuilder::createField('', FormField::TYPE_DATE, FormField::WIDTH_THIRD, $section->id);

        // add repeater fields

        $sectionAddress = FormBuilder::createSection('Please Add Your Previous Address', $page->id, 3,  $fromDate->id, FormField::DATE_FIELD_7_YEARS_PRIOR, FormFieldCondition::ACTION_SHOW, FormFieldCondition::TYPE_MORE_THAN, FormSection::FILLMODE_GOOGLE_AUTOCOMPLETE);
        FormBuilder::createField('Street Address', FormField::TYPE_TEXT, FormField::WIDTH_FULL, $sectionAddress->id, 'Enter a location', 1, 0, 255, false, 'street');
        FormBuilder::createField('Address Line 2', FormField::TYPE_TEXT, FormField::WIDTH_FULL, $sectionAddress->id, '', 0, 0, 255, false, 'addr2');
        FormBuilder::createField('City', FormField::TYPE_TEXT, FormField::WIDTH_HALF, $sectionAddress->id, '', 1, 0, 255, false, 'city');
        FormBuilder::createField('State/Province', FormField::TYPE_TEXT, FormField::WIDTH_HALF, $sectionAddress->id, '', 1, 0, 255, false, 'state');
        FormBuilder::createField('ZIP/Postal Code', FormField::TYPE_TEXT, FormField::WIDTH_HALF, $sectionAddress->id, '', 1, 0, 255, false, 'zip');
        FormBuilder::createField('Country', FormField::TYPE_SELECT, FormField::WIDTH_HALF, $sectionAddress->id, 'Please Select', 1, 0, 1, config('countries'), 'country');

        $fromRepeat = FormBuilder::createField('From', FormField::TYPE_DATE, FormField::WIDTH_THIRD, $sectionAddress->id);
        FormBuilder::createField('To', FormField::TYPE_DATE, FormField::WIDTH_THIRD, $sectionAddress->id);

        // $sectionFrom = FormBuilder::createSection('From', $page->id, 4, $fromDate->id, FormField::DATE_FIELD_7_YEARS_PRIOR, FormFieldCondition::ACTION_SHOW, FormFieldCondition::TYPE_MORE_THAN);
        // $fromRepeat = FormBuilder::createField('', FormField::TYPE_DATE, FormField::WIDTH_THIRD, $sectionFrom->id);

        // $sectionTo = FormBuilder::createSection('To', $page->id, 5, $fromDate->id, FormField::DATE_FIELD_7_YEARS_PRIOR, FormFieldCondition::ACTION_SHOW, FormFieldCondition::TYPE_MORE_THAN);
        // FormBuilder::createField('', FormField::TYPE_DATE, FormField::WIDTH_THIRD, $sectionTo->id);

        // add repeater conditions

        FormBuilder::addCondition($sectionAddress->id, $fromRepeat->id, FormField::DATE_FIELD_7_YEARS_PRIOR, FormFieldCondition::ACTION_REPEAT_DATE, FormFieldCondition::TYPE_MORE_THAN);
        // FormBuilder::addCondition($sectionFrom->id, $fromRepeat->id, FormField::DATE_FIELD_7_YEARS_PRIOR, FormFieldCondition::ACTION_REPEAT_DATE, FormFieldCondition::TYPE_MORE_THAN);
        // FormBuilder::addCondition($sectionTo->id, $fromRepeat->id, FormField::DATE_FIELD_7_YEARS_PRIOR, FormFieldCondition::ACTION_REPEAT_DATE, FormFieldCondition::TYPE_MORE_THAN);

    }
}
