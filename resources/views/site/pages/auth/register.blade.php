@extends('site.layouts.app')
@section('title')
- Register
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
            <div class="row" data-gutter="60">
                <div class="col-md-6">
                    <h3>{{ trans('site.tours.welcome') }}</h3>
                    <p>@foreach($pagessettings as $pagessetting)
                            @if(getLang() == 1)
                                @if($pagessetting->name_setting == 'register_text_en')
                                {!! $pagessetting->value !!}
                                @endif
                            @elseif(getLang() == 2)
                                @if($pagessetting->name_setting == 'register_text_es')
                                {!! $pagessetting->value !!}
                                @endif
                            @elseif(getLang() == 3)
                                @if($pagessetting->name_setting == 'register_text_pt')
                                {!! $pagessetting->value !!}
                                @endif
                            @endif
                         @endforeach
                     </p>
                </div>
                <div class="col-md-6">
                    <h3{{ trans('site.tours.new-traveler') }}</h3>
                    <form action="{{url('/store-user')}}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group form-group-icon-left"><i class="fa fa-user input-icon input-icon-show"></i>
                            <label>{{ trans('site.tours.full-name') }}</label>
                            <input type="text" name="full-name" class="form-control" placeholder="e.g. John Doe"  />
                        </div>
                        <div class="form-group form-group-icon-left"><i class="fa fa-envelope input-icon input-icon-show"></i>
                            <label>{{ trans('site.tours.email') }}</label>
                            <input type="email" name="email" class="form-control" placeholder="e.g. johndoe@gmail.com"  />
                        </div>
                        <div class="gap gap-mini"></div>
                        <div class="radio-inline radio-small">
                            <label>
                                <input value="1" class="i-radio" type="radio" name="gender" />{{ trans('site.tours.male') }}</label>
                        </div>
                        <div class="radio-inline radio-small">
                            <label>
                                <input value="0" class="i-radio" type="radio" name="gender" />{{ trans('site.tours.female') }}</label>
                        </div>
                        <div class="gap gap-mini"></div>
                        <div class="form-group form-group-icon-left"><i class="fa fa-lock input-icon input-icon-show"></i>
                            <label>{{ trans('site.tours.password') }}</label>
                            <input type="password"  name="password" class="form-control" placeholder="{{ trans('site.tours.password') }}" />
                        </div>
                        <div class="form-group form-group-icon-left"><i class="fa fa-lock input-icon input-icon-show"></i>
                            <label>{{ trans('site.tours.confirm-password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="{{ trans('site.tours.confirm-password') }}">
                        </div>
                        <input class="btn btn-primary" type="submit" value="{{ trans('site.tours.sign-up-for-traveler') }}" />
                    </form>
                </div>
            </div>
        </div>
        <div class="gap"></div>
@endsection