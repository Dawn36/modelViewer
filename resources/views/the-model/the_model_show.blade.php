@extends('layouts.main')

@section('content')

<style>
    model-viewer {
        cursor: -webkit-grab;
        display: flex;
        height: 100%;
        overflow: hidden;
        position: relative;
        user-select: none;
        width: 100%;
    }
</style>

<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <div class="row">
                <div class="col">
                    <!-- Use it like any other HTML element -->
                    <model-viewer height="200px" src="{{ asset($theModel->model_3d_img)}}" ar ar-modes="scene-viewer webxr quick-look" camera-controls poster="{{ asset($theModel->model_3d_img)}}" shadow-intensity="1" autoplay> </model-viewer>
                </div>

                <div class="col-lg-6">
                    <!--begin::details View-->
                    <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
                        <!--begin::Card header-->
                        <div class="card-header cursor-pointer">
                            <!--begin::Card title-->
                            <div class="card-title m-0">
                                <h3 class="fw-bolder m-0">3D Viewer</h3>
                            </div>
                            <!--end::Card title-->
                        </div>
                        <!--begin::Card header-->
                        <!--begin::Card body-->
                        <form id="" class="form" method="POST" action="{{ route('the_model.update',$theModel->id) }}" enctype="multipart/form-data">
                            @method("PUT")
                            @csrf
                        <div class="card-body p-9">
                            <!--begin::Scroll-->
                            <div class="d-flex flex-column scroll-y me-n7 pe-7" id="" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                                <div class="fv-row mb-7">
                                    <label class="required fw-bold fs-6 mb-2">Model Name</label>
                                    <input type="text" required name="name" value="{{ $theModel->name}}" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter the Model Name here." />
                                </div>
                                @if(Auth::user()->hasRole('admin'))
                                <div class="fv-row mb-7">
                                    <label class="required fw-bold fs-6 mb-2">Model Image</label>
                                    <input type="file" accept=".jpg,.png"  name="model_image" class="form-control form-control-solid mb-3 mb-lg-0" />
                                </div>
                                <div class="fv-row mb-7">
                                    <label class="required fw-bold fs-6 mb-2">3D Model</label>
                                    <input type="file" accept=".glb"  name="3d_model" class="form-control form-control-solid mb-3 mb-lg-0" />
                                    <label class="fw-normal text-muted fs-7">Please upload a GLB file. A Design will be created. You can edit the details thereafter.</label>
                                </div>
                                @endif
                                @if(Auth::user()->hasRole('user') && $theModel->user_id == Auth::user()->id)
                                <div class="fv-row mb-7">
                                    <label class="required fw-bold fs-6 mb-2">Model Image</label>
                                    <input type="file" accept=".jpg,.png"  name="model_image" class="form-control form-control-solid mb-3 mb-lg-0" />
                                </div>
                                <div class="fv-row mb-7">
                                    <label class="required fw-bold fs-6 mb-2">3D Model</label>
                                    <input type="file" accept=".glb"  name="3d_model" class="form-control form-control-solid mb-3 mb-lg-0" />
                                    <label class="fw-normal text-muted fs-7">Please upload a GLB file. A Design will be created. You can edit the details thereafter.</label>
                                </div>
                                @endif  
                                <textarea name='description' id='description' hidden>{{$theModel->description}}</textarea>

                                <div class="fv-row mb-7">
                                    <label class="required fw-bold fs-6 mb-2">Description</label>
                                    <div name="kt_ecommerce_add_product_description" class="min-h-200px mb-2 kt_docs_quill_basic"></div>
                                    <div class="text-muted fs-7">Write the Description here for this Model.</div>
                                </div>
                            </div>
                            <!--end::Scroll-->
                            <!--begin::Actions-->
                            @if(Auth::user()->hasRole('user') && $theModel->user_id == Auth::user()->id)
                                <button type="reset" class="btn btn-sm btn-light me-3" data-bs-dismiss="modal" aria-label="Close">Discard</button>
                            <button type="submit" class="btn btn-sm btn-light-primary">Submit</button>
                            @endif
                            @if(Auth::user()->hasRole('admin'))
                            <button type="reset" class="btn btn-sm btn-light me-3" data-bs-dismiss="modal" aria-label="Close">Discard</button>
                            <button type="submit" class="btn btn-sm btn-light-primary">Submit</button>
                            @endif

                            <!--end::Actions-->
                        </div>
                            <!--end::Actions-->
                        </form>
                        <!--end::Card body-->
                    </div>
                    <!--end::details View-->
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>
<!--end::Content-->
<script>
    // $("#kt_datatable_example_1").DataTable();
    $(document).ready(function() {
       
        var quill = new Quill('.kt_docs_quill_basic', {
            modules: {
                toolbar: [
                    [{
                        header: [1, 2, false]
                    }],
                    ['bold', 'italic', 'underline'],
                ]
            },
            placeholder: 'Type your text here...',
            theme: 'snow' // or 'bubble'
        });
       
        quill.on('text-change', function() {
        document.getElementById("description").value = quill.root.innerHTML;

        
    });

       
    var value1 = document.getElementById("description").value;
    var delta1 = quill.clipboard.convert(value1);

    quill.setContents(delta1, 'silent');
    });
</script>
@endsection('content')