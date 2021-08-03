<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FormField;

class FormOption extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'field_id',
        'label',
        'value',
        'sort',
    ];

    public function field()
    {
        return $this->belongsTo(FormField::class);
    }

    public function fetchFormatted() 
    {
        return [
            'label' => $this->label,
            'value' => $this->value,
        ];
    }
}
