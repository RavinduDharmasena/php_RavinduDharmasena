<button type="button" onclick="prepareSaveForm()" class="btn btn-success" style="margin-bottom: 10px;float:right;" data-toggle="modal" data-target="#addUpdateModal">
    <?php echo $addButtonCaption; ?>
</button>
<div class="modal fade" id="addUpdateModal" tabindex="-1" role="dialog" aria-labelledby="addUpdateModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="addUpdateModalTitle" class="modal-title"><?php echo $addModalCaption; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php $this->load->view($modalFormFilePath); ?>
                <div id="statusMessage" style="display: none;" class="alert alert-primary"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="btnSave" class="btn btn-primary" onclick="submitForm()"><?php echo $addModalSaveButtonCaption; ?></button>
                <button type="button" id="btnUpdate" class="btn btn-primary" onclick="updateForm()"><?php echo $addModalUpdateButtonCaption; ?></button>
                <button type="reset" class="btn btn-success">Reset Form</button>
            </div>
        </div>
    </div>
</div>

<script>
    function submitForm() {
        $.ajax({
                url: "<?php echo $formSubmitURL; ?>",
                method: "POST",
                data: $("<?php echo '#' . $formID; ?>").serialize(),
                beforeSend: function() {
                    $("#statusMessage").removeAttr('style');
                    $("#statusMessage").html("Hold for a Moment")
                    $("#statusMessage").removeClass("alert-success");
                    $("#statusMessage").removeClass("alert-danger");
                    $("#statusMessage").addClass("alert-warning");
                }
            })
            .done((msg) => {
                let messageStatus = msg.split("####")[0];
                let message = msg.split("####")[1];

                if (messageStatus === "success") {
                    $("#statusMessage").addClass("alert-success");
                    $("#statusMessage").removeClass("alert-danger");
                    $("#statusMessage").removeClass("alert-warning");
                } else {
                    $("#statusMessage").removeClass("alert-success");
                    $("#statusMessage").addClass("alert-danger");
                    $("#statusMessage").removeClass("alert-warning");
                }
                $("#statusMessage").html(message);
                setTimeout(() => {
                    $("#statusMessage").css('display', 'none');
                    // location.reload();
                }, 5000);
            })
            .fail((error) => {
                console.error(error);
            })
    }
</script>