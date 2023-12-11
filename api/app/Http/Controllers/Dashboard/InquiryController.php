<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Inquiry;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Api\InquiryService;
use App\Services\OpportunityService;

class InquiryController extends Controller
{
    /**
     * inquiryService
     *
     * @var mixed
     */
    private $inquiryService;

    /**
     * opportunityService
     *
     * @var mixed
     */
    private $opportunityService;

    /**
     * __construct
     *
     * @param  InquiryService $inquiryService
     * @param  OpportunityService $opportunityService
     * @return void
     */
    public function __construct (
        InquiryService $inquiryService,
        OpportunityService $opportunityService
    ) {
        $this->inquiryService = $inquiryService;
        $this->opportunityService = $opportunityService;
    }

    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $inquiries = Inquiry::with('product')->orderBy('created_at', 'desc')->paginate('20');
        return view('dashboard.inquiries.index', compact('inquiries'));
    }

    /**
     * show
     *
     * @param  Inquiry $inquiry
     * @return void
     */
    public function show($id)
    {
        $inquiry = Inquiry::with('product.images')->find($id);
        return view('dashboard.inquiries.show', compact('inquiry'));
    }

    /**
     * reject
     *
     * @param  mixed $inquiry
     * @return void
     */
    public function reject($id)
    {
        $this->inquiryService->reject($id);
        return redirect()->route('inquiries');
    }

    /**
     * toOpportunity
     *
     * @param  mixed $inquiry
     * @return void
     */
    public function toOpportunity (Inquiry $inquiry)
    {
        $data = $inquiry->toArray();
        $delete = $this->inquiryService->delete($inquiry->id);
        $opportunity = $this->opportunityService->create($data);
        return redirect()->route('inquiries');
    }

}
