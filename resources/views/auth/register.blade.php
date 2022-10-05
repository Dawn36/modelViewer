<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="">
    <title>Model Viewer - Sign Up</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="{{ asset('theme/assets/media/logos/favicon.png')}}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link href="{{ asset('theme/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="bg-light">
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Authentication - Sign-in -->
        <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url({{ asset('theme/assets/media/illustrations/sketchy-1/')}})">
            <!--begin::Content-->
            <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
                <!--begin::Logo-->
                <a href="#" class="mb-12">
                    <img alt="Logo" src="{{ asset('theme/assets/media/logos/logo.png')}}" class="h-100px" />
                </a>
                <!--end::Logo-->
                <!--begin::Wrapper-->
                <div class="w-lg-700px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                    <!--begin::Form-->
                    <form method="POST" action="{{ route('register') }}" class="form w-100"   enctype="multipart/form-data" onsubmit="return validateForm()">

                        @csrf
                        <!--begin::Heading-->
                        <div class="text-center mb-10">
                            <!--begin::Title-->
                            <h1 class="text-dark mb-3">Sign Up to Model Viewer</h1>
                            <!--end::Title-->
                            <!--begin::Link-->
                            <div class="text-gray-400 fw-bold fs-4">Already User?
                                <a href="{{route('login')}}" class="link-primary fw-bolder">Login Here! </a>
                            </div>
                            <!--end::Link-->
                        </div>
                        <!--begin::Heading-->
                        <div class="fv-row mb-10" style="text-align-last: center;">
                            <label class="form-label fs-6 fw-bolder text-dark d-block">Picture</label>
                            <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('{{ asset('theme/assets/media/svg/avatars/blank.png')}}')">
                                <div class="image-input-wrapper w-125px h-125px" style="background-image: url('{{ asset('theme/assets/media/svg/avatars/blank.png')}}')"></div>
                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                    <i class="bi bi-pencil-fill fs-7"></i>
                                    <input type="file" name="file" accept=".png, .jpg, .jpeg" />
                                    <input type="hidden" name="avatar_remove" />
                                </label>
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                            </div>
                            <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                        </div>
                        <input type="hidden" name="role_id" value="1"/>
                        <div class="row mb-10">
                            <div class="col-lg-6">
                                <label class="form-label fs-6 fw-bolder text-dark">First Name</label>
                                <input class="form-control form-control-lg form-control-solid" type="text" name="first_name" autocomplete="off" required />
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label fs-6 fw-bolder text-dark">Last Name</label>
                                <input class="form-control form-control-lg form-control-solid" type="text" name="last_name" autocomplete="off" required />
                            </div>
                        </div>
                        <div class="row mb-10">
                            <div class="col-lg-6">
                                <label class="form-label fs-6 fw-bolder text-dark">Email</label>
                                <input class="form-control form-control-lg form-control-solid" type="text" name="email" autocomplete="off" required />
                                @if($errors->has('email'))
                                <div class="error" style="color: red"><b>{{ $errors->first('email') }}</b></div>
                                @endif
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label fs-6 fw-bolder text-dark">Mobile Phone</label>
                                <input class="form-control form-control-lg form-control-solid" type="number" name="contact_no" autocomplete="off" required />
                            </div>
                        </div>
                        <div class="row mb-10">
                            <div class="col-lg-6">
                                <label class="form-label fs-6 fw-bolder text-dark">Company</label>
                                <input class="form-control form-control-lg form-control-solid" type="text" name="company_name" autocomplete="off" required />
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label fs-6 fw-bolder text-dark">Password</label>
                                <input class="form-control form-control-lg form-control-solid" type="password" id='password' name="password" autocomplete="off" required />
                                @if($errors->has('password'))
                                <div class="error" style="color: red"><b>{{ $errors->first('password') }}</b></div>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-10">
                            <div class="col-lg-12">
                                <label class="form-label fs-6 fw-bolder text-dark">Confirm password</label>
                                <input class="form-control form-control-lg form-control-solid" type="password" id='confirm' name="confirm" autocomplete="off" required />
                            </div>
                        </div>
                        <!--begin::Actions-->
                        <div class="text-center">
                            <button class="btn btn-lg btn-primary w-100 mb-5">Continue</button>

                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Authentication - Sign-in-->
    </div>
    <!--end::Root-->
    <!--end::Main-->
    <!--begin::Javascript-->
    <script>
        var hostUrl = "assets/";
    </script>
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="{{ asset('theme/assets/plugins/global/plugins.bundle.js')}}"></script>
    <script src="{{ asset('theme/assets/js/scripts.bundle.js')}}"></script>
    <script>
        function validateForm() {
            let pass = $('#password').val();
            let conf = $('#confirm').val();
            if (pass != conf) {
                alert("Password not match with Confirm Password");
                return false;

            }
        }
    </script>
    <!--end::Global Javascript Bundle-->
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>
