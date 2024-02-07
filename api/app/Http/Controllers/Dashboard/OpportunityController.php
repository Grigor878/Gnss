<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Product;
use App\Models\Customer;
use App\Models\Opportunity;
use Illuminate\Http\Request;
use App\Services\FilterService;
use Illuminate\Support\Facades\DB;
use App\Models\OpportunityStatuses;
use App\Http\Controllers\Controller;
use App\Services\OpportunityService;
use App\Services\OpportunityNotesService;
use App\Http\Requests\Dashboard\OpportunityRequest;

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
     * filterService
     *
     * @var mixed
     */
    private $filterService;

    /**
     * __construct
     *
     * @param  OpportunityService $opportunityService
     * @param  OpportunityNotesService $opportunityNotesService
     * @param  FilterService $filterService
     * @return void
     */
    public function __construct(
        OpportunityService $opportunityService,
        OpportunityNotesService $opportunityNotesService,
        FilterService $filterService
    ) {
        $this->opportunityService = $opportunityService;
        $this->opportunityNotesService = $opportunityNotesService;
        $this->filterService = $filterService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $request->all();

        $opportunities = Opportunity::query();
        $opportunities = $opportunities->with('product', 'customer', 'status');
        $opportunities = $this->filterService->opportunityFilter($opportunities, $data);
        $opportunitiesByStatus = clone $opportunities;
        $opportunities = $opportunities
            ->orderBy('created_at', 'desc')
            ->paginate('10');

        $opportunitiesByStatus = $opportunitiesByStatus->get();
        $opportunitiesByStatus = $opportunitiesByStatus->groupBy('opportunity_statuses_id');

        $statuses = OpportunityStatuses::select('id', 'name')->get();

        return view('dashboard.opportunities.index', compact('opportunities', 'statuses', 'opportunitiesByStatus'));
    }

    /**
     * byStatus
     *
     * @param  mixed $id
     * @return void
     */
    public function byStatus(int $id)
    {
        $opportunities = Opportunity::with('product', 'customer')
            ->where('opportunity_statuses_id', $id)
            ->orderBy('created_at', 'desc')
            ->paginate('10');

        $statuses = OpportunityStatuses::withCount('opportunities')
            ->get();

        $selectedStatus = OpportunityStatuses::find($id);

        return view('dashboard.opportunities.index', compact('opportunities', 'statuses', 'selectedStatus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::select('id', 'name')->get();
        $customers = Customer::all();

        return view('dashboard.opportunities.create', compact('products', 'customers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OpportunityRequest $request)
    {
        $data = $request->validated();

        $opportunityData = [
            "product_id" => $data['product'],
            "count" => $data['count'],
            "fullName" => $data['customer_name'],
            "phone" => $data['customer_phone'],
            "email" => $data['customer_email'],
            "company" => $data['company'],
        ];

        if (isset($data['customer'])) {
            $opportunityData["phone"] = $data['customer'];
        }

        $opportunity = $this->opportunityService->create($opportunityData);

        return redirect()->route('opportunities.index');
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
        $statuses = OpportunityStatuses::with('opportunities')->where('level', 'primary')->get();
        $secondaryStatuses = OpportunityStatuses::where('level', 'secondary')->get();

        return view('dashboard.opportunities.show', compact('opportunity', 'statuses', 'secondaryStatuses'));
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

    /**
     * closeOpportunity
     *
     * @param  mixed $request
     * @return void
     */
    public function closeOpportunity(Request $request)
    {
        $data = $request->all();

        $opportunity = $this->opportunityService->closeOpportunity($data);

        return redirect()->back();
    }

}
