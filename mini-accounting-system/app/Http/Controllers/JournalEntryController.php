<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJournalRequest;
use Illuminate\Http\Request;

class JournalEntryController extends Controller
{
    public function store(StoreJournalRequest $request)
    {
        //get validated request from requests
        $validated = $request->validated();

        
    }
}
