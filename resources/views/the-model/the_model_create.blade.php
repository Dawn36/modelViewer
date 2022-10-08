<form id="" class="form" method="POST" action="{{ route('the_model.store') }}" enctype="multipart/form-data">
    @csrf
    <!--begin::Scroll-->
    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">Model Name</label>
            <input type="text" id='name'  name="name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter the Model Name here." required />
        </div>
        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">Model Image</label>
            <input type="file" accept=".jpg,.png" id='model_image' name="model_image" class="form-control form-control-solid mb-3 mb-lg-0" required />
        </div>
        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">3D Model</label>
            <input type="file" accept=".glb" id='3d_model'  name="3d_model" class="form-control form-control-solid mb-3 mb-lg-0" required />
            <label class="fw-normal text-muted fs-7">Please upload a GLB file. A Design will be created. You can edit the details thereafter.</label>
        </div>
    </div>
    <!--end::Scroll-->
    <!--begin::Actions-->
    <div class="text-center pt-15">
        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" aria-label="Close">Discard</button>
        <button type="submit" class="btn btn-primary me-10" id="kt_button_1">
            <span class="indicator-label">
                Submit
            </span>
            <span class="indicator-progress">
                Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
            </span>
        </button>
    </div>
    <!--end::Actions-->
</form>
<script>
    // Element to indecate
var button = document.querySelector("#kt_button_1");

// Handle button click event
button.addEventListener("click", function() {
    // Activate indicator
    name=$("#name").val();
    modelImage=$("#model_image").val();
    dModel=$("#3d_model").val();
    if(name != '' && modelImage != '' && dModel != '')
    {
        button.setAttribute("data-kt-indicator", "on");

    // Disable indicator after 3 seconds
    setTimeout(function() {
        button.removeAttribute("data-kt-indicator");
    }, 3000);
    }
    
});
    </script>