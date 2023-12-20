<!--begin::Modal-->
<div class="modal fade" id="add_to_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add to ( Featured - Service - Special )</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6">
                        <!--begin::Input group-->
                        <div class="fv-row mb-10 fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="fs-5 fw-bolder form-label mb-2">
                                <span class="required">Start Date</span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="datetime-local" class="form-control form-control-solid" name="start_date"
                                   id="start_date"/>
                            <!--end::Input-->
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <!--end::Input group-->
                    </div>
                    <div class="col-6">
                        <!--begin::Input group-->
                        <div class="fv-row mb-10 fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="fs-5 fw-bolder form-label mb-2">
                                <span class="required">End Date</span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="datetime-local" class="form-control form-control-solid" name="end_date"
                                   id="end_date"/>
                            <!--end::Input-->
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <!--end::Input group-->
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <button type="button" class="btn btn-danger" id="add-to-button">Yes</button>
            </div>
        </div>
    </div>
</div>
<!--end::Modal-->
