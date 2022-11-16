<form id="" class="form" method="POST" action="{{ route('contact.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">First Name</label>
            <input type="text"  name="first_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter your First Name here." required/>
        </div>
        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">Last Name</label>
            <input type="text"  name="last_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter your Last Name here." required/>
        </div>
        <div class="fv-row mb-7">
            <label class=" fw-bold fs-6 mb-2">Job Title</label>
            <input type="text"  name="job" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter your Job Title here." />
        </div>
        <div class="fv-row mb-7">
            <label class=" fw-bold fs-6 mb-2">Direct Phone Number</label>
            <input type="number"  min="0" name="phone_number" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter your Direct Phone Number here." />
        </div>
        <div class="fv-row mb-7">
            <label class=" fw-bold fs-6 mb-2">Email Address</label>
            <input type="email"  min="0" name="email" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter your Email Address here." />
        </div>
        <div class="fv-row mb-7">
            <label class=" fw-bold fs-6 mb-2">Mobile phone</label>
            <input type="number"  min="0" name="mobile_phone" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter your Mobile phone here." />
        </div>
        <div class="fv-row mb-7">
            <label class=" fw-bold fs-6 mb-2">Company Name</label>
            <select name="company_id"class="form-control form-control-solid rounded-3 js-example-tags" data-control="select2" data-dropdown-parent="#modalBodyLarge">
                @for($i=0; $i < count($company); $i++)
                <option value="{{$company[$i]->id}}" >{{$company[$i]->company_name}}</option>
                @endfor
            </select>
        </div>
        <div class="fv-row mb-7">
            <label class=" fw-bold fs-6 mb-2">LinkedIn Contact Profile URL</label>
            <input type="text"  name="linked_in_url" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter the LinkedIn Contact Profile URL here." />
        </div>
        <div class="fv-row mb-7">
            <label class=" fw-bold fs-6 mb-2">Tags</label>
            <input name="tags" class="form-control form-control-solid mb-3 mb-lg-0 kt_tagify_2" value="" placeholder="Type the tags here" />
        </div>
        <div class="fv-row mb-7">
            <label class=" fw-bold fs-6 mb-2">Note</label>
            <textarea name="note" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please add the note for the contact"></textarea>
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
     // Tagify
     var input2 = document.querySelector(".kt_tagify_2");
        new Tagify(input2);

        $(".js-example-tags").select2({
            tags: true
        });
</script>