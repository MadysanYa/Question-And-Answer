<style>
    .mb-10 {
        margin-bottom: 15px;
    }
    .m-0{
        margin: 0px !important;
    }
    .image-height{
        height: 142px !important;
    }
    .image-size{
        width:auto;
        height:auto;
        max-width:100%;
        max-height:100%;
    }
</style>
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Detail</h3>
        <div class="box-tools">
        <div class="btn-group pull-right" style="margin-right: 5px">
                <a href="{{env('APP_URL')}}/public/admin/property_researchs/{{ $propertyResearch->id }}/edit" class="btn btn-sm btn-primary" title="Edit">
                    <i class="fa fa-edit"></i><span class="hidden-xs"> Edit</span>
                </a>
            </div>
            <div class="btn-group pull-right" style="margin-right: 5px">
                <a href="{{env('APP_URL')}}/public/admin/property_researchs" class="btn btn-sm btn-default" title="List">
                    <i class="fa fa-list"></i><span class="hidden-xs"> List</span>
                </a>
            </div>
        </div>
    </div>

    <div class="form-horizontal">
        <div class="box-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>Property Reference</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $propertyResearch->property_reference }}</div>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>Information Type</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $propertyResearch->information_type }}</div>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>Access Road Name</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $propertyResearch->access_road_name }}</div>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>No of Floor</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $propertyResearch->no_of_floor }}</div>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>Land Size (sqm)</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $propertyResearch->land_size }}</div>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>Building Value per Sqm</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $propertyResearch->building_value_per_sqm }}</div>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>District / Khan</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $propertyResearch->DistrictName }}</div>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>Contact No</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $propertyResearch->contact_no }}</div>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>Remark</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $propertyResearch->remark }}</div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>Location Type</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $propertyResearch->location_type }}</div>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>Property Type</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $propertyResearch->property_type }}</div>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>Land Title Type</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $propertyResearch->land_title_type }}</div>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>Land Value per Sqm</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $propertyResearch->land_value_per_sqm }}</div>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>Property Market Value</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $propertyResearch->property_market_value }}</div>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>Commune / Sangkat</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $propertyResearch->CommuneName }}</div>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>Latitude</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $propertyResearch->latitude }}</div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>Type of Access Road</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $propertyResearch->type_of_access_road }}</div>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>Borey</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $propertyResearch->borey }}</div>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>Information Date</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $propertyResearch->information_date }}</div>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>Building Size</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $propertyResearch->building_size }}</div>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>Province</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $propertyResearch->ProvinceName }}</div>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>Village</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $propertyResearch->VillagName }}</div>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>Longtitude</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $propertyResearch->longtitude }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>