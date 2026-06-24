<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JournalEntryLine extends Model
{
    public $fillable = [
        'journal_entry_id',
        'account_id',
        'type',
        'amount',
    ];

    // type of jounral line
    public const TYPES = [
        'debit' => 'debit',
        'credit' => 'credit',
    ];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function journalEntry()
    {
        return $this->belongsTo(JournalEntry::class);
    }
}
