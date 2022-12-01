<form id="company_update" class="form" method="POST" action="{{ route('company.update',$company->id) }}" enctype="multipart/form-data">
    @method("PUT")
    @csrf
    <!--begin::Scroll-->
    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
        <div class="fv-row mb-7">
            <label class=" fw-bold fs-6 mb-2">Company Name</label>
            <input type="text"  name="company_name" value="{{$company->company_name}}" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter Company Name here."  />
        </div>
        <div class="fv-row mb-7">
            <label class=" fw-bold fs-6 mb-2">Street Address</label>
            <input type="text" name="street_address" value="{{$company->street_address}}" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter Street Address here."  />
        </div>
        <div class="fv-row mb-7">
            <label class=" fw-bold fs-6 mb-2">City</label>
            <input type="text"  name="city" value="{{$company->city}}" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter City here."  />
        </div>
        <div class="fv-row mb-7">
            <label class=" fw-bold fs-6 mb-2">State</label>
            <input type="text" name="state" value="{{$company->state}}" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter State here."  />
        </div>
        <div class="fv-row mb-7">
            <label class=" fw-bold fs-6 mb-2">Zip Code</label>
            <input type="text"  name="zip_code" value="{{$company->zip_code}}" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter Zip Code here."  />
        </div>
        <div class="fv-row mb-7">
            <label class=" fw-bold fs-6 mb-2">Country</label>
            <input type="text"  name="country" value="{{$company->country}}" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter Country here."  />
        </div>
        <div class="fv-row mb-7">
            <label class=" fw-bold fs-6 mb-2">Website</label>
            <input type="text"  name="website" value="{{$company->website}}" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter website."  />
        </div>
    </div>
    <!--end::Scroll-->
    <!--begin::Actions-->
    <div class="text-center pt-15">
        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" aria-label="Close">Discard</button>
        <button type="button" class="btn btn-primary" onclick="companyUpdate();closeModal()">Submit</button>
    </div>
    <!--end::Actions-->
</form>
<script>
 function companyUpdate() {
        $.ajax({
                url: $("#company_update").attr('action'),
                method: 'POST',
                data: $('#company_update').serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
            success: function(result) {
                updateText2(result);
               
            }
        });
    }

function updateText2(result)
{
    obj2.parentElement.parentElement.children[1].children[0].textContent=result.company_name;
    obj2.parentElement.parentElement.children[2].textContent=result.street_address;
    obj2.parentElement.parentElement.children[3].textContent=result.city;
    obj2.parentElement.parentElement.children[4].textContent=result.state;
    obj2.parentElement.parentElement.children[5].textContent=result.zip_code;
    obj2.parentElement.parentElement.children[6].textContent=result.country;
    obj2.parentElement.parentElement.children[7].children[0].textContent=result.website;
    obj2.parentElement.parentElement.children[7].children[0].href=result.website;
    obj2='';
    $('#myModalLg').modal('hide');

}

</script>