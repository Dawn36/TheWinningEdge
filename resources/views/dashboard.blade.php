@extends('layouts.main')

@section('content')
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Row-->
            <div class="row g-5 g-xl-8">
                <div class="col-xl-4">
                    <!--begin::Statistics Widget 2-->
                    <div class="card card-xl-stretch mb-10 mb-xl-10">
                        <!--begin::Body-->
                        <div class="card-body d-flex align-items-center pt-3 pb-0">
                            <div class="d-flex flex-column flex-grow-1 py-2 py-lg-13 me-2">
                                <a href="#" class="fw-bolder text-dark fs-4 mb-2 text-hover-primary">Hi, {{ucwords(Auth::user()->first_name)}} {{ucwords(Auth::user()->last_name)}}</a>
                                <span class="fw-bold text-muted fs-5">Admin</span>
                            </div>
                            @if (Auth::user()->profile_picture)
                            <img src="{{ asset('/profile/' . Auth::user()->profile_picture) }}" style="border-radius: 50px" class="h-100px" onerror="this.onerror=null; this.src='/profile/blank.png'" alt="">
                            @endif
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Statistics Widget 2-->
                </div>
            </div>
            <!--end::Row-->

            <!--begin::Row-->
            <div class="row gy-5 g-xl-10">
                <!--begin::Col-->
                <div class="col-xl-4">
                    <!--begin::Card widget 8-->
                    <div class="card overflow-hidden mb-5 mb-xl-10">
                        <!--begin::Card body-->
                        <div class="card-body">
                            <!--begin::Statistics-->
                            <span class="svg-icon svg-icon-primary svg-icon-3x ms-n1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="black" />
                                    <path d="M12.0006 11.1542C13.1434 11.1542 14.0777 10.22 14.0777 9.0771C14.0777 7.93424 13.1434 7 12.0006 7C10.8577 7 9.92348 7.93424 9.92348 9.0771C9.92348 10.22 10.8577 11.1542 12.0006 11.1542Z" fill="black" />
                                    <path d="M15.5652 13.814C15.5108 13.6779 15.4382 13.551 15.3566 13.4331C14.9393 12.8163 14.2954 12.4081 13.5697 12.3083C13.479 12.2993 13.3793 12.3174 13.3067 12.3718C12.9257 12.653 12.4722 12.7981 12.0006 12.7981C11.5289 12.7981 11.0754 12.653 10.6944 12.3718C10.6219 12.3174 10.5221 12.2902 10.4314 12.3083C9.70578 12.4081 9.05272 12.8163 8.64456 13.4331C8.56293 13.551 8.49036 13.687 8.43595 13.814C8.40875 13.8684 8.41781 13.9319 8.44502 13.9864C8.51759 14.1133 8.60828 14.2403 8.68991 14.3492C8.81689 14.5215 8.95295 14.6757 9.10715 14.8208C9.23413 14.9478 9.37925 15.0657 9.52439 15.1836C10.2409 15.7188 11.1026 15.9999 11.9915 15.9999C12.8804 15.9999 13.7421 15.7188 14.4586 15.1836C14.6038 15.0748 14.7489 14.9478 14.8759 14.8208C15.021 14.6757 15.1661 14.5215 15.2931 14.3492C15.3838 14.2312 15.4655 14.1133 15.538 13.9864C15.5833 13.9319 15.5924 13.8684 15.5652 13.814Z" fill="black" />
                                </svg>
                            </span>
                            <div class="text-gray-900 fw-bolder fs-2 mb-2 mt-5">{{$userCount}}</div>
                            <div class="fw-bold text-gray-400">Total Admins</div>
                            <!--end::Statistics-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card widget 8-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-4">
                    <!--begin::Card widget 8-->
                    <div class="card overflow-hidden mb-5 mb-xl-10">
                        <!--begin::Card body-->
                        <div class="card-body">
                            <!--begin::Statistics-->
                            <span class="svg-icon svg-icon-primary svg-icon-3x ms-n1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M16.0173 9H15.3945C14.2833 9 13.263 9.61425 12.7431 10.5963L12.154 11.7091C12.0645 11.8781 12.1072 12.0868 12.2559 12.2071L12.6402 12.5183C13.2631 13.0225 13.7556 13.6691 14.0764 14.4035L14.2321 14.7601C14.2957 14.9058 14.4396 15 14.5987 15H18.6747C19.7297 15 20.4057 13.8774 19.912 12.945L18.6686 10.5963C18.1487 9.61425 17.1285 9 16.0173 9Z" fill="black" />
                                    <rect opacity="0.3" x="14" y="4" width="4" height="4" rx="2" fill="black" />
                                    <path d="M4.65486 14.8559C5.40389 13.1224 7.11161 12 9 12C10.8884 12 12.5961 13.1224 13.3451 14.8559L14.793 18.2067C15.3636 19.5271 14.3955 21 12.9571 21H5.04292C3.60453 21 2.63644 19.5271 3.20698 18.2067L4.65486 14.8559Z" fill="black" />
                                    <rect opacity="0.3" x="6" y="5" width="6" height="6" rx="3" fill="black" />
                                </svg>
                            </span>
                            <div class="text-gray-900 fw-bolder fs-2 mb-2 mt-5">{{$contactCount}}</div>
                            <div class="fw-bold text-gray-400">Total Contacts</div>
                            <!--end::Statistics-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card widget 8-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-4">
                    <!--begin::Card widget 8-->
                    <div class="card overflow-hidden mb-5 mb-xl-10">
                        <!--begin::Card body-->
                        <div class="card-body">
                            <!--begin::Statistics-->
                            <span class="svg-icon svg-icon-primary svg-icon-3x ms-n1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M6 8.725C6 8.125 6.4 7.725 7 7.725H14L18 11.725V12.925L22 9.725L12.6 2.225C12.2 1.925 11.7 1.925 11.4 2.225L2 9.725L6 12.925V8.725Z" fill="black" />
                                    <path opacity="0.3" d="M22 9.72498V20.725C22 21.325 21.6 21.725 21 21.725H3C2.4 21.725 2 21.325 2 20.725V9.72498L11.4 17.225C11.8 17.525 12.3 17.525 12.6 17.225L22 9.72498ZM15 11.725H18L14 7.72498V10.725C14 11.325 14.4 11.725 15 11.725Z" fill="black" />
                                </svg>
                            </span>
                            <div class="text-gray-900 fw-bolder fs-2 mb-2 mt-5">{{$emailTemplateCount}}</div>
                            <div class="fw-bold text-gray-400">Total Email Templates</div>
                            <!--end::Statistics-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card widget 8-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->

            <div class="row gy-5 g-xl-10">
                <!--begin::Col-->
                <div class="col-xl-4">
                    <!--begin::Mixed Widget 8-->
                    <div class="card card-xl-stretch mb-xl-8">
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Heading-->
                            <div class="d-flex flex-stack">
                                <!--begin:Info-->
                                <div class="d-flex align-items-center">
                                    <!--begin:Image-->
                                    <div class="symbol symbol-60px me-5">
                                        <span class="symbol-label bg-danger-light">
                                            <img src="{{ asset('theme/assets/media/logos/rpa.png')}}" class="h-50 align-self-center" alt="" />
                                        </span>
                                    </div>
                                    <!--end:Image-->
                                    <!--begin:Title-->
                                    <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                        <a href="#" class="text-dark fw-bolder text-hover-primary fs-5">Revenue Producing Activities</a>
                                        <span class="text-muted fw-bold">Due: {{Date('01-m-Y',strtotime('+1 month'))}}</span>
                                    </div>
                                    <!--end:Title-->
                                </div>
                                <!--begin:Info-->
                            </div>
                            <!--end::Heading-->
                            <!--begin:Stats-->
                            <div class="d-flex flex-column w-100 mt-12">
                                <span class="text-dark me-2 fw-bolder pb-3">Progress</span>
                                <!-- <div class="progress h-5px w-100">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div> -->
                                <div class="d-flex flex-column w-100 me-2">
                                    <div class="d-flex flex-stack mb-2">
                                        <span class="text-muted me-2 fs-7 fw-bold">{{$rpaPercentage >= 100 ? '100' : $rpaPercentage }}%</span>
                                    </div>
                                    <div class="progress h-6px w-100">
                                        <div class="progress-bar {{$rpaPercentage >= 100 ? 'bg-sucess' : 'bg-danger'  }}" role="progressbar" style="width: {{$rpaPercentage >= 100 ? '100' : $rpaPercentage }}%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <!--end:Stats-->
                            <!--begin:Action-->
                            <div class="d-flex flex-column mt-10">
                                <div class="text-dark me-2 fw-bolder pb-4">Action</div>
                                <div class="d-flex">
                                    <button class="btn btn-primary btn-sm px-4" onclick="setRpaTarget()">Set RPA Target</button>
                                </div>
                            </div>
                            <!--end:Action-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Mixed Widget 8-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-4">
                    <!--begin::Mixed Widget 8-->
                    <div class="card card-xl-stretch mb-xl-8">
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Heading-->
                            <div class="d-flex flex-stack">
                                <!--begin:Info-->
                                <div class="d-flex align-items-center">
                                    <!--begin:Image-->
                                    <div class="symbol symbol-60px me-5">
                                        <span class="symbol-label bg-danger-light">
                                            <img src="{{ asset('theme/assets/media/logos/opportunities.png')}}" class="h-50 align-self-center" alt="" />
                                        </span>
                                    </div>
                                    <!--end:Image-->
                                    <!--begin:Title-->
                                    <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                        <a href="#" class="text-dark fw-bolder text-hover-primary fs-5">Opportunities Target</a>
                                        <span class="text-muted fw-bold">Due: {{Date('01-01-Y',strtotime('+1 year'))}}</span>
                                    </div>
                                    <!--end:Title-->
                                </div>
                                <!--begin:Info-->
                            </div>
                            <!--end::Heading-->
                            <!--begin:Stats-->
                            <div class="d-flex flex-column w-100 mt-12">
                                <span class="text-dark me-2 fw-bolder pb-3">Progress</span>
                                <!-- <div class="progress h-5px w-100">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div> -->
                                <div class="d-flex flex-column w-100 me-2">
                                    <div class="d-flex flex-stack mb-2">
                                        <span class="text-muted me-2 fs-7 fw-bold">{{$percentage >= 100 ? '100' : $percentage }}%</span>
                                    </div>
                                    <div class="progress h-6px w-100">
                                        <div class="progress-bar {{$percentage >= 100 ? 'bg-sucess' : 'bg-danger'  }}" role="progressbar" style="width: {{$percentage >= 100 ? '100' : $percentage }}%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <!--end:Stats-->
                            <!--begin:Action-->
                            <div class="d-flex flex-column mt-10">
                                <div class="text-dark me-2 fw-bolder pb-4">Action</div>
                                <div class="d-flex">
                                    <button class="btn btn-primary btn-sm px-4"  onclick="setOpportunitiesTarget()">Set Opportunities Target</button>
                                </div>
                            </div>
                            <!--end:Action-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Mixed Widget 8-->
                </div>
                <!--end::Col-->
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <!--begin::Feeds Widget 1-->
                    <div class="card mb-5 mb-xl-8">
                        <!--begin::Body-->
                        <div class="card-body pb-0">
                            <!--begin::Header-->
                            <div class="d-flex align-items-center">
                                <!--begin::User-->
                                <div class="d-flex align-items-center flex-grow-1">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-45px me-5">
                                        @if (Auth::user()->profile_picture)
                                        <img src="{{ asset('/profile/' . Auth::user()->profile_picture) }}"  onerror="this.onerror=null; this.src='/profile/blank.png'" alt="">
                                        @endif
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Info-->
                                    <div class="d-flex flex-column">
                                        <a href="#" class="text-gray-900 text-hover-primary fs-6 fw-bolder">{{ucwords(Auth::user()->first_name)}} {{ucwords(Auth::user()->last_name)}}</a>
                                        <span class="text-gray-400 fw-bold">Fintech, Banking, and Commercial Lending Specialist focused on AML Compliance, ID Verification, Adverse Media and Sanction Screening</span>
                                    </div>
                                    <!--end::Info-->
                                </div>
                                <!--end::User-->
                            </div>
                            <!--end::Header-->
                            <!--begin::Form-->
                            <form id="kt_forms_widget_1_form" class="ql-quil ql-quil-plain  p-3 " method="POST" action="{{ route('user_note') }}">
                                @csrf
                                <!--begin::Editor-->
                                <textarea name='note' id='dashboard_note' hidden>{{Auth::user()->note}}</textarea>
                                <div id="kt_forms_widget_1_editor" class="py-6"></div>
                                <!--end::Editor-->
                                <div class="separator"></div>
                                <!--begin::Toolbar-->
                                <div id="kt_forms_widget_1_editor_toolbar" class="ql-toolbar d-flex flex-stack py-2">
                                    <div class="me-2">
                                        <span class="ql-formats ql-size ms-0">
                                            <select class="ql-size w-75px"></select>
                                        </span>
                                        <span class="ql-formats">
                                            <button class="ql-bold"></button>
                                            <button class="ql-italic"></button>
                                            <button class="ql-underline"></button>
                                            <button class="ql-strike"></button>
                                            <button class="ql-link"></button>
                                            <button class="ql-clean"></button>
                                        </span>
                                    </div>
                                    <button type="submit" class="btn btn-icon btn-sm btn-primary btn-active-color-primary" style="background-color: #e7e2cc !important;">
                                        <span class="svg-icon svg-icon-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path d="M15.43 8.56949L10.744 15.1395C10.6422 15.282 10.5804 15.4492 10.5651 15.6236C10.5498 15.7981 10.5815 15.9734 10.657 16.1315L13.194 21.4425C13.2737 21.6097 13.3991 21.751 13.5557 21.8499C13.7123 21.9488 13.8938 22.0014 14.079 22.0015H14.117C14.3087 21.9941 14.4941 21.9307 14.6502 21.8191C14.8062 21.7075 14.9261 21.5526 14.995 21.3735L21.933 3.33649C22.0011 3.15918 22.0164 2.96594 21.977 2.78013C21.9376 2.59432 21.8452 2.4239 21.711 2.28949L15.43 8.56949Z" fill="black" />
                                                <path opacity="0.3" d="M20.664 2.06648L2.62602 9.00148C2.44768 9.07085 2.29348 9.19082 2.1824 9.34663C2.07131 9.50244 2.00818 9.68731 2.00074 9.87853C1.99331 10.0697 2.04189 10.259 2.14054 10.4229C2.23919 10.5869 2.38359 10.7185 2.55601 10.8015L7.86601 13.3365C8.02383 13.4126 8.19925 13.4448 8.37382 13.4297C8.54839 13.4145 8.71565 13.3526 8.85801 13.2505L15.43 8.56548L21.711 2.28448C21.5762 2.15096 21.4055 2.05932 21.2198 2.02064C21.034 1.98196 20.8409 1.99788 20.664 2.06648Z" fill="black" />
                                            </svg>
                                        </span>
                                    </button>
                                </div>

                                <!--end::Toolbar-->
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Feeds Widget 1-->
                </div>
            </div>

        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>
