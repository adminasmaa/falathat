<!--begin::Modal-->
<div class="modal fade" id="update_status_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Status</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <!--begin::Input group-->
                        <div class="fv-row mb-10 fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="fs-5 fw-bolder form-label mb-2">
                                <span class="required">Status</span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select class="form-control form-control-solid" name="status_id" id="status_id">
                                <option value="">Select Status</option>
                                @foreach([['id' => 1,'name' => 'Active'],['id' => 0,'name' => 'Inactive']] as $status)
                                    <option value="{{ $status['id'] }}">
                                        {{ $status['name'] }}
                                    </option>
                                @endforeach
                            </select>
                            <!--end::Input-->
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <!--end::Input group-->
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <button type="button" class="btn btn-danger" id="update-status-button">Yes</button>
            </div>
        </div>
    </div>
</div>
<!--end::Modal-->
