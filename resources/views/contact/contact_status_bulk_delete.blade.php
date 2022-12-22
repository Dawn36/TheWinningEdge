<form id="contact_update" class="form" method="POST" action="{{ route('contact_status_bulk') }}" enctype="multipart/form-data">
    @csrf
    <input hidden name="contact_id" value="{{$contactId}}" />
    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
        <div class="fv-row mb-7">
            <label class=" fw-bold fs-6 mb-2">Status</label>
            <select name="status" class="form-control form-control-solid mb-3 mb-lg-0">
                <option value="" >Select Status</option>
                <option value="Current Client" >Current Client</option>
                <option value="Active Discussion" >Active Discussion</option>
                <option value="Not Interested" >Not Interested</option>
                <option value="Unsubscribed" >Unsubscribed</option>
                <option value="Prospect" >Prospect</option>
                <option value="User" >User</option>
            </select>
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
