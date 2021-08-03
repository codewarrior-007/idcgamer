<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FormSection;

class FormPage extends Model
{
    use HasFactory;

    // statuses
    const STATUS_ACTIVE = 'active';
    const STATUS_DISABLED = 'disabled';

    /**
     * Get the sections for this form page.
     */
    public function sections()
    {
        return $this->hasMany(FormSection::class, 'page_id', 'id');
    }

    public function fetchFormatted() 
    {
        if (!$this->sections()->exists()) {
            Log::error("FORM ERROR: Form page {$this->label} does not have any sections.");
            return false;
        }
        $sections = [];
        foreach ($this->sections()->get() as $section) {
            $sections[] = $section->fetchFormatted();
        }
        return [
            'label' => $this->label,
            'sections' => $sections,
        ];
    }
}
