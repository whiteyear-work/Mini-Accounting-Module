<?php

namespace App\Repositories;

use App\Models\JournalEntry;

class JournalEntryRepository
{
    /**
     * to insert JournalEntry & JournalEntryLines
     */
    public function insertJournalEntry(array $validated): JournalEntry
    {
        //create journal
        $journal = JournalEntry::create([
            'entry_date' => $validated['entry_date'],
            'description' => $validated['description'] ?? null,
        ]);

        //create journal entry lines
        foreach ($validated['lines'] as $line) {
            $journal->journalEntryLines()->create([
                'account_id' => $line['account_id'],
                'type' => $line['type'],
                'amount' => $line['amount'],
            ]);
        }

        return $journal;
    }

    public function getById(int $id): JournalEntry
    {
        return JournalEntry::with('journalEntryLines.account')
            ->findOrFail($id);
    }
}
