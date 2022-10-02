@extends('layouts.main')

@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Navbar-->
            <div class="card mb-5 mb-xl-10">
                <div class="card-body pt-9 pb-0">
                    <!--begin::Details-->
                    <div class="d-flex flex-wrap flex-sm-nowrap mb-3">
                        <div class="flex-grow-1">
                            <!--begin::Title-->
                            <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                <div class="d-flex flex-column">
                                    <div class="d-flex align-items-center mb-2">
                                        <a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bolder me-1">{{ucwords($emailTemplate->template_name)}}</a>
                                    </div>
                                    <div class="d-flex flex-wrap fw-bold fs-6 mb-4 pe-2">
                                        <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                            <span class="svg-icon svg-icon-4 me-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path d="M6 8.725C6 8.125 6.4 7.725 7 7.725H14L18 11.725V12.925L22 9.725L12.6 2.225C12.2 1.925 11.7 1.925 11.4 2.225L2 9.725L6 12.925V8.725Z" fill="black"></path>
                                                    <path opacity="0.3" d="M22 9.72498V20.725C22 21.325 21.6 21.725 21 21.725H3C2.4 21.725 2 21.325 2 20.725V9.72498L11.4 17.225C11.8 17.525 12.3 17.525 12.6 17.225L22 9.72498ZM15 11.725H18L14 7.72498V10.725C14 11.325 14.4 11.725 15 11.725Z" fill="black"></path>
                                                </svg>
                                            </span>
                                            {{ucwords($emailTemplate->subject)}}
                                        </a>
                                    </div>
                                </div>
                                <!--begin::Actions-->
                                <!-- <div class="d-flex my-4">
                                    <a href="#" class="btn btn-sm btn-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_edit_email_templates">Edit Email Template</a>
                                </div> -->
                                <!--end::Actions-->
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::Details-->
                </div>
            </div>
            <!--end::Navbar-->
            <!--begin::details View-->
            <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
                <!--begin::Card header-->
                <div class="card-header cursor-pointer">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">Email Template Body</h3>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->
                <!--begin::Card body-->
                <div class="card-body p-9">
                    <label class="required fw-bold fs-6 mb-2">Email Body</label>
                    <textarea name='body' id='body' hidden>{{$emailTemplate->body}}</textarea>
                    <div name="kt_ecommerce_add_product_description" class="min-h-200px mb-2 kt_docs_quill_basic"></div>
                    <div class="text-muted fs-7">Update the Email Template above.</div>
                    <br>
                    <button  class="btn btn-sm btn-light-primary" onclick="editEmailTemplate('{{$emailTemplate->id}}')">Edit Email Template</button>
                </div>
                <!--end::Card body-->
            </div>
            <!--end::details View-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>
<script src="{{ asset('theme/assets/js/custom/documentation/editors/quill/basic.js')}}"></script>

<script type="text/javascript">
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
       document.getElementById("body").value = quill.root.innerHTML;

       
   });

      
   var value1 = document.getElementById("body").value;
   var delta1 = quill.clipboard.convert(value1);

   quill.setContents(delta1, 'silent');
   });
    function editEmailTemplate(id) {
        url = "{{route('email_template.edit',':id')}}";
        url = url.replace(':id', id);
        $.ajax({
            type: 'GET',
            url: url,
            success: function(result) {
                $('#myModalLgHeading').html('Edit Email Templates');
                $('#modalBodyLarge').html(result);
                $('#myModalLg').modal('show');
            }
        });
    }
</script>
@endsection('content')