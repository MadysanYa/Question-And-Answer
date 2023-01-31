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
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <form action="http://localhost/pms/property-management/public/admin/map_price_indicators">
                <div class="form-check col-md-2">
                    <input type="checkbox" name="check_list" value="research" class="checkbox-size">
                    <label class="labal-size">
                        Property Research
                    </label>
                </div>
                <div class="form-check col-md-2">
                    <input type="checkbox" name="check_list" value="indication" class="checkbox-size">
                    <label class="labal-size">
                        Property Indication
                    </label>
                </div>
                <div class="form-check col-md-2">
                    <input type="checkbox" name="check_list" value="appraisal" class="checkbox-size">
                    <label class="labal-size">
                        Property Apprasal
                    </label>
                </div>
                <input type="submit" class="btn btn-primary" value="Filter">
            </form>
        </div>
    </div>
    <div id="map"></div>
</div>