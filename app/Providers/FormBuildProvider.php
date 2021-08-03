<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use App\Models\FormField;
use App\Models\FormOption;
use App\Models\FormSection;
use App\Models\FormPage;
use App\Models\FormFieldCondition;
use App\Models\UserStatusHistory;

class FormBuildProvider extends ServiceProvider
{
    public static function generateHash() {
        return hash('md5', Str::random(128).time());
    }

    public static function createPage($label,$step) {
        $page = new FormPage;
        $page->label = $label;
        $page->status = FormPage::STATUS_ACTIVE;
        $page->step_ident = $step;
        $page->save();
        return $page;
    }

    public static function addSubline($object, $subline) {
        $object->subline = $subline;
        $object->save();
    }

    public static function addCondition($sectionId, $fieldId, $fieldValue, $fieldAction, $fieldConditionType = false) {

        $conditionType = (!$fieldConditionType ? FormFieldCondition::TYPE_EQUALS : $fieldConditionType);

        $condition = new FormFieldCondition;
        $condition->field_id = $fieldId;
        $condition->target_section_id = $sectionId;
        $condition->value = $fieldValue;
        $condition->action = $fieldAction;
        $condition->type = $conditionType;
        $condition->save();

        return $condition;
    }

    public static function createSection($label, $pageId, $sort, $fieldId = false, $fieldValue = false, $fieldAction = false, $fieldConditionType = false, $fillMode = FormSection::FILLMODE_MANUAL) {
        $section = new FormSection;
        $section->label = $label;
        $section->status = FormSection::STATUS_ACTIVE;
        $section->hash = self::generateHash();
        $section->page_id = $pageId;
        $section->sort = $sort;
        $section->fill_mode = $fillMode;
        $section->save();

        if ($fieldId) {

            $fieldAction = (!$fieldAction ? FormFieldCondition::ACTION_SHOW : $fieldAction);
            $conditionType = (!$fieldConditionType ? FormFieldCondition::TYPE_EQUALS : $fieldConditionType);

            $condition = new FormFieldCondition;
            $condition->field_id = $fieldId;
            $condition->target_section_id = $section->id;
            $condition->value = $fieldValue;
            $condition->action = $fieldAction;
            $condition->type = $conditionType;
            $condition->save();
        }

        return $section;
    }

    public static function createField($label, $type, $width, $sectionId=0, $placeholder = false, $isRequired=1, $isSecure=0, $maxLength=255, $selectOptions=false, $aliasAutoFill = '') {

        $placeholder = (!$placeholder ? $label : $placeholder);
        $maxLength = ($type == FormField::TYPE_DATE ? 1 : $maxLength);

        $field = new FormField;
        $field->label = $label;
        $field->is_required = $isRequired;
        $field->is_secure = $isSecure;
        $field->max_length = $maxLength;
        $field->type = $type;
        $field->hash = self::generateHash();
        $field->placeholder = $placeholder;
        $field->section_id = $sectionId;
        $field->width = $width;
        $field->alias_autofill = $aliasAutoFill;
        $field->save();

        if ($type == FormField::TYPE_SELECT && sizeof($selectOptions) > 0) {
            $sort = 0;
            foreach ($selectOptions as $value => $label) {
                $option = new FormOption;
                $option->field_id = $field->id;
                $option->label = $label;
                $option->value = $value;
                $option->sort = $sort;
                $option->save();
                $sort++;
            }
        }

        return $field;
    }
}
