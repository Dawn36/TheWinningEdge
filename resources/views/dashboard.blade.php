@extends('layouts.main')

@section('content')
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">

            <!--begin::Row-->
            <div class="row gy-5 g-xl-10">
                <div class="col-xl-12">
                    <div class="card mb-5 mb-xl-8 mb-5">
                        <div class="card-body pb-0">
                            <div class="d-flex align-items-center">
                                <div class="d-flex align-items-center flex-grow-1">
                                    <div class="me-5">
                                        @if (Auth::user()->profile_picture)
                                        <img src="{{ asset('/profile/' . Auth::user()->profile_picture) }}" class="dashboard-quill-img h-75px" onerror="this.onerror=null; this.src='/profile/blank.png'" alt="">
                                        @endif
                                    </div>
                                    <div class="d-flex flex-column">
                                        <a href="#" class="text-gray-900 text-hover-primary fs-6 fw-bolder">Hi, {{ucwords(Auth::user()->first_name)}} {{ucwords(Auth::user()->last_name)}}</a>
                                        <span class="text-gray-400 fw-bold">To do list:</span>
                                    </div>
                                </div>
                            </div>
                            <form id="kt_forms_widget_1_form" class="ql-quil ql-quil-plain  p-3 " method="POST" action="{{ route('user_note') }}">
                                @csrf
                                <!--begin::Editor-->
                                <textarea name='note' id='dashboard_note' hidden>{{Auth::user()->note}}</textarea>
                                <div id="kt_forms_widget_1_editor" class="py-6"></div>
                                <div class="separator"></div>
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
                                            <button class="ql-image"></button>
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

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Row-->

            <!--begin::Row-->
            <div class="row gy-5 g-xl-10">
                @if(Auth::user()->hasRole('admin'))
                <div class="col-xl-3">
                    <div class="card overflow-hidden mb-5 mb-xl-10">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-primary svg-icon-3x ms-n1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="black" />
                                    <path d="M12.0006 11.1542C13.1434 11.1542 14.0777 10.22 14.0777 9.0771C14.0777 7.93424 13.1434 7 12.0006 7C10.8577 7 9.92348 7.93424 9.92348 9.0771C9.92348 10.22 10.8577 11.1542 12.0006 11.1542Z" fill="black" />
                                    <path d="M15.5652 13.814C15.5108 13.6779 15.4382 13.551 15.3566 13.4331C14.9393 12.8163 14.2954 12.4081 13.5697 12.3083C13.479 12.2993 13.3793 12.3174 13.3067 12.3718C12.9257 12.653 12.4722 12.7981 12.0006 12.7981C11.5289 12.7981 11.0754 12.653 10.6944 12.3718C10.6219 12.3174 10.5221 12.2902 10.4314 12.3083C9.70578 12.4081 9.05272 12.8163 8.64456 13.4331C8.56293 13.551 8.49036 13.687 8.43595 13.814C8.40875 13.8684 8.41781 13.9319 8.44502 13.9864C8.51759 14.1133 8.60828 14.2403 8.68991 14.3492C8.81689 14.5215 8.95295 14.6757 9.10715 14.8208C9.23413 14.9478 9.37925 15.0657 9.52439 15.1836C10.2409 15.7188 11.1026 15.9999 11.9915 15.9999C12.8804 15.9999 13.7421 15.7188 14.4586 15.1836C14.6038 15.0748 14.7489 14.9478 14.8759 14.8208C15.021 14.6757 15.1661 14.5215 15.2931 14.3492C15.3838 14.2312 15.4655 14.1133 15.538 13.9864C15.5833 13.9319 15.5924 13.8684 15.5652 13.814Z" fill="black" />
                                </svg>
                            </span>
                            <div class="text-gray-900 fw-bolder fs-2 mb-2 mt-5">{{number_format($userCount)}}</div>
                            <div class="fw-bold text-gray-400">Total Admins</div>
                        </div>
                    </div>
                </div>
                @endif
                <div class="col-xl-3">
                    <div class="card overflow-hidden mb-5 mb-xl-10">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-primary svg-icon-3x ms-n1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M16.0173 9H15.3945C14.2833 9 13.263 9.61425 12.7431 10.5963L12.154 11.7091C12.0645 11.8781 12.1072 12.0868 12.2559 12.2071L12.6402 12.5183C13.2631 13.0225 13.7556 13.6691 14.0764 14.4035L14.2321 14.7601C14.2957 14.9058 14.4396 15 14.5987 15H18.6747C19.7297 15 20.4057 13.8774 19.912 12.945L18.6686 10.5963C18.1487 9.61425 17.1285 9 16.0173 9Z" fill="black" />
                                    <rect opacity="0.3" x="14" y="4" width="4" height="4" rx="2" fill="black" />
                                    <path d="M4.65486 14.8559C5.40389 13.1224 7.11161 12 9 12C10.8884 12 12.5961 13.1224 13.3451 14.8559L14.793 18.2067C15.3636 19.5271 14.3955 21 12.9571 21H5.04292C3.60453 21 2.63644 19.5271 3.20698 18.2067L4.65486 14.8559Z" fill="black" />
                                    <rect opacity="0.3" x="6" y="5" width="6" height="6" rx="3" fill="black" />
                                </svg>
                            </span>
                            <div class="text-gray-900 fw-bolder fs-2 mb-2 mt-5">{{number_format($contactCount)}}</div>
                            <div class="fw-bold text-gray-400">Total Contacts</div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="card overflow-hidden mb-5 mb-xl-10">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-primary svg-icon-3x ms-n1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path opacity="0.3" d="M14 3V20H2V3C2 2.4 2.4 2 3 2H13C13.6 2 14 2.4 14 3ZM11 13V11C11 9.7 10.2 8.59995 9 8.19995V7C9 6.4 8.6 6 8 6C7.4 6 7 6.4 7 7V8.19995C5.8 8.59995 5 9.7 5 11V13C5 13.6 4.6 14 4 14V15C4 15.6 4.4 16 5 16H11C11.6 16 12 15.6 12 15V14C11.4 14 11 13.6 11 13Z" fill="black"></path>
                                    <path d="M2 20H14V21C14 21.6 13.6 22 13 22H3C2.4 22 2 21.6 2 21V20ZM9 3V2H7V3C7 3.6 7.4 4 8 4C8.6 4 9 3.6 9 3ZM6.5 16C6.5 16.8 7.2 17.5 8 17.5C8.8 17.5 9.5 16.8 9.5 16H6.5ZM21.7 12C21.7 11.4 21.3 11 20.7 11H17.6C17 11 16.6 11.4 16.6 12C16.6 12.6 17 13 17.6 13H20.7C21.2 13 21.7 12.6 21.7 12ZM17 8C16.6 8 16.2 7.80002 16.1 7.40002C15.9 6.90002 16.1 6.29998 16.6 6.09998L19.1 5C19.6 4.8 20.2 5 20.4 5.5C20.6 6 20.4 6.60005 19.9 6.80005L17.4 7.90002C17.3 8.00002 17.1 8 17 8ZM19.5 19.1C19.4 19.1 19.2 19.1 19.1 19L16.6 17.9C16.1 17.7 15.9 17.1 16.1 16.6C16.3 16.1 16.9 15.9 17.4 16.1L19.9 17.2C20.4 17.4 20.6 18 20.4 18.5C20.2 18.9 19.9 19.1 19.5 19.1Z" fill="black"></path>
                                </svg> </span>
                            <div class="text-gray-900 fw-bolder fs-2 mb-2 mt-5">{{number_format($opportunitiesCount)}}</div>
                            <div class="fw-bold text-gray-400">Total Opportunities</div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="card overflow-hidden mb-10 mb-xl-10">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-primary svg-icon-3x ms-n1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M6 8.725C6 8.125 6.4 7.725 7 7.725H14L18 11.725V12.925L22 9.725L12.6 2.225C12.2 1.925 11.7 1.925 11.4 2.225L2 9.725L6 12.925V8.725Z" fill="black" />
                                    <path opacity="0.3" d="M22 9.72498V20.725C22 21.325 21.6 21.725 21 21.725H3C2.4 21.725 2 21.325 2 20.725V9.72498L11.4 17.225C11.8 17.525 12.3 17.525 12.6 17.225L22 9.72498ZM15 11.725H18L14 7.72498V10.725C14 11.325 14.4 11.725 15 11.725Z" fill="black" />
                                </svg>
                            </span>
                            <div class="text-gray-900 fw-bolder fs-2 mb-2 mt-5">{{number_format($emailTemplateCount)}}</div>
                            <div class="fw-bold text-gray-400">Total Email Templates</div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Row-->

            <!--begin::Row-->
            <div class="row gy-5 g-xl-10">
                <div class="col-xl-6">
                    <div class="card card-xl-stretch mb-xl-8 mb-5">
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder fs-3 mb-1">Revenue Producing Activity - Monthly Target</span>
                                <span class="text-muted fw-bold fs-7">Revenue Producing Activities Target</span>
                            </h3>
                        </div>
                        <div class="card-body py-3">
                            <div class="table-responsive">
                                <table class="table align-middle gs-0 gy-5">
                                    <thead>
                                        <tr>
                                            <th class="p-0 w-50px"></th>
                                            <th class="p-0"></th>
                                            <th class="p-0 min-w-150px"></th>
                                            <th class="p-0"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>
                                                <div class="symbol symbol-50px me-2">
                                                    <span class="symbol-label">
                                                        <img src="{{asset('theme/assets/media/logos/rpa.png')}}" class="h-50 align-self-center" alt="" />
                                                    </span>
                                                </div>
                                            </th>
                                            <td>
                                                <a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-7">Revenue Producing Activities</a>
                                                <span class="text-muted fw-bold d-block fs-8">Due: {{Date('01-m-Y',strtotime('+1 month'))}}</span>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column w-100 me-2">
                                                    <div class="d-flex flex-stack mb-2">
                                                        <span class="text-muted me-2 fs-7 fw-bold">{{round($rpaPercentage,2) >= 100 ? '100' : round($rpaPercentage,2) }}%</span>
                                                    </div>
                                                    <div class="progress h-6px w-100">
                                                        <div class="progress-bar {{round($rpaPercentage,2) >= 100 ? 'bg-sucess' : 'bg-danger'  }}" role="progressbar" style="width: {{round($rpaPercentage,2) >= 100 ? '100' : round($rpaPercentage,2) }}%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-end">
                                                <button class="btn btn-primary btn-sm px-4"  data-bs-toggle="modal" onclick="setRpaTarget()" title="Set RPA Target">Set Target</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-rounded bg-body mt-n10 position-relative py-10">
                                <div class="row g-0 justify-content-center">
                                    <div class="col-auto text-align-last-center mx-5">
                                        <div class="fs-9 fs-sm-7 text-gray-400">Phone Calls</div>
                                        <div class="fs-2 fw-bolder text-gray-800">{{number_format($phoneCallMonth)}}</div>
                                    </div>
                                    <div class="col-auto text-align-last-center mx-5">
                                        <div class="fs-9 fs-sm-7 text-gray-400">Live Conversations</div>
                                        <div class="fs-2 fw-bolder text-gray-800">{{number_format($liveConversationMonth)}}</div>
                                    </div>
                                    <div class="col-auto text-align-last-center mx-5">
                                        <div class="fs-9 fs-sm-7 text-gray-400">Voicemails</div>
                                        <div class="fs-2 fw-bolder text-gray-800">{{number_format($voiceMailCount)}}</div>
                                    </div>
                                    <div class="col-auto text-align-last-center mx-5">
                                        <div class="fs-9 fs-sm-7 text-gray-400">Emails</div>
                                        <div class="fs-2 fw-bolder text-gray-800">{{number_format($emailCount)}}</div>
                                    </div>
                                    <div class="col-auto text-align-last-center mx-5">
                                        <div class="fs-9 fs-sm-7 text-gray-400">Meetings</div>
                                        <div class="fs-2 fw-bolder text-gray-800">{{number_format($meetingCount)}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card card-xl-stretch mb-xl-8 mb-5">
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder fs-3 mb-1">Opportunities - Annual Target</span>
                                <span class="text-muted fw-bold fs-7">Opportunities Target</span>
                            </h3>
                        </div>
                        <div class="card-body py-3">
                            <div class="table-responsive">
                                <table class="table align-middle gs-0 gy-5">
                                    <thead>
                                        <tr>
                                            <th class="p-0 w-50px"></th>
                                            <th class="p-0"></th>
                                            <th class="p-0 min-w-150px"></th>
                                            <th class="p-0"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>
                                                <div class="symbol symbol-50px me-2">
                                                    <span class="symbol-label">
                                                        <img src="{{asset('theme/assets/media/logos/opportunities.png')}}" class="h-50 align-self-center" alt="" />
                                                    </span>
                                                </div>
                                            </th>
                                            <td>
                                                <a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-7">Opportunities Target</a>
                                                <span class="text-muted fw-bold d-block fs-8">Due: {{Date('01-01-Y',strtotime('+1 year'))}}</span>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column w-100 me-2">
                                                    <div class="d-flex flex-stack mb-2">
                                                        <span class="text-muted me-2 fs-7 fw-bold">{{round($percentage,2) >= 100 ? '100' : round($percentage,2) }}%</span>
                                                        <span class="text-muted me-2 fs-7 fw-bold">${{number_format(isset($amount[0]->amount) == 0 ? '0' : $amount[0]->amount)}}/${{number_format(count($opportunitiesTarget) == 0 ? '0' : $opportunitiesTarget[0]->target)}}</span>
                                                    </div>
                                                    <div class="progress h-6px w-100">
                                                        <div class="progress-bar {{round($percentage,2) >= 100 ? 'bg-sucess' : 'bg-danger'  }}" role="progressbar" style="width: {{round($percentage,2) >= 100 ? '100' : round($percentage,2) }}%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>

                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-end">
                                                <button class="btn btn-primary btn-sm px-4" onclick="setOpportunitiesTarget()"title="Set Opportunities Target">Set Target</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-rounded bg-body mt-n10 position-relative py-10">
                                <div class="row g-0 justify-content-center">
                                    <div class="col-auto text-align-last-center mx-5">
                                        <div class="fs-9 fs-sm-7 text-gray-400"># of Opportunities</div>
                                        <div class="fs-2 fw-bolder text-gray-800">{{number_format($opportunitiesCount)}}</div>
                                    </div>
                                    {{-- <div class="col-auto text-align-last-center mx-5">
                                        <div class="fs-9 fs-sm-7 text-gray-400">Average Opportunity Size</div>
                                        <div class="fs-2 fw-bolder text-gray-800">{{number_format((isset($amount[0]->amount) == 0 ? '0' : $amount[0]->amount/$opportunitiesCount),2)}}</div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Row-->

            <!--begin::Row-->
            <div class="row gy-5 g-xl-10">
                <div class="col-xl-12">
                    <div class="card card-xl-stretch mb-xl-8 mb-10">
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder fs-3 mb-1">RPA Statistics</span>
                                <span class="text-muted fw-bold fs-7">RPA by Month</span>
                            </h3>
                        </div>
                        <div class="card-body">
                            <div id="dashboard_chart_1" style="height: 350px;"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Row-->

        </div>
    </div>
</div>



<script>
    $(document).ready(function() {
    // dashboard_chart_1
    var element = document.getElementById("dashboard_chart_1");

    var height = parseInt(KTUtil.css(element, "height"));
    var labelColor = KTUtil.getCssVariableValue("--bs-gray-500");
    var borderColor = KTUtil.getCssVariableValue("--bs-gray-200");
    var primaryColor = KTUtil.getCssVariableValue("--bs-primary");
    var secondaryColor = KTUtil.getCssVariableValue("--bs-gray-400");
    var warningColor = KTUtil.getCssVariableValue("--bs-warning");
    var infoColor = KTUtil.getCssVariableValue("--bs-info");
    var successColor = KTUtil.getCssVariableValue("--bs-success");

    if (!element) {
        return;
    }

    var options = {
        series: [{
                name: "# Of Phone Calls",
                data: <?php echo $phoneCallArr ?>,
            },
            {
                name: "# Of Live Conversations",
                data: <?php echo$liveConversationArr?>,
            },
            {
                name: "# Of Voicemails",
                data: <?php echo$voiceMailArr?>,
            },
            {
                name: "# Of Emails",
                data: <?php echo$emailArr?>,
            },
            {
                name: "# Of Meetings",
                data: <?php echo$meetingArr?>,
            },
        ],
        chart: {
            fontFamily: "inherit",
            type: "bar",
            height: height,
            toolbar: {
                show: false,
            },
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: ["75%"],
                endingShape: "rounded",
                borderRadius: 5,
            },
        },
        legend: {
            // show: false
        },
        dataLabels: {
            enabled: false,
        },
        stroke: {
            show: true,
            width: 1,
            // colors: ['transparent']
        },
        xaxis: {
            categories: [
                "Jan",
                "Feb",
                "Mar",
                "Apr",
                "May",
                "Jun",
                "Jul",
                "Aug",
                "Sep",
                "Oct",
                "Nov",
                "Dec",
            ],
            axisBorder: {
                show: false,
            },
            axisTicks: {
                show: false,
            },
            labels: {
                style: {
                    colors: labelColor,
                    fontSize: "12px",
                },
            },
        },
        yaxis: {
            labels: {
                style: {
                    colors: labelColor,
                    fontSize: "12px",
                },
            },
        },
        fill: {
            opacity: 0.6,
        },
        states: {
            normal: {
                filter: {
                    type: "none",
                    value: 0,
                },
            },
            hover: {
                filter: {
                    type: "none",
                    value: 0,
                },
            },
            active: {
                allowMultipleDataPointsSelection: false,
                filter: {
                    type: "none",
                    value: 0,
                },
            },
        },
        tooltip: {
            style: {
                fontSize: "12px",
            },
            y: {
                formatter: function(val) {
                    return  val ;
                },
            },
        },
        colors: [
            primaryColor,
            secondaryColor,
            warningColor,
            infoColor,
            successColor,
        ],
        grid: {
            borderColor: borderColor,
            strokeDashArray: 4,
            yaxis: {
                lines: {
                    show: true,
                },
            },
        },
    };

    var chart = new ApexCharts(element, options);
    chart.render();

  
});
var quill = new Quill("#kt_forms_widget_1_editor", {
                    modules: {
                        toolbar: {
                            container: "#kt_forms_widget_1_editor_toolbar",
                        },
                    },
                    placeholder: "To do list ?",
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