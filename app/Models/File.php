<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [
        'message_id', 'name'
    ];

    protected $table = 'files';

    public function message()
    {
        return $this->belongsTo(Message::class);
    }
}
