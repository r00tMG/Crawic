@extends('layouts/default')

{{-- Page title --}}
@section('title')
Users List
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/dataTables.bootstrap4.css') }}" />
<link href="{{ asset('css/pages/tables.css') }}" rel="stylesheet" type="text/css" />
@stop


{{-- Page content --}}
@section('content')
<section class="content-header">
    <h1>Website SSL Checker</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}">
                <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li><a href="#"> Domain</a></li>
        <li class="active">Website SSL Checker</li>
    </ol>
</section>

<!-- Main content -->
<section class="content pl-3 pr-3">
    <div class="row">
        <div class="col-12">
        <div class="card ">
            <div class="card-header bg-primary text-white">
                <h4 class="card-title my-2 float-left"> <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    Website SSL Checker
                </h4>
            </div>
            <div class="card-body">
                <form  method="get" enctype="multipart/form-data" @cannot('researchTools', ['App\Models\User']) class=" left-5 right-5 opacity-20" @endcannot>
                    @cannot('researchTools', ['App\Models\User'])
                        <div class=" top-0 right-0 bottom-0 left-0 z-1 more-gradient"></div>
                    @endcannot

                    @csrf

                    <div class="form-group">
                        <label for="i-domain">{{ __('Domain') }}</label>
                        <input type="text" dir="ltr" name="domain" id="i-domain" class="form-control{{ $errors->has('domain') ? ' is-invalid' : '' }}" value="{{ $domain ?? (old('domain') ?? '') }}">

                        @if ($errors->has('domain'))
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $errors->first('domain') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="row mx-n2">
                        <div class="col px-2">
                            <button type="submit" name="submit" class="btn btn-primary">{{ __('Search') }}</button>
                        </div>
                        <div class="col-auto px-2">
                            <a href="{{ URL::to('user/ssl-checker') }}" class="btn btn-outline-secondary ml-auto">{{ __('Reset') }}</a>
                        </div>
                    </div>
                </form>

                @if(isset($domain))
                    <div class="card border-0 shadow-sm mt-3">
                        <div class="card-header align-items-center">
                            <div class="row">
                                <div class="col">
                                    <div class="font-weight-medium py-1">{{ __('Result') }}</div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            @if(empty($result))
                                {{ __('No results found.') }}
                            @else
                                <div class="list-group list-group-flush my-n3">
                                    <div class="list-group-item px-0">
                                        <div class="row align-items-center">
                                            <div class="col-12 col-lg-4 text-truncate text-muted">{{ __('Domain') }}</div>
                                            <div class="col-12 col-lg-8 text-truncate d-flex align-items-center">
                                                <img src="https://icons.duckduckgo.com/ip3/{{ $domain }}.ico" rel="noreferrer" class="width-4 height-4 {{ (__('lang_dir') == 'rtl' ? 'ml-3' : 'mr-3') }}">

                                                <span dir="ltr">{{ $domain }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="list-group-item px-0">
                                        <div class="row align-items-center">
                                            <div class="col-12 col-lg-4 text-truncate text-muted">{{ __('Status') }}</div>
                                            <div class="col-12 col-lg-8 text-truncate d-flex align-items-center">
                                                @if($result->isValid())
                                                    <div class="bg-success width-4 height-4 rounded-circle {{ (__('lang_dir') == 'rtl' ? 'ml-3' : 'mr-3') }}"></div>

                                                    <div class="text-truncate">{{ __('Valid') }}</div>
                                                @else
                                                    <div class="bg-danger width-4 height-4 rounded-circle {{ (__('lang_dir') == 'rtl' ? 'ml-3' : 'mr-3') }}"></div>

                                                    <div class="text-truncate">{{ __('Invalid') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="list-group-item px-0">
                                        <div class="row align-items-center">
                                            <div class="col-12 col-lg-4 text-break text-muted">{{ __('Issuer') }}</div>
                                            <div class="col-12 col-lg-8 text-break">{{ $result->getIssuer() }}</div>
                                        </div>
                                    </div>

                                    @if(!empty($result->getOrganization()))
                                        <div class="list-group-item px-0">
                                            <div class="row align-items-center">
                                                <div class="col-12 col-lg-4 text-break text-muted">{{ __('Organization') }}</div>
                                                <div class="col-12 col-lg-8 text-break">{{ $result->getOrganization() }}</div>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="list-group-item px-0">
                                        <div class="row align-items-center">
                                            <div class="col-12 col-lg-4 text-break text-muted">{{ __('Signature algorithm') }}</div>
                                            <div class="col-12 col-lg-8 text-break">{{ $result->getSignatureAlgorithm() }}</div>
                                        </div>
                                    </div>

                                    <div class="list-group-item px-0">
                                        <div class="row align-items-center">
                                            <div class="col-12 col-lg-4 text-break text-muted">{{ __('Issued date') }}</div>
                                            <div class="col-12 col-lg-8 text-break">
                                                {{ __(':date at :time (UTC :offset)', ['date' => $result->validFromDate()->tz(Auth::user()->timezone ?? config('app.timezone'))->format(__('Y-m-d')), 'time' => $result->validFromDate()->tz(Auth::user()->timezone ?? config('app.timezone'))->format(__('H:i:s')), 'offset' => \Carbon\CarbonTimeZone::create((Auth::user()->timezone ?? config('app.timezone')))->toOffsetName()]) }}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="list-group-item px-0">
                                        <div class="row align-items-center">
                                            <div class="col-12 col-lg-4 text-break text-muted">{{ __('Expiration date') }}</div>
                                            <div class="col-12 col-lg-8 text-break">
                                                {{ __(':date at :time (UTC :offset)', ['date' => $result->expirationDate()->tz(Auth::user()->timezone ?? config('app.timezone'))->format(__('Y-m-d')), 'time' => $result->expirationDate()->tz(Auth::user()->timezone ?? config('app.timezone'))->format(__('H:i:s')), 'offset' => \Carbon\CarbonTimeZone::create((Auth::user()->timezone ?? config('app.timezone')))->toOffsetName()]) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                @endif


            </div>
        </div>
    </div>
    </div><!-- row-->
</section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
 

@stop
