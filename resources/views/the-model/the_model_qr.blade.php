
    <ul class="nav nav-tabs nav-line-tabs nav-line-tabs-2x mb-8 fs-6">
        <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="tab" href="#kt_tab_pane_1">Share</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_2">Embed</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade active show" id="kt_tab_pane_1" role="tabpanel">
            <form id="" class="form" method="POST" action="#">
                <!--begin::Scroll-->
                <div class="d-flex flex-column scroll-y me-n7 pe-7" id="" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                    <div class="fv-row mb-7">
                        <label class="fw-bold fs-4 mb-2">Link</label>
                        <input type="text" name="link" class="form-control form-control-solid mb-3 mb-lg-0" value="{{route('model_url',$theModel->id)}}" readonly/>
                    </div>
                    @php 
                        $modelUrl=route('model_url',$theModel->id);
                    @endphp
                    <div class="fv-row mb-7">
                        <label class="fw-bold fs-4 mb-2 d-block">QR Code</label>
                        {!! QrCode::size(150)->generate($modelUrl) !!}
                    </div>
                </div>
                <!--end::Scroll-->
            </form>
        </div>
        <div class="tab-pane fade" id="kt_tab_pane_2" role="tabpanel">
            <!-- Use it like any other HTML element -->
            <model-viewer src="{{ asset($theModel->model_3d_img)}}" ar ar-modes="scene-viewer webxr quick-look" camera-controls poster="{{ asset($theModel->model_3d_img)}}" shadow-intensity="1" autoplay> </model-viewer>
            <!--begin::Scroll-->
            <div class="d-flex flex-column scroll-y me-n7 pe-7 mt-3" id="" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                <div class="fv-row mb-7">
                    <label class="fw-bold fs-4 d-block">Embed Code</label>
                    <label class="fw-bold text-muted fs-7 mb-2 d-block">Copy and Paste this code into your web page</label>
                    <!--begin::Highlight-->
                    <div class="highlight">
                        <button class="highlight-copy btn" data-bs-toggle="tooltip" title="Copy code">copy</button>
                        <div class="highlight-code">
                            <pre class="language-html">
                                <code class="language-html">
                                    &lt;model-viewer src="{{ asset($theModel->model_3d_img)}}" ar ar-modes="scene-viewer 
                                    webxr quick-look" camera-controls poster="{{ asset($theModel->model_3d_img)}}" 
                                    shadow-intensity="1" autoplay&gt; &lt;/model-viewer&gt;
                                </code>
                            </pre>
                        </div>
                    </div>
                    <!--end::Highlight-->
                </div>
            </div>
            <!--end::Scroll-->
        </div>
    </div>
<script src="{{ asset('theme/assets/plugins/custom/prismjs/prismjs.bundle.js')}}"></script>
