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
<script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.12.1/ckeditor.js"></script>
@stop


{{-- Page content --}}
@section('content')
<section class="content-header">
    <h1>NonPlagiarized Content Generation</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}">
                <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li><a href="#"> Domain</a></li>
        <li class="active">NonPlagiarized Content Generation</li>
    </ol>
</section>

<!-- Main content -->
<section class="content pl-3 pr-3">
    <div class="row">
        <div class="col-12">
        <div class="card ">
            <div class="card-header bg-primary text-white">
                <h4 class="card-title my-2 float-left"> <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    NonPlagiarized Content Generation
                </h4>
            </div>
            <div class="card-body">
                <div class="row">

                    <div class="col-lg-5 col-md-12 d-lg-flex">
                        <form class="card border-0 shadow p-3 h-100">
                            <div class="row" >
                                <div class="col-12 d-flex align-items-center">
                                    <img src="{{ asset('img/1.svg') }}" class="img-fluid rounded-circle"
                                        height="35" width="35" alt="">
                                    <p class="p-font text-dark mx-2">Content Generation</p>
                                </div>
                                
                                <p class="col-12 text-muted fs-7 mt-1">The smartest content rewriter ever. Rewrite blog articles or any type of content in seconds.</p>
                                <div class="col-md-12 mt-2">
                                    <label for="inputCity" class="form-label">Primary Keyword</label>
                                    <input required name="keyword" type="text" class="form-control" placeholder="e.g. Release of our app" id="keyword">
                                </div>
                            
                                <div class="col-12 mt-2">
                                    <label for="languages" class="form-label">Language </label>
                                    <select id="languages" class="form-control form-select">
                                        <option value="English (US)">English (US)</option>
                                    </select>
                                </div>
                                <div class="col-12 mt-2">
                                    <label for="variants" class="form-label">Number Of Variants</label>
                                    <select class="form-control form-select" name="variants" id="variants">
                                        <option value="1">1 Variants</option>
                                        <option value="2">2 Variants</option>
                                        <option value="3">3 Variants</option>
                                    </select>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-6 mt-2">
                                    <label for="level" class="form-label">Creativity Level</label>
                                    <select id="level" name="level" class="form-control form-select">
                                        
                                            <option value="0.7">Optimal</option>
                                            <option value="0">None (more factual)</option>
                                            <option value="0.1">Low</option>
                                            <option value="0.6">Medium</option>
                                            <option value="0.9">High</option>
                                            <option value="1">Max (less factual)</option>
                        
                                    </select>
                                </div>

                                <div class="col-6 mt-2">
                                    <label for="max_result_length" class="form-label">Result Length<small> (Max 2048)</small><i
                                            class="fa-sharp fa-solid fa-circle-info" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="{{ trans('labels.maximum_word_limit') }}"></i></label>
                                            <input type="number" class="form-control" min="0" max="600"
                                        name="max_result_length" id="max_result_length" value="200">

                                    
                                </div>
                            </div>


                            <div class="col-md-12 mt-4">
                                <div class="input-group mb-3">
                                    <button type="submit"
                                        class="btn {{ session()->get('theme') == 'dark' ? 'btn-dark-theme' : 'btn-primary' }} w-100"
                                        id="btngenerate">Generate</button>
                                    
                                </div>
                            </div>
                        </form>

                    </div>
                    <div class="col-lg-7 col-md-12 d-lg-flex mt-3 mt-lg-0 mt-xl-0 mt-xxl-0">
                        <div class="card border-0 shadow h-100 w-100">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="p-font text-dark"><i class="fa-solid fa-notes"></i>
                                        Generated Result</p>
                                    <div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <textarea class="form-control" id="ckeditor" class="h-100" name="ckeditor"><?= $content ?></textarea>

                            </div>
                        </div>
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
 <script type="text/javascript">
     CKEDITOR.replace('ckeditor');
 </script>

@stop
