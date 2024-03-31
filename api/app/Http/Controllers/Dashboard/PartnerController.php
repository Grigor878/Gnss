<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\PartnerRequest;
use App\Models\Partner;
use App\Services\PartnerService;

class PartnerController extends Controller
{
    /**
     * partnerService
     *
     * @var mixed
     */
    private $partnerService;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(
        PartnerService $partnerService
    ) {
        $this->partnerService = $partnerService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $partners = Partner::orderBy('created_at', 'desc')->get();

        return view('dashboard.partner.index', compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.partner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PartnerRequest $request)
    {
        $data = $request->validated();

        $this->partnerService->create($data);

        return redirect()->route('partners.index');
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
    public function edit(Partner $partner)
    {
        return view('dashboard.partner.edit', compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PartnerRequest $request, Partner $partner)
    {
        $data = $request->validated();

        $this->partnerService->update($partner, $data);

        return redirect()->route('partners.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Partner $partner)
    {
        $this->partnerService->deleteImage($partner->id);

        $this->partnerService->delete($partner);

        return redirect()->route('partners.index');
    }

    /**
     * deleteImage
     *
     * @param  mixed $id
     * @return void
     */
    public function deleteImage(string $id)
    {
        try {
            $this->partnerService->deleteImage($id);
            return [
                'status' => 200,
                'message' => 'Image Deleted'
            ];
        } catch (\Exception $e) {
            return [
                'status' => 500,
                'message' => $e
            ];
        }
    }

    /**
     * deletePerson
     *
     * @param  mixed $id
     * @return void
     */
    public function deletePerson(string $id)
    {
        try {
            $this->partnerService->deletePerson($id);
            return [
                'status' => 200,
                'message' => 'Person Deleted'
            ];
        } catch (\Exception $e) {
            return [
                'status' => 500,
                'message' => $e->getMessage()
            ];
        }
    }
}
