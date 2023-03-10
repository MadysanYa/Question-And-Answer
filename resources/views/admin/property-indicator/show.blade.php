<style>
    .mb-10{
        margin-bottom: 10px;
    }
</style>
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Detail</h3>
        <div class="box-tools">
            <div class="btn-group pull-right" style="margin-right: 5px">
                <a href="javascript:void(0);" class="btn btn-sm btn-danger 640ab0b829874-delete" title="Delete">
                    <i class="fa fa-trash"></i><span class="hidden-xs"> Delete</span>
                </a>
            </div>
            <div class="btn-group pull-right" style="margin-right: 5px">
                <a href="http://localhost/pms/property-management/public/admin/property_indicators/2/edit" class="btn btn-sm btn-primary" title="Edit">
                    <i class="fa fa-edit"></i><span class="hidden-xs"> Edit</span>
                </a>
            </div>
            <div class="btn-group pull-right" style="margin-right: 5px">
                <a href="http://localhost/pms/property-management/public/admin/property_indicators" class="btn btn-sm btn-default" title="List">
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
                        <div class="col-sm-2">
                            <p>Region</p>
                        </div>
                        <div class="col-sm-8"><strong>1</strong></div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-2">
                            <p>Branch</p>
                        </div>
                        <div class="col-sm-8"><strong>1</strong></div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-2">
                            <p>Requested Date</p>
                        </div>
                        <div class="col-sm-8"><strong>{{$propertyIndicator->requested_date}}</strong></div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-2">
                            <p>Reported Date</p>
                        </div>
                        <div class="col-sm-8"><strong>{{$propertyIndicator->reported_date}}</strong></div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-2">
                            <p>CIF No</p>
                        </div>
                        <div class="col-sm-8"><strong>{{$propertyIndicator->cif_no}}</strong></div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-2">
                            <p>RM Name</p>
                        </div>
                        <div class="col-sm-8"><strong>{{$propertyIndicator->rm_name}}</strong></div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-2">
                            <p>Telephone</p>
                        </div>
                        <div class="col-sm-8"><strong>{{$propertyIndicator->telephone}}</strong></div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-2">
                            <p>Information Type</p>
                        </div>
                        <div class="col-sm-8"><strong>1</strong></div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-2">
                            <p>Property Reference</p>
                        </div>
                        <div class="col-sm-8"><strong>{{$propertyIndicator->property_reference}}</strong></div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-2">
                            <p>Location Type</p>
                        </div>
                        <div class="col-sm-8"><strong>1</strong></div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-2">
                            <p>Type of Access Road</p>
                        </div>
                        <div class="col-sm-8"><strong>1</strong></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row mb-10">
                        <div class="col-sm-2">
                            <p>Access Road Name</p>
                        </div>
                        <div class="col-sm-8"><strong>{{$propertyIndicator->access_road_name}}</strong></div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-2">
                            <p>Property Type</p>
                        </div>
                        <div class="col-sm-8"><strong>1</strong></div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-2">
                            <p>Customer Name</p>
                        </div>
                        <div class="col-sm-8"><strong>{{$propertyIndicator->customer_name}}</strong></div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-2">
                            <p>Building Status (%)</p>
                        </div>
                        <div class="col-sm-8"><strong>{{$propertyIndicator->building_status}}</strong></div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-2">
                            <p>Borey</p>
                        </div>
                        <div class="col-sm-8"><strong>1</strong></div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-2">
                            <p>No of Floor</p>
                        </div>
                        <div class="col-sm-8"><strong>{{$propertyIndicator->no_of_floor}}</strong></div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-2">
                            <p>Land Title Type</p>
                        </div>
                        <div class="col-sm-8"><strong>1</strong></div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-2">
                            <p>Land title No</p>
                        </div>
                        <div class="col-sm-8"><strong>{{$propertyIndicator->land_title_no}}</strong></div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-2">
                            <p>Land Size (sqm)</p>
                        </div>
                        <div class="col-sm-8"><strong>{{$propertyIndicator->land_size}}</strong></div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-2">
                            <p>Land Value per Sqm</p>
                        </div>
                        <div class="col-sm-8"><strong>{{$propertyIndicator->land_value_per_sqm}}</strong></div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-2">
                            <p>Building Size</p>
                        </div>
                        <div class="col-sm-8"><strong>{{$propertyIndicator->building_size}}</strong></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row mb-10">
                        <div class="col-sm-2">
                            <p>Building Value per Sqm</p>
                        </div>
                        <div class="col-sm-8"><strong>{{$propertyIndicator->building_value_per_sqm}}</strong></div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-2">
                            <p>Property Value</p>
                        </div>
                        <div class="col-sm-8"><strong>{{$propertyIndicator->property_value}}</strong></div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-2">
                            <p>Collateral Owner</p>
                        </div>
                        <div class="col-sm-8"><strong>{{$propertyIndicator->collateral_owner}}</strong></div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-2">
                            <p>Client Contact No</p>
                        </div>
                        <div class="col-sm-8"><strong>{{$propertyIndicator->client_contact_no}}</strong></div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-2">
                            <p>Province</p>
                        </div>
                        <div class="col-sm-8"><strong>1</strong></div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-2">
                            <p>District</p>
                        </div>
                        <div class="col-sm-8"><strong>1</strong></div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-2">
                            <p>Commune / Sangkat</p>
                        </div>
                        <div class="col-sm-8"><strong>1</strong></div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-2">
                            <p>Village</p>
                        </div>
                        <div class="col-sm-8"><strong>1</strong></div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-2">
                            <p>Latitude</p>
                        </div>
                        <div class="col-sm-8"><strong>{{$propertyIndicator->latitude}}</strong></div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-2">
                            <p>Longtitude</p>
                        </div>
                        <div class="col-sm-8"><strong>{{$propertyIndicator->longtitude}}</strong></div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-2">
                            <p>Remark</p>
                        </div>
                        <div class="col-sm-8"><strong>{{$propertyIndicator->remark}}</strong></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
