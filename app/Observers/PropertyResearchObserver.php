<?php

namespace App\Observers;

use App\Models\PropertyResearch;

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

        $propertyResearch->property_reference = 'PL-'. sprintf('%010d', $proReference);
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
        //
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
