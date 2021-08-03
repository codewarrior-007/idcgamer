<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\FormField;
use App\Models\UserStatusHistory;
use App\Models\FormFieldCondition;
use FormBuilder;

class FormOnboardingEftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sort = 0;

        $page = FormBuilder::createPage('Electronic Funds Transfer', UserStatusHistory::STATUS_EFT_INFO);

        $section = FormBuilder::createSection('', $page->id, $sort++);
        FormBuilder::createField('The following information must be filled out correctly. You MUST be the account holder for the listed bank account.', FormField::TYPE_HTML, FormField::WIDTH_FULL, $section->id);
        FormBuilder::createField('<b>Voided Checks:</b> Please upload a copy of a voided check, complete with your printed full name and current address. These CANNOT be starter checks or deposit slips.', FormField::TYPE_HTML, FormField::WIDTH_FULL, $section->id);
        FormBuilder::createField("<b>Official Bank Letters:</b> Bank Letters must be typed (not handwritten) on the bank's letterhead paper and include your name, account and routing numbers and be signed by a bank representative. ", FormField::TYPE_HTML, FormField::WIDTH_FULL, $section->id);
        FormBuilder::createField('<b>Please note:</b> Internet banking, prepaid cards, etc. (like Green Dot) are not acceptable at this time.', FormField::TYPE_HTML, FormField::WIDTH_FULL, $section->id);


        $section = FormBuilder::createSection('Account Holder Name', $page->id, $sort++);
        FormBuilder::createField('',  FormField::TYPE_TEXT, FormField::WIDTH_HALF, $section->id);

        $section = FormBuilder::createSection('Routing Number', $page->id, $sort++);
        FormBuilder::createField('',  FormField::TYPE_TEXT, FormField::WIDTH_HALF, $section->id, '', 1, 1);

        $section = FormBuilder::createSection('Account Number', $page->id, $sort++);
        FormBuilder::createField('',  FormField::TYPE_TEXT, FormField::WIDTH_HALF, $section->id, '', 1, 1);

        $section = FormBuilder::createSection('Account Type', $page->id, $sort++);
        FormBuilder::createField('', FormField::TYPE_SELECT, FormField::WIDTH_HALF, $section->id, 'Please Select', 1, 0, 1, FormField::SELECT_ACCOUNT_TYPE);

        $section = FormBuilder::createSection('Financial Institution Name', $page->id, $sort++);
        FormBuilder::createField('',  FormField::TYPE_TEXT, FormField::WIDTH_HALF, $section->id);

        $section = FormBuilder::createSection('Upload a copy of a voided check or bank authorization letter', $page->id, $sort++);
        FormBuilder::createField('', FormField::TYPE_UPLOAD, FormField::WIDTH_FULL, $section->id, '');

        $section = FormBuilder::createSection('EFT Agreement', $page->id, $sort++);
        FormBuilder::addSubline($section, 'Please read and agree to the terms below.');
        FormBuilder::createField('I hereby authorize the Company to initiate credit entries and, if necessary, adjustments for credit entries in error to the checking and/or savings account indicated on this form. This authority is to remain in full effect until the Company has received written notification from me of it’s termination. I understand that this authorization is subject to the terms of any agent or representative contract, commission agreement, or loan agreement that I may have now, or in the future, with the Company.', FormField::TYPE_HTML, FormField::WIDTH_FULL, $section->id);
        FormBuilder::createField('I agree to the terms.', FormField::TYPE_CHECKBOX, FormField::WIDTH_FULL, $section->id);

        $section = FormBuilder::createSection('Printed Name', $page->id, $sort++);
        FormBuilder::createField('',  FormField::TYPE_TEXT, FormField::WIDTH_HALF, $section->id);

        $section = FormBuilder::createSection('Signature', $page->id, $sort++);
        FormBuilder::addSubline($section, 'Please make sure to sign your full name. Initials are not accepted. Illegible signatures are not accepted.');
        FormBuilder::createField('',  FormField::TYPE_SIGNATURE, FormField::WIDTH_HALF, $section->id);

    }
}
