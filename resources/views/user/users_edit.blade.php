<form id="" class="form" method="POST" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data">
    <!--begin::Scroll-->
    @method("PUT")
    @csrf
    <input type="hidden" name="company_name" value="" />
    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
        <div class="fv-row mb-7">
            <label class="d-block fw-bold fs-6 mb-5">Avatar</label>
            <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('{{asset('profile/'.$user->profile_picture)}}')">
                <div class="image-input-wrapper w-125px h-125px" style="background-image: url('{{asset('profile/'.$user->profile_picture)}}')">
                </div>
                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                    <i class="bi bi-pencil-fill fs-7"></i>
                    <input type="file" name="file" accept=".png, .jpg, .jpeg" />
                    <input type="hidden" name="avatar_remove" />
                </label>
                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                    <i class="bi bi-x fs-2"></i>
                </span>
                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                    <i class="bi bi-x fs-2"></i>
                </span>
            </div>
            <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
        </div>
        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">First name</label>
            <input type="text" name="first_name" value="{{$user->first_name}}" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="please enter first name." required />
        </div>
        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">last name</label>
            <input type="text" name="last_name" value="{{$user->last_name}}" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="please enter last name." required />
        </div>
        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">Email</label>
            <input type="email" name="email" value="{{$user->email}}" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="example@domain.com" required />
        </div>
        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">Phone number</label>
            <input type="number" min="0" value="{{$user->contact_no}}" name="contact_no" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="please enter contact no." />
        </div>
        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">Company name</label>
            <input type="text" value="{{$user->company_name}}" name="company_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="please enter company name." />
        </div>
        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">Change role</label>
            <select name="role_id" class="form-control form-control-solid mb-3 mb-lg-0" required="">
                <option value="1" {{$user->hasRole('admin') == '1' ? 'Selected' : ''}}>Admin</option>
                <option value="2" {{$user->hasRole('admin') == '1' ? '' : 'Selected'}}>User</option>
            </select>
        </div>
        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">Password</label>
            <input type="password" name="password" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Ab***12" />
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
<script>
    var KTImageInput = function(e, t) {
        var n = this;
        if (null != e) {
            var i = {},
                r = function() {
                    (n.options = KTUtil.deepExtend({}, i, t)),
                    (n.uid = KTUtil.getUniqueId("image-input")),
                    (n.element = e),
                    (n.inputElement = KTUtil.find(e, 'input[type="file"]')),
                    (n.wrapperElement = KTUtil.find(e, ".image-input-wrapper")),
                    (n.cancelElement = KTUtil.find(
                        e,
                        '[data-kt-image-input-action="cancel"]'
                    )),
                    (n.removeElement = KTUtil.find(
                        e,
                        '[data-kt-image-input-action="remove"]'
                    )),
                    (n.hiddenElement = KTUtil.find(e, 'input[type="hidden"]')),
                    (n.src = KTUtil.css(n.wrapperElement, "backgroundImage")),
                    n.element.setAttribute("data-kt-image-input", "true"),
                        o(),
                        KTUtil.data(n.element).set("image-input", n);
                },
                o = function() {
                    KTUtil.addEvent(n.inputElement, "change", a),
                        KTUtil.addEvent(n.cancelElement, "click", l),
                        KTUtil.addEvent(n.removeElement, "click", s);
                },
                a = function(e) {
                    if (
                        (e.preventDefault(),
                            null !== n.inputElement &&
                            n.inputElement.files &&
                            n.inputElement.files[0])
                    ) {
                        if (
                            !1 ===
                            KTEventHandler.trigger(
                                n.element,
                                "kt.imageinput.change",
                                n
                            )
                        )
                            return;
                        var t = new FileReader();
                        (t.onload = function(e) {
                            KTUtil.css(
                                n.wrapperElement,
                                "background-image",
                                "url(" + e.target.result + ")"
                            );
                        }),
                        t.readAsDataURL(n.inputElement.files[0]),
                            n.element.classList.add("image-input-changed"),
                            n.element.classList.remove("image-input-empty"),
                            KTEventHandler.trigger(
                                n.element,
                                "kt.imageinput.changed",
                                n
                            );
                    }
                },
                l = function(e) {
                    e.preventDefault(),
                        !1 !==
                        KTEventHandler.trigger(
                            n.element,
                            "kt.imageinput.cancel",
                            n
                        ) &&
                        (n.element.classList.remove("image-input-changed"),
                            n.element.classList.remove("image-input-empty"),
                            "none" === n.src ?
                            (KTUtil.css(
                                    n.wrapperElement,
                                    "background-image",
                                    ""
                                ),
                                n.element.classList.add("image-input-empty")) :
                            KTUtil.css(
                                n.wrapperElement,
                                "background-image",
                                n.src
                            ),
                            (n.inputElement.value = ""),
                            null !== n.hiddenElement &&
                            (n.hiddenElement.value = "0"),
                            KTEventHandler.trigger(
                                n.element,
                                "kt.imageinput.canceled",
                                n
                            ));
                },
                s = function(e) {
                    e.preventDefault(),
                        !1 !==
                        KTEventHandler.trigger(
                            n.element,
                            "kt.imageinput.remove",
                            n
                        ) &&
                        (n.element.classList.remove("image-input-changed"),
                            n.element.classList.add("image-input-empty"),
                            KTUtil.css(
                                n.wrapperElement,
                                "background-image",
                                "none"
                            ),
                            (n.inputElement.value = ""),
                            null !== n.hiddenElement &&
                            (n.hiddenElement.value = "1"),
                            KTEventHandler.trigger(
                                n.element,
                                "kt.imageinput.removed",
                                n
                            ));
                };
            !0 === KTUtil.data(e).has("image-input") ?
                (n = KTUtil.data(e).get("image-input")) :
                r(),
                (n.getInputElement = function() {
                    return n.inputElement;
                }),
                (n.goElement = function() {
                    return n.element;
                }),
                (n.destroy = function() {
                    KTUtil.data(n.element).remove("image-input");
                }),
                (n.on = function(e, t) {
                    return KTEventHandler.on(n.element, e, t);
                }),
                (n.one = function(e, t) {
                    return KTEventHandler.one(n.element, e, t);
                }),
                (n.off = function(e) {
                    return KTEventHandler.off(n.element, e);
                }),
                (n.trigger = function(e, t) {
                    return KTEventHandler.trigger(n.element, e, t, n, t);
                });
        }
    };
    (KTImageInput.getInstance = function(e) {
        return null !== e && KTUtil.data(e).has("image-input") ?
            KTUtil.data(e).get("image-input") :
            null;
    }),
    (KTImageInput.createInstances = function(e = "[data-kt-image-input]") {
        var t = document.querySelectorAll(e);
        if (t && t.length > 0)
            for (var n = 0, i = t.length; n < i; n++) new KTImageInput(t[n]);
    }),
    (KTImageInput.init = function() {
        KTImageInput.createInstances();
    }),
    "loading" === document.readyState ?
        document.addEventListener("DOMContentLoaded", KTImageInput.init) :
        KTImageInput.init(),
        "undefined" != typeof module &&
        void 0 !== module.exports &&
        (module.exports = KTImageInput);
</script>