<form id="" class="form" method="POST" action="{{ route('task.update',$task->id) }}" enctype="multipart/form-data">
    @method("PUT")
    @csrf
    <div class="fv-row mb-5">
        <label class="required fs-6 fw-bold form-label mb-2">Tasks Description</label>
        <textarea class="form-control form-control-solid rounded-3" name="description" required>{{$task->description}}</textarea>
    </div>
    <input hidden name="contact_id" value="{{$contactId}}" />
   
    <div class="fv-row mb-5">
        <label class="fs-6 fw-bold form-label mb-2">Task date</label>
        <input class="form-control form-control-solid kt_datepicker_2" name="task_date" value="{{$task->task_date}}" placeholder="Pick a date" />
    </div>
    <div class="fv-row mb-5">
        <label class="fs-6 fw-bold form-label mb-2">Task status</label>
        <select name="task_status" class="form-control form-control-solid">
            <option value="open" {{$task->task_status == 'open' ? 'Selected' : ''}}>Open</option>
            <option value="in progress" {{$task->task_status == 'in progress' ? 'Selected' : ''}}>In Progress</option>
            <option value="completed" {{$task->task_status == 'completed' ? 'Selected' : ''}}>Completed</option>
        </select>
    </div>
    <!--end::Input group-->
    <!--begin::Actions-->
    <div class="text-center pt-15">
        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" aria-label="Close">Discard</button>
        <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">Update</button>
    </div>
    <!--end::Actions-->
</form>
<script>
        $(".kt_datepicker_2").flatpickr();
</script>