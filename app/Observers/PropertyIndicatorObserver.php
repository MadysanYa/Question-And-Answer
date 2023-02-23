<?php

namespace App\Observers;

use App\Models\PropertyIndicator;
use Illuminate\Support\Facades\Auth;

class PropertyIndicatorObserver
{
    /**
     * Handle the PropertyIndicator "created" event.
     *
     * @param  \App\Models\PropertyIndicator  $propertyIndicator
     * @return void
     */
    public function creating(PropertyIndicator $propertyIndicator)
    {
        $lastIndicatorId = PropertyIndicator::select('id')->get()->last();
        $proReference =  $lastIndicatorId ? $lastIndicatorId->id + 1 : 1;

        $propertyIndicator->property_reference = 'IIR-'. sprintf('%010d', $proReference);
    }

    public function created(PropertyIndicator $propertyIndicator)
    {
        //
    }

    /**
     * Handle the PropertyIndicator "updated" event.
     *
     * @param  \App\Models\PropertyIndicator  $propertyIndicator
     * @return void
     */
    public function updated(PropertyIndicator $propertyIndicator)
    {
        //
    }

    /**
     * Handle the PropertyIndicator "deleted" event.
     *
     * @param  \App\Models\PropertyIndicator  $propertyIndicator
     * @return void
     */
    public function deleted(PropertyIndicator $propertyIndicator)
    {
        // AUTO LOG USER DELETED RECORD
        $propertyIndicator->deleted_by = Auth::user()->id;
        $propertyIndicator->save();
    }

    /**
     * Handle the PropertyIndicator "restored" event.
     *
     * @param  \App\Models\PropertyIndicator  $propertyIndicator
     * @return void
     */
    public function restored(PropertyIndicator $propertyIndicator)
    {
        //
    }

    /**
     * Handle the PropertyIndicator "force deleted" event.
     *
     * @param  \App\Models\PropertyIndicator  $propertyIndicator
     * @return void
     */
    public function forceDeleted(PropertyIndicator $propertyIndicator)
    {
        //
    }
}
