<div class="row">
    <div class="col-md-12">
        <div class="box grid-box">
            <div class="box-header with-border">
                @if(!($userIsRmRole || $userIsBmRole))
                    <div class="pull-right">
                        <div class="" style="display: flex;align-items: center;">
                            <div class="btn-group pull-right grid-create-btn">
                                <a href="../../public/admin/risk_indicators/create" class="btn btn-sm btn-success" title="New">
                                    <i class="fa fa-plus"></i><span class="hidden-xs">&nbsp;&nbsp;New</span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="box-header with-border" style="padding: 10px;display: flex;align-items: center;">
                    <form action="{{ URL::current() }}">
                        <div class="pull-left">
                            <div class="" style="display: flex;align-items: center;">
                                <button type="submit" class="btn btn-sm btn-dropbox" value="Filter" style="margin-right: 10px;">
                                    <i class="fa fa-filter"></i>
                                    Apply
                                </button>
                                <div class="input-group input-group-sm" style="display: inline-block; margin-right: 10px;">
                                    <input type="text" name="search" class="form-control grid-quick-search" style="width: 200px;" value="{{ request()->search }}" placeholder="Search ( Property Reference )">
                                    <div class="input-group-btn" style="display: inline-block;">
                                        <button type="submit" class="btn btn-default" value="Filter"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
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
