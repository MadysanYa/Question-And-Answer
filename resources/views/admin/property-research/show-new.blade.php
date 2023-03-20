<link href="{{ env('APP_URL') }}/resources/css/all-property-show.css" rel="stylesheet">

<div class="box box-info">
    <div class="box-header with-border border-bottom-0">
        <h3 class="box-title-font-18 mt-10">Status: {!! $propertyResearch->PropertyStatusColor !!}</h3>
        <div class="box-tools">
            @if (!$userBmRole)
                @if ($userAdminRole || !$propertyResearch->IsPropertyVerifiedOrApproved && !$propertyResearch->IsPropertyRejected)
                    <div class="btn-group pull-right" style="margin-right: 5px">
                        <a href="{{ env('APP_URL') }}/public/admin/property_researchs/{{ $propertyResearch->id }}/edit" class="btn btn-sm btn-primary" title="Edit">
                            <i class="fa fa-edit"></i><span class="hidden-xs"> Edit</span>
                        </a>
                    </div>
                @endif
            @endif
            <div class="btn-group pull-right" style="margin-right: 5px">
                <a href="{{ env('APP_URL') }}/public/admin/property_researchs" class="btn btn-sm btn-default" title="List">
                    <i class="fa fa-list"></i><span class="hidden-xs"> List</span>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- General Information -->
<div class="box box-info border-0 p-16">
    <div class="box-header with-border border-0 p-0 box-title-height">
        <h3 class="box-title-font-18">General Information</h3>
        <hr class="mt-7 mb-7">
    </div>
    <div class="">
        <div class="row">
            <div class="col-md-4">
                <div class="row">
                    <div class="col-sm-4"><strong>Contact No</strong></div>
                    <div class="col-sm-8">
                        <div>{{ $propertyResearch->contact_no }}</div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="row">
                    <div class="col-sm-4"><strong>Remark</strong></div>
                    <div class="col-sm-8">
                        <div>{{ $propertyResearch->remark }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Property Information -->
<div class="box box-info border-0 p-16">
    <div class="box-header with-border border-0 p-0 box-title-height">
        <h3 class="box-title-font-18">Property Information</h3>
        <hr class="mt-7 mb-7">
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="row mb-10">
                <div class="col-sm-5"><strong>Property Reference</strong></div>
                <div class="col-sm-7">
                    <div>{{ $propertyResearch->property_reference }}</div>
                </div>
            </div>
            <div class="row mb-10">
                <div class="col-sm-5"><strong>Access Road Name</strong></div>
                <div class="col-sm-7">
                    <div>{{ $propertyResearch->access_road_name }}</div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-5"><strong>Type of Access Road</strong></div>
                <div class="col-sm-7">
                    <div>{{ $propertyResearch->type_of_access_road }}</div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row mb-10">
                <div class="col-sm-5"><strong>Property Type</strong></div>
                <div class="col-sm-7">
                    <div>{{ $propertyResearch->PropertyTypeName }}</div>
                </div>
            </div>
            <div class="row mb-10">
                <div class="col-sm-5"><strong>Location Type</strong></div>
                <div class="col-sm-7">
                    <div>{{ $propertyResearch->location_type }}</div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-5"><strong>Borey</strong></div>
                <div class="col-sm-7">
                    <div>{{ $propertyResearch->BoreyName }}</div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row mb-10">
                <div class="col-sm-5"><strong>Information Type</strong></div>
                <div class="col-sm-7">
                    <div>{{ $propertyResearch->InfoTypeName }}</div>
                </div>
            </div>
            <div class="row mb-10">
                <div class="col-sm-5"><strong>Information Date</strong></div>
                <div class="col-sm-7">
                    <div>{{ $propertyResearch->information_date }}</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Property Address -->
<x-property-map-address 
    :googlePoint="$propertyResearch->GeoCode"
    :prolatitude="$propertyResearch->latitude"
    :prolongtitude="$propertyResearch->longtitude"
    :shortAddress="$propertyResearch->ShortAddress"
/>

<!-- Property Dimension -->
<div class="box box-info border-0 p-16">
    <div class="box-header with-border border-0 p-0 box-title-height">
        <h3 class="box-title-font-18">Property Dimension</h3>
        <hr class="mt-7 mb-7">
    </div>
    <!-- Land -->
    <div class="comparable-reference-card mb-16">
        <div>
            <h3 class="box-title-font-18">Land Information</h3>
            <hr class="mt-7 mb-7">
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="row">
                    <div class="col-sm-4"><strong>Land Title Type</strong></div>
                    <div class="col-sm-8">
                        <div>{{ $propertyResearch->land_title_type }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-sm-4"><strong>Land Size(Sqm)</strong></div>
                    <div class="col-sm-8">
                        <div>{{ $propertyResearch->land_size }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-sm-4"><strong>Land Value per Sqm</strong></div>
                    <div class="col-sm-8">
                        <div>{{ $propertyResearch->land_value_per_sqm }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Building -->
    <div class="comparable-reference-card">
        <div>
            <h3 class="box-title-font-18">Building Information</h3>
            <hr class="mt-7 mb-7">
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="row mb-10">
                    <div class="col-sm-4"><strong>No of Floor</strong></div>
                    <div class="col-sm-8">
                        <div>{{ $propertyResearch->no_of_floor }}</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4"><strong>Property Market Value</strong></div>
                    <div class="col-sm-8">
                        <div>{{ $propertyResearch->property_market_value }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row mb-10">
                    <div class="col-sm-4"><strong>Building Size</strong></div>
                    <div class="col-sm-8">
                        <div>{{ $propertyResearch->building_size }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row mb-10">
                    <div class="col-sm-4"><strong>Building Value per Sqm</strong></div>
                    <div class="col-sm-8">
                        <div>{{ $propertyResearch->building_value_per_sqm }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>