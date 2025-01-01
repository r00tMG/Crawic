@extends('layouts/default')

{{-- Page title --}}
@section('title')
Users List
@parent
@stop

{{-- page level styles --}}
@section('header_styles')

@stop


{{-- Page content --}}
@section('content')
<section class="content-header">
    <h1>Search Expired Domain</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}">
                <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li><a href="#"> Domain</a></li>
        <li class="active">Search Expired Domain</li>
    </ol>
</section>

<!-- Main content -->
<section class="content pl-3 pr-3">
    <div class="row">
        <div class="col-12">
        <div class="card ">
            <div class="card-header bg-primary text-white">
                <h4 class="card-title my-2 float-left"> <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    Domains List
                </h4>
            </div>
            <div class="card-body">

                <form  method="get" enctype="multipart/form-data" @cannot('researchTools', ['App\Models\User']) class=" left-5 right-5 opacity-20" @endcannot>
                    @cannot('researchTools', ['App\Models\User'])
                        <div class=" top-0 right-0 bottom-0 left-0 z-1 more-gradient"></div>
                    @endcannot

                    @csrf

                    <div class="form-group">
                        <!-- <label for="i-domain">{{ __('Keyword') }}</label>
                        <input type="text" dir="ltr" name="s" id="i-domain" class="form-control{{ $errors->has('domain') ? ' is-invalid' : '' }}" value="<?= request()->s ?>"  > -->
                        <label for="keyword">Keyword</label>
                        <input type="text" name="s" id="keyword" class="form-control" value="{{ request('s') }}">

                        <!-- @if ($errors->has('domain'))
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $errors->first('domain') }}</strong>
                            </span>
                        @endif -->
                    </div>


                    <div class="row mx-n2">
                        <div class="col px-2">
                            <button type="submit" name="submit" class="btn btn-primary">{{ __('Search') }}</button>
                        </div>
                        <div class="col-auto px-2">
                            <a href="{{ url()->current() }}" class="btn btn-outline-secondary ml-auto">{{ __('Reset') }}</a>
                        </div>
                    </div>
                </form>

                <div class="table-responsive-lg table-responsive-sm table-responsive-md">
                <table class="table table-bordered width100" id="table">
                    <thead>
                        <tr class="filters">
                            <th>ID</th>
                            <th>Domain</th>
                            
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($all_domains as $domain)
                            <tr>
                                <td>{{ $domain->id }}</td>
                                <td>{{ $domain->domain_name }}</td>
                                <td>
                                    <button type="button" 
                                        class="btn btn-info btn-sm show-details" 
                                        data-domain-id="{{ $domain->id }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill text-white" viewBox="0 0 16 16">
                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                            <tr id="details-{{ $domain->id }}" style="display: none;">
                                    <td colspan="17">
                                        <div class="domain-details">
                                            <h3>Detailed information for {{ $domain->domain_name }}</h5>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <p><strong>Crawl Results:</strong> {{ $domain->crawl_results }}</p>
                                                    <p><strong>Global Rank:</strong> {{ $domain->global_rank }}</p>
                                                </div>
                                                <div class="col-md-4">
                                                    <p><strong>TLD Registered:</strong> {{ $domain->tld_registered }}</p>
                                                    <p><strong>Length:</strong> {{ $domain->length }}</p>
                                                </div>
                                                <div class="col-md-4">
                                                    <p><strong>Available TLDs:</strong></p>
                                                    <ul>
                                                        <li>.com: {{ $domain->com_tld }}</li>
                                                        <li>.net: {{ $domain->net_tld }}</li>
                                                        <li>.org: {{ $domain->org_tld }}</li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-4">
                                                    <p><strong>Categories:</strong></p>
                                                    <ul>
                                                        @foreach($domain->categories as $category)
                                                            <li>{{ $category->name }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                               
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                        @empty
                            <tr>
                                <td colspan="3">No expired domains found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $pending_domains->links() }}
                </div>
                </div>
            </div>
        </div>
    </div>
    </div><!-- row-->
</section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <script type="text/javascript" src="{{ asset('vendors/datatables/js/jquery.dataTables.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('vendors/datatables/js/dataTables.bootstrap4.js') }}" ></script>

<script>
    $(document).ready(function() {
    $('.show-details').click(function() {
        var domainId = $(this).data('domain-id');
        $('#details-' + domainId).toggle();
    });
});
</script>   
    <!-- /.modal-dialog -->
@stop
