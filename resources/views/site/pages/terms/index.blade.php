@extends('site.layouts.app')
@section('title')
- {{ trans('site.global.header.term-conditions') }}
@endsection
@section('seo')
    @if(getLang() == 1)
<meta name="description" content=" {{getSetting('site_description_en')}}">
        <meta name="keywords" content=" {{getSetting('site_keyword_en')}}">
    @elseif(getLang() == 2)
<meta name="description" content=" {{getSetting('site_description_es')}}">
        <meta name="keywords" content=" {{getSetting('site_keyword_es')}}">
    @elseif(getLang() == 3)
<meta name="description" content=" {{getSetting('site_description_pt')}}">
        <meta name="keywords" content=" {{getSetting('site_keyword_pt')}}">
    @endif
@endsection
@section('content')
        <div class="gap"></div>
        <div class="container">
         <h2>{{ trans('site.global.header.term-conditions') }} </h2> 
        </div>
        <div class="container">
            <div class="gap"></div>
            <div class="row">
                <div class="col-md-12">
                    <p>
                        @foreach($pagessettings as $pagessetting)
                            @if(getLang() == 1)
                                @if($pagessetting->name_setting == 'term_text_en')
                                {!! $pagessetting->value !!}
                                @endif
                            @elseif(getLang() == 2)
                                @if($pagessetting->name_setting == 'term_text_es')
                                {!! $pagessetting->value !!}
                                @endif
                            @elseif(getLang() == 3)
                                @if($pagessetting->name_setting == 'term_text_pt')
                                {!! $pagessetting->value !!}
                                @endif
                            @endif
                         @endforeach
                    </p>
                    
                </div>
                
            </div>
            <div class="gap"></div>
        </div>
        
@endsection
