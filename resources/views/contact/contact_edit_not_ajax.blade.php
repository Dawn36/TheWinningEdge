<form  method="POST" action="{{ route('contact.update',$contact->id) }}" enctype="multipart/form-data">
    @method("PUT")
    @csrf
    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
        <div class="fv-row mb-7">
            <label class=" fw-bold fs-6 mb-2">Status</label>
            <select name="status" class="form-control form-control-solid mb-3 mb-lg-0">
                <option value="current client" {{$contact->status == "current client" ? 'Selected' : '' }}>Current Client</option>
                <option value="active discussion" {{$contact->status == "active discussion" ? 'Selected' : '' }}>Active Discussion</option>
                <option value="not interested" {{$contact->status == "not interested" ? 'Selected' : '' }}>Not Interested</option>
                <option value="unsubscribed" {{$contact->status == "unsubscribed" ? 'Selected' : '' }}>Unsubscribed</option>
                <option value="prospect" {{$contact->status == "prospect" ? 'Selected' : '' }}>Prospect</option>
                <option value="user" {{$contact->status == "user" ? 'Selected' : '' }}>User</option>
            </select>
        </div>
        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">First Name</label>
            <input type="text"  name="first_name" value="{{$contact->first_name}}" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter your First Name here." required/>
        </div>
        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">Last Name</label>
            <input type="text"  name="last_name" value="{{$contact->last_name}}"  class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter your Last Name here." required/>
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
            <label class=" fw-bold fs-6 mb-2">Job Title</label>
            <input type="text"  name="job" value="{{$contact->job}}" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter your Job Title here." />
        </div>
        <div class="fv-row mb-7">
            <label class=" fw-bold fs-6 mb-2">Direct Phone Number</label>
            <input type="text"   value="{{$contact->phone_number}}" name="phone_number" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter your Direct Phone Number here." />
        </div>
        <div class="fv-row mb-7">
            <label class=" fw-bold fs-6 mb-2">Email Address</label>
            <input type="email"   value="{{$contact->email}}" name="email" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter your Email Address here." />
        </div>
        <div class="fv-row mb-7">
            <label class=" fw-bold fs-6 mb-2">Mobile phone</label>
            <input type="text"   value="{{$contact->mobile_phone}}" name="mobile_phone" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter your Mobile phone here." />
        </div>
        
        <div class="fv-row mb-7">
            <label class=" fw-bold fs-6 mb-2">LinkedIn Contact Profile URL</label>
            <input type="text"  name="linked_in_url" value="{{$contact->linked_in_url}}" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter the LinkedIn Contact Profile URL here." />
        </div>
        <div class="fv-row mb-7">
            <label class=" fw-bold fs-6 mb-2">Tags</label>
            <input name="tags" value="{{$contact->tags}}" class="form-control form-control-solid mb-3 mb-lg-0 kt_tagify_2" value="" placeholder="Type the tags here" />
        </div>
        @if(isset($latestNote[0]->id))
        <input hidden name="note_id" value="{{$latestNote[0]->id}}" />
        <div class="fv-row mb-7">
            <label class=" fw-bold fs-6 mb-2">Note</label>
            <textarea name="note" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please add the note for the contact">{{$latestNote[0]->note}}</textarea>
        </div>
        @else
        <input hidden name="note_id" value="0" />
        <div class="fv-row mb-7">
            <label class=" fw-bold fs-6 mb-2">Note</label>
            <textarea name="note" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please add the note for the contact"></textarea>
        </div>
        @endif
    </div>
    <!--end::Scroll-->
    <!--begin::Actions-->
    <div class="text-center pt-15">
        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" aria-label="Close">Discard</button>
        <button type="submit" class="btn btn-primary" >Submit</button>
    </div>
    <!--end::Actions-->
</form>
<script>
    // Tagify
    var input2 = document.querySelector(".kt_tagify_2");
       new Tagify(input2);

     
</script>