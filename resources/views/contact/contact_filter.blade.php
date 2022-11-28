<form  method="GET" action="{{ route('contact.index') }}">
    <!--begin::Input group-->
    <div class="fv-row mb-5">
        <label class="fs-6 fw-bold form-label mb-2">Tags:</label>
        <select class="form-select form-select-solid fw-bolder js-example-tags" name="tags[]" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-dropdown-parent="#right_modal" multiple>
            <option></option>
            @for($i=0; $i < count($tagsArr); $i++)
                <option value="{{$tagsArr[$i]}}" >{{$tagsArr[$i]}}</option>
                @endfor
        </select>
    </div>
    <div class="fv-row mb-5">
        <label class="fs-6 fw-bold form-label mb-2">Companies:</label>
        <select class="form-select form-select-solid fw-bolder js-example-basic-single" name="company_id[]" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-dropdown-parent="#right_modal" multiple>
            <option></option>
            @for($i=0; $i < count($company); $i++)
                <option value="{{$company[$i]->id}}" >{{$company[$i]->company_name}}</option>
                @endfor
        </select>
    </div>
    <!--end::Input group-->
    <!--begin::Actions-->
    <div class="pt-5">
        <button type="submit" class="btn btn-primary">
            <span class="svg-icon svg-icon-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M21.7 18.9L18.6 15.8C17.9 16.9 16.9 17.9 15.8 18.6L18.9 21.7C19.3 22.1 19.9 22.1 20.3 21.7L21.7 20.3C22.1 19.9 22.1 19.3 21.7 18.9Z" fill="black" />
                    <path opacity="0.6" d="M11 20C6 20 2 16 2 11C2 6 6 2 11 2C16 2 20 6 20 11C20 16 16 20 11 20ZM11 4C7.1 4 4 7.1 4 11C4 14.9 7.1 18 11 18C14.9 18 18 14.9 18 11C18 7.1 14.9 4 11 4ZM8 11C8 9.3 9.3 8 11 8C11.6 8 12 7.6 12 7C12 6.4 11.6 6 11 6C8.2 6 6 8.2 6 11C6 11.6 6.4 12 7 12C7.6 12 8 11.6 8 11Z" fill="black" />
                </svg>
                Filter
            </span>
        </button>
    </div>
    <!--end::Actions-->
</form>
<script src="{{ asset('theme/assets/js/custom/select2.js')}}"></script>
<script>
  $(document).ready(function() {
            $('.js-example-basic-single').select2();
            $(".js-example-tags").select2({
            tags: true
        });
        });
       
</script>