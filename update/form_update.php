<!-- Modal -->
<div class="modal fade" id="staticBackdropUpdate<?= $modalItem["id"] ?>" data-bs-backdrop="static"
     data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Customer Update</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form name="myForm" method="post" action="update/update_customer.php">
                    <input type="hidden" name="update_id" value="<?= $modalItem["id"] ?>"/>
                    <div class="mb-3">
                        <label for="update_name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="update_name" name="update_name"
                               aria-describedby="fullNameHelp" value="<?= $modalItem["name"] ?>"/>
                        <div id="fullNameHelp" class="form-text">Please set your full name.</div>
                    </div>
                    <div class="mb-3">
                        <label for="update_birth_date" class="form-label">Birth Date</label>
                        <input type="date" class="form-control" id="update_birth_date" name="update_birth_date"
                               aria-describedby="birthDateHelp" value="<?= $modalItem["birth_date"] ?>"/>
                        <div id="birthDateHelp" class="form-text">Please select your birth day</div>
                    </div>
                    <div class="mb-3">
                        <label for="update_document" class="form-label">Document</label>
                        <input type="text" class="form-control document" id="update_document" name="update_document"
                               aria-describedby="cpfHelp" placeholder="999.999.999-99" value="<?= $modalItem["document"] ?>"/>
                        <div id="cpfHelp" class="form-text">Please set your social number</div>
                    </div>
                    <div class="mb-3">
                        <label for="update_phone" class="form-label">Phone</label>
                        <input type="tel" class="form-control phone" id="update_phone" name="update_phone"
                               aria-describedby="phoneHelp" placeholder="(99) 99999-9999" value="<?= $modalItem["phone"] ?>"/>
                        <div id="phonefHelp" class="form-text">Please set your phone number</div>
                    </div>
                    <div class="mb-3">
                        <label for="update_email" class="form-label">E-mail</label>
                        <input type="email" class="form-control" id="update_email" name="update_email"
                               aria-describedby="emailHelp" placeholder="suport@domain.com" value="<?= $modalItem["email"] ?>"/>
                        <div id="emailHelp" class="form-text">Please set your E-mail address</div>
                    </div>
                    <div class="mb-3">
                        <label for="update_address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="update_address" name="update_address"
                               aria-describedby="addressHelp" value="<?= $modalItem["address"] ?>"/>
                        <div id="addressHelp" class="form-text">Please set your address</div>
                    </div>
                    <div class="mb-3">
                        <label for="update_frequency" class="form-label">Frequency</label>
                        <select class="form-control" id="update_frequency" name="update_frequency"
                                aria-describedby="frequencyHelp">
                            <option value="<?= $modalItem["frequency_id"] ?>"><?= $modalItem["frequency"] ?></option>
                            <?php
                            $sqlFrequency = "SELECT id, name FROm frequency WHERE id !=" .$modalItem["frequency_id"];
                            $resFrequency = $conn->prepare($sqlFrequency);
                            $resFrequency->execute();
                            $rowFrequency = $resFrequency->fetchAll(PDO::FETCH_ASSOC);
                            //DEBUG
                            #$resFrequency ->debugDumpParams();
                            foreach ($rowFrequency as $frequency):
                                ?>
                                <option value="<?= $frequency["id"] ?>"><?= $frequency["name"] ?></option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                        <div id="frequencyHelp" class="form-text">Please, select a frequency from your contribuition
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="update_payment" class="form-label">Payment</label>
                        <select class="form-control" id="update_payment" name="update_payment"
                                aria-describedby="paymentHelp">
                            <option value="<?= $modalItem["payment_id"] ?>"><?= $modalItem["payment"] ?></option>
                            <?php
                            $sqlPayment = "SELECT id, type FROm payments WHERE id !=".$modalItem["payment_id"];
                            $resPayment = $conn->prepare($sqlPayment);
                            $resPayment->execute();
                            $rowPayment = $resPayment->fetchAll(PDO::FETCH_ASSOC);
                            //DEBUG
                            #$resPayment ->debugDumpParams();
                            foreach ($rowPayment as $payment):
                                ?>
                                <option value="<?= $payment["id"] ?>"><?= $payment["type"] ?></option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                        <div id="paymentHelp" class="form-text">Please, select a frequency from your contribuition</div>
                    </div>
                    <div class="mb-3">
                        <label for="update_contribution" class="form-label">Contribution</label>
                        <input type="text" class="form-control contribution" id="update_contribution"
                               name="update_contribution" aria-describedby="contributionHelp" value="<?= number_format($modalItem["contribution"],"2", ",", ".")?>"/>
                        <div id="addressHelp" class="form-text">Please set your address</div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>