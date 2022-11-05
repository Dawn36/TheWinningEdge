<form id="" class="form" method="POST" action="{{ route('task.store') }}" enctype="multipart/form-data">
    @csrf
    <input name="contact_id" value="{{$contactId}}"  type="hidden"/>
    <div class="fv-row mb-5">
        <label class="required fs-6 fw-bold form-label mb-2">Tasks Description</label>
        <textarea class="form-control form-control-solid rounded-3" name="description" required></textarea>
    </div>
   
    <div class="fv-row mb-5">
        <label class="fs-6 fw-bold form-label mb-2">Task date</label>
        <input class="form-control form-control-solid kt_datepicker_2" name="task_date" placeholder="Pick a date" />
    </div>
    <div class="fv-row mb-5">
        <label class="fs-6 fw-bold form-label mb-2">Task status</label>
        <select name="task_status" class="form-control form-control-solid">
            <option value="open">Open</option>
            <option value="in progress">In Progress</option>
            <option value="completed">Completed</option>
        </select>
    </div>
    <!--end::Input group-->
    <!--begin::Actions-->
    <div class="text-center pt-15">
        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" aria-label="Close">Discard</button>
        <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">Submit</button>
    </div>
    <!--end::Actions-->
</form>
<script>
        $(".kt_datepicker_2").flatpickr();
</script>