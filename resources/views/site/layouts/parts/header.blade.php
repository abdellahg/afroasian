<div class="global-wrap">
<header id="main-header">
    @include('site.layouts.parts.top-header')
    <div class="container mainmenu">
        <div class="nav">
            <ul class="slimmenu" id="slimmenu">
                <li class="{{ Route::currentRouteName() == 'home' ? 'active' : '' }}" ><a href="{{url('/')}}">{{ trans('site.global.header.home') }}</a></li>
                @foreach(getMainCategories($lang = getLang()) as $main_category)
                <li><a href="#">{{$main_category->name}}</a>
                    <ul>
                        @foreach(subMainCategories($lang = getLang()) as $sub_category)
                            @if($sub_category->parent_id == $main_category->id)
                                <li <?= urldecode(URL::current()) == URL(app()->getLocale().'/category/'. getCatEnSlug($sub_category->id)) ? 'class="active"' : ''; ?> ><a href="{{url(app()->getLocale().'/category/'.getCatEnSlug($sub_category->id))}}">
                                    {{$sub_category->name}}</a></li>
                            @endif
                        @endforeach
                    </ul>
                </li>
                @endforeach
               
                <li class="{{ Route::currentRouteName() == 'gallery' ? 'active' : '' }}" ><a href="#">{{ trans('site.global.header.gallery') }}</a>
                    <ul>
                        @foreach(galleries($lang = getLang()) as $gallery)
                            <li><a href="{{url(app()->getLocale().'/gallery/'.getGallaryEnSlug($gallery->id))}}">
                                {{$gallery->name}}</a></li>
                            
                        @endforeach
                    </ul>
                </li>
                <li class="{{ Route::currentRouteName() == 'about' ? 'active' : '' }}" ><a href="{{url(app()->getLocale().'/about-us')}}">{{ trans('site.global.header.about') }}</a></li>
                <li class="{{ Route::currentRouteName() == 'contact' ? 'active' : '' }}" ><a href="{{url(app()->getLocale().'/contact-us')}}">{{ trans('site.global.header.contact-us') }}</a></li>
                <li class="{{ Route::currentRouteName() == 'blogs' ? 'active' : '' }} pull-right" ><a href="{{url(app()->getLocale().'/blogs')}}">{{ trans('site.global.header.blogs') }}</a></li>
            </ul>
        </div>
        
    </div>
</header>