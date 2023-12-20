"use strict";

var csrf_token = $('meta[name="csrf-token"]').attr('content');
var KTAccountSettingsProfileDetails = function () {
    var t, e, i;
    return {
        init: function (myDropzone) {
            t = document.querySelector("#kt_add_form");
            e = document.querySelector("#kt_add_submit");
            i = FormValidation.formValidation(t, {
                fields: {
                    name: {validators: {notEmpty: {message: "Name is required"}}},
                    email: {validators: {notEmpty: {message: "Email is required"}}}
                }, plugins: {
                    trigger: new FormValidation.plugins.Trigger,
                    submitButton: new FormValidation.plugins.SubmitButton,
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".fv-row", eleInvalidClass: "", eleValidClass: ""
                    })
                }
            });
            e.addEventListener("click", (function (n) {
                n.preventDefault();
                i.validate().then((function (i) {
                    if ("Valid" === i) {
                        e.setAttribute("data-kt-indicator", "on");
                        e.disabled = 1;
                        myDropzone.processQueue();
                    }
                }))
            }));
        }
    }
}();
KTUtil.onDOMContentLoaded((function () {
    $('#kt_dropzone, #kt_dropzone_documents').dropzone({
        autoProcessQueue: false,
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': csrf_token
        },
        url: $('#kt_add_form').attr('action'), // Set the url for your upload script location
        paramName: "file", // The name that will be used to transfer the file
        maxFiles: 10,
        maxFilesize: 0.512, // MB
        acceptedMimeTypes: 'application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,text/plain',
        addRemoveLinks: true,
        parallelUploads: 10,
        autoDiscover: false,
        init: function () {
            var myDropzone = this;

            // Submit our form
            KTAccountSettingsProfileDetails.init(myDropzone);

            // Show success pop-up after uploading images.
            this.on("queuecomplete", function (progress) {
                Swal.fire({
                    text: 'Files has been uploaded successfully.',
                    icon: "success",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
                    customClass: {confirmButton: "btn btn-primary"}
                }).then(function () {
                    // Release button and redirect if required.
                    var form = document.getElementById('kt_add_form');
                    var e = document.querySelector("#kt_add_submit");
                    var listUrl = form.getAttribute('data-list-route');

                    e.removeAttribute("data-kt-indicator");
                    e.disabled = 0;
                    window.location.href = listUrl;
                });
            });
        }
    });
}));

