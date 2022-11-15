<form id="contact_update" class="form" method="POST" action="{{ route('contact.update',$contact->id) }}" enctype="multipart/form-data">
    @method("PUT")
    @csrf
    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
        <div class="fv-row mb-7">
            <label class=" fw-bold fs-6 mb-2">Status</label>
            <select name="status" class="form-control form-control-solid mb-3 mb-lg-0">
                <option value="current_client" {{$contact->status == "current_client" ? 'Selected' : '' }}>Current Client</option>
                <option value="active_discussion" {{$contact->status == "active_discussion" ? 'Selected' : '' }}>Active Discussion</option>
                <option value="not_interested" {{$contact->status == "not_interested" ? 'Selected' : '' }}>Not Interested</option>
                <option value="unsubscribed" {{$contact->status == "unsubscribed" ? 'Selected' : '' }}>Unsubscribed</option>
                <option value="prospect" {{$contact->status == "prospect" ? 'Selected' : '' }}>Prospect</option>
                <option value="user" {{$contact->status == "user" ? 'Selected' : '' }}>User</option>
            </select>
        </div>
        <div class="fv-row mb-7">
            <label class=" fw-bold fs-6 mb-2">First Name</label>
            <input type="text"  name="first_name" value="{{$contact->first_name}}" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter your First Name here." />
        </div>
        <div class="fv-row mb-7">
            <label class=" fw-bold fs-6 mb-2">Last Name</label>
            <input type="text"  name="last_name" value="{{$contact->last_name}}"  class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter your Last Name here." />
        </div>
        <div class="fv-row mb-7">
            <label class=" fw-bold fs-6 mb-2">Job Title</label>
            <input type="text"  name="job" value="{{$contact->job}}" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter your Job Title here." />
        </div>
        <div class="fv-row mb-7">
            <label class=" fw-bold fs-6 mb-2">Direct Phone Number</label>
            <input type="number"  min="0" value="{{$contact->phone_number}}" name="phone_number" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter your Direct Phone Number here." />
        </div>
        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">Email Address</label>
            <input type="email"  min="0" value="{{$contact->email}}" name="email" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter your Email Address here." required/>
        </div>
        <div class="fv-row mb-7">
            <label class=" fw-bold fs-6 mb-2">Mobile phone</label>
            <input type="number"  min="0" value="{{$contact->mobile_phone}}" name="mobile_phone" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter your Mobile phone here." />
        </div>
        <div class="fv-row mb-7">
            <label class=" fw-bold fs-6 mb-2">Company Name</label>
            <select name="company_id" class="form-control form-control-solid mb-3 mb-lg-0">
                @for($i=0; $i < count($company); $i++)
                <option value="{{$company[$i]->id}}" {{$company[$i]->id == $contact->companies_id ? 'Selected' : ''}}>{{$company[$i]->company_name}}</option>
                @endfor
            </select>
        </div>
        <div class="fv-row mb-7">
            <label class=" fw-bold fs-6 mb-2">LinkedIn Contact Profile URL</label>
            <input type="text"  name="linked_in_url" value="{{$contact->linked_in_url}}" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter the LinkedIn Contact Profile URL here." />
        </div>
        <div class="fv-row mb-7">
            <label class=" fw-bold fs-6 mb-2">Tags</label>
            <input name="tags" value="{{$contact->tags}}" class="form-control form-control-solid mb-3 mb-lg-0 kt_tagify_2" value="" placeholder="Type the tags here" />
        </div>
        <div class="fv-row mb-7">
            <label class=" fw-bold fs-6 mb-2">Note</label>
            <textarea name="note" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please add the note for the contact">{{$contact->note}}</textarea>
        </div>
    </div>
    <!--end::Scroll-->
    <!--begin::Actions-->
    <div class="text-center pt-15">
        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" aria-label="Close">Discard</button>
        <button type="button" class="btn btn-primary" onclick="contactUpdate()">Submit</button>
    </div>
    <!--end::Actions-->
</form>
<script>
     // Tagify
     var input2 = document.querySelector(".kt_tagify_2");
        new Tagify(input2);

        function contactUpdate() {
        $.ajax({
                url: $("#contact_update").attr('action'),
                method: 'POST',
                data: $('#contact_update').serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
            success: function(result) {
                console.log(result);
                updateText2(result);
            }
        });
    }
    function updateText2(result)
    {
        obj2.parentElement.parentElement.children[2].children[0].textContent=result.first_name+" "+result.last_name;
        obj2.parentElement.parentElement.children[3].children[0].textContent=result.phone_number;
        obj2.parentElement.parentElement.children[4].children[0].textContent=result.email;
        obj2.parentElement.parentElement.children[5].textContent=result.companies_id;
        obj2.parentElement.parentElement.children[6].textContent=result.status;
        obj2='';
        $('#myModalLg').modal('hide');

    }
</script>