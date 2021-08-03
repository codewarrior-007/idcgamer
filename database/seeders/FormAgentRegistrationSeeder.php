<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\FormField;
use App\Models\UserStatusHistory;
use FormBuilder;

class FormAgentRegistrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // new agent registration page

        $page = FormBuilder::createPage('New Agent Registration', UserStatusHistory::STATUS_REGISTER);

        // name section

        $section = FormBuilder::createSection('Name', $page->id, 0);
        FormBuilder::createField('First Name', FormField::TYPE_TEXT, FormField::WIDTH_HALF, $section->id);
        FormBuilder::createField('Last Name', FormField::TYPE_TEXT, FormField::WIDTH_HALF, $section->id);

        // email section

        $section = FormBuilder::createSection('Email', $page->id, 1);
        FormBuilder::createField('Enter Email', FormField::TYPE_EMAIL, FormField::WIDTH_HALF, $section->id);
        FormBuilder::createField('Confirm Email', FormField::TYPE_EMAIL, FormField::WIDTH_HALF, $section->id);

        // invitation code

        $section = FormBuilder::createSection('Invitation Code', $page->id, 2);
        FormBuilder::createField('Code', FormField::TYPE_TEXT, FormField::WIDTH_THIRD, $section->id);

        // email section

        $section = FormBuilder::createSection('Create Password', $page->id, 3);
        FormBuilder::createField('Enter Password', FormField::TYPE_PASSWORD, FormField::WIDTH_HALF, $section->id);
        FormBuilder::createField('Confirm Password', FormField::TYPE_PASSWORD, FormField::WIDTH_HALF, $section->id);

    }
}
