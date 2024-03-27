<?php

namespace App\Services;

use App\Models\Partner;
use App\Models\PartnerContactPerson;
use Illuminate\Support\Facades\DB;
use App\Repositories\PartnerRepository;

class PartnerService
{
    /**
     * partnerRepository
     *
     * @var mixed
     */
    private $partnerRepository;

    /**
     * fileService
     *
     * @var mixed
     */
    private $fileService;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(
        PartnerRepository $partnerRepository,
        FileServices $fileService
    ) {
        $this->partnerRepository = $partnerRepository;
        $this->fileService = $fileService;
    }

    /**
     * create
     *
     * @param  mixed $data
     * @return void
     */
    public function create($data)
    {
        return $this->partnerRepository->create($data);
    }

    /**
     * update
     *
     * @param  mixed $partner
     * @param  mixed $data
     * @return void
     */
    public function update($partner, $data)
    {
        return $this->partnerRepository->update($partner, $data);
    }

    /**
     * delete
     *
     * @param  mixed $partner
     * @return void
     */
    public function delete($partner)
    {
        return $this->partnerRepository->delete($partner);
    }

    /**
     * deleteImage
     *
     * @param  mixed $id
     * @return void
     */
    public function deleteImage(string $id)
    {
        DB::beginTransaction();

        $partner = Partner::find($id);
        $url = 'public/' . $partner->image;

        $partner->image = null;
        $partner->save();

        $this->fileService->deleteFile($url);

        DB::commit();

        return $partner;
    }
    
    /**
     * deletePerson
     *
     * @param  mixed $id
     * @return void
     */
    public function deletePerson(string $id)
    {
        return $this->partnerRepository->deletePerson($id);
    }
}
