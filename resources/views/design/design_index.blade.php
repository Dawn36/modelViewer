@extends('layouts.main')

@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Row-->
            <div class="row gy-5 g-xl-10">
                <div class="col-xl-12 mb-5 mb-xl-10">
                    <!--begin::Card-->
                    <div class="card card-docs mb-2">
                        <div class="d-flex justify-content-space-between p-10 pb-0">
                            <h1 class="anchor fw-bolder" id="zero-configuration">
                                <a href="javascript:;"></a>Designs
                            </h1>
                            <div class="d-flex align-items-center position-relative my-1">
                                <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                                        <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
                                    </svg>
                                </span>
                                <form method="GET" action="{{ route('design_index') }}">
                                <input type="text" id="search" name="search" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search" />
                                </form>
                            </div>
                        </div>

                        <!-- Card Body -->
                        <div class="card-body fs-6 text-gray-700">
                            <div class="row">
                                @for ($i = 0; $i < count($theModel); $i++)
                                <div class="col-md-3 mt-5">
                                    <div class="card-xl-stretch border">
                                        <a href="{{route('design_show',$theModel[$i]->id)}}" class="d-block overlay">
                                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px" style="background-image:url('{{asset($theModel[$i]->model_img)}}')"></div>
                                        </a>
                                        <div class="p-5">
                                            <a href="{{route('design_show',$theModel[$i]->id)}}" class="fs-4 text-dark fw-bolder text-hover-primary text-dark lh-base">{{ucwords($theModel[$i]->name)}}</a>
                                            <div class="fw-bold fs-5 text-gray-600 text-dark mt-3">{{ucwords(strip_tags($theModel[$i]->description))}}</div>
                                        </div>
                                    </div>
                                </div>
                                @endfor
                            </div>

                            <!-- Pagination -->
                            <ul class="pagination pagination-outline">
                                {{$theModel->links('pagination::bootstrap-4') }}
                           
                            </ul>
                        </div>
                    </div>
                    <!--end::Card-->
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>

@endsection('content')