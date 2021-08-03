<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FormField;
use App\Models\UserStatusHistory;
use FormBuilder;

class FormOnboardingLegalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sort = 0;
        $page = FormBuilder::createPage('Legal Questions and Responses/Explanations for Contracting and Appointment Requests', UserStatusHistory::STATUS_LEGAL);
        FormBuilder::addSubline($page, 'Please answer the following questions. If you answer YES to any question, provide a full, detailed explanation including specific dates.');

        // 1 - first top level question

        $section = FormBuilder::createSection('1. Have you ever been charged with a misdemeanor or a felony or federal/state securities or investment regulatory or statute infractions?', $page->id, $sort++);
        $infractionSelect = FormBuilder::createField('', FormField::TYPE_SELECT, FormField::WIDTH_HALF, $section->id, 'Please Select', 1, 0, 1, FormField::SELECT_BOOL);
        self::addConditionalDateAndReasonFields($page->id, $sort++, $infractionSelect->id, FormField::SELECT_BOOL_YES);

        // 1a

        $section = FormBuilder::createSection('1A. Have you ever been convicted of, or pled guilty or no contest to, any Felony?', $page->id, $sort++, $infractionSelect->id, FormField::SELECT_BOOL_YES);
        $subSelect = FormBuilder::createField('', FormField::TYPE_SELECT, FormField::WIDTH_HALF, $section->id, 'Please Select', 1, 0, 1, FormField::SELECT_BOOL);
        self::addConditionalDateAndReasonFields($page->id, $sort++, $subSelect->id, FormField::SELECT_BOOL_YES);
        $section = FormBuilder::createSection('Upload notice of hearing or other documents that shows charges and allegations', $page->id, $sort++, $subSelect->id, FormField::SELECT_BOOL_YES);
        FormBuilder::createField('', FormField::TYPE_UPLOAD, FormField::WIDTH_FULL, $section->id, '');
        $section = FormBuilder::createSection('Upload official document that states resolution of charges OR any final judgement', $page->id, $sort++, $subSelect->id, FormField::SELECT_BOOL_YES);
        FormBuilder::createField('', FormField::TYPE_UPLOAD, FormField::WIDTH_FULL, $section->id, '');

        // 1b

        $section = FormBuilder::createSection('1B. Have you ever been convicted of, or pled guilty or no contest to, any Misdemeanor?', $page->id, $sort++, $infractionSelect->id, FormField::SELECT_BOOL_YES);
        $subSelect = FormBuilder::createField('', FormField::TYPE_SELECT, FormField::WIDTH_HALF, $section->id, 'Please Select', 1, 0, 1, FormField::SELECT_BOOL);
        self::addConditionalDateAndReasonFields($page->id, $sort++, $subSelect->id, FormField::SELECT_BOOL_YES);

        // 1c

        $section = FormBuilder::createSection('1C. Have you ever been convicted of, or pled guilty or no contest to, a violation of federal or state securities or investment related regulations?', $page->id, $sort++, $infractionSelect->id, FormField::SELECT_BOOL_YES);
        $subSelect = FormBuilder::createField('', FormField::TYPE_SELECT, FormField::WIDTH_HALF, $section->id, 'Please Select', 1, 0, 1, FormField::SELECT_BOOL);
        self::addConditionalDateAndReasonFields($page->id, $sort++, $subSelect->id, FormField::SELECT_BOOL_YES);

        // 1d

        $section = FormBuilder::createSection('1D. Have you ever been convicted of, or pled guilty or no contest to, a violation of state insurance department regulation of statute?', $page->id, $sort++, $infractionSelect->id, FormField::SELECT_BOOL_YES);
        $subSelect = FormBuilder::createField('', FormField::TYPE_SELECT, FormField::WIDTH_HALF, $section->id, 'Please Select', 1, 0, 1, FormField::SELECT_BOOL);
        self::addConditionalDateAndReasonFields($page->id, $sort++, $subSelect->id, FormField::SELECT_BOOL_YES);

        // 1e

        $section = FormBuilder::createSection('1E. Has any foreign government, court, regulatory agency, or exchange ever entered an order against you related to income investments or fraud?', $page->id, $sort++, $infractionSelect->id, FormField::SELECT_BOOL_YES);
        $subSelect = FormBuilder::createField('', FormField::TYPE_SELECT, FormField::WIDTH_HALF, $section->id, 'Please Select', 1, 0, 1, FormField::SELECT_BOOL);
        self::addConditionalDateAndReasonFields($page->id, $sort++, $subSelect->id, FormField::SELECT_BOOL_YES);

        // 1f

        $section = FormBuilder::createSection('1F. Have you ever been charged with a felony?', $page->id, $sort++, $infractionSelect->id, FormField::SELECT_BOOL_YES);
        $subSelect = FormBuilder::createField('', FormField::TYPE_SELECT, FormField::WIDTH_HALF, $section->id, 'Please Select', 1, 0, 1, FormField::SELECT_BOOL);
        self::addConditionalDateAndReasonFields($page->id, $sort++, $subSelect->id, FormField::SELECT_BOOL_YES);

        // 1g

        $section = FormBuilder::createSection('1G. Have you ever been charged with a misdemeanor?', $page->id, $sort++, $infractionSelect->id, FormField::SELECT_BOOL_YES);
        $subSelect = FormBuilder::createField('', FormField::TYPE_SELECT, FormField::WIDTH_HALF, $section->id, 'Please Select', 1, 0, 1, FormField::SELECT_BOOL);
        self::addConditionalDateAndReasonFields($page->id, $sort++, $subSelect->id, FormField::SELECT_BOOL_YES);

        // 1h

        $section = FormBuilder::createSection('1H. Have you ever been on probation?', $page->id, $sort++, $infractionSelect->id, FormField::SELECT_BOOL_YES);
        $subSelect = FormBuilder::createField('', FormField::TYPE_SELECT, FormField::WIDTH_HALF, $section->id, 'Please Select', 1, 0, 1, FormField::SELECT_BOOL);
        self::addConditionalDateAndReasonFields($page->id, $sort++, $subSelect->id, FormField::SELECT_BOOL_YES);

        // 2 - new top level question

        $section = FormBuilder::createSection('2. Have you ever been, or are you currently being, investigated, have any pending indictment, lawsuits, or have you ever been in a lawsuit with an insurance company?', $page->id, $sort++);
        $infractionSelect = FormBuilder::createField('', FormField::TYPE_SELECT, FormField::WIDTH_HALF, $section->id, 'Please Select', 1, 0, 1, FormField::SELECT_BOOL);
        self::addConditionalDateAndReasonFields($page->id, $sort++, $infractionSelect->id, FormField::SELECT_BOOL_YES);

        // 2a

        $section = FormBuilder::createSection('2A. Are you currently under investigation by any legal or regulatory agency?', $page->id, $sort++, $infractionSelect->id, FormField::SELECT_BOOL_YES);
        $subSelect = FormBuilder::createField('', FormField::TYPE_SELECT, FormField::WIDTH_HALF, $section->id, 'Please Select', 1, 0, 1, FormField::SELECT_BOOL);
        self::addConditionalDateAndReasonFields($page->id, $sort++, $subSelect->id, FormField::SELECT_BOOL_YES);

        // 2b

        $section = FormBuilder::createSection('2B. Have you been under investigation by any insurance company?', $page->id, $sort++, $infractionSelect->id, FormField::SELECT_BOOL_YES);
        $subSelect = FormBuilder::createField('', FormField::TYPE_SELECT, FormField::WIDTH_HALF, $section->id, 'Please Select', 1, 0, 1, FormField::SELECT_BOOL);
        self::addConditionalDateAndReasonFields($page->id, $sort++, $subSelect->id, FormField::SELECT_BOOL_YES);

        // 2c

        $section = FormBuilder::createSection('2C. Have you ever been, or are you currently, involved in any pending indictments, lawsuits, civil judgements or other legal proceedings (civil or criminal) (you may omit family court)?', $page->id, $sort++, $infractionSelect->id, FormField::SELECT_BOOL_YES);
        $subSelect = FormBuilder::createField('', FormField::TYPE_SELECT, FormField::WIDTH_HALF, $section->id, 'Please Select', 1, 0, 1, FormField::SELECT_BOOL);
        self::addConditionalDateAndReasonFields($page->id, $sort++, $subSelect->id, FormField::SELECT_BOOL_YES);

        // 2d

        $section = FormBuilder::createSection('2D. Have you ever been named as a defendant or codefendant in a lawsuit, or have you ever sued or been sued by an insurance company?', $page->id, $sort++, $infractionSelect->id, FormField::SELECT_BOOL_YES);
        $subSelect = FormBuilder::createField('', FormField::TYPE_SELECT, FormField::WIDTH_HALF, $section->id, 'Please Select', 1, 0, 1, FormField::SELECT_BOOL);
        self::addConditionalDateAndReasonFields($page->id, $sort++, $subSelect->id, FormField::SELECT_BOOL_YES);

        // 3 - new top level question

        $section = FormBuilder::createSection('3. Have you ever been alleged to have engaged in any fraud?', $page->id, $sort++);
        $infractionSelect = FormBuilder::createField('', FormField::TYPE_SELECT, FormField::WIDTH_HALF, $section->id, 'Please Select', 1, 0, 1, FormField::SELECT_BOOL);
        self::addConditionalDateAndReasonFields($page->id, $sort++, $infractionSelect->id, FormField::SELECT_BOOL_YES);

        // 4 - new top level question

        $section = FormBuilder::createSection('4. Have you ever been found to have engaged in any fraud?', $page->id, $sort++);
        $infractionSelect = FormBuilder::createField('', FormField::TYPE_SELECT, FormField::WIDTH_HALF, $section->id, 'Please Select', 1, 0, 1, FormField::SELECT_BOOL);
        $section = FormBuilder::createSection('Upload any lawsuit/court/resolution documents.', $page->id, $sort++, $infractionSelect->id, FormField::SELECT_BOOL_YES);
        FormBuilder::createField('', FormField::TYPE_UPLOAD, FormField::WIDTH_FULL, $section->id, '');
        self::addConditionalDateAndReasonFields($page->id, $sort++, $infractionSelect->id, FormField::SELECT_BOOL_YES);


        // 5 - new top level question

        $section = FormBuilder::createSection('5. Has any insurance or financial services company or broker-dealer terminated your contract or appointment or permitted you to resign for reason other than lack of sales?', $page->id, $sort++);
        $infractionSelect = FormBuilder::createField('', FormField::TYPE_SELECT, FormField::WIDTH_HALF, $section->id, 'Please Select', 1, 0, 1, FormField::SELECT_BOOL);
        self::addConditionalDateAndReasonFields($page->id, $sort++, $infractionSelect->id, FormField::SELECT_BOOL_YES);

        // 5a

        $section = FormBuilder::createSection('5A. Were you fired because you were accused of violating insurance or investment related statutes, regulations, rules, or industry standards of conduct?', $page->id, $sort++, $infractionSelect->id, FormField::SELECT_BOOL_YES);
        $subSelect = FormBuilder::createField('', FormField::TYPE_SELECT, FormField::WIDTH_HALF, $section->id, 'Please Select', 1, 0, 1, FormField::SELECT_BOOL);
        self::addConditionalDateAndReasonFields($page->id, $sort++, $subSelect->id, FormField::SELECT_BOOL_YES);

        // 5b

        $section = FormBuilder::createSection('5B. Were you fired because you were accused of fraud or the wrongful taking of property?', $page->id, $sort++, $infractionSelect->id, FormField::SELECT_BOOL_YES);
        $subSelect = FormBuilder::createField('', FormField::TYPE_SELECT, FormField::WIDTH_HALF, $section->id, 'Please Select', 1, 0, 1, FormField::SELECT_BOOL);
        self::addConditionalDateAndReasonFields($page->id, $sort++, $subSelect->id, FormField::SELECT_BOOL_YES);

        // 5c

        $section = FormBuilder::createSection('5C. Failure to supervise in connection with insurance or investment related statutes, regulations, rules, or industry standards of conduct?', $page->id, $sort++, $infractionSelect->id, FormField::SELECT_BOOL_YES);
        $subSelect = FormBuilder::createField('', FormField::TYPE_SELECT, FormField::WIDTH_HALF, $section->id, 'Please Select', 1, 0, 1, FormField::SELECT_BOOL);
        self::addConditionalDateAndReasonFields($page->id, $sort++, $subSelect->id, FormField::SELECT_BOOL_YES);

        // 6 - new top level question

        $section = FormBuilder::createSection('Have you ever had an appointment with any insurance company denied or terminated for cause? (if you have been reported to Vector One, answer yes)', $page->id, $sort++);
        $infractionSelect = FormBuilder::createField('', FormField::TYPE_SELECT, FormField::WIDTH_HALF, $section->id, 'Please Select', 1, 0, 1, FormField::SELECT_BOOL);
        self::addConditionalDateAndReasonFields($page->id, $sort++, $infractionSelect->id, FormField::SELECT_BOOL_YES);

        // 7 - new top level question

        $section = FormBuilder::createSection('7. Does any insurer, insured, or other person claim any commission chargeback or other indebtedness from you as a result of any insurance transactions or business? (if you have been reported to Vector One, answer yes)', $page->id, $sort++);
        $infractionSelect = FormBuilder::createField('', FormField::TYPE_SELECT, FormField::WIDTH_HALF, $section->id, 'Please Select', 1, 0, 1, FormField::SELECT_BOOL);
        self::addConditionalDateAndReasonFields($page->id, $sort++, $infractionSelect->id, FormField::SELECT_BOOL_YES);

        // 8 - new top level question

        $section = FormBuilder::createSection('8. Has any lawsuit or claim ever been made against you, your surety company, or errors and omissions insurer, arising out of your sales or practices, or have you been refused surety bonding or E&O coverage?', $page->id, $sort++);
        $infractionSelect = FormBuilder::createField('', FormField::TYPE_SELECT, FormField::WIDTH_HALF, $section->id, 'Please Select', 1, 0, 1, FormField::SELECT_BOOL);
        self::addConditionalDateAndReasonFields($page->id, $sort++, $infractionSelect->id, FormField::SELECT_BOOL_YES);

        // 8a

        $section = FormBuilder::createSection('8A. Has a bonding or surety company ever denied, paid on, or revoked a bond for you?', $page->id, $sort++, $infractionSelect->id, FormField::SELECT_BOOL_YES);
        $subSelect = FormBuilder::createField('', FormField::TYPE_SELECT, FormField::WIDTH_HALF, $section->id, 'Please Select', 1, 0, 1, FormField::SELECT_BOOL);
        self::addConditionalDateAndReasonFields($page->id, $sort++, $subSelect->id, FormField::SELECT_BOOL_YES);

        // 8b

        $section = FormBuilder::createSection('8B. Has any Errors & Omissions company carrier ever denied, paid claims on, or cancelled your coverage?', $page->id, $sort++, $infractionSelect->id, FormField::SELECT_BOOL_YES);
        $subSelect = FormBuilder::createField('', FormField::TYPE_SELECT, FormField::WIDTH_HALF, $section->id, 'Please Select', 1, 0, 1, FormField::SELECT_BOOL);
        self::addConditionalDateAndReasonFields($page->id, $sort++, $subSelect->id, FormField::SELECT_BOOL_YES);

        // 9 - new top level question

        $section = FormBuilder::createSection('9. Have you ever had an insurance or securities license denied, suspended, cancelled, or revoked?', $page->id, $sort++);
        $infractionSelect = FormBuilder::createField('', FormField::TYPE_SELECT, FormField::WIDTH_HALF, $section->id, 'Please Select', 1, 0, 1, FormField::SELECT_BOOL);
        self::addConditionalDateAndReasonFields($page->id, $sort++, $infractionSelect->id, FormField::SELECT_BOOL_YES);

        // 10 - new top level question

        $section = FormBuilder::createSection('10. Has any state or federal regulatory body found you to have been a cause of an investment or insurance related business having its authorization to do business denied, suspended, revoked, or restricted?', $page->id, $sort++);
        $infractionSelect = FormBuilder::createField('', FormField::TYPE_SELECT, FormField::WIDTH_HALF, $section->id, 'Please Select', 1, 0, 1, FormField::SELECT_BOOL);
        self::addConditionalDateAndReasonFields($page->id, $sort++, $infractionSelect->id, FormField::SELECT_BOOL_YES);

        // 11 - new top level question

        $section = FormBuilder::createSection('11. Has any state or federal regulatory agency revoked or suspended your license as an attorney, accountant, or federal contractor?', $page->id, $sort++);
        $infractionSelect = FormBuilder::createField('', FormField::TYPE_SELECT, FormField::WIDTH_HALF, $section->id, 'Please Select', 1, 0, 1, FormField::SELECT_BOOL);
        self::addConditionalDateAndReasonFields($page->id, $sort++, $infractionSelect->id, FormField::SELECT_BOOL_YES);

        // 12 - new top level question

        $section = FormBuilder::createSection('12. Has any state or federal regulatory agency found you to have made a false statement or omission or been dishonest, unfair, or unethical?', $page->id, $sort++);
        $infractionSelect = FormBuilder::createField('', FormField::TYPE_SELECT, FormField::WIDTH_HALF, $section->id, 'Please Select', 1, 0, 1, FormField::SELECT_BOOL);
        self::addConditionalDateAndReasonFields($page->id, $sort++, $infractionSelect->id, FormField::SELECT_BOOL_YES);

        // 13 - new top level question

        $section = FormBuilder::createSection('13. Have you ever had any interruptions in licensing?', $page->id, $sort++);
        $infractionSelect = FormBuilder::createField('', FormField::TYPE_SELECT, FormField::WIDTH_HALF, $section->id, 'Please Select', 1, 0, 1, FormField::SELECT_BOOL);
        self::addConditionalDateAndReasonFields($page->id, $sort++, $infractionSelect->id, FormField::SELECT_BOOL_YES);

        // 14 - new top level question

        $section = FormBuilder::createSection('14. Has any state, federal, or self-regulatory agency filed a complaint against you, fined, sanctioned, censured, penalized, or otherwise disciplined you for a violation of their regulations or state or federal statutes?', $page->id, $sort++);
        $infractionSelect = FormBuilder::createField('', FormField::TYPE_SELECT, FormField::WIDTH_HALF, $section->id, 'Please Select', 1, 0, 1, FormField::SELECT_BOOL);
        self::addConditionalDateAndReasonFields($page->id, $sort++, $infractionSelect->id, FormField::SELECT_BOOL_YES);

        // 14a

        $section = FormBuilder::createSection('14A. Has any regulatory body ever sanctioned, censured, penalized, or otherwise disciplined you?', $page->id, $sort++, $infractionSelect->id, FormField::SELECT_BOOL_YES);
        $subSelect = FormBuilder::createField('', FormField::TYPE_SELECT, FormField::WIDTH_HALF, $section->id, 'Please Select', 1, 0, 1, FormField::SELECT_BOOL);
        self::addConditionalDateAndReasonFields($page->id, $sort++, $subSelect->id, FormField::SELECT_BOOL_YES);

        // 14b

        $section = FormBuilder::createSection('14B. Has any state, federal, or self-regulatory agency filed a complaint against you, fined, or sanctioned you?', $page->id, $sort++, $infractionSelect->id, FormField::SELECT_BOOL_YES);
        $subSelect = FormBuilder::createField('', FormField::TYPE_SELECT, FormField::WIDTH_HALF, $section->id, 'Please Select', 1, 0, 1, FormField::SELECT_BOOL);
        self::addConditionalDateAndReasonFields($page->id, $sort++, $subSelect->id, FormField::SELECT_BOOL_YES);

        // 14c

        $section = FormBuilder::createSection('14C. Have you ever been the subject of a consumer initiated complaint?', $page->id, $sort++, $infractionSelect->id, FormField::SELECT_BOOL_YES);
        $subSelect = FormBuilder::createField('', FormField::TYPE_SELECT, FormField::WIDTH_HALF, $section->id, 'Please Select', 1, 0, 1, FormField::SELECT_BOOL);
        self::addConditionalDateAndReasonFields($page->id, $sort++, $subSelect->id, FormField::SELECT_BOOL_YES);

        // 15 - new top level question

        $section = FormBuilder::createSection('15. Have you personally, or any insurance or securities brokerage firm with whom you have been associated, filed a bankruptcy petition, or declared bankruptcy?', $page->id, $sort++);
        $infractionSelect = FormBuilder::createField('', FormField::TYPE_SELECT, FormField::WIDTH_HALF, $section->id, 'Please Select', 1, 0, 1, FormField::SELECT_BOOL);
        $section = FormBuilder::createSection('Upload bankruptcy documents and/or resolutions.', $page->id, $sort++, $infractionSelect->id, FormField::SELECT_BOOL_YES);
        FormBuilder::createField('', FormField::TYPE_UPLOAD, FormField::WIDTH_FULL, $section->id, '');
        self::addConditionalDateAndReasonFields($page->id, $sort++, $infractionSelect->id, FormField::SELECT_BOOL_YES, 'Discharge Date');

        // 15a

        $section = FormBuilder::createSection('15A. Have you personally filed a bankruptcy petition or declared bankruptcy?', $page->id, $sort++, $infractionSelect->id, FormField::SELECT_BOOL_YES);
        $subSelect = FormBuilder::createField('', FormField::TYPE_SELECT, FormField::WIDTH_HALF, $section->id, 'Please Select', 1, 0, 1, FormField::SELECT_BOOL);
        self::addConditionalDateAndReasonFields($page->id, $sort++, $subSelect->id, FormField::SELECT_BOOL_YES, 'Discharge Date');

        // 15b

        $section = FormBuilder::createSection('15B. Has any insurance or securities brokerage firm, with whom you have been associated, filed a bankruptcy petition, or been declared bankrupt, either during your association with them or within 5 years after termination of such an association?', $page->id, $sort++, $infractionSelect->id, FormField::SELECT_BOOL_YES);
        $subSelect = FormBuilder::createField('', FormField::TYPE_SELECT, FormField::WIDTH_HALF, $section->id, 'Please Select', 1, 0, 1, FormField::SELECT_BOOL);
        self::addConditionalDateAndReasonFields($page->id, $sort++, $subSelect->id, FormField::SELECT_BOOL_YES, 'Discharge Date');

        // 15c

        $section = FormBuilder::createSection('15C. Is the bankruptcy pending?', $page->id, $sort++, $infractionSelect->id, FormField::SELECT_BOOL_YES);
        $subSelect = FormBuilder::createField('', FormField::TYPE_SELECT, FormField::WIDTH_HALF, $section->id, 'Please Select', 1, 0, 1, FormField::SELECT_BOOL);
        self::addConditionalDateAndReasonFields($page->id, $sort++, $subSelect->id, FormField::SELECT_BOOL_YES, 'Discharge Date');

        // 16 - new top level question

        $section = FormBuilder::createSection('16. Are there any unsatisfied judgments or liens against you?', $page->id, $sort++);
        $infractionSelect = FormBuilder::createField('', FormField::TYPE_SELECT, FormField::WIDTH_HALF, $section->id, 'Please Select', 1, 0, 1, FormField::SELECT_BOOL);
        self::addConditionalDateAndReasonFields($page->id, $sort++, $infractionSelect->id, FormField::SELECT_BOOL_YES);
        $section = FormBuilder::createSection('Please upload a copy/proof of payment plan', $page->id, $sort++, $infractionSelect->id, FormField::SELECT_BOOL_YES);
        FormBuilder::createField('', FormField::TYPE_UPLOAD, FormField::WIDTH_FULL, $section->id, '');

        // 17 - new top level question

        $section = FormBuilder::createSection('17. Aside from being an account holder at a bank, are you connected in any way with a bank, savings & loan association, or other lending or financial institution?', $page->id, $sort++);
        $infractionSelect = FormBuilder::createField('', FormField::TYPE_SELECT, FormField::WIDTH_HALF, $section->id, 'Please Select', 1, 0, 1, FormField::SELECT_BOOL);
        self::addConditionalDateAndReasonFields($page->id, $sort++, $infractionSelect->id, FormField::SELECT_BOOL_YES);

        // 18 - new top level question

        $section = FormBuilder::createSection('18. Have you ever used any other names or aliases?', $page->id, $sort++);
        $infractionSelect = FormBuilder::createField('', FormField::TYPE_SELECT, FormField::WIDTH_HALF, $section->id, 'Please Select', 1, 0, 1, FormField::SELECT_BOOL);
        self::addConditionalDateAndReasonFields($page->id, $sort++, $infractionSelect->id, FormField::SELECT_BOOL_YES);

        // 19 - new top level question

        $section = FormBuilder::createSection('19. Do you have any unresolved matters pending with the Internal Revenue Service, or other taxing authority?', $page->id, $sort++);
        $infractionSelect = FormBuilder::createField('', FormField::TYPE_SELECT, FormField::WIDTH_HALF, $section->id, 'Please Select', 1, 0, 1, FormField::SELECT_BOOL);
        $section = FormBuilder::createSection('Upload any supporting documentation.', $page->id, $sort++, $infractionSelect->id, FormField::SELECT_BOOL_YES);
        FormBuilder::createField('', FormField::TYPE_UPLOAD, FormField::WIDTH_FULL, $section->id, '');
        self::addConditionalDateAndReasonFields($page->id, $sort++, $infractionSelect->id, FormField::SELECT_BOOL_YES);

        // 20 - agreement section
        $section = FormBuilder::createSection('19. Do you have any unresolved matters pending with the Internal Revenue Service, or other taxing authority?', $page->id, $sort++);
        FormBuilder::addSubline($section, 'Please read and agree to the terms below.');
        FormBuilder::createField('I attest that the information I have provided is true to the best of my knowledge. I acknowledge that if any information changes, I will notify my agency office within 5 days of such change.', FormField::TYPE_HTML, FormField::WIDTH_FULL, $section->id);
        FormBuilder::createField('Further, I understand that my agency may contact me when I need to answer carrier-specific questions.', FormField::TYPE_HTML, FormField::WIDTH_FULL, $section->id);
        FormBuilder::createField('I agree to the terms.', FormField::TYPE_CHECKBOX, FormField::WIDTH_FULL, $section->id);

    }

    public static function addConditionalDateAndReasonFields($pageId, $sort, $fieldId, $fieldValue, $dateLabel = "Date") {
        $section = FormBuilder::createSection('', $pageId, $sort, $fieldId, $fieldValue);
        FormBuilder::createField($dateLabel, FormField::TYPE_DATE, FormField::WIDTH_THIRD, $section->id);
        FormBuilder::createField('Action/Reason/Explanation', FormField::TYPE_TEXTAREA, FormField::WIDTH_FULL, $section->id);
    }
}
