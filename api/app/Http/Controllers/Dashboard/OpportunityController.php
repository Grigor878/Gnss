<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Opportunity;
use App\Models\OpportunityStatuses;
use App\Services\OpportunityService;
use Illuminate\Http\Request;

class OpportunityController extends Controller
{
    /**
     * opportunityService
     *
     * @var mixed
     */
    private $opportunityService;

    /**
     * __construct
     *
     * @param  mixed $opportunityService
     * @return void
     */
    public function __construct(
        OpportunityService $opportunityService
    ) {
        $this->opportunityService = $opportunityService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $opportunities = Opportunity::with('product', 'customer')
        ->orderBy('created_at', 'desc')
        ->paginate('20');
        return view('dashboard.opportunities.index', compact('opportunities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $opportunity = Opportunity::with('product.images', 'customer', 'status')->find($id);
        $statuses = OpportunityStatuses::all();
        return view('dashboard.opportunities.show', compact('opportunity', 'statuses'));
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

    /**
     * updateStatus
     *
     * @param  string $opportunityId
     * @param  string $statusId
     * @return void
     */
    public function updateStatus(Request $request)
    {
        $data = $request->all();
        return $this->opportunityService->updateStatus($data['id'], $data['status']);
    }
}
