@extends('layouts.main')

@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Row-->
            <div class="row g-5 g-xl-8">
                <div class="col-xl-5">
                    <div class="card card-xl-stretch mb-xl-8">
                        <div class="card-body d-flex align-items-center pt-3 pb-0">
                            <img src="{{ asset('/profile/' . Auth::user()->profile_picture)}}" alt="" class="me-3 br-50px h-60px h-lg-100px">
                            <div class="d-flex flex-column flex-grow-1 py-2 py-lg-13">
                                <a href="#" class="fw-bolder text-dark fs-4 mb-2 text-hover-primary">Hello, Tony Giudice</a>
                                <span class="fw-bold text-muted fs-5">Let's have a look on your progress so far.</span>
                            </div>
                        </div>
                        <div class="card-body d-flex align-items-center py-0">
                            <div class="d-flex flex-column flex-grow-1 py-6">
                                <a href="#" class="fw-bolder text-dark fs-5 text-hover-primary">Your Monthly Subscription</a>
                                <span class="fw-bold text-muted fs-3">Free</span>
                            </div>
                            <a class="btn btn-primary btn-sm px-4" href="#" data-bs-toggle="modal" data-bs-target="">Upgrade Subscription</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card card-xl-stretch mb-xl-8">
                        <div class="card-body">
                            <div class="d-flex flex-stack">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                        <a href="#" class="text-dark fw-bolder text-hover-primary fs-5">Total Designs Used</a>
                                        <h1 class="text-primary fw-bold display-4">{{$themodelcount}}</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-column w-100 mt-12">
                                <div class="d-flex flex-column w-100 me-2">
                                    <div class="d-flex justify-content-end mb-2">
                                        <span class="text-primary me-2 fs-3 fw-bold">Out of 10</span>
                                    </div>
                                    <div class="progress h-6px w-100">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="70"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card card-xl-stretch mb-xl-8">
                        <div class="card-body">
                            <div class="d-flex flex-stack">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                        <a href="#" class="text-dark fw-bolder text-hover-primary fs-5">Total Views Made</a>
                                        <h1 class="text-primary fw-bold display-4">1</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-column w-100 mt-12">
                                <div class="d-flex flex-column w-100 me-2">
                                    <div class="d-flex justify-content-end mb-2">
                                        <span class="text-primary me-2 fs-3 fw-bold">Out of 10000</span>
                                    </div>
                                    <div class="progress h-6px w-100">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 1%" aria-valuenow="1" aria-valuemin="0" aria-valuemax="1"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>


@endsection('content')
