<style>
    .mb-10 {
        margin-bottom: 15px;
    }

    .m-0 {
        margin: 0px !important;
    }

    .image-height {
        height: 142px !important;
    }

    .image-size {
        width: auto;
        height: auto;
        max-width: 100%;
        max-height: 100%;
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
                <a href="{{ env('APP_URL') }}/public/admin/property_indicators/2/edit" class="btn btn-sm btn-primary" title="Edit">
                    <i class="fa fa-edit"></i><span class="hidden-xs"> Edit</span>
                </a>
            </div>
            <div class="btn-group pull-right" style="margin-right: 5px">
                <a href="{{ env('APP_URL') }}/public/admin/property_indicators" class="btn btn-sm btn-default" title="List">
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
                            <strong>Region</strong>
                        </div>
                        <div class="col-sm-8">{{$propertyIndicator->RegionName}}</div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-2">
                            <strong>Branch</strong>
                        </div>
                        <div class="col-sm-8">{{$propertyIndicator->BranchName}}</div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-2">
                            <strong>Requested Date</strong>
                        </div>
                        <div class="col-sm-8">{{$propertyIndicator->RequestedDateFormat}}</div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-2">
                            <strong>Reported Date</strong>
                        </div>
                        <div class="col-sm-8">{{$propertyIndicator->ReportedDateFormat}}</div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-2">
                            <strong>CIF No</strong>
                        </div>
                        <div class="col-sm-8">{{$propertyIndicator->cif_no}}</div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-2">
                            <strong>RM Name</strong>
                        </div>
                        <div class="col-sm-8">{{$propertyIndicator->rm_name}}</div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-2">
                            <strong>Telephone</strong>
                        </div>
                        <div class="col-sm-8">{{$propertyIndicator->telephone}}</div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-2">
                            <strong>Information Type</strong>
                        </div>
                        <div class="col-sm-8">{{$propertyIndicator->PropertyInformationType}}</div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-2">
                            <strong>Property Reference</strong>
                        </div>
                        <div class="col-sm-8">{{$propertyIndicator->property_reference}}</div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-2">
                            <strong>Location Type</strong>
                        </div>
                        <div class="col-sm-8">{{ $propertyIndicator->location_type }}</div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-2">
                            <strong>Type of Access Road</strong>
                        </div>
                        <div class="col-sm-8">{{ $propertyIndicator->type_of_access_road}}</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row mb-10">
                        <div class="col-sm-2">
                            <strong>Access Road Name</strong>
                        </div>
                        <div class="col-sm-8">{{$propertyIndicator->access_road_name}}</div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-2">
                            <strong>Property Type</strong>
                        </div>
                        <div class="col-sm-8">{{ $propertyIndicator->PropertyTypeName}}</div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-2">
                            <strong>Customer Name</strong>
                        </div>
                        <div class="col-sm-8">{{$propertyIndicator->customer_name}}</div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-2">
                            <strong>Building Status (%)</strong>
                        </div>
                        <div class="col-sm-8">{{$propertyIndicator->building_status}}</div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-2">
                            <strong>Borey</strong>
                        </div>
                        <div class="col-sm-8">{{ $propertyIndicator->BoreyName }}</div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-2">
                            <strong>No of Floor</strong>
                        </div>
                        <div class="col-sm-8">{{ $propertyIndicator->no_of_floor}}</div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-2">
                            <strong>Land Title Type</strong>
                        </div>
                        <div class="col-sm-8">{{  $propertyIndicator->land_title_type }}</div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-2">
                            <strong>Land title No</strong>
                        </div>
                        <div class="col-sm-8">{{$propertyIndicator->land_title_no}}</div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-2">
                            <strong>Land Size (sqm)</strong>
                        </div>
                        <div class="col-sm-8">{{$propertyIndicator->land_size}}</div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-2">
                            <strong>Land Value per Sqm</strong>
                        </div>
                        <div class="col-sm-8">{{$propertyIndicator->land_value_per_sqm}}</div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-2">
                            <strong>Building Size</strong>
                        </div>
                        <div class="col-sm-8">{{$propertyIndicator->building_size}}</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row mb-10">
                        <div class="col-sm-2">
                            <strong>Building Value per Sqm</strong>
                        </div>
                        <div class="col-sm-8">{{$propertyIndicator->building_value_per_sqm}}</div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-2">
                            <strong>Property Value</strong>
                        </div>
                        <div class="col-sm-8">{{$propertyIndicator->property_value}}</div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-2">
                            <strong>Collateral Owner</strong>
                        </div>
                        <div class="col-sm-8">{{$propertyIndicator->collateral_owner}}</div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-2">
                            <strong>Client Contact No</strong>
                        </div>
                        <div class="col-sm-8">{{$propertyIndicator->client_contact_no}}</div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-2">
                            <strong>Province</strong>
                        </div>
                        <div class="col-sm-8">{{  $propertyIndicator->ProvinceName }}</div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-2">
                            <strong>District</strong>
                        </div>
                        <div class="col-sm-8">{{  $propertyIndicator->DistrictName }}</div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-2">
                            <strong>Commune / Sangkat</strong>
                        </div>
                        <div class="col-sm-8">{{  $propertyIndicator->CommuneName }}</div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-2">
                            <strong>Village</strong>
                        </div>
                        <div class="col-sm-8">{{  $propertyIndicator->VillagName }}</div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-2">
                            <strong>Latitude</strong>
                        </div>
                        <div class="col-sm-8">{{$propertyIndicator->latitude}}</div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-2">
                            <strong>Longtitude</strong>
                        </div>
                        <div class="col-sm-8">{{$propertyIndicator->longtitude}}</div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-2">
                            <strong>Remark</strong>
                        </div>
                        <div class="col-sm-8">{{$propertyIndicator->remark}}</div>
                    </div>
                </div>
            </div>

            <!-- Comparable Reference One -->
            <div class="row">
                <div class="col-md-4">
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>ID 1</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $propertyIndicator->comparable_id1 }}</div>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>Total Value 1</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $propertyIndicator->comparable_total_value1 }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>CIF No. / Name 1</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $propertyIndicator->comparable_cif_no1 }}</div>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>Size 1</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $propertyIndicator->comparable_size1 }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>Geo Code 1</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $propertyIndicator->comparable_geo_code1 }}</div>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>Value per Sqm 1</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $propertyIndicator->comparable_value_per_sqm1 }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Comparable Reference Two -->
            <div class="row">
                <div class="col-md-4">
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>ID 2</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $propertyIndicator->comparable_id2 }}</div>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>Total Value 2</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $propertyIndicator->comparable_total_value2 }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>CIF No. / Name 2</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $propertyIndicator->comparable_cif_no2 }}</div>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>Size 2</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $propertyIndicator->comparable_size2 }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>Geo Code 2</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $propertyIndicator->comparable_geo_code2 }}</div>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>Value per Sqm 2</strong></div>
                        <div class="col-sm-8">
                            <div>{{ $propertyIndicator->comparable_value_per_sqm2 }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- image  -->
            <div class="row">
                <div class="col-md-4">
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>Front Photo</strong></div>
                        <div class="col-sm-8">
                            <div class="file-preview-frame krajee-default file-preview-initial file-sortable kv-preview-thumb m-0">
                                <div class="kv-file-content image-height">
                                    @if ($propertyIndicator->front_photo)
                                        <img src="{{ asset('upload/'.$propertyIndicator->front_photo) }}" class="file-preview-image kv-preview-data image-size">
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
                                    @if ($propertyIndicator->left_photo)
                                        <img src="{{ asset('upload/'.$propertyIndicator->left_photo) }}" class="file-preview-image kv-preview-data image-size">
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
                                    @if ($propertyIndicator->title_front_photo)
                                        <img src="{{ asset('upload/'.$propertyIndicator->title_front_photo) }}" class="file-preview-image kv-preview-data image-size">
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
                                    @if ($propertyIndicator->inside_photo)
                                        <img src="{{ asset('upload/'.$propertyIndicator->inside_photo) }}" class="file-preview-image kv-preview-data image-size">
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
                                    @if ($propertyIndicator->right_photo)
                                        <img src="{{ asset('upload/'.$propertyIndicator->right_photo) }}" class="file-preview-image kv-preview-data image-size">
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
                                    @if ($propertyIndicator->title_back_photo)
                                        <img src="{{ asset('upload/'.$propertyIndicator->title_back_photo) }}" class="file-preview-image kv-preview-data image-size">
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
                                    @if ($propertyIndicator->id_front_photo)
                                        <img src="{{ asset('upload/'.$propertyIndicator->id_front_photo) }}" class="file-preview-image kv-preview-data image-size">
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
                                    @if ($propertyIndicator->id_back_photo)
                                        <img src="{{ asset('upload/'.$propertyIndicator->id_back_photo) }}" class="file-preview-image kv-preview-data image-size">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-4"><strong>Photos</strong></div>
                        <div class="col-sm-8">
                            @if (is_array($propertyIndicator->photos) && count($propertyIndicator->photos))
                                @foreach ($propertyIndicator->photos as $value)
                                    <div class="file-preview-frame krajee-default file-preview-initial file-sortable kv-preview-thumb m-0">
                                        <div class="kv-file-content image-height">
                                            @if ($value)
                                                <img src="{{ asset('upload/'.$value) }}" class="file-preview-image kv-preview-data image-size">
                                            @endif
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
