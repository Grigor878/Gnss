<?php

namespace App\Repositories\Api;

use App\Models\Inquiry;
use App\Services\ResponseService;
use Illuminate\Support\Facades\DB;

class InquiryRepository
{

    /**
     * response
     *
     * @var mixed
     */
    private $response;

    /**
     * __construct
     *
     * @param  ResponseService $responseService
     * @return void
     */
    public function __construct(
        ResponseService $responseService
    ) {
        $this->response = $responseService;
    }

    /**
     * create
     *
     * @param  mixed $data
     * @return void
     */
    public function create($data)
    {
        DB::beginTransaction();

        try {
            $newInquiry = [
                'product_id' => $data['id'],
                'count' => $data['count'],
                'fullName' => $data['fullName'],
                'company' => $data['company'],
                'phone' => $data['phone'],
                'email' => $data['mail'],
                'note' => $data['notes'],
            ];

            $inquiry = Inquiry::create($newInquiry);
            DB::commit();
            return $this->response->success($inquiry, 'Inquiry Created');
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->response->badRequest([], $e->getMessage());
        }
    }

    /**
     * reject
     *
     * @param  mixed $id
     * @return void
     */
    public function reject($id)
    {
        DB::beginTransaction();
        try {

            $inquiry = Inquiry::find($id);

            $inquiry->update([
                'is_rejected' => 1
            ]);
            DB::commit();
            return [
                'status' => 200,
                'message' => "Inquiry deleted successfully",
                'data' => $inquiry,
            ];
        } catch (\Exception $e) {
            DB::rollBack();
            return [
                'status' => 400,
                'message' => "Something went wrong",
                'data' => $e->getMessage(),
            ];
        }
    }

    public function delete($id)
    {
        DB::beginTransaction();
        try {
            $inquiry = Inquiry::find($id);
            $inquiry->delete();
            DB::commit();
            return [
                'status' => 200,
                'message' => "Inquiry deleted successfully",
                'data' => '',
            ];
        } catch (\Exception $e) {
            DB::rollBack();
            return [
                'status' => 400,
                'message' => "Something went wrong",
                'data' => $e->getMessage(),
            ];
        }
    }
}
