<form id="" class="form" method="POST" action="{{ route('opportunities.update',$opportunities->id) }}" enctype="multipart/form-data">
    @method("PUT")
    @csrf
    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">Name</label>
            <input type="text" required name="name" value="{{$opportunities->name}}" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter the Name here." />
        </div>
        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">Company Name</label>
            <input type="text" required name="company_name" value="{{$opportunities->company_name}}" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter the Company Name here." />
        </div>
        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">Contract Amount</label>
            <input type="number" required name="contract_amount" value="{{$opportunities->contract_amount}}" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter the Contract Amount here." />
        </div>
        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">Duration</label>
            <input type="text" required name="duration" value="{{$opportunities->duration}}" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter the Duration here." />
        </div>
        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">Files</label>
            <input type="file" name="file" class="form-control form-control-solid mb-3 mb-lg-0" />
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