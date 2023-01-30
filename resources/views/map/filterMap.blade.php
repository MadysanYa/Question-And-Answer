<style>
    .labal-size{
        font-size: 15px;
    }
    .checkbox-size{
        width: 20px;
        height: 20px;
        margin-bottom: 25px !important;
    }
</style>
{{-- <div class="row">
    <div class="col-12">
        <form action="http://localhost/pms/property-management/public/admin/map_price_indicators">
            <div class="form-check col-md-3">
                <input type="checkbox" name="check_list" value="research">
                <label class="labal-size">
                    Property Research
                </label>
            </div>
            <div class="form-check col-md-3">
                <input type="checkbox" name="check_list" value="indication">
                <label class="labal-size">
                    Property Indication
                </label>
            </div>
            <div class="form-check col-md-3">
                <input type="checkbox" name="check_list" value="appraisal">
                <label class="labal-size">
                    Property Apprasal
                </label>
            </div>
            <button type="submit" value="Submit" class="btn btn-primary">Filter</button>
        </form>
    </div> 
</div>    --}}

<div class="row">
    <div class="col-md-12">
        <div class="box grid-box">
            <div class="input-group input-group-sm">
                <form action="http://localhost/pms/property-management/public/admin/map_price_indicators">
                    <div class="form-check col-md-4">
                        <input type="checkbox" name="check_list" value="research" class="checkbox-size">
                        <label class="labal-size">
                            Property Research
                        </label>
                    </div>
                    <div class="form-check col-md-4">
                        <input type="checkbox" name="check_list" value="indication" class="checkbox-size">
                        <label class="labal-size">
                            Property Indication
                        </label>
                    </div>
                    <div class="form-check col-md-4">
                        <input type="checkbox" name="check_list" value="appraisal" class="checkbox-size">
                        <label class="labal-size">
                            Property Apprasal
                        </label>
                        {{-- <button type="submit" value="Submit" class="btn btn-primary">Filter</button> --}}
                        <input type="submit" value="Submit">
                    </div>
                </form>
            </div>
            {{-- <div id="map"></div> --}}
        </div>
    </div>
</div>