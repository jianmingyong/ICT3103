<?php

namespace App\Models;

use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Model for user session table.
 *
 * @package App\Models
 * @property int id
 * @property string username
 * @property string ip_address
 * @property CarbonInterface last_logged_in
 * @property UserAccount userAccount
 */
class UserSession extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "user_last_session";

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'username',
        'ip_address',
        'last_logged_in',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'ip_address',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'ip_address' => 'string',
        'last_logged_in' => 'datetime',
    ];

    /**
     * Get the user account record associated with the user session.
     *
     * @return BelongsTo
     */
    public function userAccount()
    {
        return $this->belongsTo(UserAccount::class, 'username', 'username');
    }
}
