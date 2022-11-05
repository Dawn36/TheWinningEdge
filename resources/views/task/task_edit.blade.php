<form id="" class="form" method="POST" action="{{ route('task.update',$task->id) }}" enctype="multipart/form-data">
    @method("PUT")
    @csrf
    <div class="fv-row mb-5">
        <label class="required fs-6 fw-bold form-label mb-2">Tasks Description</label>
        <textarea class="form-control form-control-solid rounded-3" name="description" required>{{$task->description}}</textarea>
    </div>
   
    <div class="fv-row mb-5">
        <label class="required fs-6 fw-bold form-label mb-2">Assigned to contact</label>
        <select name="contact_id" class="form-control form-control-solid rounded-3" data-control="select2" data-dropdown-parent="#kt_modal_add_tasks" data-placeholder="Select an option" data-allow-clear="true" required>
            @for($i=0; $i< count($contact); $i++)
            <option value="{{$contact[$i]->id}}" {{$task->contact_id ==$contact[$i]->id ? 'Selected' : '' }}>{{ucwords($contact[$i]->first_name)}} {{ucwords($contact[$i]->last_name)}}</option>
            @endfor
        </select>
    </div>
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