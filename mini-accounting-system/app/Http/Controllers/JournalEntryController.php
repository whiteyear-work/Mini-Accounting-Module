<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJournalRequest;
use App\Services\JournalService;
use Illuminate\Http\JsonResponse;
use Throwable;

class JournalEntryController extends Controller
{
    public function store(StoreJournalRequest $request, JournalService $journalService): JsonResponse
    {
        //get validated request from requests
        try {

            $validated = $request->validated();

            $journal = $journalService->createJournalEntry($validated);

            return response()->json([
                'status' => true,
                'message' => 'Successfully inserted!',
                // 'data' => $journal,
            ], 201);
        } catch (\InvalidArgumentException $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ], 422);
        } catch (Throwable $e) {
            report($e);

            return response()->json([
                'status' => false,
                'message' => 'Insert DB failed',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
