<?php

namespace App\Observers;

use App\Models\PropertyResearch;
use Illuminate\Support\Facades\Auth;

class PropertyResearchObserver
{
    /**
     * Handle the PropertyResearch "created" event.
     *
     * @param  \App\Models\PropertyResearch  $propertyResearch
     * @return void
     */
    public function creating(PropertyResearch $propertyResearch)
    {
        $lastResearchId = PropertyResearch::select('id')->get()->last();
        $proReference =  $lastResearchId ? $lastResearchId->id + 1 : 1;

        $propertyResearch->property_reference = 'PR-'. sprintf('%010d', $proReference);
    }

    public function created(PropertyResearch $propertyResearch)
    {
        //
    }

    /**
     * Handle the PropertyResearch "updated" event.
     *
     * @param  \App\Models\PropertyResearch  $propertyResearch
     * @return void
     */
    public function updated(PropertyResearch $propertyResearch)
    {
        //
    }

    /**
     * Handle the PropertyResearch "deleted" event.
     *
     * @param  \App\Models\PropertyResearch  $propertyResearch
     * @return void
     */
    public function deleted(PropertyResearch $propertyResearch)
    {
        // AUTO LOG USER DELETED RECORD
        $propertyResearch->deleted_by = Auth::user()->id;
        $propertyResearch->save();
    }

    /**
     * Handle the PropertyResearch "restored" event.
     *
     * @param  \App\Models\PropertyResearch  $propertyResearch
     * @return void
     */
    public function restored(PropertyResearch $propertyResearch)
    {
        //
    }

    /**
     * Handle the PropertyResearch "force deleted" event.
     *
     * @param  \App\Models\PropertyResearch  $propertyResearch
     * @return void
     */
    public function forceDeleted(PropertyResearch $propertyResearch)
    {
        //
    }
}
