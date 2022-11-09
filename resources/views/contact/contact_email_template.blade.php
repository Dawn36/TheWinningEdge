<x-keyword></x-keyword>
<form id="" class="form" method="POST" action="{{ route('contact_email_template') }}" enctype="multipart/form-data">
    @csrf
    <!--begin::Scroll-->
    <input name="contact_id" hidden value="{{$contactId}}"/>
    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">Email Name</label>
            <select name="template_id"  class="form-control form-control-solid mb-3 mb-lg-0" onchange="emailName(this.value)" required>
            <option value="0"></option>
            @for($i=0; $i < count($template); $i++)
            <option value="{{$template[$i]->id}}" >{{$template[$i]->template_name}}</option>
            @endfor
        </select>

        </div>
        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">Subject</label>
            <input type="text" id="subject" name="subject" value="" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter your Subject here." />
        </div>
        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">Email Body</label>
            <textarea name='body' id='body' hidden></textarea>
            <div name="kt_ecommerce_add_product_description" class="min-h-200px mb-2 kt_docs_quill_basic"></div>
            <div class="text-muted fs-7">Write the Email Template above.</div>
        </div>
    </div>
    <!--end::Scroll-->
    <!--begin::Actions-->
    <div class="text-center pt-15">
        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" aria-label="Close">Discard</button>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    <!--end::Actions-->
</form>
<script>
     
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
    // $("#kt_datatable_example_1").DataTable();
    // $(document).ready(function() {
       

       
    // });
    function emailName(templateId) {
        console.log(templateId);
    var value = {
            template_id:templateId
        };
        $.ajax({
            type: 'GET',
            url: "{{ route('get_email_templater') }}",
            data: value,
            success: function(result) {
                var quill = new Quill('.kt_docs_quill_basic', {});
                document.getElementById("subject").value=result.subject
                var value1 = document.getElementById("body").value=result.body;
                var delta1 = quill.clipboard.convert(value1);

                quill.setContents(delta1, 'silent');
            }
        });
    }
</script>