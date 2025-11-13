<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\MasterDataService;
use Illuminate\Support\Str;

class MasterDataController extends Controller
{

    protected $masterDataService;

    public function __construct(MasterDataService $masterDataService)
    {
        $this->masterDataService = $masterDataService;
    }

    public function index($type)
    {

        // Return view if view is exist and accessible
        if (!$this->masterDataService->exists($type)) {
            abort(404, 'Master data not found');
        }

        // Set tittle page
        $title = str_replace('-', ' ', ucwords($type));

        return view('pages.master-data.' . $type . '.index', compact('title'));
    }

    public function data($type)
    {

        $modelClass = 'App\\Models\\' . Str::studly($type);

        if (!$modelClass || !class_exists($modelClass)) {
            return response()->json(['error' => 'Model not found'], 404);
        }

        $data = $modelClass::all();

        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $type)
    {
        try {

            if (!$this->masterDataService->exists($type)) {
                abort(404, 'Master data not found');
            }

            $data = $request->except(['_token']);

            $result = $this->masterDataService->create($type, $data);

            if (!$result['success']) {
                return response()->json(['status' => 500, 'success' => false, 'message' => $result['error']]);
            }

            return response()->json([
                'status'  => 200,
                'success' => true,
                'message' => "Data " . str_replace('-', ' ', ucwords($type)) . " saved successfully"
            ]);
        } catch (\Exception $e) {
            //throw $te;
            return response()->json(['status' => 500, 'message' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
