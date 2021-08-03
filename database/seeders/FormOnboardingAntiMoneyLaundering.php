<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\FormField;
use App\Models\UserStatusHistory;
use App\Models\FormFieldCondition;
use FormBuilder;

class FormOnboardingAntiMoneyLaundering extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sort = 0;

        $page = FormBuilder::createPage('Anti-Money Laundering', UserStatusHistory::STATUS_AML_CERTIFICATION);

        $section = FormBuilder::createSection('To submit your contracting application, you MUST provide ONE of the following:', $page->id, $sort++);
        FormBuilder::createField('1. The date that you completed LIMRA\'s Anti-Money Laundering (AML) training. (MUST have passed within the past year.)', FormField::TYPE_HTML, FormField::WIDTH_FULL, $section->id);
        FormBuilder::createField('2. Upload a copy of your American Amicable AML course completion certificate. ', FormField::TYPE_HTML, FormField::WIDTH_FULL, $section->id);

        // aml training question

        $section = FormBuilder::createSection('Have you completed LIMRA\'s AML Training?', $page->id, $sort++);
        FormBuilder::addSubline($section, 'Please choose carefully. If you do not know what LIMRA is, select No. If your AML certificate is from American Amicable, select No. These are not the same.');
        $amlTrainingSelect = FormBuilder::createField('', FormField::TYPE_SELECT, FormField::WIDTH_HALF, $section->id, 'Please Select', 1, 0, 1, FormField::SELECT_BOOL);

        // training has been completed

        $section = FormBuilder::createSection('Training Completion Date:', $page->id, $sort++, $amlTrainingSelect->id, FormField::SELECT_BOOL_YES);
        $trainingCompleteDate = FormBuilder::createField('', FormField::TYPE_DATE, FormField::WIDTH_THIRD, $section->id);

        // training is out of date

        $sectionExpired = FormBuilder::createSection('Your LIMRA AML Training is out of date. To accept LIMRA, you must have completed your training within the past 12 months. You may also take your Anit-Money Laundering Course via American Amicable', $page->id, $sort++, $trainingCompleteDate->id, FormField::DATE_FIELD_1_YEAR_PRIOR, FormFieldCondition::ACTION_SHOW, FormFieldCondition::TYPE_LESS_THAN);
        FormBuilder::createField('Go to this site to complete your training course: <a href="https://www.americanamicable.com/internet/aml/amllogon.php" target="_blank">American Amicable AML Course</a>', FormField::TYPE_HTML, FormField::WIDTH_FULL, $section->id);
        FormBuilder::createField('If you do not have a NPN, check \'Unlicensed.\'', FormField::TYPE_HTML, FormField::WIDTH_FULL, $section->id);
        FormBuilder::createField('Leave \'Agent Number\' blank.', FormField::TYPE_HTML, FormField::WIDTH_FULL, $section->id);
        FormBuilder::createField('Once completed, return to this application and select \'No\' for LIMRA\'s AML Training, and \'Yes\' for American Amicable. Then download your course completion certificate, and upload a copy.', FormField::TYPE_HTML, FormField::WIDTH_FULL, $section->id);

        // training has not been completed

        $section = FormBuilder::createSection('Do you have an American Amicable AML Certificate?', $page->id, $sort++, $amlTrainingSelect->id, FormField::SELECT_BOOL_NO);
        $americanAmicableSelect = FormBuilder::createField('', FormField::TYPE_SELECT, FormField::WIDTH_HALF, $section->id, 'Please Select', 1, 0, 1, FormField::SELECT_BOOL);

        // aml certificate completed

        $section = FormBuilder::createSection('Please upload a copy of your course completion certificate', $page->id, $sort++, $americanAmicableSelect->id, FormField::SELECT_BOOL_YES);
        FormBuilder::createField('', FormField::TYPE_UPLOAD, FormField::WIDTH_FULL, $section->id, '');

        // aml certificate not completed
        $sectionExpired = FormBuilder::createSection('You may also take your Anti-Money Laundering Course via American Amicable', $page->id, $sort++, $americanAmicableSelect->id, FormField::SELECT_BOOL_NO);
        FormBuilder::createField('Go to this site to complete your training course: <a href="https://www.americanamicable.com/internet/aml/amllogon.php" target="_blank">American Amicable AML Course</a>', FormField::TYPE_HTML, FormField::WIDTH_FULL, $section->id);
        FormBuilder::createField('If you do not have a NPN, check \'Unlicensed.\'', FormField::TYPE_HTML, FormField::WIDTH_FULL, $section->id);
        FormBuilder::createField('Leave \'Agent Number\' blank.', FormField::TYPE_HTML, FormField::WIDTH_FULL, $section->id);
        FormBuilder::createField('Once completed, download your course completion certificate, select \'Yes\' to the American-Amicable AML Certificate question, and upload a copy.', FormField::TYPE_HTML, FormField::WIDTH_FULL, $section->id);

        // add html output for expired LIMRA license
        FormBuilder::addCondition($sectionExpired->id, $trainingCompleteDate->id, FormField::DATE_FIELD_1_YEAR_PRIOR, FormFieldCondition::ACTION_SHOW, FormFieldCondition::TYPE_LESS_THAN);

    }
}
