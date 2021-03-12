<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Customer Registration</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form name="myForm" method="post" action="create/register_customer.php" class="needs-validation" novalidate>
                    <div class="mb-3">
                        <label for="register_name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="register_name" name="register_name" aria-describedby="fullNameHelp" minlength="5" required/>
                        <div id="fullNameHelp" class="form-text">Please set your full name.</div>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please insert a name with a min length 5.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="register_birth_date" class="form-label">Birth Date</label>
                        <input type="date" class="form-control" id="register_birth_date" name="register_birth_date" aria-describedby="register_birth_date" required/>
                        <div id="birthDateHelp" class="form-text">Please select your birth day</div>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please insert a valid date.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="register_document" class="form-label">Document</label>
                        <input type="text" class="form-control document" id="register_document" name="register_document" aria-describedby="cpfHelp" placeholder="999.999.999-99" minlength="14"/>
                        <div id="cpfHelp" class="form-text">Please set your social number</div>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please insert a document with a length 14.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="register_phone" class="form-label">Phone</label>
                        <input type="tel" class="form-control phone" id="register_phone" name="register_phone" aria-describedby="phoneHelp" placeholder="(99) 99999-9999"/>
                        <div id="phoneHelp" class="form-text">Please set your phone number</div>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please insert a number with DDD cod and identify digit.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="register_email" class="form-label">E-mail</label>
                        <input type="email" class="form-control" id="register_email" name="register_email" aria-describedby="emailHelp" placeholder="suport@domain.com"/>
                        <div id="emailHelp" class="form-text">Please set your E-mail address</div>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please insert a valid E-mail.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="register_address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="register_address" name="register_address" aria-describedby="addressHelp" minlength="10"/>
                        <div id="addressHelp" class="form-text">Please set your address</div>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please insert a full address.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="register_frequency" class="form-label">Frequency</label>
                        <select class="form-control" id="register_frequency" name="register_frequency" aria-describedby="frequencyHelp" required>
                            <?php
                            $sqlFrequency = "SELECT id, name FROm frequency";
                            $resFrequency = $conn->prepare($sqlFrequency);
                            $resFrequency ->execute();
                            $rowFrequency = $resFrequency->fetchAll(PDO::FETCH_ASSOC);
                            //DEBUG
                            #$resFrequency ->debugDumpParams();
                            foreach($rowFrequency as $frequency):
                                ?>
                                <option value="<?= $frequency["id"]?>"><?= $frequency["name"]?></option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                        <div id="frequencyHelp" class="form-text">Please, select a frequency from your contribution</div>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please insert a name.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="register_payment" class="form-label">Payment</label>
                        <select class="form-control" id="register_payment" name="register_payment" aria-describedby="paymentHelp" required>
                            <?php
                            $sqlPayment = "SELECT id, type FROm payments";
                            $resPayment = $conn->prepare($sqlPayment);
                            $resPayment ->execute();
                            $rowPayment = $resPayment->fetchAll(PDO::FETCH_ASSOC);
                            //DEBUG
                            #$resPayment ->debugDumpParams();
                            foreach($rowPayment as $payment):
                            ?>
                                <option value="<?= $payment["id"]?>"><?= $payment["type"]?></option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                        <div id="paymentHelp" class="form-text">Please, select a frequency from your contribuition</div>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please insert a name.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="register_contribution" class="form-label">Contribution</label>
                        <input type="text" class="form-control contribution" id="register_contribution" name="register_contribution" aria-describedby="contributionHelp" placeholder="0.000,00" required/>
                        <div id="addressHelp" class="form-text">Please set your contribution</div>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please insert a contribution value.
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
