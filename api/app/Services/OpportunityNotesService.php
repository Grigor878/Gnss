<?php

namespace App\Services;

use App\Repositories\OpportunityNotesRepository;

class OpportunityNotesService
{
    /**
     * opportunityNotesRepository
     *
     * @var mixed
     */
    private $opportunityNotesRepository;

    /**
     * __construct
     *
     * @param  mixed $opportunityNotesRepository
     * @return void
     */
    public function __construct(
        OpportunityNotesRepository $opportunityNotesRepository
    ) {
        $this->opportunityNotesRepository = $opportunityNotesRepository;
    }

    /**
     * create
     *
     * @param  mixed $data
     * @return void
     */
    public function create($data)
    {
        return $this->opportunityNotesRepository->create($data);
    }

    /**
     * delete
     *
     * @param  mixed $id
     * @return void
     */
    public function delete(string $id)
    {
        return $this->opportunityNotesRepository->delete($id);
    }


}
