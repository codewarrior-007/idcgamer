<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\FormField;
use App\Models\UserStatusHistory;
use App\Models\FormFieldCondition;
use FormBuilder;

class FormOnboardingSuranceBaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sort = 0;

        $page = FormBuilder::createPage('SuranceBay Signature Agreement', UserStatusHistory::STATUS_SURANCE_BAY);

        $section = FormBuilder::createSection('SuranceBay Signature Agreement', $page->id, $sort++);
        FormBuilder::addSubline($section, 'Please read and agree to the terms below.');
        FormBuilder::createField("I hereby authorize Surancebay, LLC and it’s general agency customers (the \"Authorized Parties\") to affix or append a copy of my signature, as set forth below, to any and all required signature fields on forms and agreements of any insurance carrier (a “Carrier“) designated by me through the SURELC software, business submission, or through any other means, including without limitation, by email or orally. The Authorized Parties shall be permitted to complete and submit all such forms and agreements on my behalf for the purposes of becoming authorized to sell Carrier insurance products. I hereby release, indemnify and hold harmless the Authorized Parties against any and all claims, demands, losses, damages, and causes of action, including expenses, costs and reasonable attorney’s fees which they may sustain or incur as a result of carrying out the authority granted hereunder.<br><br>By my signature below, I certify that the information I have submitted to the Authorized Parties is correct to the best of my knowledge and acknowledge that I have read and reviewed the forms and agreements which the Authorized Parties have been authorized to affix my signature. I agree to indemnify and hold any third party harmless from and against any and all claims, demands, losses, damages, and causes of action, including expenses, costs and reasonable attorney’s fees which such third party may incur as a result of its reliance on any form or agreement bearing my signature pursuant to this authorization.", FormField::TYPE_HTML, FormField::WIDTH_FULL, $section->id);
        FormBuilder::createField('I agree to the terms.', FormField::TYPE_CHECKBOX, FormField::WIDTH_FULL, $section->id);

        $section = FormBuilder::createSection('Printed Name', $page->id, $sort++);
        FormBuilder::createField('',  FormField::TYPE_TEXT, FormField::WIDTH_HALF, $section->id, '', 1);

        $section = FormBuilder::createSection('Signature', $page->id, $sort++);
        FormBuilder::addSubline($section, 'Please make sure to sign your full name. Initials are not accepted. Illegible signatures are not accepted.');
        FormBuilder::createField('',  FormField::TYPE_SIGNATURE, FormField::WIDTH_HALF, $section->id);
    }
}
