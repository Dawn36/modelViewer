<!DOCTYPE html>
<html lang="en">

<!--begin::Head-->

<head>
    <base href="">
    <title>Model Viewer</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="assets/media/logos/favicon.png" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />

    <!-- Import the component -->
    <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
    <style>
    model-viewer {
        cursor: -webkit-grab;
        display: flex;
        height: 700px;
        overflow: hidden;
        position: relative;
        user-select: none;
        width: 100%;
    }
</style>
</head>
<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
            <div class="row">
                <div class="col-lg-12">
                    <model-viewer height="600px" src="{{ asset($theModel->model_3d_img)}}" ar ar-modes="scene-viewer webxr quick-look" camera-controls poster="{{ asset($theModel->model_3d_img)}}" shadow-intensity="1" autoplay> </model-viewer>
                </div>

            </div>
        </div>
    </div>
</div>
</body>

</body>

</html>