@extends('layouts.main')

@section('content')
<style>
    @media (min-width:1400px) {

        .container,
        .container-lg,
        .container-md,
        .container-sm,
        .container-xl,
        .container-xxl {
            max-width: 1900px
        }
    }
</style>


<!--begin::Content-->
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
                        <div class="p-10 pb-0">
                            <!--begin::Heading-->
                            <h1 class="anchor fw-bolder mb-5" id="zero-configuration">
                                <a href="javascript:;"></a>Contacts 
                            </h1>
                          
                        </div>
                        <!--begin::Card header-->
                        <div class="card-header border-0">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <!--begin::Search-->
                                <div class="d-flex align-items-center position-relative my-1">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                    <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                                            <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <input type="text" id="search" data-kt-docs-table-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search" />
                                </div>
                                <!--end::Search-->
                            </div>
                            <!--begin::Card title-->
                            <!--begin::Card toolbar-->
                            <div class="card-toolbar">
                                <!--begin::Toolbar-->
                                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base" >
                                    <form id="contact_delete_bulk" method="POST" action="{{ route('contact_delete_bulk') }}">
                                        @csrf
                                        <input hidden id='contact_id_delete_bulk' name="contact_id" value="" />
                                    </form>
                                    <button type="button" class="btn btn-icon btn-danger me-2"  title="Delete" data-bs-toggle="tooltip" data-bs-placement="top" id="delete_contact"  onclick="deleteContactBulk()" style="display: none">
                                        <span class="svg-icon svg-icon-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black"/>
                                                <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black"/>
                                                <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black"/>
                                                </svg>
                                        </span>
                                    </button>
                                    <!-- Start::Update Status -->
                                    <a href="#" class="btn btn-light-dark me-2" title="Update Records" data-bs-toggle="tooltip" data-bs-placement="top" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" id="update_status" style="display: none">
                                        <span class="svg-icon svg-icon-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z" fill="black" />
                                                <path opacity="0.3" d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z" fill="black" />
                                            </svg>
                                            Update Records
                                        </span>
                                    </a>
                                    
                                    <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px mt-2" data-kt-menu="true" id="kt-toolbar-filter">
                                        <div class="px-7 py-5">
                                            <div class="fs-4 text-dark fw-bolder">Update Records</div>
                                        </div>
                                        <div class="separator border-gray-200"></div>
                                        <form id="contact_update" class="form" method="POST" action="{{ route('contact_status_bulk') }}" >
                                            @csrf
                                            <input hidden id='contact_id_status' name="contact_id" value="" />

                                            <div class="px-7 py-5">
                                                <div class="mb-10">
                                                    <label class="form-label fs-5 fw-bold mb-3">Status:</label>
                                                    <select class="form-select form-select-solid fw-bolder" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" name="status" data-dropdown-parent="#kt-toolbar-filter">
                                                        <option value="0">Select Option</option>
                                                        <option value="Current Client" >Current Client</option>
                                                        <option value="Active Discussion" >Active Discussion</option>
                                                        <option value="Not Interested" >Not Interested</option>
                                                        <option value="Unsubscribed" >Unsubscribed</option>
                                                        <option value="Prospect" >Prospect</option>
                                                        <option value="User" >User</option>
                                                    </select>
                                                </div>
                                                <div class="mb-10">
                                                    <label class="form-label fs-5 fw-bold mb-3">Outreach Logs:</label>
                                                    <select class="form-select form-select-solid fw-bolder" name='contact_history' data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-dropdown-parent="#kt-toolbar-filter">
                                                        <option value="0">Select Option</option>
                                                        <option value="phone_call">Phone Calls</option>
                                                        <option value="live_conversation">Conversations</option>
                                                        <option value="voice_mail">Voicemails</option>
                                                        <option value="email">Emails</option>
                                                        <option value="meeting">Meetings</option>
                                                    </select>
                                                </div>
                                                <div class="d-flex justify-content-end">
                                                    <button type="reset" class="btn btn-light btn-active-light-primary me-2" data-kt-menu-dismiss="true" data-kt-customer-table-filter="reset">Reset</button>
                                                    <button type="button" class="btn btn-primary" data-kt-menu-dismiss="true" data-kt-customer-table-filter="filter" onclick="updateStatus()">Apply</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- End::Update Status -->
                                </div>
                                <!--end::Toolbar-->

                                <!--begin::Toolbar-->
                                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                    <!-- Start::Download XLSX -->
                                    <form id="contact_export" method="POST" action="{{ route('contact_export') }}">
                                        @csrf
                                        <input hidden id='contact_id' name="contact_id" value="" />
                                    </form>
                                    <button type="button" class="btn btn-light-dark me-2" title="Download XLSX" data-bs-toggle="tooltip" data-bs-placement="top" onclick="contactExport()" id="download_sheet" style="display: none"> 
                                        <span class="svg-icon svg-icon-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.5" d="M19 15C20.7 15 22 13.7 22 12C22 10.3 20.7 9 19 9C18.9 9 18.9 9 18.8 9C18.9 8.7 19 8.3 19 8C19 6.3 17.7 5 16 5C15.4 5 14.8 5.2 14.3 5.5C13.4 4 11.8 3 10 3C7.2 3 5 5.2 5 8C5 8.3 5 8.7 5.1 9H5C3.3 9 2 10.3 2 12C2 13.7 3.3 15 5 15H19Z" fill="black" />
                                                <path opacity="1" d="M13 17.4V12C13 11.4 12.6 11 12 11C11.4 11 11 11.4 11 12V17.4H13Z" fill="black" />
                                                <path opacity="1" d="M8 17.4H16L12.7 20.7C12.3 21.1 11.7 21.1 11.3 20.7L8 17.4Z" fill="black" />
                                            </svg>
                                            XLSX
                                        </span>
                                    </button>
                                    <!-- End::Download XLSX -->

                                    <!-- Start::Send Email -->
                                    <button type="button" class="btn btn-icon btn-light-dark me-2"  title="Send Email" data-bs-toggle="tooltip" data-bs-placement="top" id="send_email"  onclick="sendEmail()" style="display: none">
                                        <span class="svg-icon svg-icon-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z" fill="black" />
                                                <path d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z" fill="black" />
                                            </svg>
                                        </span>
                                    </button>
                                    <!-- End::Send Email -->
                                    
                                    <!-- Start::Filter -->
                                    <a href="#" class="btn btn-icon btn-light-dark me-2" title="Search by Filter" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-dismiss="click" data-bs-trigger="hover" onclick="filter()">
                                        <span class="svg-icon svg-icon-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="black" />
                                            </svg>
                                        </span>
                                    </a>
                                    <!-- End::Filter -->

                                    <!-- Start::Add Contact -->
                                    <a href="#" class="btn btn-icon btn-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" title="Add Contact" data-bs-toggle="tooltip" data-bs-placement="top">
                                        <span class="svg-icon svg-icon-2hx">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <rect opacity="0.6" x="11" y="18" width="12" height="2" rx="1" transform="rotate(-90 11 18)" fill="black" />
                                                <rect x="6" y="11" width="12" height="2" rx="1" fill="black" />
                                            </svg>
                                        </span>
                                    </a>
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-150px py-4 mt-2" data-kt-menu="true">
                                        <div class="menu-item px-3">
                                            <a type="button" onclick="addContact()" class="menu-link px-3">Add Contact</a>
                                        </div>
                                        <div class="menu-item px-3">
                                            <a type="button" onclick="contactUploader()" class="menu-link px-3">Upload Contacts</a>
                                        </div>
                                    </div>
                                    <!-- End::Add Contact -->
                                </div>
                                <!--end::Toolbar-->
                            </div>
                            
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card Body-->
                        <div class="card-body fs-6 text-gray-700 py-5" id="tags_filter" style="display: none">
                            <div class="row align-items-center gap-2">
                                <div class="d-flex col-lg col-12 pe-0 align-items-center">
                                    <label class="fs-6 fw-bold form-label mb-0 me-2">Tags:</label>
                                    <select class="form-select form-select-solid fw-bolder" id="tag2" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" multiple>
                                        <option></option>
                                        @for($i=0; $i < count($tagsArr); $i++)
                                        <option value="{{$tagsArr[$i]->id}}" >{{ucwords($tagsArr[$i]->name)}}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="d-flex col-auto gap-2">
                                    <button type="button" onclick="filterData2()" class="btn btn-sm btn-primary">Apply</button>
                                    <button type="button" onclick="clearFilter()" class="btn btn-sm btn-light-dark" title="Clear Filter" data-bs-toggle="tooltip" data-bs-placement="top">Clear Filter</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body fs-6 py-lg-5 text-gray-700">

                            <!--begin::Block-->
                            <div class="py-5">
                                <table class=" table table-row-bordered gy-5" id="contactTable">
                                    <thead>
                                        <tr class="fw-bold fs-6 text-muted">
                                            <th >
                                                <div class="form-check form-check-custom form-check-solid form-check-sm">
                                                <input id="select_all" class="form-check-input" value="" type="checkbox">
                                                </div>
                                            </th>
                                            {{-- <th class="min-w-30px">ID</th> --}}
                                            <th>Full Name</th>
                                            <th>Email & Phone</th>
                                            <th>Company</th>
                                            <th>Status</th>
                                            <th># Of Phone Calls</th>
                                            <th># Of Live Conversations</th>
                                            <th># Of Voicemails</th>
                                            <th># Of Emails</th>
                                            <th># Of Meetings Scheduled</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="fw-bold text-gray-600">
                                        {{-- @for ($i = 0; $i < count($contact); $i++) @php $a=$i; $a++; @endphp 
                                        <tr>
                                            <td>
                                                <div class="form-check form-check-custom form-check-solid form-check-sm">
                                                <input  id="checkbox" class="form-check-input" name="checkbox" value="{{$contact[$i]->id}}" type="checkbox" onclick="Check(this)">
                                                </div>
                                            </td>
                                            <td><a href="{{route('contact.show',$contact[$i]->id)}}" class="fw-bolder text-gray-800 text-hover-primary mb-1">{{$a}}</a></td>
                                            <td><a href="{{route('contact.show',$contact[$i]->id)}}" class="fw-bolder text-gray-800 text-hover-primary mb-1">{{ucwords($contact[$i]->first_name)}} {{ucwords($contact[$i]->last_name)}}</a>
                                            <br>
                                            <a href="{{route('contact.show',$contact[$i]->id)}}" class="fw-normal text-gray-800 text-hover-primary mb-1">{{ucwords($contact[$i]->job)}}</a></td>
                                            <td><a href="mailto:{{$contact[$i]->email_address}}" class="fw-bolder text-gray-800 text-hover-primary mb-1" onclick="getEmailObj('email','{{$contact[$i]->id}}',this)">{{$contact[$i]->email_address}}</a>
                                                <br>
                                                <a href="{{route('contact.show',$contact[$i]->id)}}" class="fw-normal text-gray-800 text-hover-primary mb-1"><span class="fw-bolder">{{$contact[$i]->phone_number == '' ? '' : "(D)"}} </span>{{$contact[$i]->phone_number == '' ? '' : $contact[$i]->phone_number}} </a>
                                                <br>
                                                <a href="{{route('contact.show',$contact[$i]->id)}}" class="fw-normal text-gray-800 text-hover-primary mb-1"><span class="fw-bolder">{{$contact[$i]->mobile_phone == '' ? '' : "(M)"}}</span>{{$contact[$i]->mobile_phone == '' ? '' : $contact[$i]->mobile_phone}} </a>
                                            </td>
                                            @php $status=explode('_',$contact[$i]->status) @endphp
                                            <td>{{ucwords($contact[$i]->company_name)}}</td>
                                            <td>{{ ucwords($status[0]) }} {{ count($status) == "2" ? ucwords($status[1] ) : '' }}</td>
                                            <td>
                                                <center>
                                                    <a  onclick="addContactCounter('phone_call','{{$contact[$i]->id}}',this)" style="cursor: pointer;">
                                                        <div class="border border-gray-300 border-dashed rounded py-1 px-1 text-center" style="width: 110px;">
                                                            <div class="fs-5 fw-bolder text-gray-700">
                                                                <span class="w-50px fs-5">{{$contact[$i]->phone_call}}</span>
                                                                <span class="svg-icon svg-icon-3 svg-icon-success">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                        <rect opacity="0.8" x="11" y="18" width="12" height="2" rx="1" transform="rotate(-90 11 18)" fill="black" />
                                                                        <rect x="6" y="11" width="12" height="2" rx="1" fill="black" />
                                                                    </svg>
                                                                </span>
                                                            </div>
                                                            <div class="fw-bold text-muted fs-8">{{$contact[$i]->last_phone_call == '' ? '' : Date("m/d/Y h:i A",strtotime($contact[$i]->last_phone_call))}}</div>
                                                        </div>
                                                    </a>
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                    <a  onclick="addContactCounter('live_conversation','{{$contact[$i]->id}}',this)" style="cursor: pointer;">
                                                        <div class="border border-gray-300 border-dashed rounded py-1 px-1 text-center" style="width: 110px;">
                                                            <div class="fs-5 fw-bolder text-gray-700">
                                                                <span class="w-50px fs-5">{{$contact[$i]->live_conversation}}</span>
                                                                <span class="svg-icon svg-icon-3 svg-icon-success">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                        <rect opacity="0.8" x="11" y="18" width="12" height="2" rx="1" transform="rotate(-90 11 18)" fill="black" />
                                                                        <rect x="6" y="11" width="12" height="2" rx="1" fill="black" />
                                                                    </svg>
                                                                </span>
                                                            </div>
                                                            <div class="fw-bold text-muted fs-8">{{$contact[$i]->last_live_conversation == '' ? '' : Date("m/d/Y h:i A",strtotime($contact[$i]->last_live_conversation))}}</div>
                                                        </div>
                                                    </a>
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                    <a  onclick="addContactCounter('voice_mail','{{$contact[$i]->id}}',this)" style="cursor: pointer;">
                                                        <div class="border border-gray-300 border-dashed rounded py-1 px-1 text-center" style="width: 110px;">
                                                            <div class="fs-5 fw-bolder text-gray-700">
                                                                <span class="w-50px fs-5">{{$contact[$i]->voic_mail}}</span>
                                                                <span class="svg-icon svg-icon-3 svg-icon-success">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                        <rect opacity="0.8" x="11" y="18" width="12" height="2" rx="1" transform="rotate(-90 11 18)" fill="black" />
                                                                        <rect x="6" y="11" width="12" height="2" rx="1" fill="black" />
                                                                    </svg>
                                                                </span>
                                                            </div>
                                                            <div class="fw-bold text-muted fs-8">{{$contact[$i]->last_voic_mail == '' ? '' : Date("m/d/Y h:i A",strtotime($contact[$i]->last_voic_mail))}}</div>
                                                        </div>
                                                    </a>
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                    <a  onclick="addContactCounter('email','{{$contact[$i]->id}}',this)" style="cursor: pointer;">
                                                        <div class="border border-gray-300 border-dashed rounded py-1 px-1 text-center" style="width: 110px;">
                                                            <div class="fs-5 fw-bolder text-gray-700">
                                                                <span class="w-50px fs-5">{{$contact[$i]->email}}</span>
                                                                <span class="svg-icon svg-icon-3 svg-icon-success">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                        <rect opacity="0.8" x="11" y="18" width="12" height="2" rx="1" transform="rotate(-90 11 18)" fill="black" />
                                                                        <rect x="6" y="11" width="12" height="2" rx="1" fill="black" />
                                                                    </svg>
                                                                </span>
                                                            </div>
                                                            <div class="fw-bold text-muted fs-8">{{$contact[$i]->last_email == '' ? '' : Date("m/d/Y h:i A",strtotime($contact[$i]->last_email))}}</div>
                                                        </div>
                                                    </a>
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                    <a  onclick="addContactCounter('meeting','{{$contact[$i]->id}}',this)" style="cursor: pointer;">
                                                        <div class="border border-gray-300 border-dashed rounded py-1 px-1 text-center" style="width: 110px;">
                                                            <div class="fs-5 fw-bolder text-gray-700">
                                                                <span class="w-50px fs-5">{{$contact[$i]->meeting}}</span>
                                                                <span class="svg-icon svg-icon-3 svg-icon-success">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                        <rect opacity="0.8" x="11" y="18" width="12" height="2" rx="1" transform="rotate(-90 11 18)" fill="black" />
                                                                        <rect x="6" y="11" width="12" height="2" rx="1" fill="black" />
                                                                    </svg>
                                                                </span>
                                                            </div>
                                                            <div class="fw-bold text-muted fs-8">{{$contact[$i]->last_meeting == '' ? '' : Date("m/d/Y h:i A",strtotime($contact[$i]->last_meeting))}}</div>
                                                        </div>
                                                    </a>
                                                </center>
                                            </td>
                                            <td >
                                                <button  class="btn btn-icon btn-sm btn-color-gray-400 btn-active-icon-primary" data-bs-original-title="Add a Task" data-bs-toggle="tooltip" data-bs-placement="top" onclick="addTaskContact('{{$contact[$i]->id}}')">
                                                    <span class="svg-icon svg-icon-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                            <path opacity="0.3" d="M17.1 10.5H11.1C10.5 10.5 10.1 10.1 10.1 9.5V8.5C10.1 7.9 10.5 7.5 11.1 7.5H17.1C17.7 7.5 18.1 7.9 18.1 8.5V9.5C18.1 10.1 17.7 10.5 17.1 10.5ZM22.1 4.5V3.5C22.1 2.9 21.7 2.5 21.1 2.5H11.1C10.5 2.5 10.1 2.9 10.1 3.5V4.5C10.1 5.1 10.5 5.5 11.1 5.5H21.1C21.7 5.5 22.1 5.1 22.1 4.5ZM22.1 15.5V14.5C22.1 13.9 21.7 13.5 21.1 13.5H11.1C10.5 13.5 10.1 13.9 10.1 14.5V15.5C10.1 16.1 10.5 16.5 11.1 16.5H21.1C21.7 16.5 22.1 16.1 22.1 15.5ZM18.1 20.5V19.5C18.1 18.9 17.7 18.5 17.1 18.5H11.1C10.5 18.5 10.1 18.9 10.1 19.5V20.5C10.1 21.1 10.5 21.5 11.1 21.5H17.1C17.7 21.5 18.1 21.1 18.1 20.5Z" fill="black" />
                                                            <path d="M5.60001 10.5C5.30001 10.5 5.00002 10.4 4.80002 10.2C4.60002 9.99995 4.5 9.70005 4.5 9.30005V5.40002C3.7 5.90002 3.40001 6 3.10001 6C2.90001 6 2.6 5.89995 2.5 5.69995C2.3 5.49995 2.20001 5.3 2.20001 5C2.20001 4.6 2.4 4.40005 2.5 4.30005C2.6 4.20005 2.80001 4.10002 3.10001 3.90002C3.50001 3.70002 3.8 3.50005 4 3.30005C4.2 3.10005 4.40001 2.89995 4.60001 2.69995C4.80001 2.39995 4.9 2.19995 5 2.19995C5.1 2.09995 5.30001 2 5.60001 2C5.90001 2 6.10002 2.10002 6.30002 2.40002C6.50002 2.60002 6.5 2.89995 6.5 3.19995V9C6.6 10.4 5.90001 10.5 5.60001 10.5ZM7.10001 21.5C7.40001 21.5 7.69999 21.4 7.89999 21.2C8.09999 21 8.20001 20.8 8.20001 20.5C8.20001 20.2 8.10002 19.9 7.80002 19.8C7.60002 19.6 7.3 19.6 7 19.6H5.10001C5.30001 19.4 5.50002 19.2 5.80002 19C6.30002 18.6 6.69999 18.3 6.89999 18.1C7.09999 17.9 7.40001 17.6 7.60001 17.2C7.80001 16.8 8 16.3 8 15.9C8 15.6 7.90002 15.3 7.80002 15C7.70002 14.7 7.50002 14.5 7.30002 14.2C7.10002 14 6.80001 13.8 6.60001 13.7C6.20001 13.5 5.70001 13.4 5.10001 13.4C4.60001 13.4 4.20002 13.5 3.80002 13.6C3.40002 13.7 3.09999 13.9 2.89999 14.2C2.69999 14.4 2.50002 14.7 2.30002 15C2.20002 15.3 2.10001 15.6 2.10001 15.9C2.10001 16.3 2.29999 16.5 2.39999 16.6C2.59999 16.8 2.80001 16.9 3.10001 16.9C3.50001 16.9 3.70002 16.7 3.80002 16.6C3.90002 16.4 4.00001 16.2 4.10001 16C4.20001 15.8 4.20001 15.7 4.20001 15.7C4.40001 15.4 4.59999 15.3 4.89999 15.3C4.99999 15.3 5.20002 15.3 5.30002 15.4C5.40002 15.5 5.50001 15.5 5.60001 15.7C5.70001 15.8 5.70001 15.9 5.70001 16.1C5.70001 16.2 5.70001 16.4 5.60001 16.6C5.50001 16.8 5.40001 16.9 5.20001 17.1C5.00001 17.3 4.80001 17.5 4.60001 17.6C4.40001 17.7 4.20002 17.9 3.80002 18.3C3.40002 18.6 3.00001 19 2.60001 19.5C2.50001 19.6 2.30001 19.8 2.20001 20.1C2.10001 20.4 2 20.6 2 20.7C2 21 2.10002 21.3 2.30002 21.5C2.50002 21.7 2.80001 21.8 3.20001 21.8H7.10001V21.5Z" fill="black" />
                                                        </svg> </span>
                                                </button>
                                                <button onclick="editContact('{{$contact[$i]->id}}',this)" class="btn btn-icon btn-sm btn-color-gray-400 btn-active-icon-primary"  data-bs-original-title="Edit Contact" data-bs-toggle="tooltip" data-bs-placement="top">
                                                    <span class="svg-icon svg-icon-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                            <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black"></path>
                                                            <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black"></path>
                                                        </svg>
                                                    </span>
                                                </button>
                                                <form  style="display: inline-block" method="POST" action="{{ route('contact.destroy', $contact[$i]->id) }}">
                                                    @method('DELETE')
                                                    @csrf
                                                <button type="submit" class="btn btn-icon btn-sm btn-color-gray-400 btn-active-icon-danger" data-bs-toggle="tooltip" data-bs-original-title="Delete Contact" data-bs-placement="top">
                                                    <span class="svg-icon svg-icon-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                            <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black"></path>
                                                            <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black"></path>
                                                            <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black"></path>
                                                        </svg>
                                                    </span>
                                                </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endfor --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--end::Card Body-->
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
<!--end::Content-->
<script type="text/javascript">
$(document).ready(function(){
// Initialize
dt =  $('#contactTable').DataTable({
    
    processing: true,
    serverSide: true,
    scrollX:        true,
    fixedHeader: {
            header: true,
            headerOffset: 65,
            },
    // order: [[0, 'desc']],
    // ajax: "{{ route('get_contact') }}",
    ajax: {
          url: "{{ route('get_contact') }}",
          data: function (d) {
                d.tags = $('#tag2').val(),
                d.company_id = $('#company_id').val()
                d.contact_status = $('#contact_status').val()
                d.search_new = $('#searchNew').val()
            }
        },
    columns: [
        { data: 'id', name: 'id' ,searchable: false,},
        { data: 'first_name' , name: 'first_name' },
        { data: 'email_address' , name: 'email_address' },
        { data: 'company_name' , name: 'company_name' },
        { data: 'status' , name: 'status' },
        { data: 'phone_call' , name: 'phone_call' },
        { data: 'live_conversation' , name: 'live_conversation' },
        { data: 'voic_mail' , name: 'voic_mail' },
        { data: 'email' , name: 'email' },
        { data: 'meeting' , name: 'meeting' },
        { data: '',searchable: false},
    ],
    columnDefs: [
                {
                    targets: 0,
                    orderable: false,
                    render: function (data, type, row) {
                        return `
                        <div class="form-check form-check-custom form-check-solid form-check-sm">
                            <input  id="checkbox" class="form-check-input" name="checkbox" value="${row.id}" type="checkbox" onclick="Check(this)">
                        </div>
                        `;
                    }
                },
                {
                    targets: 1,
                    render: function (data, type, row) {
                        var url = "{{route('contact.show',':id')}}";
                        url = url.replace(':id', row.id);
                        return `
                        <a href="${url}" class="fw-bolder text-gray-800 text-hover-primary mb-1">${row.first_name} ${row.last_name}</a>
                        <br>
                        <a href="${url}" class="fw-normal text-gray-800 text-hover-primary mb-1">${row.job == null ? "" : row.job}</a>
                        `;
                    }
                },
                {
                    targets: 2,
                    render: function (data, type, row) {
                        var url = "{{route('contact.show',':id')}}";
                        url = url.replace(':id', row.id);
                        return `<a href="mailto:${row.email_address}" class="fw-bolder text-gray-800 text-hover-primary mb-1" onclick="getEmailObj('email','${row.id}',this)">${row.email_address == null ? "" : row.email_address}</a>
                        <br ${row.phone_number  == null ? 'hidden' : ""}>
                        <a href="${url}" class="fw-normal text-gray-800 text-hover-primary mb-1" ${row.phone_number  == null ? 'hidden' : ""}><span class="fw-bolder" >${row.phone_number  == null ? '' : "(D)"} </span>${row.phone_number  == null ? '' : row.phone_number} </a>
                        <br>
                        <a href="${url}" class="fw-normal text-gray-800 text-hover-primary mb-1"><span class="fw-bolder">${row.mobile_phone == null ? '' : "(M)" }</span>${row.mobile_phone  == null ? '' : row.mobile_phone} </a>`;
                    }
                },
                {
                    targets: 4,
                    render: function (data, type, row) {
                        return `<td>
                                    <div class="badge badge-sm badge-light-primary d-inline cursor-pointer" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" onclick="showAndHid(this)">${row.status == null ? "" : row.status}</div>
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3" data-kt-menu="true" style="position: absolute;">
                                        <div class="menu-item px-3">
                                            <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Update Contact Status</div>
                                        </div>
                                        <div class="menu-item px-3">
                                            <a class="menu-link px-3" onclick="contactStatusUpdate('Current Client',${row.id},this)">Current Client</a>
                                        </div>
                                        <div class="menu-item px-3">
                                            <a class="menu-link px-3" onclick="contactStatusUpdate('Active Discussion',${row.id},this)">Active Discussion</a>
                                        </div>
                                        <div class="menu-item px-3">
                                            <a class="menu-link px-3" onclick="contactStatusUpdate('Not Interested',${row.id},this)">Not Interested</a>
                                        </div>
                                        <div class="menu-item px-3">
                                            <a class="menu-link px-3" onclick="contactStatusUpdate('Unsubscribed',${row.id},this)">Unsubscribed</a>
                                        </div>
                                        <div class="menu-item px-3">
                                            <a class="menu-link px-3" onclick="contactStatusUpdate('Prospect',${row.id},this)">Prospect</a>
                                        </div>
                                        <div class="menu-item px-3">
                                            <a class="menu-link px-3" onclick="contactStatusUpdate('User',${row.id},this)">User</a>
                                        </div>
                                    </div>
                                </td>`;
                    }
                },
                {
                    targets: 5,
                    render: function (data, type, row) {
                        return `<center>
                                <a  onclick="addContactCounter('phone_call','${row.id}',this)" style="cursor: pointer;">
                                    <div class="border border-gray-300 border-dashed rounded py-1 px-1 text-center" style="width: 110px;">
                                        <div class="fs-5 fw-bolder text-gray-700">
                                            <span class="w-50px fs-5">${row.phone_call}</span>
                                            <span class="svg-icon svg-icon-3 svg-icon-success">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <rect opacity="0.8" x="11" y="18" width="12" height="2" rx="1" transform="rotate(-90 11 18)" fill="black" />
                                                    <rect x="6" y="11" width="12" height="2" rx="1" fill="black" />
                                                </svg>
                                            </span>
                                        </div>
                                        <div class="fw-bold text-muted fs-8">${row.last_phone_call == null ? '' : row.last_phone_call}</div>
                                    </div>
                                </a>
                            </center>`;
                    }
                },
                {
                    targets: 6,
                    render: function (data, type, row) {
                        return `<center>
                                    <a  onclick="addContactCounter('live_conversation','${row.id}',this)" style="cursor: pointer;">
                                        <div class="border border-gray-300 border-dashed rounded py-1 px-1 text-center" style="width: 110px;">
                                            <div class="fs-5 fw-bolder text-gray-700">
                                                <span class="w-50px fs-5">${row.live_conversation}</span>
                                                <span class="svg-icon svg-icon-3 svg-icon-success">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.8" x="11" y="18" width="12" height="2" rx="1" transform="rotate(-90 11 18)" fill="black" />
                                                        <rect x="6" y="11" width="12" height="2" rx="1" fill="black" />
                                                    </svg>
                                                </span>
                                            </div>
                                            <div class="fw-bold text-muted fs-8">${row.last_live_conversation == null ? '' : row.last_live_conversation}</div>
                                        </div>
                                    </a>
                                </center>`;
                    }
                },
                {
                    targets: 7,
                    render: function (data, type, row) {
                        return `<center>
                                    <a  onclick="addContactCounter('voice_mail','${row.id}',this)" style="cursor: pointer;">
                                        <div class="border border-gray-300 border-dashed rounded py-1 px-1 text-center" style="width: 110px;">
                                            <div class="fs-5 fw-bolder text-gray-700">
                                                <span class="w-50px fs-5">${row.voic_mail}</span>
                                                <span class="svg-icon svg-icon-3 svg-icon-success">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.8" x="11" y="18" width="12" height="2" rx="1" transform="rotate(-90 11 18)" fill="black" />
                                                        <rect x="6" y="11" width="12" height="2" rx="1" fill="black" />
                                                    </svg>
                                                </span>
                                            </div>
                                            <div class="fw-bold text-muted fs-8">${row.last_voic_mail == null ? '' : row.last_voic_mail}</div>
                                        </div>
                                    </a>
                                </center>`;
                    }
                },
                {
                    targets: 8,
                    render: function (data, type, row) {
                        return `<center>
                                    <a  onclick="addContactCounter('email','${row.id}',this)" style="cursor: pointer;">
                                        <div class="border border-gray-300 border-dashed rounded py-1 px-1 text-center" style="width: 110px;">
                                            <div class="fs-5 fw-bolder text-gray-700">
                                                <span class="w-50px fs-5">${row.email}</span>
                                                <span class="svg-icon svg-icon-3 svg-icon-success">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.8" x="11" y="18" width="12" height="2" rx="1" transform="rotate(-90 11 18)" fill="black" />
                                                        <rect x="6" y="11" width="12" height="2" rx="1" fill="black" />
                                                    </svg>
                                                </span>
                                            </div>
                                            <div class="fw-bold text-muted fs-8">${row.last_email == null ? '' : row.last_email}</div>
                                        </div>
                                    </a>
                                </center>`;
                    }
                },
                {
                    targets: 9,
                    render: function (data, type, row) {
                        return ` <center>
                                    <a  onclick="addContactCounter('meeting','${row.id}',this)" style="cursor: pointer;">
                                        <div class="border border-gray-300 border-dashed rounded py-1 px-1 text-center" style="width: 110px;">
                                            <div class="fs-5 fw-bolder text-gray-700">
                                                <span class="w-50px fs-5">${row.meeting}</span>
                                                <span class="svg-icon svg-icon-3 svg-icon-success">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.8" x="11" y="18" width="12" height="2" rx="1" transform="rotate(-90 11 18)" fill="black" />
                                                        <rect x="6" y="11" width="12" height="2" rx="1" fill="black" />
                                                    </svg>
                                                </span>
                                            </div>
                                            <div class="fw-bold text-muted fs-8">${row.last_meeting == null ? '' : row.last_meeting}</div>
                                        </div>
                                    </a>
                                </center>`;
                    }
                },
                {
                    
                    targets: 10,
                    orderable: false,
                    render: function (data, type, row) {
                        var url = "{{route('contact.destroy',':id')}}";
                        url = url.replace(':id', row.id);
                        return `<button  class="btn btn-icon btn-sm btn-color-gray-400 btn-active-icon-primary" data-bs-original-title="Add a Task" data-bs-toggle="tooltip" data-bs-placement="top" onclick="addTaskContact('${row.id}')">
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3" d="M17.1 10.5H11.1C10.5 10.5 10.1 10.1 10.1 9.5V8.5C10.1 7.9 10.5 7.5 11.1 7.5H17.1C17.7 7.5 18.1 7.9 18.1 8.5V9.5C18.1 10.1 17.7 10.5 17.1 10.5ZM22.1 4.5V3.5C22.1 2.9 21.7 2.5 21.1 2.5H11.1C10.5 2.5 10.1 2.9 10.1 3.5V4.5C10.1 5.1 10.5 5.5 11.1 5.5H21.1C21.7 5.5 22.1 5.1 22.1 4.5ZM22.1 15.5V14.5C22.1 13.9 21.7 13.5 21.1 13.5H11.1C10.5 13.5 10.1 13.9 10.1 14.5V15.5C10.1 16.1 10.5 16.5 11.1 16.5H21.1C21.7 16.5 22.1 16.1 22.1 15.5ZM18.1 20.5V19.5C18.1 18.9 17.7 18.5 17.1 18.5H11.1C10.5 18.5 10.1 18.9 10.1 19.5V20.5C10.1 21.1 10.5 21.5 11.1 21.5H17.1C17.7 21.5 18.1 21.1 18.1 20.5Z" fill="black" />
                                            <path d="M5.60001 10.5C5.30001 10.5 5.00002 10.4 4.80002 10.2C4.60002 9.99995 4.5 9.70005 4.5 9.30005V5.40002C3.7 5.90002 3.40001 6 3.10001 6C2.90001 6 2.6 5.89995 2.5 5.69995C2.3 5.49995 2.20001 5.3 2.20001 5C2.20001 4.6 2.4 4.40005 2.5 4.30005C2.6 4.20005 2.80001 4.10002 3.10001 3.90002C3.50001 3.70002 3.8 3.50005 4 3.30005C4.2 3.10005 4.40001 2.89995 4.60001 2.69995C4.80001 2.39995 4.9 2.19995 5 2.19995C5.1 2.09995 5.30001 2 5.60001 2C5.90001 2 6.10002 2.10002 6.30002 2.40002C6.50002 2.60002 6.5 2.89995 6.5 3.19995V9C6.6 10.4 5.90001 10.5 5.60001 10.5ZM7.10001 21.5C7.40001 21.5 7.69999 21.4 7.89999 21.2C8.09999 21 8.20001 20.8 8.20001 20.5C8.20001 20.2 8.10002 19.9 7.80002 19.8C7.60002 19.6 7.3 19.6 7 19.6H5.10001C5.30001 19.4 5.50002 19.2 5.80002 19C6.30002 18.6 6.69999 18.3 6.89999 18.1C7.09999 17.9 7.40001 17.6 7.60001 17.2C7.80001 16.8 8 16.3 8 15.9C8 15.6 7.90002 15.3 7.80002 15C7.70002 14.7 7.50002 14.5 7.30002 14.2C7.10002 14 6.80001 13.8 6.60001 13.7C6.20001 13.5 5.70001 13.4 5.10001 13.4C4.60001 13.4 4.20002 13.5 3.80002 13.6C3.40002 13.7 3.09999 13.9 2.89999 14.2C2.69999 14.4 2.50002 14.7 2.30002 15C2.20002 15.3 2.10001 15.6 2.10001 15.9C2.10001 16.3 2.29999 16.5 2.39999 16.6C2.59999 16.8 2.80001 16.9 3.10001 16.9C3.50001 16.9 3.70002 16.7 3.80002 16.6C3.90002 16.4 4.00001 16.2 4.10001 16C4.20001 15.8 4.20001 15.7 4.20001 15.7C4.40001 15.4 4.59999 15.3 4.89999 15.3C4.99999 15.3 5.20002 15.3 5.30002 15.4C5.40002 15.5 5.50001 15.5 5.60001 15.7C5.70001 15.8 5.70001 15.9 5.70001 16.1C5.70001 16.2 5.70001 16.4 5.60001 16.6C5.50001 16.8 5.40001 16.9 5.20001 17.1C5.00001 17.3 4.80001 17.5 4.60001 17.6C4.40001 17.7 4.20002 17.9 3.80002 18.3C3.40002 18.6 3.00001 19 2.60001 19.5C2.50001 19.6 2.30001 19.8 2.20001 20.1C2.10001 20.4 2 20.6 2 20.7C2 21 2.10002 21.3 2.30002 21.5C2.50002 21.7 2.80001 21.8 3.20001 21.8H7.10001V21.5Z" fill="black" />
                                        </svg> </span>
                                </button>
                                <button onclick="editContact('${row.id}',this)" class="btn btn-icon btn-sm btn-color-gray-400 btn-active-icon-primary"  data-bs-original-title="Edit Contact" data-bs-toggle="tooltip" data-bs-placement="top">
                                    <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black"></path>
                                            <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </button>
                                <button type="button" onclick=deleteContact('${url}',this) class="btn btn-icon btn-sm btn-color-gray-400 btn-active-icon-danger" data-bs-toggle="tooltip" data-bs-original-title="Delete Contact" data-bs-placement="top">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black"></path>
                                            <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black"></path>
                                            <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </button>
                                `;
                    }
                },
                
            ],
    aLengthMenu: [
        [10,25, 50, 100, 200, -1],
        [10,25, 50, 100, 200, "All"]
    ]
});
table = dt.$;  
       
});
var handleSearchDatatable = function () {
        const filterSearch = document.querySelector('[data-kt-docs-table-filter="search"]');
        filterSearch.addEventListener('keyup', function (e) {
            dt.search(e.target.value).draw();
        });
    }
    handleSearchDatatable();

var contactArray = [];
function contactExport()
{
    if(contactArray.length == 0)
    {
        alert("Please select contact");
        return false;
    }
    contactArraya=JSON.stringify(contactArray);
    $('#contact_id').val(contactArraya);
    if($('#contact_id').val())
    {
        $('#contact_export').submit();
    }
    
}
function deleteContactBulk()
{
    if(contactArray.length == 0)
    {
        alert("Please select contact");
        return false;
    }
    contactArraya=JSON.stringify(contactArray);
    $('#contact_id_delete_bulk').val(contactArraya);
    if($('#contact_id_delete_bulk').val())
    {
        sweetAlertDelete()
    }
}
function sweetAlertDelete()
    {
        Swal.fire({
        title: "Are you sure you want to delete contacts?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, delete it!",
        customClass: {
            confirmButton: "btn btn-danger",
            cancelButton: "btn btn-default"
            }
    }).then(function(result) {
        if (result.value) {
            Swal.fire(
                "Deleted!",
                "Your Contact has been deleted.",
                "success"
            )
            $('#contact_delete_bulk').submit();
        }
    });
    }
function updateStatus()
{
    if(contactArray.length == 0)
    {
        alert("Please select contact");
        return false;
    }
    contactArraya=JSON.stringify(contactArray);
    $('#contact_id_status').val(contactArraya);
    if($('#contact_id_status').val())
    {
        // $('#contact_update').submit();
        contactStatusAndOutreachUpdate();
    }

    
}
function sendEmail()
{
    if(contactArray.length == 0)
    {
        alert("Please select contact");
        return false;
    }
    contactArray=JSON.stringify(contactArray);
    var value = {
            contactId:contactArray
        };
        $.ajax({
            type: 'GET',
            url: "{{ route('contact_email_template') }}",
            data: value,
            success: function(result) {
                $('#myModalLgHeading').html('Email Template');
                $('#modalBodyLarge').html(result);
                $('#myModalLg').modal('show');
            }
        });
    
}
function filter() {
        $.ajax({
            type: 'GET',
            url: "{{ route('contact_filter') }}",
            success: function(result) {
                var drawerElement = document.querySelector("#right_modal");
                var drawer = KTDrawer.getInstance(drawerElement);
                $('#right_modal_header').html('Search by Filter');
                $('#right_modal_body').html(result);
                drawer.toggle();
            }
        });
    }



$('#select_all').click(function(event) {
    if (this.checked) {
    $("#send_email").css("display", "block");
    $("#delete_contact").css("display", "block");
    $("#download_sheet").css("display", "block");
    $("#update_status").css("display", "block");
    
        // Iterate each checkbox
        $(':checkbox').each(function() {
            this.checked = true;
        });
    } else {
    $("#send_email").css("display", "none");
    $("#delete_contact").css("display", "none");
    $("#download_sheet").css("display", "none");
    $("#update_status").css("display", "none");

        $(':checkbox').each(function() {
            this.checked = false;
        });
    }
    Check();
});

function Check(obj) {
    contactArray = [];
    $.each($("input[name='checkbox']:checked"), function() {
        if (!contactArray.includes($(this).val())) {
            contactArray.push($(this).val());
        }
    });
    if(contactArray.length == 0)
    {
        $("#send_email").css("display", "none");
        $("#delete_contact").css("display", "none");
        $("#download_sheet").css("display", "none");
        $("#update_status").css("display", "none");
    }
    else
    {
        $("#send_email").css("display", "block");
        $("#delete_contact").css("display", "block");
        $("#download_sheet").css("display", "block");
        $("#update_status").css("display", "block");
    }

    console.log(contactArray);

}


    function contactUploader() {
        $.ajax({
            type: 'GET',
            url: "{{ route('contact_upload') }}",
            success: function(result) {
                $('#myModalLgHeading').html('Upload Contacts');
                $('#modalBodyLarge').html(result);
                $('#myModalLg').modal('show');
            }
        });
    }
    function addContact() {
        $.ajax({
            type: 'GET',
            url: "{{ route('contact.create') }}",
            success: function(result) {
                $('#myModalLgHeading').html('Add Contact');
                $('#modalBodyLarge').html(result);
                $('#myModalLg').modal('show');
            }
        });
    }
    var obj2='';
    function editContact(id,obj) {
        obj2=obj;
        
        url = "{{route('contact.edit',':id')}}";
        url = url.replace(':id', id);
        $.ajax({
            type: 'GET',
            url: url,
            success: function(result) {
                $('#myModalLgHeading').html('Edit Contact');
                $('#modalBodyLarge').html(result);
                $('#myModalLg').modal('show');
            }
        });
    }

    function getEmailObj(status,contactsId,obj)
    {
        obj=obj.parentElement.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.children[0].children[0];
        addContactCounter(status,contactsId,obj);
    }
    function addContactCounter(status,contactsId,obj) {
        valueCount=obj.children[0].children[0].children[0].textContent;
        valueCount++;
        var value = {
            status: status,
            value: valueCount,
            contacts_id:contactsId
        };
        $.ajax({
            type: 'GET',
            url: "{{ route('contact_counter') }}",
            data: value,
            success: function(result) {
                value=obj.children[0].children[0].children[0].textContent;
                value++;
                obj.children[0].children[0].children[0].textContent=value;
                const d = new Date();
                month=d.getMonth() + 1;
                obj.children[0].children[1].textContent=+month+"/"+d.getDate()+"/"+d.getFullYear()+" "+" "+formatAMPM(new Date);
               
            }
        });
    }
    function deleteContact(url, obj)
    {
        $.ajax({
                url: url,
                type:'POST',
                data:{ 
                    _token:'{{ csrf_token() }}',
                    _method:'DELETE',
                },
                success: function(result){
                    obj.parentElement.parentElement.remove();
                }
            })
    }

    function formatAMPM(date) {
        
  var hours = date.getHours();
  var minutes = date.getMinutes();
  var seconds = date.getSeconds();
  var ampm = hours >= 12 ? 'pm' : 'am';
  hours = hours % 12;
  hours = hours ? hours : 12; // the hour '0' should be '12'
  minutes = minutes < 10 ? '0'+minutes : minutes;
  var strTime = hours + ':' + minutes + ' ' + seconds +' '+ ampm;
//   var strTime = hours + ':' + minutes + ':' +  seconds;
  return strTime;
}
function contactStatusAndOutreachUpdate()
{
    $.ajax({
            url: $("#contact_update").attr('action'),
            method: 'POST',
            data: $('#contact_update').serialize(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
        success: function(result) {
            $("#send_email").css("display", "none");
            $("#delete_contact").css("display", "none");
            $("#download_sheet").css("display", "none");
            $("#update_status").css("display", "none");
             contactArray = [];
            // console.log(result);
            // updateText2(result);
            dt.draw();

        }
    });
}
function contactStatusUpdate(status,id,obj)
{
    obj.parentElement.parentElement.parentElement.children[0].textContent=status;
    obj.parentElement.parentElement.parentElement.children[1].classList.remove('show');
    var value = {
            status: status,
            contacts_id:id,
            _token:'{{ csrf_token() }}',
        };
    $.ajax({
            url: "{{route('contact_status_update')}}",
            method: 'POST',
            data: value,
           
        success: function(result) {
            // $("#send_email").css("display", "none");
            // $("#download_sheet").css("display", "none");
            // $("#update_status").css("display", "none");
            //  contactArray = [];
            // console.log(result);
            // updateText2(result);
            // dt.draw();

        }
    });
}   
function showAndHid(obj)
{
    obj.parentElement.children[1].classList.contains('show') == true ? obj.parentElement.children[1].classList.remove('show') : obj.parentElement.children[1].classList.add('show');
}
function filterData2()
    {
        dt.draw();
    }
    function clearFilter()
    {
        $('#contact_status').val('');
        $('#company_id').val([]);
        $('#company_id').trigger('change'); 
        $('#tag2').val([]);
        $('#tag2').trigger('change'); 
        $('#tags').val([]);
        $('#tags').trigger('change'); 
        $('#tags_filter').hide();
        dt.draw();
    }

   
</script>
@endsection('content')