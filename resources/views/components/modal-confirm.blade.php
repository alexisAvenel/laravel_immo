<!-- Modal -->
<div class="modal fade" id="modalConfirm" tabindex="-1" aria-labelledby="modalConfirmLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalConfirmLabel">{{$modalTitle}}</h1>
                <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{$modalMessage}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">{{$modalBtnClose}}</button>
                <button type="submit" class="btn btn-primary">{{$modalBtnSave}}</button>
            </div>
        </div>
    </div>
</div>
