<form id="" class="form" method="POST" action="{{ route('company.store') }}" enctype="multipart/form-data">
    @csrf
    <!--begin::Scroll-->
    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">Company Name</label>
            <input type="text"  name="company_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter Company Name here." required />
        </div>
        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">Street Address</label>
            <input type="text" name="street_address" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter Street Address here." required />
        </div>
        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">City</label>
            <input type="text"  name="city" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter City here." required />
        </div>
        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">State</label>
            <input type="text" name="state" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter State here." required />
        </div>
        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">Zip Code</label>
            <input type="text"  name="zip_code" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter Zip Code here." required />
        </div>
        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">Country</label>
            <input type="text"  name="country" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter Country here." required />
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