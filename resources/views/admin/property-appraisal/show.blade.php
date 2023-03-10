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
                <a href="{{ env('APP_URL') }}/public/admin/property_appraisals/{{ $proAppraisal->id }}/edit" class="btn btn-sm btn-primary" title="Edit">
                    <i class="fa fa-edit"></i><span class="hidden-xs"> Edit</span>
                </a>
            </div>
            <div class="btn-group pull-right" style="margin-right: 5px">
                <a href="{{ env('APP_URL') }}/public/admin/property_appraisals" class="btn btn-sm btn-default" title="List">
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
                        <div class="col-sm-4"><strong>Region</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $proAppraisal->RegionName }}</div>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>Branch</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $proAppraisal->BranchName }}</div>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>Requested Date</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $proAppraisal->RequestedDateFormat }}</div>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>Reported Date</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $proAppraisal->ReportedDateFormat }}</div>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>CIF No</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $proAppraisal->cif_no }}</div>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>Appraisal Certificate Fee</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $proAppraisal->appraisal_certificate_fee }}</div>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>RM Name</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $proAppraisal->rm_name }}</div>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>Telephone</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $proAppraisal->telephone }}</div>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>Information Type</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $proAppraisal->PropertyInformationType }}</div>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>Property Reference</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $proAppraisal->property_reference }}</div>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>Location Type</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $proAppraisal->location_type }}</div>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>Type of Access Road</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $proAppraisal->type_of_access_road }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>Access Road Name</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $proAppraisal->access_road_name }}</div>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>Property Type</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $proAppraisal->PropertyTypeName }}</div>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>Customer Name</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $proAppraisal->customer_name }}</div>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>Client Contact No</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $proAppraisal->client_contact_no }}</div>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>Building Status (%)</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $proAppraisal->building_status }}</div>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>Borey</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $proAppraisal->BoreyName }}</div>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>No of Floor</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $proAppraisal->no_of_floor }}</div>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>Land Title Type</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $proAppraisal->land_title_type }}</div>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>Land Title No</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $proAppraisal->land_title_no }}</div>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>Land Size(Sqm)</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $proAppraisal->land_size }}</div>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>Land Size by Measurement</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $proAppraisal->land_size_by_measurement }}</div>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>Land Value per Sqm</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $proAppraisal->land_value_per_sqm }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>Building Size by Measurement</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $proAppraisal->building_size_by_measurement }}</div>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>Building Value per Sqm</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $proAppraisal->building_value_per_sqm }}</div>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>Property Value</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $proAppraisal->property_value }}</div>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>Collateral Owner</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $proAppraisal->collateral_owner }}</div>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>Province</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $proAppraisal->ProvinceName }}</div>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>District</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $proAppraisal->DistrictName }}</div>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>Commune / Sangkat</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $proAppraisal->CommuneName }}</div>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>Village</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $proAppraisal->VillagName }}</div>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>Latitude</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $proAppraisal->latitude }}</div>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>Longtitude</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $proAppraisal->longtitude }}</div>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>Remark</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $proAppraisal->remark }}</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-4">
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>Front Photo</strong></div>
                        <div class="col-sm-8">
                            <div class="file-preview-frame krajee-default file-preview-initial file-sortable kv-preview-thumb m-0">
                                <div class="kv-file-content image-height">
                                    @if ($proAppraisal->front_photo)
                                        <img src="{{ asset('upload/'.$proAppraisal->front_photo) }}" class="file-preview-image kv-preview-data image-size">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>Access Road Photo Left</strong></div>
                        <div class="col-sm-8">
                            <div class="file-preview-frame krajee-default file-preview-initial file-sortable kv-preview-thumb m-0">
                                <div class="kv-file-content image-height">
                                    @if ($proAppraisal->left_photo)
                                        <img src="{{ asset('upload/'.$proAppraisal->left_photo) }}" class="file-preview-image kv-preview-data image-size">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>Title Photo Front</strong></div>
                        <div class="col-sm-8">
                            <div class="file-preview-frame krajee-default file-preview-initial file-sortable kv-preview-thumb m-0">
                                <div class="kv-file-content image-height">
                                    @if ($proAppraisal->title_front_photo)
                                        <img src="{{ asset('upload/'.$proAppraisal->title_front_photo) }}" class="file-preview-image kv-preview-data image-size">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>Inside Photo</strong></div>
                        <div class="col-sm-8">
                            <div class="file-preview-frame krajee-default file-preview-initial file-sortable kv-preview-thumb m-0">
                                <div class="kv-file-content image-height">
                                    @if ($proAppraisal->inside_photo)
                                        <img src="{{ asset('upload/'.$proAppraisal->inside_photo) }}" class="file-preview-image kv-preview-data image-size">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>Access Road Photo Right</strong></div>
                        <div class="col-sm-8">
                            <div class="file-preview-frame krajee-default file-preview-initial file-sortable kv-preview-thumb m-0">
                                <div class="kv-file-content image-height">
                                    @if ($proAppraisal->right_photo)
                                        <img src="{{ asset('upload/'.$proAppraisal->right_photo) }}" class="file-preview-image kv-preview-data image-size">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>Title Photo Back</strong></div>
                        <div class="col-sm-8">
                            <div class="file-preview-frame krajee-default file-preview-initial file-sortable kv-preview-thumb m-0">
                                <div class="kv-file-content image-height">
                                    @if ($proAppraisal->title_back_photo)
                                        <img src="{{ asset('upload/'.$proAppraisal->title_back_photo) }}" class="file-preview-image kv-preview-data image-size">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>ID Photo Front</strong></div>
                        <div class="col-sm-8">
                            <div class="file-preview-frame krajee-default file-preview-initial file-sortable kv-preview-thumb m-0">
                                <div class="kv-file-content image-height">
                                    @if ($proAppraisal->id_front_photo)
                                        <img src="{{ asset('upload/'.$proAppraisal->id_front_photo) }}" class="file-preview-image kv-preview-data image-size">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>ID Photo Back</strong></div>
                        <div class="col-sm-8">
                            <div class="file-preview-frame krajee-default file-preview-initial file-sortable kv-preview-thumb m-0">
                                <div class="kv-file-content image-height">
                                    @if ($proAppraisal->id_back_photo)
                                        <img src="{{ asset('upload/'.$proAppraisal->id_back_photo) }}" class="file-preview-image kv-preview-data image-size">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>Photos</strong></div>
                        <div class="col-sm-8">
                            @if (is_array($proAppraisal->photos) && count($proAppraisal->photos)) 
                                @foreach ($proAppraisal->photos as $value)
                                    <div class="file-preview-frame krajee-default file-preview-initial file-sortable kv-preview-thumb m-0">
                                        <div class="kv-file-content image-height">
                                            <img src="{{ asset('upload/'.$value) }}" class="file-preview-image kv-preview-data image-size">
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>