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
    <h1>Website WHOIS Lookup</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}">
                <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li><a href="#"> Domain</a></li>
        <li class="active">Website WHOIS Lookup</li>
    </ol>
</section>

<!-- Main content -->
<section class="content pl-3 pr-3">
    <div class="row">
        <div class="col-12">
        <div class="card ">
            <div class="card-header bg-primary text-white">
                <h4 class="card-title my-2 float-left"> <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    Website WHOIS Lookup
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
                            <a href="{{ URL::to('user/whois-lookup') }}" class="btn btn-outline-secondary ml-auto">{{ __('Reset') }}</a>
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
                                            <div class="col-12 col-lg-4 text-break text-muted">{{ __('Domain') }}</div>
                                            <div class="col-12 col-lg-8 text-break d-flex align-items-center">
                                                <img src="https://icons.duckduckgo.com/ip3/{{ $result->domainName }}.ico" rel="noreferrer" class="width-4 height-4 {{ (__('lang_dir') == 'rtl' ? 'ml-3' : 'mr-3') }}">
                                                <span dir="ltr">{{ $result->domainName }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="list-group-item px-0">
                                        <div class="row align-items-center">
                                            <div class="col-12 col-lg-4 text-break text-muted">{{ __('Registrar') }}</div>
                                            <div class="col-12 col-lg-8 text-break">{{ $result->registrar }}</div>
                                        </div>
                                    </div>

                                    @if($result->owner)
                                        <div class="list-group-item px-0">
                                            <div class="row align-items-center">
                                                <div class="col-12 col-lg-4 text-break text-muted">{{ __('Registrant') }}</div>
                                                <div class="col-12 col-lg-8 text-break">{{ $result->owner }}</div>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="list-group-item px-0">
                                        <div class="row align-items-center">
                                            <div class="col-12 col-lg-4 text-break text-muted">{{ __('Created date') }}</div>
                                            <div class="col-12 col-lg-8 text-break">
                                                {{ __(':date at :time (UTC :offset)', ['date' => \Carbon\Carbon::createFromTimestamp($result->creationDate)->tz(Auth::user()->timezone ?? config('app.timezone'))->format(__('Y-m-d')), 'time' => \Carbon\Carbon::createFromTimestamp($result->creationDate)->tz(Auth::user()->timezone ?? config('app.timezone'))->format(__('H:i:s')), 'offset' => \Carbon\CarbonTimeZone::create((Auth::user()->timezone ?? config('app.timezone')))->toOffsetName()]) }}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="list-group-item px-0">
                                        <div class="row align-items-center">
                                            <div class="col-12 col-lg-4 text-break text-muted">{{ __('Updated date') }}</div>
                                            <div class="col-12 col-lg-8 text-break">
                                                {{ __(':date at :time (UTC :offset)', ['date' => \Carbon\Carbon::createFromTimestamp($result->updatedDate)->tz(Auth::user()->timezone ?? config('app.timezone'))->format(__('Y-m-d')), 'time' => \Carbon\Carbon::createFromTimestamp($result->updatedDate)->tz(Auth::user()->timezone ?? config('app.timezone'))->format(__('H:i:s')), 'offset' => \Carbon\CarbonTimeZone::create((Auth::user()->timezone ?? config('app.timezone')))->toOffsetName()]) }}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="list-group-item px-0">
                                        <div class="row align-items-center">
                                            <div class="col-12 col-lg-4 text-break text-muted">{{ __('Expiration date') }}</div>
                                            <div class="col-12 col-lg-8 text-break">
                                                {{ __(':date at :time (UTC :offset)', ['date' => \Carbon\Carbon::createFromTimestamp($result->expirationDate)->tz(Auth::user()->timezone ?? config('app.timezone'))->format(__('Y-m-d')), 'time' => \Carbon\Carbon::createFromTimestamp($result->expirationDate)->tz(Auth::user()->timezone ?? config('app.timezone'))->format(__('H:i:s')), 'offset' => \Carbon\CarbonTimeZone::create((Auth::user()->timezone ?? config('app.timezone')))->toOffsetName()]) }}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="list-group-item px-0">
                                        <div class="row align-items-center">
                                            <div class="col-12 col-lg-4 text-break text-muted">{{ __('Name servers') }}</div>
                                            <div class="col-12 col-lg-8 text-break">
                                                @foreach($result->nameServers as $nameServer)
                                                    <div class="text-break {{ !$loop->first ? 'mt-1' : '' }}">
                                                        {{ $nameServer }}
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <div class="list-group-item px-0">
                                        <div class="row align-items-center">
                                            <div class="col-12 col-lg-4 text-break text-muted">{{ __('States') }}</div>
                                            <div class="col-12 col-lg-8 text-break">
                                                @foreach($result->states as $state)
                                                    <div class="text-break {{ !$loop->first ? 'mt-1' : '' }}">
                                                        {{ $state }}
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    @if($result->whoisServer)
                                        <div class="list-group-item px-0">
                                            <div class="row align-items-center">
                                                <div class="col-12 col-lg-4 text-break text-muted">{{ __('WHOIS server') }}</div>
                                                <div class="col-12 col-lg-8 text-break">{{ $result->whoisServer }}</div>
                                            </div>
                                        </div>
                                    @endif
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
