<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'name', 'email', 'question'
    ];

    protected $table = 'messages';

    public function files()
    {
        return $this->hasMany(File::class);
    }
}
