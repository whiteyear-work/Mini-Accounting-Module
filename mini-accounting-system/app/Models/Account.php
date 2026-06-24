<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    public $fillable = [
        'code',
        'name',
        'type'
    ];

    public function journalEntryLines()
    {
        return $this->hasMany(JournalEntryLine::class);
    }
}
