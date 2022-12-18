<form id="" class="form" method="POST" action="{{ route('company_files.update',$companyFile->id) }}" enctype="multipart/form-data">
    @method("PUT")
    @csrf
    <!--begin::Input group-->
    <div class="fv-row mb-1">
        <!--begin::Label-->
        <label class=" fw-bold fs-6 mb-2">Files</label>
            <input type="file" name="file"  class="form-control form-control-solid mb-3 mb-lg-0" />
        <!--end::Input-->
    </div>
    <!--end::Input group-->
    <!--begin::Actions-->
    <div class="text-center pt-15">
        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" aria-label="Close">Discard</button>
        <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">Submit</button>
    </div>
    <!--end::Actions-->
</form>