<form id="contact_update" class="form" method="POST" action="{{ route('contact.update',$contact->id) }}" enctype="multipart/form-data">
    @method("PUT")
    @csrf
    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
        <div class="fv-row mb-7">
            <label class=" fw-bold fs-6 mb-2">Status</label>
            <select name="status" class="form-control form-control-solid mb-3 mb-lg-0">
                <option value="" >Select Status</option>
                <option value="Current Client" {{$contact->status == "Current Client" ? 'Selected' : '' }}>Current Client</option>
                <option value="Active Discussion" {{$contact->status == "Active Discussion" ? 'Selected' : '' }}>Active Discussion</option>
                <option value="Not Interested" {{$contact->status == "Not Interested" ? 'Selected' : '' }}>Not Interested</option>
                <option value="Unsubscribed" {{$contact->status == "Unsubscribed" ? 'Selected' : '' }}>Unsubscribed</option>
                <option value="Prospect" {{$contact->status == "Prospect" ? 'Selected' : '' }}>Prospect</option>
                <option value="User" {{$contact->status == "User" ? 'Selected' : '' }}>User</option>
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
            <input name="tags" value="{{$tagsArr[0]->tags}}" class="form-control form-control-solid mb-3 mb-lg-0 kt_tagify_2" value="" placeholder="Type the tags here" />
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
        <div class="fv-row mb-7">
            <a href="#" class="btn btn-light-dark" title="" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Add new Note" onclick="cloneNewNote()">
                <span class="svg-icon svg-icon-2x">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.6" x="11" y="18" width="12" height="2" rx="1" transform="rotate(-90 11 18)" fill="black"></rect>
                        <rect x="6" y="11" width="12" height="2" rx="1" fill="black"></rect>
                    </svg>
                    Add new Note
                </span>
            </a>
        </div>
        <div class="fv-row mb-7" id="note_to_clone" style="display: none">
            <label class=" fw-bold fs-6 mb-2">New Note</label>
            <textarea name="note_new[]" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please add the note for the contact"></textarea>
        </div>
        <div id="cloneNew">
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
     function cloneNewNote()
        {
            noteClone=$('#note_to_clone').clone();
            noteClone[0].style.display='block';
            noteClone[0].children[1].textContent='';
            noteClone[0].children[1].value='';
            noteClone.appendTo("#cloneNew")
        }
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
        obj2.parentElement.parentElement.children[1].children[0].textContent=result.first_name+" "+result.last_name;
        obj2.parentElement.parentElement.children[1].children[2].textContent=result.job;
        obj2.parentElement.parentElement.children[2].children[0].textContent=result.email;
        obj2.parentElement.parentElement.children[2].children[2].childNodes[1].textContent=result.phone_number;
        obj2.parentElement.parentElement.children[2].children[4].childNodes[1].textContent=result.mobile_phone;
        obj2.parentElement.parentElement.children[3].textContent=result.companies_id;
        obj2.parentElement.parentElement.children[4].children[0].textContent=result.status;
        obj2='';
        // dt.draw();
        $('#myModalLg').modal('hide');

    }
</script>