<form id="" class="form" method="POST" action="{{ route('opportunities_target') }}" enctype="multipart/form-data">
    @csrf
    <!--begin::Scroll-->
    <input hidden name="opportunities_target_id" value="{{count($opportunitiesTarget) == 0 ? '' : $opportunitiesTarget[0]->id}}"/>
    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
        <div class="row">
            <div class="col-lg-12">
                <label class="required fw-bold fs-6 mb-2">Set Target Quota</label>
                <input type="number" name="opportunities_target" value="{{count($opportunitiesTarget) == 0 ? '' :  $opportunitiesTarget[0]->target}}" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Set The Opportunities Target" />
            </div>
        </div>
    </div>
    <!--end::Scroll-->
    <!--begin::Actions-->
    <div class="text-center pt-15">
        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" aria-label="Close">Discard</button>
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
    <!--end::Actions-->
</form>