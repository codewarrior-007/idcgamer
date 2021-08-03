<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSignature extends Model
{
    use HasFactory;

    // types of signature lines created by us
    const TYPE_EPOCH = 'signature-sent';

    // role specified in template setup on HelloSign site
    const ROLE_RECRUIT = 'Recruit';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_signatures';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_email',
        'signature_id',
        'account_id',
        'app_id',
        'event_type',
        'event_hash',
        'event_message',
        'event_time',
    ];
}
