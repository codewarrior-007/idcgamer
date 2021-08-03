<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserStatusHistory extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_status_history';

    // user statuses
    const STATUS_REGISTER = 'registration';
    const STATUS_INITIAL = 'personal-information';
    const STATUS_SECOND = 'license-information';
    const STATUS_LEGAL = 'legal-information';
    const STATUS_ADDRESS_HISTORY = 'address-history';
    const STATUS_AML_CERTIFICATION = 'aml-certification';
    const STATUS_FINRA_LICENSE = 'finra-licensing';
    const STATUS_EO_INSURANCE = 'eo-insurance';
    const STATUS_EFT_INFO = 'eft-information';
    const STATUS_SURANCE_BAY = 'surance-bay-agreement';

    // user types
    const USER_TYPE_DEFAULT = 'default';
}
