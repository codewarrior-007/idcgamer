<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FormOption;
use App\Models\FormSection;

class FormField extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'label',
        'section_id',
        'is_required',
        'is_secure',
        'max_length',
        'type',
        'hash',
        'placeholder',
        'alias_autofill'
    ];

    // field types
    const TYPE_TEXT = 'text';
    const TYPE_SELECT = 'select';
    const TYPE_EMAIL = 'email';
    const TYPE_PASSWORD = 'password';
    const TYPE_DATE = 'date';
    const TYPE_PHONE = 'phone';
    const TYPE_SSN = 'ssn';
    const TYPE_HTML = 'html';
    const TYPE_UPLOAD = 'upload';
    const TYPE_TEXTAREA = 'textarea';
    const TYPE_CHECKBOX = 'checkbox';
    const TYPE_SIGNATURE = 'signature';

    // field widths
    const WIDTH_FULL = 'full-width';
    const WIDTH_HALF = 'half-width';
    const WIDTH_THIRD = 'third-width';

    // simple select yes/no
    const SELECT_BOOL_YES = 'YES';
    const SELECT_BOOL_NO = 'NO';
    const SELECT_BOOL = [
        self::SELECT_BOOL_YES => self::SELECT_BOOL_YES,
        self::SELECT_BOOL_NO => self::SELECT_BOOL_NO,
    ];

    // simple select business/individual
    const SELECT_BUSINESS_TYPE_BUSINESS = 'BUSINESS';
    const SELECT_BUSINESS_TYPE_INDIVIDUAL = 'INDIVIDUAL';
    const SELECT_BUSINESS_TYPE = [
        self::SELECT_BUSINESS_TYPE_BUSINESS => self::SELECT_BUSINESS_TYPE_BUSINESS,
        self::SELECT_BUSINESS_TYPE_INDIVIDUAL => self::SELECT_BUSINESS_TYPE_INDIVIDUAL,
    ];

    // account type selects
    const SELECT_ACCOUNT_TYPE_CHECKING = 'CHECKING';
    const SELECT_ACCOUNT_TYPE_SAVINGS = 'SAVINGS';
    const SELECT_ACCOUNT_TYPE = [
        self::SELECT_ACCOUNT_TYPE_CHECKING => self::SELECT_ACCOUNT_TYPE_CHECKING,
        self::SELECT_ACCOUNT_TYPE_SAVINGS => self::SELECT_ACCOUNT_TYPE_SAVINGS,
    ];    

    // value for date fields / expiration
    const DATE_FIELD_7_YEARS_PRIOR = '-7 years';
    const DATE_FIELD_1_YEAR_PRIOR = '-1 year';

    public function validate($value) {
        switch ($this->type) {
            case self::TYPE_TEXT:
            case self::TYPE_SELECT:
                if (strlen(trim($value)) < 1) {
                    return __('errors.string');
                }
                break;
        }
        return true;
    }

    /**
     * Get the fields for this form section.
     */
    public function options()
    {
        return $this->hasMany(FormOption::class, 'field_id');
    }

    public function section()
    {
        return $this->belongsTo(FormSection::class);
    }

    public function isRequired() {
        return ($this->is_required == 1);
    }

    public function isSecure() {
        return ($this->is_secure == 1);
    }

    public function fetchFormatted() 
    {
        return [
            'label'             => $this->label,
            'is_required'       => $this->is_required,
            'is_secure'         => $this->is_secure,
            'max_length'        => $this->max_length,
            'type'              => $this->type,
            'hash'              => $this->hash,
            'placeholder'       => $this->placeholder,
            'width'             => $this->width,
            'alias_autofill'    => $this->alias_autofill
        ];
    }
}
