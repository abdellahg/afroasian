<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div id="TA_linkingWidgetRedesign877" class="TA_linkingWidgetRedesign"><ul id="UiM7hqmTxqp" class="TA_links bqs1TKM"><li id="n1HjPAG8a6" class="wXbRcCxRf"><a target="_blank" href="https://www.tripadvisor.com/"><img src="https://www.tripadvisor.com/img/cdsi/partner/tripadvisor_logo_115x18-15079-2.gif" alt="TripAdvisor"/></a></li></ul></div><script async src="https://www.jscache.com/wejs?wtype=linkingWidgetRedesign&uniq=877&locationId=15852589&lang=en_US&border=true&display_version=2" data-loadtrk onload="this.loadtrk=true"></script>
        </div>
        <div class="col-md-10 col-md-offset-1">
            <div class="row row-wrap" data-gutter="120">
                <div class="col-md-6">
                    <div class="mb30 thumb"><i class="fa fa-dollar box-icon-left round box-icon-big box-icon-border animate-icon-top-to-bottom"></i>
                        <div class="thumb-caption">
                            <h4 class="thumb-title">
                            @foreach($homeservicetitles as $homeservicetitle)
                                @if(getLang() == 1)
                                    @if($homeservicetitle->name_setting == 'service1_title_en')
                                    {{ $homeservicetitle->value }}
                                    @endif
                                @elseif(getLang() == 2)
                                    @if($homeservicetitle->name_setting == 'service1_title_es')
                                    {{ $homeservicetitle->value }}
                                    @endif
                                @elseif(getLang() == 3)
                                    @if($homeservicetitle->name_setting == 'service1_title_pt')
                                    {{ $homeservicetitle->value }}
                                    @endif
                                @endif
                             @endforeach 
                                
                            </h4>
                            <p class="thumb-desc">
                            @foreach($homeservices as $homeservice)
                                @if(getLang() == 1)
                                    @if($homeservice->name_setting == 'service1_en')
                                    {{ $homeservice->value }}
                                    @endif
                                @elseif(getLang() == 2)
                                    @if($homeservice->name_setting == 'service1_es')
                                    {{ $homeservice->value }}
                                    @endif
                                @elseif(getLang() == 3)
                                    @if($homeservice->name_setting == 'service1_pt')
                                    {{ $homeservice->value }}
                                    @endif
                                @endif
                             @endforeach
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb30 thumb"><i class="fa fa-map-marker box-icon-left round box-icon-big box-icon-border animate-icon-top-to-bottom"></i>
                        <div class="thumb-caption">
                            <h4 class="thumb-title">
                                @foreach($homeservicetitles as $homeservicetitle)
                                @if(getLang() == 1)
                                    @if($homeservicetitle->name_setting == 'service2_title_en')
                                    {{ $homeservicetitle->value }}
                                    @endif
                                @elseif(getLang() == 2)
                                    @if($homeservicetitle->name_setting == 'service2_title_es')
                                    {{ $homeservicetitle->value }}
                                    @endif
                                @elseif(getLang() == 3)
                                    @if($homeservicetitle->name_setting == 'service2_title_pt')
                                    {{ $homeservicetitle->value }}
                                    @endif
                                @endif
                             @endforeach
                            </h4>
                            <p class="thumb-desc">
                                 @foreach($homeservices as $homeservice)
                                    @if(getLang() == 1)
                                        @if($homeservice->name_setting == 'service2_en')
                                        {{ $homeservice->value }}
                                        @endif
                                    @elseif(getLang() == 2)
                                        @if($homeservice->name_setting == 'service2_es')
                                        {{ $homeservice->value }}
                                        @endif
                                    @elseif(getLang() == 3)
                                        @if($homeservice->name_setting == 'service2_pt')
                                        {{ $homeservice->value }}
                                        @endif
                                    @endif
                                 @endforeach
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb30 thumb"><i class="fa fa-language box-icon-left round box-icon-big box-icon-border animate-icon-top-to-bottom"></i>
                        <div class="thumb-caption">
                            <h4 class="thumb-title">
                                @foreach($homeservicetitles as $homeservicetitle)
                                @if(getLang() == 1)
                                    @if($homeservicetitle->name_setting == 'service3_title_en')
                                    {{ $homeservicetitle->value }}
                                    @endif
                                @elseif(getLang() == 2)
                                    @if($homeservicetitle->name_setting == 'service3_title_es')
                                    {{ $homeservicetitle->value }}
                                    @endif
                                @elseif(getLang() == 3)
                                    @if($homeservicetitle->name_setting == 'service3_title_pt')
                                    {{ $homeservicetitle->value }}
                                    @endif
                                @endif
                             @endforeach
                            </h4>
                            <p class="thumb-desc">
                                 @foreach($homeservices as $homeservice)
                                    @if(getLang() == 1)
                                        @if($homeservice->name_setting == 'service3_en')
                                        {{ $homeservice->value }}
                                        @endif
                                    @elseif(getLang() == 2)
                                        @if($homeservice->name_setting == 'service3_es')
                                        {{ $homeservice->value }}
                                        @endif
                                    @elseif(getLang() == 3)
                                        @if($homeservice->name_setting == 'service3_pt')
                                        {{ $homeservice->value }}
                                        @endif
                                    @endif
                                 @endforeach
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb30 thumb"><i class="fa fa-thumbs-o-up box-icon-left round box-icon-big box-icon-border animate-icon-top-to-bottom"></i>
                        <div class="thumb-caption">
                            <h4 class="thumb-title">
                                @foreach($homeservicetitles as $homeservicetitle)
                                @if(getLang() == 1)
                                    @if($homeservicetitle->name_setting == 'service4_title_en')
                                    {{ $homeservicetitle->value }}
                                    @endif
                                @elseif(getLang() == 2)
                                    @if($homeservicetitle->name_setting == 'service4_title_es')
                                    {{ $homeservicetitle->value }}
                                    @endif
                                @elseif(getLang() == 3)
                                    @if($homeservicetitle->name_setting == 'service4_title_pt')
                                    {{ $homeservicetitle->value }}
                                    @endif
                                @endif
                             @endforeach
                            </h4>
                            <p class="thumb-desc">
                                 @foreach($homeservices as $homeservice)
                                    @if(getLang() == 1)
                                        @if($homeservice->name_setting == 'service4_en')
                                        {{ $homeservice->value }}
                                        @endif
                                    @elseif(getLang() == 2)
                                        @if($homeservice->name_setting == 'service4_es')
                                        {{ $homeservice->value }}
                                        @endif
                                    @elseif(getLang() == 3)
                                        @if($homeservice->name_setting == 'service4_pt')
                                        {{ $homeservice->value }}
                                        @endif
                                    @endif
                                 @endforeach
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
            