<!--end::Content-->


<script>
var quill = new Quill("#kt_forms_widget_1_editor", {
                    modules: {
                        toolbar: {
                            container: "#kt_forms_widget_1_editor_toolbar",
                        },
                    },
                    placeholder: "What ias on your mind ?",
                    theme: "snow",
                });
                quill.on('text-change', function() {
        document.getElementById("dashboard_note").value = quill.root.innerHTML;
                })

        var value1 = document.getElementById("dashboard_note").value;
    var delta1 = quill.clipboard.convert(value1);

    quill.setContents(delta1, 'silent');
               


// $(document).keypress(function(event){
//           aa=document.getElementById('kt_forms_widget_1_editor');
//           document.getElementById("dashboard_note").value = aa.children[0].getInnerHTML();
// });
function setOpportunitiesTarget() {
    $.ajax({
        type: 'GET',
        url: "{{ route('opportunities_target') }}",
        success: function(result) {
            $('#myModalLgHeading').html('Set Opportunities Target');
            $('#modalBodyLarge').html(result);
            $('#myModalLg').modal('show');
        }
    });
}
function setRpaTarget() {
    $.ajax({
        type: 'GET',
        url: "{{ route('rpa_target') }}",
        success: function(result) {
            $('#myModalLgHeading').html('Set RPA Target');
            $('#modalBodyLarge').html(result);
            $('#myModalLg').modal('show');
        }
    });
}
</script>
@endsection('content')