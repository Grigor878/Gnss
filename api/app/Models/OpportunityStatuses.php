<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OpportunityStatuses extends Model
{
    use HasFactory;

    /**
     * Get all of the opportunity for the opportunityStatuses
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function opportunities(): HasMany
    {
        return $this->hasMany(Opportunity::class);
    }

    /**
     * Get all of the opportunityNotes for the OpportunityStatuses
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function opportunityNotes(): HasMany
    {
        return $this->hasMany(OpportunityNotes::class);
    }

    /**
     * Get all of the opportunityAttachments for the OpportunityStatuses
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function opportunityAttachments(): HasMany
    {
        return $this->hasMany(OpportunityAttachments::class);
    }
}
