<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Opportunity;
use Illuminate\Http\Request;
use App\Models\OpportunityStatuses;
use App\Http\Controllers\Controller;
use App\Services\OpportunityService;
use App\Services\OpportunityNotesService;

class OpportunityController extends Controller
{
    /**
     * opportunityService
     *
     * @var mixed
     */
    private $opportunityService;

    /**
     * opportunityNotesService
     *
     * @var mixed
     */
    private $opportunityNotesService;

    /**
     * __construct
     *
     * @param  OpportunityService $opportunityService
     * @param  OpportunityNotesService $opportunityNotesService
     * @return void
     */
    public function __construct(
        OpportunityService $opportunityService,
        OpportunityNotesService $opportunityNotesService
    ) {
        $this->opportunityService = $opportunityService;
        $this->opportunityNotesService = $opportunityNotesService;
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
        $opportunity = Opportunity::with(
            'product.images',
            'customer',
            'notes.status',
            'status',
            'attachments.status',
            'tasks'
        )->find($id);
        $statuses = OpportunityStatuses::all();
        return view('dashboard.opportunities.show', compact('opportunity', 'statuses'));
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

    /**
     * addNote
     *
     * @param  mixed $request
     * @return void
     */
    public function addNote(Request $request)
    {
        $data = $request->all();
        $note = $this->opportunityService->addNote($data);
        return redirect()->back();
    }

    /**
     * deleteNote
     *
     * @param  mixed $request
     * @return void
     */
    public function deleteNote(Request $request)
    {
        $data = $request->all();
        return $this->opportunityNotesService->delete($data['id']);
    }

    /**
     * attachFile
     *
     * @param  mixed $request
     * @return void
     */
    public function attachFile(Request $request)
    {
        $data = $request->all();

        $file = $this->opportunityService->attachFile($data);

        return redirect()->back();

    }

    /**
     * deleteFile
     *
     * @param  mixed $request
     * @return void
     */
    public function deleteFile(Request $request)
    {
        $data = $request->all();
        return $this->opportunityService->deleteFile($data['id']);
    }

    /**
     * addTask
     *
     * @param  mixed $request
     * @return void
     */
    public function addTask(Request $request)
    {
        $data = $request->all();

        $task = $this->opportunityService->addTask($data);

        return redirect()->back();
    }

    /**
     * completeTask
     *
     * @param  mixed $request
     * @return void
     */
    public function completeTask(Request $request)
    {
        $data = $request->all();

        return $this->opportunityService->completeTask($data);
    }

    /**
     * deleteTask
     *
     * @param  mixed $request
     * @return void
     */
    public function deleteTask(Request $request)
    {
        $data = $request->all();
        return $this->opportunityService->deleteTask($data['id']);
    }

}
