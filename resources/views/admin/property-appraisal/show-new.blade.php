<link href="{{ env('APP_URL') }}/resources/css/all-property-show.css" rel="stylesheet">

<div class="box box-info">
    <div class="box-header with-border border-bottom-0">
        <!-- <h3 class="box-title">Processing</h3> -->
        <div class="box-tools">
            <!-- PROPERTY WAS APPROVED OR REJECTED USER CAN'T EDIT -->
            @if (!$userBmRole)
                @if ($userAdminRole || !$proAppraisal->IsPropertyVerifiedOrApproved && !$proAppraisal->IsPropertyRejected)
                    <div class="btn-group pull-right" style="margin-right: 5px">
                        <a href="{{ env('APP_URL') }}/public/admin/property_appraisals/{{ $proAppraisal->id }}/edit" class="btn btn-sm btn-primary" title="Edit">
                            <i class="fa fa-edit"></i><span class="hidden-xs"> Edit</span>
                        </a>
                    </div>
                @endif
            @endif
            <div class="btn-group pull-right" style="margin-right: 5px">
                <a href="{{ env('APP_URL') }}/public/admin/property_appraisals" class="btn btn-sm btn-default" title="List">
                    <i class="fa fa-list"></i><span class="hidden-xs"> List</span>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Property Photos -->
@if(is_array($proAppraisal->PropertyAllPhotosMerge) && count($proAppraisal->PropertyAllPhotosMerge))
    <div class="mb-20">
        <div class="row">
            <div class="col-md-12">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1" class=""></li>
                        <li data-target="#myCarousel" data-slide-to="2" class=""></li>
                    </ol> -->
                    <div class="carousel-inner bg-carousel" role="listbox">
                        @foreach ($proAppraisal->PropertyAllPhotosMerge as $photo)
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
                    <div>{{ $proAppraisal->RequestedDateFormat }}</div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4"><strong>Reported Date</strong></div>
                <div class="col-sm-8">
                    <div>{{ $proAppraisal->ReportedDateFormat }}</div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row mb-10">
                <div class="col-sm-4"><strong>CIF No</strong></div>
                <div class="col-sm-8">
                    <div>{{ $proAppraisal->cif_no }}</div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4"><strong>Appraisal Certificate Fee</strong></div>
                <div class="col-sm-8">
                    <div>{{ $proAppraisal->appraisal_certificate_fee }}</div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row mb-10">
                <div class="col-sm-4"><strong>Remark</strong></div>
                <div class="col-sm-8">
                    <div>{{ $proAppraisal->remark }}</div>
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
                    <div>{{ $proAppraisal->rm_name }}</div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4"><strong>Telephone</strong></div>
                <div class="col-sm-8">
                    <div>{{ $proAppraisal->telephone }}</div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row mb-10">
                <div class="col-sm-4"><strong>Customer Name</strong></div>
                <div class="col-sm-8">
                    <div>{{ $proAppraisal->customer_name }}</div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4"><strong>Client Contact No</strong></div>
                <div class="col-sm-8">
                    <div>{{ $proAppraisal->client_contact_no }}</div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row mb-10">
                <div class="col-sm-4"><strong>Collateral Owner</strong></div>
                <div class="col-sm-8">
                    <div>{{ $proAppraisal->collateral_owner }}</div>
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
                    <div>{{ $proAppraisal->property_reference }}</div>
                </div>
            </div>
            <div class="row mb-10">
                <div class="col-sm-5"><strong>Location Type</strong></div>
                <div class="col-sm-7">
                    <div>{{ $proAppraisal->location_type }}</div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-5"><strong>Type of Access Road</strong></div>
                <div class="col-sm-7">
                    <div>{{ $proAppraisal->type_of_access_road }}</div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row mb-10">
                <div class="col-sm-5"><strong>Region</strong></div>
                <div class="col-sm-7">
                    <div>{{ $proAppraisal->RegionName }}</div>
                </div>
            </div>
            <div class="row mb-10">
                <div class="col-sm-5"><strong>Property Type</strong></div>
                <div class="col-sm-7">
                    <div>{{ $proAppraisal->PropertyTypeName }}</div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-5"><strong>Access Road Name</strong></div>
                <div class="col-sm-7">
                    <div>{{ $proAppraisal->access_road_name }}</div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row mb-10">
                <div class="col-sm-5"><strong>Branch</strong></div>
                <div class="col-sm-7">
                    <div>{{ $proAppraisal->BranchName }}</div>
                </div>
            </div>
            <div class="row mb-10">
                <div class="col-sm-5"><strong>Information Type</strong></div>
                <div class="col-sm-7">
                    <div>{{ $proAppraisal->PropertyInformationType }}</div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-5"><strong>Borey</strong></div>
                <div class="col-sm-7">
                    <div>{{ $proAppraisal->BoreyName }}</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Property Address -->
