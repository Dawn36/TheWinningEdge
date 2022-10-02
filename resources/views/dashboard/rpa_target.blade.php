<form id="" class="form" method="POST" action="{{ route('rpa_target') }}" >
    @csrf
    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
        <div class="row">
            <input hidden name='rpa_target_id' value="{{count($rpa) == 0 ? '' : $rpa[0]->id}}"/>
            <div class="col-lg-12 mb-5">
                <label class="required fw-bold fs-6 mb-2"># Of Phone Calls</label>
                <input type="number" name="phone_call" value="{{count($rpa) == 0 ? '' :  $rpa[0]->phone_call}}" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Set The RPA Target" required />
            </div>
            <div class="col-lg-12 mb-5">
                <label class="required fw-bold fs-6 mb-2"># Of Live Conversations</label>
                <input type="number" name="live_conversation" value="{{count($rpa) == 0 ? '' :  $rpa[0]->live_conversation}}" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Set The RPA Target" required />
            </div>
            <div class="col-lg-12 mb-5">
                <label class="required fw-bold fs-6 mb-2"># Of Voicemails</label>
                <input type="number" name="voice_mail" value="{{count($rpa) == 0 ? '' :  $rpa[0]->voice_mail}}" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Set The RPA Target" required />
            </div>
            <div class="col-lg-12 mb-5">
                <label class="required fw-bold fs-6 mb-2"># Of Emails</label>
                <input type="number" name="email" value="{{count($rpa) == 0 ? '' :  $rpa[0]->email}}" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Set The RPA Target" required />
            </div>
            <div class="col-lg-12">
                <label class="required fw-bold fs-6 mb-2"># Of Meetings</label>
                <input type="number" name="meeting" value="{{count($rpa) == 0 ? '' :  $rpa[0]->meeting}}" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Set The RPA Target" required />
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