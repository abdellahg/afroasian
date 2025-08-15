<div class="header-top">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <a class="logo" href="{{url('/')}}">
                    <img src="{{ asset('assets/site/img/logo-invert.png') }}" alt="Image Alternative text" title="Image Title" />
                </a>
            </div>
           
            <div class="col-md-6 col-md-offset-4 langs">
                <div class="top-user-area clearfix">
                    <ul class="top-user-area-list list list-horizontal list-border">
                        @if(Auth::user() && Auth::user()->admin != 1)
                        <li class="top-user-area-avatar">
                            <a href="#">Hi, {{ Auth::user()->name }}</a>
                        </li>
                        <li><a href="{{ url('/logout') }}">{{ trans('site.global.header.logout') }}</a></li>
                        @else
                        <li><a href="{{url('/register')}}">{{ trans('site.global.header.register') }}</a></li>
                        <li><a href="{{url('/login')}}">{{ trans('site.global.header.login') }}</a></li>
                        @endif

                        

                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                             <li>
                                <a rel="alternate" hreflang="{{ $localeCode }}" 
                                   href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" >
                                    <img style="width:20px;" src="{{asset('assets/site/img/flags/32/'.$localeCode.'.png')}}" alt="" title="{{ $properties['native'] }}" />
                                    
                                </a>
                             </li>
                        @endforeach
                        
                    </ul>
                    
                </div>
            </div>
        </div>
    </div>
</div> 