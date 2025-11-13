<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SelectOptionService;

class SelectController extends Controller
{

    protected $selectOptionService;

    public function __construct(SelectOptionService $selectOptionService)
    {
        $this->selectOptionService = $selectOptionService;
    }

        public function selectOptions($option, Request $request)
    {
        $with = $request->get('with') ? explode(',', $request->get('with')) : [];

        $results = $this->selectOptionService->getOptions($option, $request->get('q'), $with);
        return response()->json($results);
    }
}
