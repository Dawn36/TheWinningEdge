<form id="" class="form" method="POST" action="{{ route('opportunities.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
        
        <input type="text"  name="company_id" value="{{$companyId}}" hidden readonly/>
        <input type="text"  name="contact_id" value="{{$contactId}}" hidden readonly/>
        <div class="fv-row mb-7">
            <label class=" fw-bold fs-6 mb-2">Contract Amount</label>
            <input type="number"  name="contract_amount" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter the Contract Amount here." />
        </div>
        {{-- <div class="fv-row mb-7">
            <label class=" fw-bold fs-6 mb-2">Duration</label>
            <input type="text"  name="duration" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter the Duration here." />
        </div> --}}
        <div class="fv-row mb-7">
            <label class=" fw-bold fs-6 mb-2">Status</label>
            <select name="status" class="form-control form-control-solid mb-3 mb-lg-0">
                <option value="open" >Open</option>
                <option value="closed" >Closed</option>
                <option value="pricing sent" >Pricing Sent</option>
                <option value="contract sent" >Contract Sent</option>
            </select>
        </div>
        <div class="fv-row mb-7">
            <label class=" fw-bold fs-6 mb-2">Files</label>
            <input type="file" name="file" class="form-control form-control-solid mb-3 mb-lg-0" />
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
