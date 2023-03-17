<link href="{{ env('APP_URL') }}/resources/css/all-property-show.css" rel="stylesheet">

<div class="box box-info">
    <div class="box-header with-border border-bottom-0">
        <div class="box-tools">
            @if (!$userBmRole)
                @if ($userAdminRole || !$propertyIndicator->IsPropertyVerifiedOrApproved && !$propertyIndicator->IsPropertyRejected)
                    <div class="btn-group pull-right" style="margin-right: 5px">
                        <a href="{{  env('APP_URL') }}/public/admin/property_indicators/{{  $propertyIndicator->id }}/edit" class="btn btn-sm btn-primary" title="Edit">
                            <i class="fa fa-edit"></i><span class="hidden-xs"> Edit</span>
                        </a>
                    </div>
                @endif
            @endif
            <div class="btn-group pull-right" style="margin-right: 5px">
                <a href="{{  env('APP_URL') }}/public/admin/property_indicators" class="btn btn-sm btn-default" title="List">
                    <i class="fa fa-list"></i><span class="hidden-xs"> List</span>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Property Photos -->
@if(is_array($propertyIndicator->PropertyAllPhotosMerge) && count($propertyIndicator->PropertyAllPhotosMerge))
    <div class="mb-20">
        <div class="row">
            <div class="col-md-12">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner bg-carousel" role="listbox">
                        @foreach ($propertyIndicator->PropertyAllPhotosMerge as $photo)
                        <div class="item {{ $loop->first ? 'active'  : '' }}">
                            <img class="first-slide m-auto" src="{{ asset('upload/'.$photo['url']) }}" alt="">
                            <div class="container">
                                <div class="carousel-caption">
                                    <h3>{{ $photo['name'] }}</h3>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endif

<!-- General Information -->
<div class="box box-info border-0 p-16">
    <div class="box-header with-border border-0 p-0 box-title-height">
        <h3 class="box-title-font-18">General Information</h3>
        <hr class="mt-7 mb-7">
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="row mb-10">
                <div class="col-sm-4"><strong>Requested Date</strong></div>
                <div class="col-sm-8">
                    <div>{{ $propertyIndicator->RequestedDateFormat }}</div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4"><strong>Reported Date</strong></div>
                <div class="col-sm-8">
                    <div>{{ $propertyIndicator->ReportedDateFormat }}</div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row mb-10">
                <div class="col-sm-4"><strong>CIF No</strong></div>
                <div class="col-sm-8">
                    <div>{{ $propertyIndicator->cif_no }}</div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row mb-10">
                <div class="col-sm-4"><strong>Remark</strong></div>
                <div class="col-sm-8">
                    <div>{{ $propertyIndicator->remark }}</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Client Information -->
<div class="box box-info border-0 p-16">
    <div class="box-header with-border border-0 p-0 box-title-height">
        <h3 class="box-title-font-18">Client Information</h3>
        <hr class="mt-7 mb-7">
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="row mb-10">
                <div class="col-sm-4"><strong>RM Name</strong></div>
                <div class="col-sm-8">
                    <div>{{ $propertyIndicator->rm_name }}</div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4"><strong>Telephone</strong></div>
                <div class="col-sm-8">
                    <div>{{ $propertyIndicator->telephone }}</div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row mb-10">
                <div class="col-sm-4"><strong>Customer Name</strong></div>
                <div class="col-sm-8">
                    <div>{{ $propertyIndicator->customer_name }}</div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4"><strong>Client Contact No</strong></div>
                <div class="col-sm-8">
                    <div>{{ $propertyIndicator->client_contact_no }}</div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row mb-10">
                <div class="col-sm-4"><strong>Collateral Owner</strong></div>
                <div class="col-sm-8">
                    <div>{{ $propertyIndicator->collateral_owner }}</div>
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
                    <div>{{ $propertyIndicator->property_reference }}</div>
                </div>
            </div>
            <div class="row mb-10">
                <div class="col-sm-5"><strong>Location Type</strong></div>
                <div class="col-sm-7">
                    <div>{{ $propertyIndicator->location_type }}</div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-5"><strong>Type of Access Road</strong></div>
                <div class="col-sm-7">
                    <div>{{ $propertyIndicator->type_of_access_road }}</div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row mb-10">
                <div class="col-sm-5"><strong>Region</strong></div>
                <div class="col-sm-7">
                    <div>{{ $propertyIndicator->RegionName }}</div>
                </div>
            </div>
            <div class="row mb-10">
                <div class="col-sm-5"><strong>Property Type</strong></div>
                <div class="col-sm-7">
                    <div>{{ $propertyIndicator->PropertyTypeName }}</div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-5"><strong>Access Road Name</strong></div>
                <div class="col-sm-7">
                    <div>{{ $propertyIndicator->access_road_name }}</div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row mb-10">
                <div class="col-sm-5"><strong>Branch</strong></div>
                <div class="col-sm-7">
                    <div>{{ $propertyIndicator->BranchName }}</div>
                </div>
            </div>
            <div class="row mb-10">
                <div class="col-sm-5"><strong>Information Type</strong></div>
                <div class="col-sm-7">
                    <div>{{ $propertyIndicator->PropertyInformationType }}</div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-5"><strong>Borey</strong></div>
                <div class="col-sm-7">
                    <div>{{ $propertyIndicator->BoreyName }}</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Property Address -->
