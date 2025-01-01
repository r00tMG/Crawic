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
    <h1>Recently Expired Domain</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}">
                <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li><a href="#"> Domain</a></li>
        <li class="active">Recently Expired Domain</li>
    </ol>
</section>

<!-- Main content -->
<section class="content pl-3 pr-3">
    <div class="row">
        <div class="col-12">
        <div class="card ">
            <div class="card-header bg-primary text-white">
                <h4 class="card-title my-2 float-left"> <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    Domains Pending List High DA
                </h4>
            </div>
            <div class="card-body">
                <div class="table-responsive-lg table-responsive-sm table-responsive-md">
                <form method="GET" action="" class="mb-4">
                    <div class="row">
                        <!-- TLD Filter -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>TLD</label>
                                <select name="tld" class="form-control">
                                    <option value="">Tous</option>
                                    <option value="com" {{ request('tld') == 'com' ? 'selected' : '' }}>.com</option>
                                    <option value="net" {{ request('tld') == 'net' ? 'selected' : '' }}>.net</option>
                                    <option value="org" {{ request('tld') == 'org' ? 'selected' : '' }}>.org</option>
                                    <option value="info" {{ request('tld') == 'info' ? 'selected' : '' }}>.info</option>
                                </select>
                            </div>
                        </div>

                        <!-- Filter Type -->
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Type filter</label>
                                <select name="filter_type" class="form-control">
                                    <option value="">Aucun</option>
                                    <option value="starts" {{ request('filter_type') == 'starts' ? 'selected' : '' }}>Starts with</option>
                                    <option value="contains" {{ request('filter_type') == 'contains' ? 'selected' : '' }}>Contains</option>
                                    <option value="ends" {{ request('filter_type') == 'ends' ? 'selected' : '' }}>Ends with</option>
                                </select>
                            </div>
                        </div>

                        <!-- Filter Value -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Value filter</label>
                                <input type="text" name="filter_value" class="form-control" value="{{ request('filter_value') }}">
                            </div>
                        </div>

                        <!-- Category Filter -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Category:</label>
                                <select name="category" class="form-control">
                                    <option value="">Select Your Categories</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" 
                                            {{ request('category') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="row d-flex justify-content-between px-3">
                        <button type="submit" class="btn btn-primary">Filter</button>
                        <a href="{{ url()->current() }}" class="btn btn-secondary">Reset</a>
                    </div>
                </form>
                <table class="table table-bordered table-striped table-responsive width100" id="table">
                    <thead>
                        <tr class="filters" >
                            <th>ID</th>
                            <th>Domain</th>
                            <th>DA</th>
                            <th>PA</th>
                            <!-- <th>DR</th> -->
                            <th>CF</th>
                            <th>TF</th>
                            <th>Spam Rating</th>
                            <th>Total Backlinks</th>
                            <th>Referring Domains</th>
                            <th>External Links</th>
                            <th>Internal Links</th>
                            <th>Created At</th>
                            <th>End Date</th>
                            <th>Domain Age</th>
                            <!-- <th>Status</th> -->
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!$pending_domains->isEmpty())
                        @forelse($pending_domains as $pending_domain)
                        <tr>
                            <td>{{ $pending_domain->id }}</td>
                            <td>{{ $pending_domain->domain_name }}</td>
                            <td>{{ $pending_domain->DA === -1 ? 'Loading...' : $pending_domain->DA }}</td>
                            <td>{{ $pending_domain->PA === -1 ? 'Loading...' : $pending_domain->PA }}</td>
                            <!-- <td>{{ $pending_domain->DR === -1 ? 'Loading...' : $pending_domain->DR }}</td> -->
                            <td>{{ $pending_domain->CF === -1 ? 'Loading...' : $pending_domain->CF }}</td>
                            <td>{{ $pending_domain->TF === -1 ? 'Loading...' : $pending_domain->TF  }}</td>
                            <td>{{ $pending_domain->spam_rating === -1 ? 'Loading...' : $pending_domain->spam_rating }}</td>
                            <td>{{ $pending_domain->total_backlinks }}</td>
                            <td>{{ $pending_domain->referring_domains === -1 ? 'Loading...' : $pending_domain->referring_domains  }}</td>
                            <td>{{ $pending_domain->external_links === -1 ? 'Loading...' : $pending_domain->external_links }}</td>
                            <td>{{ $pending_domain->internal_links === -1 ? 'Loading...' : $pending_domain->internal_links }}</td>
                            <td>{{ $pending_domain->add_date }}</td>
                            <td>{{ $pending_domain->end_date }}</td>
                            <td>{{ $pending_domain->domain_age }}</td>
                            <!-- <td>{{ $pending_domain->status }}</td> -->
                            <td>
                                <button type="button" 
                                        class="btn btn-info btn-sm show-details" 
                                        data-domain-id="{{ $pending_domain->id }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill text-white" viewBox="0 0 16 16">
                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                                        </svg>
                                </button>
                            </td>
                        </tr>
                        <tr id="details-{{ $pending_domain->id }}" style="display: none;">
                                    <td colspan="17">
                                        <div class="domain-details">
                                            <h5>Informations détaillées pour {{ $pending_domain->domain_name }}</h5>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <p><strong>Crawl Results:</strong> {{ $pending_domain->crawl_results }}</p>
                                                    <p><strong>Global Rank:</strong> {{ $pending_domain->global_rank }}</p>
                                                </div>
                                                <div class="col-md-4">
                                                    <p><strong>TLD Registered:</strong> {{ $pending_domain->tld_registered }}</p>
                                                    <p><strong>Length:</strong> {{ $pending_domain->length }}</p>
                                                </div>
                                                <div class="col-md-4">
                                                    <p><strong>Available TLDs:</strong></p>
                                                    <ul>
                                                        <li>.com: {{ $pending_domain->com_tld }}</li>
                                                        <li>.net: {{ $pending_domain->net_tld }}</li>
                                                        <li>.org: {{ $pending_domain->org_tld }}</li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-4">
                                                    <p><strong>Categories:</strong></p>
                                                    @foreach($pending_domain->categories as $category)
                                                        <span class="badge badge-info">{{ $category->name }}</span>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3">No pending domains found</td>
                                </tr>
                            @endforelse
                        @endif
                    </tbody>
                </table>
                <!-- Liens de pagination -->
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
   // $(function() {
   //     var table = $('#table').DataTable({
   //         processing: true,
   //         serverSide: true,
   //         ajax: '{!! URL::to('user/domain_available_da') !!}',
   //         columns: [
   //             { data: 'domain_id', name: 'domain_id' },
   //             { data: 'domain_name', name: 'domain_namee' },
   //             { data: 'age', name: 'age' },
   //             { data: 'da', name: 'da' },
   //             { data: 'pa', name: 'pa' },
   //             { data: 'dr', name: 'dr'},
   //             { data: 'cf', name: 'cf'},
   //             { data: 'tf', name: 'tf'},
   //             { data: 'total_backlinks', name: 'total_backlinks'},
   //             { data: 'created_at', name:'created_at'},
   //             { data: 'actions', name: 'actions', orderable: false, searchable: false }
   //         ]
   //     });
   //     table.on( 'draw', function () {
   //         $('.livicon').each(function(){
   //             $(this).updateLivicon();
   //         });
   //     } );
   // });

</script>

    <div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="deleteLabel">Delete User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    Are you sure to delete this User? This operation is irreversible.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <a  type="button" class="btn btn-danger Remove_square">Delete</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
    </div>
    <!-- /.modal-dialog -->
<script>
    $(document).ready(function() {
    $('.show-details').click(function() {
        var domainId = $(this).data('domain-id');
        $('#details-' + domainId).toggle();
    });
});
$(function () {
    $('body').on('hidden.bs.modal', '.modal', function () {
        $(this).removeData('bs.modal');
    });
});
var $url_path = '{!! url('/') !!}';
$('#delete_confirm').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var $recipient = button.data('id');
    var modal = $(this)
    modal.find('.modal-footer a').prop("href",$url_path+"/admin/users/"+$recipient+"/delete");
})
</script>
@stop
