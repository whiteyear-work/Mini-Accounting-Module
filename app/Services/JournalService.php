<?php

namespace App\Services;

use App\Models\JournalEntry;
use App\Models\JournalEntryLine;
use App\Repositories\JournalEntryRepository;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class JournalService
{
    public function __construct(private JournalEntryRepository $repository) {}

    /**
     * check if debit equal to credit
     */
    public function createJournalEntry(array $validated): JournalEntry
    {
        //validate entry, debit and credit must matched
        $lines = collect($validated['lines']);

        $total_debit = $lines->where('type', JournalEntryLine::TYPES['debit'])
            ->sum('amount');

        $total_credit = $lines->where('type', JournalEntryLine::TYPES['credit'])
            ->sum('amount');

        if ($total_credit !== $total_debit) {
            throw new InvalidArgumentException("Credit and debit not equal");
        }

        //insert to db
        $journal = DB::transaction(function () use ($validated) {
            $journal = $this->repository->insertJournalEntry($validated);

            return $journal->load('journalEntryLines.account');
        });

        return $journal;
    }

    public function getJournalEntry(int $id): JournalEntry
    {
        return $this->repository->getById($id);
    }
}