<x-property-map-address 
    :googlePoint="$propertyIndicator->GeoCode"
    :prolatitude="$propertyIndicator->latitude"
    :prolongtitude="$propertyIndicator->longtitude"
    :shortAddress="$propertyIndicator->ShortAddress"
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
                <div class="row mb-10">
                    <div class="col-sm-4"><strong>Land Title Type</strong></div>
                    <div class="col-sm-8">
                        <div>{{ $propertyIndicator->land_title_type }}</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4"><strong>Land Title No</strong></div>
                    <div class="col-sm-8">
                        <div>{{ $propertyIndicator->land_title_no }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row mb-10">
                    <div class="col-sm-4"><strong>Land Size(Sqm)</strong></div>
                    <div class="col-sm-8">
                        <div>{{ $propertyIndicator->land_size }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row mb-10">
                    <div class="col-sm-4"><strong>Land Value per Sqm</strong></div>
                    <div class="col-sm-8">
                        <div>{{ $propertyIndicator->land_value_per_sqm }}</div>
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
                        <div>{{ $propertyIndicator->no_of_floor }}</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4"><strong>Building Status (%)</strong></div>
                    <div class="col-sm-8">
                        <div>{{ $propertyIndicator->building_status }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row mb-10">
                    <div class="col-sm-4"><strong>Property Value</strong></div>
                    <div class="col-sm-8">
                        <div>{{ $propertyIndicator->property_value }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row mb-10">
                    <div class="col-sm-4"><strong>Building Value per Sqm</strong></div>
                    <div class="col-sm-8">
                        <div>{{ $propertyIndicator->building_value_per_sqm }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Comparable Reference -->
<div class="box box-info border-0 p-16">
    <div class="box-header with-border border-0 p-0 box-title-height">
        <h3 class="box-title-font-18">Comparable Reference</h3>
        <hr class="mt-7 mb-7">
    </div>
    <!-- #1 -->
    <div class="comparable-reference-card mb-16">
        <div>
            <h3 class="box-title-font-18">#1</h3>
            <hr class="mt-7 mb-7">
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="row mb-10">
                    <div class="col-sm-4"><strong>ID 1</strong></div>
                    <div class="col-sm-8">
                        <div>{{ $propertyIndicator->comparable_id1  }}</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4"><strong>Size 1</strong></div>
                    <div class="col-sm-8">
                        <div>{{ $propertyIndicator->comparable_size1  }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row mb-10">
                    <div class="col-sm-4"><strong>CIF No. / Name 1</strong></div>
                    <div class="col-sm-8">
                        <div>{{ $propertyIndicator->comparable_cif_no1  }}</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4"><strong>Value per Sqm 1</strong></div>
                    <div class="col-sm-8">
                        <div>{{ $propertyIndicator->comparable_value_per_sqm1  }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row mb-10">
                    <div class="col-sm-4"><strong>Geo Code 1</strong></div>
                    <div class="col-sm-8">
                        <div>{{ $propertyIndicator->comparable_geo_code1  }}</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4"><strong>Total Value 1</strong></div>
                    <div class="col-sm-8">
                        <div>{{ $propertyIndicator->comparable_total_value1  }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #2 -->
    <div class="comparable-reference-card">
        <div>
            <h3 class="box-title-font-18">#2</h3>
            <hr class="mt-7 mb-7">
        </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>ID 2</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $propertyIndicator->comparable_id2  }}</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4"><strong>Size 2</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $propertyIndicator->comparable_size2  }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>CIF No. / Name 2</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $propertyIndicator->comparable_cif_no2  }}</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4"><strong>Value per Sqm 2</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $propertyIndicator->comparable_value_per_sqm2  }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>Geo Code 2</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $propertyIndicator->comparable_geo_code2  }}</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4"><strong>Total Value 2</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $propertyIndicator->comparable_total_value2  }}</div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>