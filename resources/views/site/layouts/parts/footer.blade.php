<footer id="main-footer" style="padding-bottom:0px;">
    <div class="container">
        <div class="row row-wrap">
            <div class="col-md-3">
                <a class="logo" href="index.html">
                    <img src="{{ asset('assets/site/img/logo-invert.png') }}" alt="Image Alternative text" title="Image Title" />
                </a>
                <p class="mb20"> 
                @if(getLang() == 1)
                {{getSetting('site_description_en')}}
                @elseif(getLang() == 2)
                 {{getSetting('site_description_es')}}
                @elseif(getLang() == 3)
                {{getSetting('site_description_pt')}}
                @endif
                </p>
                <ul class="list list-horizontal list-space">
                    @if(getSetting('facebook') != '')
                    <li>
                        <a style="background:#4267b2; width: 40px; height: 40px; line-height: 40px; font-size: 20px;" class="fa fa-facebook box-icon-normal round animate-icon-bottom-to-top" target="_blank" href="{{getSetting('facebook')}}"></a>
                    </li>
                    @endif
                    @if(getSetting('twitter') != '')
                    <li>
                        <a style="background:#1ea1f2; width: 40px; height: 40px; line-height: 40px; font-size: 20px;" class="fa fa-twitter box-icon-normal round animate-icon-bottom-to-top" target="_blank" href="{{getSetting('twitter')}}"></a>
                    </li>
                    @endif
                    @if(getSetting('google_plus') != '')
                    <li>
                        <a style="background:#dd5144; width: 40px; height: 40px; line-height: 40px; font-size: 20px;" class="fa fa-google-plus box-icon-normal round animate-icon-bottom-to-top" target="_blank" href="{{getSetting('google_plus')}}"></a>
                    </li>
                    @endif
                    @if(getSetting('linked_in') != '')
                    <li>
                        <a style="background:#0077b5; width: 40px; height: 40px; line-height: 40px; font-size: 20px;" class="fa fa-linkedin box-icon-normal round animate-icon-bottom-to-top" target="_blank" href="{{getSetting('linked_in')}}"></a>
                    </li>
                    @endif
                    @if(getSetting('pinterest') != '')
                    <li>
                        <a style="background:#e60023; width: 40px; height: 40px; line-height: 40px; font-size: 20px;" class="fa fa-pinterest box-icon-normal round animate-icon-bottom-to-top" target="_blank" href="{{getSetting('pinterest')}}"></a>
                    </li>
                     @endif
                     @if(getSetting('youtube') != '')
                    <li>
                        <a style="background:#ff0000; width: 40px; height: 40px; line-height: 40px; font-size: 20px;" class="fa fa-youtube box-icon-normal round animate-icon-bottom-to-top" target="_blank" href="{{getSetting('youtube')}}"></a>
                    </li>
                     @endif
                     @if(getSetting('instagram') != '')
                    <li>
                        <a style="background:#c22f6c; width: 40px; height: 40px; line-height: 40px; font-size: 20px;" class="fa fa-instagram box-icon-normal round animate-icon-bottom-to-top" target="_blank" href="{{getSetting('instagram')}}"></a>
                    </li>
                     @endif
                </ul>
                
            </div>
            
            <div class="col-md-4">
                <h4>{{ trans('site.global.header.have-questions') }}</h4>
                <h4 class="">{{getSetting('phone')}}</h4>
                <h4><a href="#" class="">{{getSetting('email')}}</a></h4>
                <p>{{ trans('site.global.header.dedicated-customer-support') }}</p>
            </div>
            <div class="col-md-2">
                <ul class="list list-footer">
                    <li><a href="{{url('/')}}">{{ trans('site.global.header.home') }}</a>
                    </li>
                    <li><a href="{{url(app()->getLocale().'/about-us')}}">{{ trans('site.global.header.about') }}</a>
                    </li>
                    <li><a href="{{url(app()->getLocale().'/contact-us')}}">{{ trans('site.global.header.contact-us') }}</a>
                    </li>
                    <li><a href="{{url(app()->getLocale().'/terms-and-conditions')}}">{{ trans('site.global.header.term-conditions') }} </a>
                    </li>
                    <li><a href="{{url(app()->getLocale().'/survey')}}">{{ trans('site.survey.survey') }} </a>
                    </li>
                </ul>
                <div id="TA_socialButtonBubbles365" class="TA_socialButtonBubbles"><ul id="NviztHdGz" class="TA_links TJYnWpG3U"><li id="u8jtjhRJ" class="hPqMJkB"><a target="_blank" href="https://www.tripadvisor.com/Attraction_Review-g294202-d15852589-Reviews-Afro_Asian_Travel-Giza_Giza_Governorate.html"><img style="    width: 45px;" src="https://www.tripadvisor.com/img/cdsi/img2/branding/socialWidget/20x28_green-21693-2.png"/></a></li></ul></div><script async src="https://www.jscache.com/wejs?wtype=socialButtonBubbles&uniq=365&locationId=15852589&color=green&size=rect&lang=en_US&display_version=2" data-loadtrk onload="this.loadtrk=true"></script>
            </div>
            <div class="col-md-3">
                <h4>{{ trans('site.global.header.newsletter') }}</h4>
                <form action="#">
                    <label>{{ trans('site.global.header.enter-your-E-mail-address') }}</label>
                    <input type="text" class="form-control">
                    <p class="mt5"><span>*{{ trans('site.global.header.we-never-send-spam') }}</span>
                    </p>
                    <input type="submit" class="btn btn-primary" value="{{ trans('site.global.header.subscribe') }}">
                </form>
            </div>

        </div>
        
    </div>
    <div class="container">
        <div class="row text-center" style="border-top:1px solid #ffffff; padding:10px;">
            <p>© Copyright {{date('Y')}} - All Rights Reserved for {{getSetting()}}</p><p>  Powered by <a style="color:#FFF;" href="https://cayan.tech/" target="_blank">cayan.tech</a> </p> 
        </div>
    </div>
    
    <div id="whatsapp_stickyfooter">
            <a target="_blank" href="https://api.whatsapp.com/send?phone={{getSetting('whatsapp')}}&amp;text=Hello" class="whatsapp_link">
                
            </a> 
            
    </div>
    
</footer>