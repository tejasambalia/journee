<div class="col-md-3 filter_wrapper_main">
    <div class="filter_wrapper">
        <h3>Filter By <a href="#" id="filter_reset" class="reset pull-right">Reset</a></h3>
        <div class="panel-group filter_acc" id="filter-accordion">
            <div class="panel">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" href="#collapse1">
                            Price <i class="ion-ios-arrow-down pull-right"></i>
                        </a>
                    </h4>
                </div>
                <div id="collapse1" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <div id="slider-range"></div>
                        <input type="text" id="amount" readonly class="range_input">
                        <input type="hidden" id="min_amount" readonly class="range_input">
                        <input type="hidden" id="max_amount" readonly class="range_input">
                    </div>
                </div>
            </div>
            <div class="panel">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" href="#collapse2">
                            Zone <i class="ion-ios-arrow-down pull-right"></i>
                        </a>
                    </h4>
                </div>
                <div id="collapse2" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <ul class="list-unstyled">
                            <li>
                                <div class="checkbox">
                                    <input type="checkbox" id="check_1" name="zone[]" onclick="package_filter()" value="East">
                                    <label for="check_1">East</label>
                                </div>
                            </li>
                            <li>
                                <div class="checkbox">
                                    <input type="checkbox" id="check_2" name="zone[]" onclick="package_filter()" value="West">
                                    <label for="check_2">West</label>
                                </div>
                            </li>
                            <li>
                                <div class="checkbox">
                                    <input type="checkbox" id="check_3" name="zone[]" onclick="package_filter()" value="North">
                                    <label for="check_3">North</label>
                                </div>
                            </li>
                            <li>
                                <div class="checkbox">
                                    <input type="checkbox" id="check_4" name="zone[]" onclick="package_filter()" value="South">
                                    <label for="check_4">South</label>
                                </div>
                            </li>
                        </ul>
                        <!--<a href="#" class="pull-right reset">Clear</a>-->
                    </div>
                </div>
            </div>                                
            <div class="panel">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" href="#collapse3">
                            Duration <i class="ion-ios-arrow-down pull-right"></i>
                        </a>
                    </h4>
                </div>
                <div id="collapse3" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <div id="slider-duration"></div>
                        <input type="text" id="duration" readonly class="range_input">
                        <input type="hidden" id="min_days" readonly class="range_input">
                        <input type="hidden" id="max_days" readonly class="range_input">
                    </div>
                </div>
            </div>                  
        </div>
    </div>
</div>