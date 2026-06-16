<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JournalEntry extends Model
{
    public function journalEntryLines()
    {
        return $this->hasMany(JournalEntryLine::class);
    }
}
