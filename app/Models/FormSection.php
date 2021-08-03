<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Log;

class FormSection extends Model
{
    use HasFactory;

    // statuses
    const STATUS_ACTIVE = 'active';
    const STATUS_DISABLED = 'disabled';

    // fill mode
    const FILLMODE_MANUAL = 'manual';
    const FILLMODE_GOOGLE_AUTOCOMPLETE = 'google_autocomplete';

    /**
     * Get the fields for this form section.
     */
    public function fields()
    {
        return $this->hasMany(FormField::class, 'section_id', 'id');
    }

    /**
     * Get the conditions for this form section.
     */
    public function conditions()
    {
        return $this->hasMany(FormFieldCondition::class, 'target_section_id', 'id');
    }    

    public function fetchFormatted() 
    {
        if (!$this->fields()->exists()) {
            Log::error("FORM ERROR: Form section {$this->label} does not have any fields.");
            return false;
        }
        $fields = [];
        foreach ($this->fields()->get() as $field) {
            $fields[] = $field->fetchFormatted();
        }
        $conditions = [];
        foreach ($this->conditions()->get() as $condition) {
            $conditions[] = $condition->fetchFormatted();
        }
        return [
            'label' => $this->label,
            'subline' => $this->subline,
            'conditions' => $conditions,
            'fields' => $fields,
            'fill_mode' => $this->fill_mode,
        ];
    }
}
