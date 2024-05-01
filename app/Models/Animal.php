<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    const STATUS_REGISTERED = 'registered';
    const STATUS_READY = 'ready';
    const STATUS_ADOPTED = 'adopted';

    const SEX_MALE = 'male';
    const SEX_FEMALE = 'female';

    use HasFactory;

    protected $table = 'animals';

    protected $fillable = [
        'name',
        'description',
        'breed',
        'species',
        'sex',
        'status',
        'urgent',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
