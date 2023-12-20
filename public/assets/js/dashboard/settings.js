"use strict";

var KTSettings = function () {
    var t, e, i;
    return {
        init: function () {
            t = document.querySelector("#kt_add_settings_form");
            e = document.querySelector("#kt_add_setting_submit");
            i = FormValidation.formValidation(t, {
                fields: {}, plugins: {
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

                        var form = document.getElementById('kt_add_settings_form');
                        var formSubmitUrl = form.getAttribute('action');
                        var listUrl = form.getAttribute('data-list-route');
                        var reloadPage = parseInt(form.getAttribute('data-reload'));

                        var formData = new FormData();
                        $('#kt_add_settings_form').serializeArray().map(function (v) {
                            if (v.name.indexOf("[link]") > 0) {
                                let current_index = v.name.split("social_media_links[")[1].split(']')[0];
                                formData.append(v.name, v.value);
                                let input_name = "name='social_media_links[" + current_index + "]" + "[image]'";
                                var icon = $("input[" + input_name + "]")[0].files[0];
                                if (icon) {
                                    formData.append('social_media_links[' + current_index + ']' + '[image]', icon);
                                } else {
                                    var image_path = $("input[" + input_name + "]").data('image');
                                    formData.append('social_media_links[' + current_index + ']' + '[image]', (image_path == 'undefined' ? '' : image_path));
                                }
                            } else if (v.value) {
                                formData.append(v.name, v.value);
                            }
                        });

                        $('.files').each(function () {
                            var key = $(this).data('key');
                            var files = $('#value_' + key);
                            var image = files[0] ? files[0].files[0] : null;
                            if (image)
                                formData.append('translated_attributes[' + key + '][1][value]', image);
                        });

                        axios.post(formSubmitUrl, formData, {
                            headers: {
                                'Content-Type': 'multipart/form-data'
                            }
                        }).then(function (response) {
                            Swal.fire({
                                text: response.data.data.message,
                                icon: "success",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: {confirmButton: "btn btn-primary"}
                            }).then(function () {
                                // Release button
                                e.removeAttribute("data-kt-indicator");
                                e.disabled = 0;
                            });
                        }).catch(error => {
                            Swal.fire({
                                text: "OOPS! " +
                                    (error.response.data.hasOwnProperty('errors') ? error.response.data.errors.email[0] : error.response.data.message),
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: {confirmButton: "btn btn-primary"}
                            }).then(function () {
                                // Release button
                                e.removeAttribute("data-kt-indicator");
                                e.disabled = 0;
                            });
                        });
                    } else {
                        Swal.fire({
                            text: "Sorry, looks like there are some errors detected, please try again.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {confirmButton: "btn btn-primary"}
                        })
                    }
                }))
            }));
        }
    }
}();
KTUtil.onDOMContentLoaded((function () {
    $(document).ready(function () {
        $('.summernote').summernote({
            height: 200
        });
    });
    $('#kt_repeater_1').repeater({
        show: function () {
            $(this).slideDown();
        },
        hide: function (deleteElement) {
            $(this).slideUp(deleteElement);
        }
    });
    KTSettings.init()
}));
