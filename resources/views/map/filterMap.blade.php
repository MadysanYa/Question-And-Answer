<div class="row">
    <div class="col-md-12">
        <div class="box grid-box">
            <div class="box-header with-border" style="padding: 10px;display: flex;align-items: center;">
                <form action="http://localhost/pms/property-management/public/admin/map_price_indicators">
                    {{-- <form action="{{route('public.admin.map_price_indicators')}}"> --}}
                    <div class="pull-left">
                        <div class="" style="display: flex;align-items: center;">
                            <button type="submit" class="btn btn-sm btn-dropbox" value="Filter" style="margin-right: 10px;">
                                <i class="fa fa-filter"></i>
                                Apply
                            </button>
                            <div class="">
                                <div class="input-group input-group-sm" style="display: flex; box-shadow: none;">
                                    <span class="icheck">
                                        <label style="margin-right: 10px;margin-bottom: 0px;display: flex;">
                                            <div class="" aria-checked="false" aria-disabled="false">
                                                <input type="radio" class="released" name="check_list" value="research" {{request()->check_list == "research" ? 'checked' : "false" }} style="margin-right: 10px;">
                                            </div>Properties Research
                                        </label>
                                    </span>
                                    <span class="icheck">
                                        <label style="margin-right: 10px;margin-bottom: 0px;display: flex;">
                                            <div class="" aria-checked="false" aria-disabled="false">
                                                <input type="radio" class="released" name="check_list" value="indication" {{request()->check_list == "indication" ? 'checked' : "false" }}  style="margin-right: 10px;">
                                            </div>Properties Indication
                                        </label>
                                    </span>
                                    <span class="icheck">
                                        <label style="margin-right: 10px;margin-bottom: 0px;display: flex;">
                                            <div class="" aria-checked="false" aria-disabled="false">
                                                <input type="radio" class="released" name="check_list" value="appraisal" {{request()->check_list == "appraisal" ? 'checked' : "false" }}  style="margin-right: 10px;">
                                            </div>Properties Appraisal
                                        </label>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div style="padding: 10px;">
                <div class="row">
                    <div class="col-md-12">
                        <div id="map"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>