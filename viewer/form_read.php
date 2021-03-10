<!-- Modal -->
<div class="modal fade" id="staticBackdropRead<?= $modalItem["id"] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Customer Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <dt class="col-sm-4">Full Name</dt>
                    <div class="col-sm-8">
                        <dd><?= $modalItem["name"] ?></dd>
                    </div>
                </div>
                <div class="row mb-3">
                    <dt class="col-sm-4">Birth Day</dt>
                    <div class="col-sm-8">
                        <dd><?= date("d/m/Y", strtotime($modalItem["birth_date"])) ?></dd>
                    </div>
                </div>
                <div class="row mb-3">
                    <dt class="col-sm-4">Document</dt>
                    <div class="col-sm-8">
                        <dd><?= $modalItem["document"] ?></dd>
                    </div>
                </div>
                <div class="row mb-3">
                    <dt class="col-sm-4">Phone Number</dt>
                    <div class="col-sm-8">
                        <dd><?= $modalItem["phone"] ?></dd>
                    </div>
                </div>
                <div class="row mb-3">
                    <dt class="col-sm-4">E-mail</dt>
                    <div class="col-sm-8">
                        <dd><?= $modalItem["email"] ?></dd>
                    </div>
                </div>
                <div class="row mb-3">
                    <dt class="col-sm-4">Address</dt>
                    <div class="col-sm-8">
                        <dd><?= $modalItem["address"] ?></dd>
                    </div>
                </div>
                <div class="row mb-3">
                    <dt class="col-sm-4">Frequency</dt>
                    <div class="col-sm-8">
                        <dd><?= $modalItem["frequency"] ?></dd>
                    </div>
                </div>
                <div class="row mb-3">
                    <dt class="col-sm-4">Payment Mode</dt>
                    <div class="col-sm-8">
                        <dd><?= $modalItem["payment"] ?></dd>
                    </div>
                </div>
                <div class="row mb-3">
                    <dt class="col-sm-4">Contributuion</dt>
                    <div class="col-sm-8">
                        <dd><?="R$". number_format($modalItem["contribution"],"2", ",", ".") ?></dd>
                    </div>
                </div>
                <div class="row mb-3">
                    <dt class="col-sm-4">Modified</dt>
                    <div class="col-sm-8">
                        <dd><?= (!is_null($modalItem["modified"])) ? date("d/m/Y H:i:s", strtotime($modalItem["modified"])) : "" ?></dd>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>