<x-property-map-address 
    :googlePoint="$proAppraisal->GeoCode"
    :prolatitude="$proAppraisal->latitude"
    :prolongtitude="$proAppraisal->longtitude"
    :shortAddress="$proAppraisal->ShortAddress"
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
                        <div>{{ $proAppraisal->land_title_type }}</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4"><strong>Land Title No</strong></div>
                    <div class="col-sm-8">
                        <div>{{ $proAppraisal->land_title_no }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row mb-10">
                    <div class="col-sm-4"><strong>Land Size(Sqm)</strong></div>
                    <div class="col-sm-8">
                        <div>{{ $proAppraisal->land_size }}</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4"><strong>Land Size by Measurement</strong></div>
                    <div class="col-sm-8">
                        <div>{{ $proAppraisal->land_size_by_measurement }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row mb-10">
                    <div class="col-sm-4"><strong>Land Value per Sqm</strong></div>
                    <div class="col-sm-8">
                        <div>{{ $proAppraisal->land_value_per_sqm }}</div>
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
                        <div>{{ $proAppraisal->no_of_floor }}</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4"><strong>Building Status (%)</strong></div>
                    <div class="col-sm-8">
                        <div>{{ $proAppraisal->building_status }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row mb-10">
                    <div class="col-sm-4"><strong>Property Value</strong></div>
                    <div class="col-sm-8">
                        <div>{{ $proAppraisal->property_value }}</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4"><strong>Building Size by Measurement</strong></div>
                    <div class="col-sm-8">
                        <div>{{ $proAppraisal->building_size_by_measurement }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row mb-10">
                    <div class="col-sm-4"><strong>Building Value per Sqm</strong></div>
                    <div class="col-sm-8">
                        <div>{{ $proAppraisal->building_value_per_sqm }}</div>
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
                    <div class="col-sm-4"><strong>ID</strong></div>
                    <div class="col-sm-8">
                        <div>{{ $proAppraisal->comparable_id1 }}</div>
                    </div>
                </div>
                <div class="row mb-10">
                    <div class="col-sm-4"><strong>Distance</strong></div>
                    <div class="col-sm-8">
                        <div>{{ $proAppraisal->comparable_distance1 }}</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4"><strong>Total Value</strong></div>
                    <div class="col-sm-8">
                        <div>{{ $proAppraisal->comparable_total_value1 }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row mb-10">
                    <div class="col-sm-4"><strong>CIF No. / Name</strong></div>
                    <div class="col-sm-8">
                        <div>{{ $proAppraisal->comparable_cif_no1 }}</div>
                    </div>
                </div>
                <div class="row mb-10">
                    <div class="col-sm-4"><strong>Size</strong></div>
                    <div class="col-sm-8">
                        <div>{{ $proAppraisal->comparable_size1 }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row mb-10">
                    <div class="col-sm-4"><strong>Geo Code</strong></div>
                    <div class="col-sm-8">
                        <div>{{ $proAppraisal->comparable_geo_code1 }}</div>
                    </div>
                </div>
                <div class="row mb-10">
                    <div class="col-sm-4"><strong>Value per Sqm</strong></div>
                    <div class="col-sm-8">
                        <div>{{ $proAppraisal->comparable_value_per_sqm1 }}</div>
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
                    <div class="col-sm-4"><strong>ID</strong></div>
                    <div class="col-sm-8">
                        <div>{{ $proAppraisal->comparable_id2 }}</div>
                    </div>
                </div>
                <div class="row mb-10">
                    <div class="col-sm-4"><strong>Distance</strong></div>
                    <div class="col-sm-8">
                        <div>{{ $proAppraisal->comparable_distance2 }}</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4"><strong>Total Value</strong></div>
                    <div class="col-sm-8">
                        <div>{{ $proAppraisal->comparable_total_value2 }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row mb-10">
                    <div class="col-sm-4"><strong>CIF No. / Name</strong></div>
                    <div class="col-sm-8">
                        <div>{{ $proAppraisal->comparable_cif_no2 }}</div>
                    </div>
                </div>
                <div class="row mb-10">
                    <div class="col-sm-4"><strong>Size</strong></div>
                    <div class="col-sm-8">
                        <div>{{ $proAppraisal->comparable_size2 }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row mb-10">
                    <div class="col-sm-4"><strong>Geo Code</strong></div>
                    <div class="col-sm-8">
                        <div>{{ $proAppraisal->comparable_geo_code2 }}</div>
                    </div>
                </div>
                <div class="row mb-10">
                    <div class="col-sm-4"><strong>Value per Sqm</strong></div>
                    <div class="col-sm-8">
                        <div>{{ $proAppraisal->comparable_value_per_sqm2 }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Swot Analyze -->
<div class="box box-info border-0 p-16">
    <div class="box-header with-border border-0 p-0 box-title-height">
        <h3 class="box-title-font-18">Swot Analyze</h3>
        <hr class="mt-7 mb-7">
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="row mb-10">
                <div class="col-sm-4"><strong>Strength</strong></div>
                <div class="col-sm-8">
                    @if ($proAppraisal->strength)
                    <div class="bg-success p-10 border-radius">{!! $proAppraisal->strength !!}</div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4"><strong>Opportunity</strong></div>
                <div class="col-sm-8">
                    @if ($proAppraisal->opportunity)
                    <div class="bg-info p-10 border-radius">{!! $proAppraisal->opportunity !!}</div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row mb-10">
                <div class="col-sm-4"><strong>Weakness</strong></div>
                <div class="col-sm-8">
                    @if ($proAppraisal->weakness)
                    <div class="bg-warning p-10 border-radius">{!! $proAppraisal->weakness !!}</div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4"><strong>Threat</strong></div>
                <div class="col-sm-8">
                    @if ($proAppraisal->threat)
                    <div class="bg-danger p-10 border-radius">{!! $proAppraisal->threat !!}</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>