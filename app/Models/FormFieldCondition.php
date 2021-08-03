<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormFieldCondition extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'form_field_conditions';

    const ACTION_SHOW = 'show';
    const ACTION_HIDE = 'hide';
    const ACTION_REPEAT_DATE = 'repeat';

    const TYPE_EQUALS = '=';
    const TYPE_MORE_THAN = '>';
    const TYPE_LESS_THAN = '<';

    public function field()
    {
        return $this->hasOne(FormField::class, 'id', 'field_id');
    }

    public function getFieldHash() 
    {
        return $this->field()->first()->hash;
    }

    public function fetchFormatted() 
    {
        return [
            'field' => $this->getFieldHash(),
            'value' => $this->value,
            'action' => $this->action,
            'type' => $this->type,
        ];
    }
}
