<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\FormField;
use App\Models\FormSection;
use App\Models\UserStatusHistory;
use FormBuilder;


class FormOnboardingInitialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // first portion of onboarding applicaiton form post registration

        $page = FormBuilder::createPage('Personal Information', UserStatusHistory::STATUS_INITIAL);

        // full legal name

        $section = FormBuilder::createSection('Name', $page->id, 0);
        FormBuilder::createField('First Name',  FormField::TYPE_TEXT, FormField::WIDTH_THIRD, $section->id);
        FormBuilder::createField('Middle Name', FormField::TYPE_TEXT, FormField::WIDTH_THIRD, $section->id);
        FormBuilder::createField('Last Name',   FormField::TYPE_TEXT, FormField::WIDTH_THIRD, $section->id);

        // ssn section

        $section = FormBuilder::createSection('Social Security Number', $page->id, 1);
        FormBuilder::createField('', FormField::TYPE_SSN, FormField::WIDTH_HALF, $section->id, '***-**-****', 1, 1);

        // date of birth field

        $section = FormBuilder::createSection('Date of Birth', $page->id, 2);
        FormBuilder::createField('', FormField::TYPE_DATE, FormField::WIDTH_THIRD, $section->id);

        // gender field

        $section = FormBuilder::createSection('Gender', $page->id, 3);
        FormBuilder::createField('', FormField::TYPE_SELECT, FormField::WIDTH_HALF, $section->id, 'Please Select', 1, 0, 1, config('genders'));

        // maiden name

        $section = FormBuilder::createSection('Maiden Name', $page->id, 4);
        FormBuilder::createField('', FormField::TYPE_TEXT, FormField::WIDTH_HALF, $section->id, '', 0);

        // phone numbers

        $section = FormBuilder::createSection('Phone Number', $page->id, 5);
        FormBuilder::createField('Cell Phone', FormField::TYPE_PHONE, FormField::WIDTH_THIRD, $section->id, '', 1);
        FormBuilder::createField('Home Phone', FormField::TYPE_PHONE, FormField::WIDTH_THIRD, $section->id, '', 0);
        FormBuilder::createField('Fax Number', FormField::TYPE_PHONE, FormField::WIDTH_THIRD, $section->id, '', 0);

        // email section

        $section = FormBuilder::createSection('Email Address', $page->id, 6);
        FormBuilder::createField('Enter Email', FormField::TYPE_EMAIL, FormField::WIDTH_HALF, $section->id, 'Email Address');

        // residential address

        $section = FormBuilder::createSection('Residential Address', $page->id, 7, false, false, false, false, FormSection::FILLMODE_GOOGLE_AUTOCOMPLETE);
        FormBuilder::createField('Street Address', FormField::TYPE_TEXT, FormField::WIDTH_FULL, $section->id, 'Enter a location', 1, 0, 255, false, 'street');
        FormBuilder::createField('Address Line 2', FormField::TYPE_TEXT, FormField::WIDTH_FULL, $section->id, '', 0, 0, 255, false, 'addr2');
        FormBuilder::createField('City', FormField::TYPE_TEXT, FormField::WIDTH_HALF, $section->id, '', 1, 0, 255, false, 'city');
        FormBuilder::createField('State/Province', FormField::TYPE_TEXT, FormField::WIDTH_HALF, $section->id, '', 1, 0, 255, false, 'state');
        FormBuilder::createField('ZIP/Postal Code', FormField::TYPE_TEXT, FormField::WIDTH_HALF, $section->id, '', 1, 0, 255, false, 'zip');
        FormBuilder::createField('Country', FormField::TYPE_SELECT, FormField::WIDTH_HALF, $section->id, 'Please Select', 1, 0, 1, config('countries'), 'country');

        // county of residence

        $section = FormBuilder::createSection('County of Residence', $page->id, 8);
        FormBuilder::createField('', FormField::TYPE_TEXT, FormField::WIDTH_HALF, $section->id, 'Example: Buncombe County');

        // move in date

        $section = FormBuilder::createSection('Move-In Date', $page->id, 9);
        FormBuilder::createField('', FormField::TYPE_DATE, FormField::WIDTH_THIRD, $section->id);

        // select for address check

        $section = FormBuilder::createSection('Is your mailing address the same as your residential address?', $page->id, 10);
        $addressSelect = FormBuilder::createField('', FormField::TYPE_SELECT, FormField::WIDTH_HALF, $section->id, 'Please Select', 1, 0, 1, FormField::SELECT_BOOL);

        // conditional mailing address

        $section = FormBuilder::createSection('Mailing Address', $page->id, 11, $addressSelect->id, FormField::SELECT_BOOL_YES, false, false, FormSection::FILLMODE_GOOGLE_AUTOCOMPLETE);
        FormBuilder::createField('Street Address', FormField::TYPE_TEXT, FormField::WIDTH_FULL, $section->id, 'Enter a location', 1, 0, 255, false, 'street');
        FormBuilder::createField('Address Line 2', FormField::TYPE_TEXT, FormField::WIDTH_FULL, $section->id, '', 0, 0, 255, false, 'addr2');
        FormBuilder::createField('City', FormField::TYPE_TEXT, FormField::WIDTH_HALF, $section->id, '', 1, 0, 255, false, 'city');
        FormBuilder::createField('State/Province', FormField::TYPE_TEXT, FormField::WIDTH_HALF, $section->id, '', 1, 0, 255, false, 'state');
        FormBuilder::createField('ZIP/Postal Code', FormField::TYPE_TEXT, FormField::WIDTH_HALF, $section->id, '', 1, 0, 255, false, 'zip');
        FormBuilder::createField('Country', FormField::TYPE_SELECT, FormField::WIDTH_HALF, $section->id, 'Please Select', 1, 0, 1, config('countries'), 'country');

    }
}
