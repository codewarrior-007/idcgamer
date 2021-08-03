<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\FormField;
use App\Models\FormSection;
use App\Models\UserStatusHistory;
use FormBuilder;

class FormOnboardingLicenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // first portion of onboarding applicaiton form

        $page = FormBuilder::createPage('Insurance License Information', UserStatusHistory::STATUS_SECOND);
        FormBuilder::addSubline($page, 'Please complete the following information about your current insurance licensing.');

        // main licensed question

        $section = FormBuilder::createSection('Do you have a resident life insurance license?', $page->id, 0);
        $licenseSelect = FormBuilder::createField('', FormField::TYPE_SELECT, FormField::WIDTH_HALF, $section->id, 'Please Select', 1, 0, 1, FormField::SELECT_BOOL);

        /* 
         * USER CURRENTLY HAS A RESIDENT LIFE INSURANCE LICENSE
         */

        // workflow for licensed users

        $section = FormBuilder::createSection('Resident Insurance License Number', $page->id, 1, $licenseSelect->id, FormField::SELECT_BOOL_YES);
        FormBuilder::createField('', FormField::TYPE_TEXT, FormField::WIDTH_HALF, $section->id, '');

        $section = FormBuilder::createSection('NPN Number', $page->id, 2, $licenseSelect->id, FormField::SELECT_BOOL_YES);
        FormBuilder::createField('', FormField::TYPE_TEXT, FormField::WIDTH_HALF, $section->id, '');

        $section = FormBuilder::createSection('Resident Insurance License State', $page->id, 3, $licenseSelect->id, FormField::SELECT_BOOL_YES);
        FormBuilder::createField('', FormField::TYPE_SELECT, FormField::WIDTH_HALF, $section->id, 'Please Select', 1, 0, 1, config('states'));

        $section = FormBuilder::createSection('Resident Insurance License Issued On', $page->id, 4, $licenseSelect->id, FormField::SELECT_BOOL_YES);
        FormBuilder::createField('', FormField::TYPE_DATE, FormField::WIDTH_THIRD, $section->id);

        /* 
         * IS THIS USER A BUSINESS
         */

        // "doing business as" select -- selection for individual does not have additional flow on this page

        $section = FormBuilder::createSection('Doing Business As', $page->id, 5, $licenseSelect->id, FormField::SELECT_BOOL_YES);
        $dbaSelect = FormBuilder::createField('', FormField::TYPE_SELECT, FormField::WIDTH_HALF, $section->id, 'Please Select', 1, 0, 1, FormField::SELECT_BUSINESS_TYPE);

        // business life insurance license

        $section = FormBuilder::createSection('Do you have a business life insurance license?', $page->id, 6, $dbaSelect->id, FormField::SELECT_BUSINESS_TYPE_BUSINESS);
        $bizInsuredSelect = FormBuilder::createField('', FormField::TYPE_SELECT, FormField::WIDTH_HALF, $section->id, 'Please Select', 1, 0, 1, FormField::SELECT_BOOL);

        /* 
         * DOES USER HAVE BUSINESS LIFE INSURANCE LICENSE
         */

        // notice for businesses without license

        $section = FormBuilder::createSection('', $page->id, 7, $bizInsuredSelect->id, FormField::SELECT_BOOL_NO);
        FormBuilder::createField("Unfortunately, until you have proof of a valid business license, we will be unable to contract you as a business entity. You may complete your application by selecting 'DBA: Individual', and submit your business license at a later date.", FormField::TYPE_HTML, FormField::WIDTH_FULL, $section->id);

        // workflow for businessess with a valid license

        $section = FormBuilder::createSection('Business Insurance License Number', $page->id, 8, $bizInsuredSelect->id, FormField::SELECT_BOOL_YES);
        FormBuilder::createField('', FormField::TYPE_TEXT, FormField::WIDTH_HALF, $section->id, '');

        $section = FormBuilder::createSection('Business Insurance License State', $page->id, 9, $bizInsuredSelect->id, FormField::SELECT_BOOL_YES);
        FormBuilder::addSubline($section, "Your business insurance license state MUST match the state listed on your business address.");
        FormBuilder::createField('', FormField::TYPE_SELECT, FormField::WIDTH_HALF, $section->id, 'Please Select', 1, 0, 1, config('states'));

        $section = FormBuilder::createSection('Business Insurance License Issued On', $page->id, 10, $bizInsuredSelect->id, FormField::SELECT_BOOL_YES);
        FormBuilder::createField('', FormField::TYPE_DATE, FormField::WIDTH_THIRD, $section->id);

        $section = FormBuilder::createSection('Business Name', $page->id, 11, $bizInsuredSelect->id, FormField::SELECT_BOOL_YES);
        FormBuilder::createField('', FormField::TYPE_TEXT, FormField::WIDTH_HALF, $section->id, '');

        $section = FormBuilder::createSection('EIN', $page->id, 12, $bizInsuredSelect->id, FormField::SELECT_BOOL_YES);
        FormBuilder::createField('', FormField::TYPE_TEXT, FormField::WIDTH_HALF, $section->id, '');

        $section = FormBuilder::createSection('Principal Agent Name', $page->id, 12, $bizInsuredSelect->id, FormField::SELECT_BOOL_YES);
        FormBuilder::createField('', FormField::TYPE_TEXT, FormField::WIDTH_HALF, $section->id, '');

        $section = FormBuilder::createSection('Your Title', $page->id, 13, $bizInsuredSelect->id, FormField::SELECT_BOOL_YES);
        FormBuilder::createField('', FormField::TYPE_TEXT, FormField::WIDTH_HALF, $section->id, '');

        $section = FormBuilder::createSection('Company Type', $page->id, 14, $bizInsuredSelect->id, FormField::SELECT_BOOL_YES);
        FormBuilder::createField('', FormField::TYPE_SELECT, FormField::WIDTH_HALF, $section->id, 'Please Select', 1, 0, 1, config('company_types'));

        $section = FormBuilder::createSection('Business Phone', $page->id, 15,  $bizInsuredSelect->id, FormField::SELECT_BOOL_YES);
        FormBuilder::createField('', FormField::TYPE_PHONE, FormField::WIDTH_HALF, $section->id, '');

        $section = FormBuilder::createSection('Business Fax', $page->id, 15,  $bizInsuredSelect->id, FormField::SELECT_BOOL_YES);
        FormBuilder::createField('', FormField::TYPE_PHONE, FormField::WIDTH_HALF, $section->id, '', 0);

        $section = FormBuilder::createSection('Business Email Address', $page->id, 16, $bizInsuredSelect->id, FormField::SELECT_BOOL_YES);
        FormBuilder::createField('Enter Email', FormField::TYPE_EMAIL, FormField::WIDTH_HALF, $section->id);
        FormBuilder::createField('Confirm Email', FormField::TYPE_EMAIL, FormField::WIDTH_HALF, $section->id);

        $section = FormBuilder::createSection('Website Address', $page->id, 17, $bizInsuredSelect->id, FormField::SELECT_BOOL_YES);
        FormBuilder::createField('', FormField::TYPE_TEXT, FormField::WIDTH_HALF, $section->id, '');

        $section = FormBuilder::createSection('Business Address', $page->id, 18, $bizInsuredSelect->id, FormField::SELECT_BOOL_YES, false, false, FormSection::FILLMODE_GOOGLE_AUTOCOMPLETE);
        FormBuilder::createField('Street Address', FormField::TYPE_TEXT, FormField::WIDTH_FULL, $section->id, 'Enter a location', 1, 0, 255, false, 'street');
        FormBuilder::createField('Address Line 2', FormField::TYPE_TEXT, FormField::WIDTH_FULL, $section->id, '', 0, 0, 255, false, 'addr2');
        FormBuilder::createField('City', FormField::TYPE_TEXT, FormField::WIDTH_HALF, $section->id, '', 1, 0, 255, false, 'city');
        FormBuilder::createField('State/Province', FormField::TYPE_TEXT, FormField::WIDTH_HALF, $section->id, '', 1, 0, 255, false, 'state');
        FormBuilder::createField('ZIP/Postal Code', FormField::TYPE_TEXT, FormField::WIDTH_HALF, $section->id, '', 1, 0, 255, false, 'zip');
        FormBuilder::createField('Country', FormField::TYPE_SELECT, FormField::WIDTH_HALF, $section->id, 'Please Select', 1, 0, 1, config('countries'), 'country');

        $section = FormBuilder::createSection('Business Incorporation Date', $page->id, 19, $bizInsuredSelect->id, FormField::SELECT_BOOL_YES);
        FormBuilder::createField('', FormField::TYPE_DATE, FormField::WIDTH_THIRD, $section->id);

        $section = FormBuilder::createSection('Please upload a copy of your Articles of Incorporation', $page->id, 20, $bizInsuredSelect->id, FormField::SELECT_BOOL_YES);
        FormBuilder::createField('', FormField::TYPE_UPLOAD, FormField::WIDTH_FULL, $section->id, '');

        /* 
         * USER DOES NOT HAVE A RESIDENT LIFE INSURANCE LICENSE
         */

        // workflow for unlicensed users

        $section = FormBuilder::createSection('Have you passed your state exam?', $page->id, 21, $licenseSelect->id, FormField::SELECT_BOOL_NO);
        FormBuilder::createField('', FormField::TYPE_TEXT, FormField::WIDTH_HALF, $section->id, '');
        $stateExamSelect = FormBuilder::createField('', FormField::TYPE_SELECT, FormField::WIDTH_HALF, $section->id, 'Please Select', 1, 0, 1, FormField::SELECT_BOOL);

        // user has passed their state exam

        $section = FormBuilder::createSection('Please upload proof of having successfully passed your state exam', $page->id, 22, $stateExamSelect->id, FormField::SELECT_BOOL_YES);
        FormBuilder::createField('', FormField::TYPE_UPLOAD, FormField::WIDTH_FULL, $section->id, '');

        // user has not passed state exam

        $section = FormBuilder::createSection('Are you enrolled in a pre-licensing course?', $page->id, 23, $stateExamSelect->id, FormField::SELECT_BOOL_NO);
        $prelicenseCourseSelect = FormBuilder::createField('', FormField::TYPE_SELECT, FormField::WIDTH_HALF, $section->id, 'Please Select', 1, 0, 1, FormField::SELECT_BOOL);

        // user has entered pre licensing course

        $section = FormBuilder::createSection('Please upload proof of having enrolled in a pre-licensing course', $page->id, 24, $prelicenseCourseSelect->id, FormField::SELECT_BOOL_YES);
        FormBuilder::addSubline($section, 'This can be a picture or screenshot of the receipt you received after enrolling in a pre-licensing course.');
        FormBuilder::createField('', FormField::TYPE_UPLOAD, FormField::WIDTH_FULL, $section->id, '');

        // user has not entered a course

        $section = FormBuilder::createSection('', $page->id, 25, $prelicenseCourseSelect->id, FormField::SELECT_BOOL_NO);
        FormBuilder::createField("Upon completion of this application and signing the Independent Contractor Agreement, your Agency Owner will send you access to receive a discounted rate on a prelicensing course.", FormField::TYPE_HTML, FormField::WIDTH_FULL, $section->id);

    }
}
