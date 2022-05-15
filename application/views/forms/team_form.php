<form id="<?php echo $formID; ?>">
    <input type="hidden" name="teamID" id="teamID">
    <div class="form-group">
        <label for="txtTeamName">Name</label>
        <input type="text" class="form-control" id="txtTeamName" name="teamName" aria-describedby="teamName" placeholder="Team Name">
        <span class="error-message" id="teamValidationError"></span>
    </div>
    <div class="form-group">
        <label for="chkManager">Team Status</label>
        <div class="form-group">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="teamStatus" id="teamActiveStatus" value="1">
                <label class="form-check-label" for="teamActiveStatus">
                    Active
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="teamStatus" id="teamDeactiveStatus" value="0">
                <label class="form-check-label" for="teamDeactiveStatus">
                    Deactive
                </label>
            </div>
        </div>
        <span class="error-message" id="statusValidationError"></span>
    </div>
</form>

<script>
    function validateForm() {
        let isValid = true;
        if (!$("#txtTeamName").val()) {
            $("#teamValidationError").html("Team is required");
            $("#teamValidationError").addClass("show");
            isValid = false;
        } else {
            $("#teamValidationError").html("");
            $("#teamValidationError").removeClass("show");
        }

        if (!$("[name='teamStatus']:checked").val()) {
            $("#statusValidationError").html("Status is required");
            $("#statusValidationError").addClass("show");
            isValid = false;
        } else {
            $("#statusValidationError").html("");
            $("#statusValidationError").removeClass("show");
        }

        return isValid;
    }

    function prepareSaveForm() {
        $("#teamForm")[0].reset();
        $("#addUpdateTeamModalTitle").html('Add Team');
        $("#btnSave").show();
        $("#btnUpdate").hide();
        $("#statusMessage").css('display', 'none');
    }

    function updateForm() {
        $.ajax({
                url: SITE_URL + "team/update/" + $("#teamID").val(),
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
                    $("#statusMessage").html(message);
                    setTimeout(() => {
                        $("#statusMessage").css('display', 'none');
                        location.reload();
                    }, 5000);
                } else {
                    $("#statusMessage").removeClass("alert-success");
                    $("#statusMessage").addClass("alert-danger");
                    $("#statusMessage").removeClass("alert-warning");
                    $("#statusMessage").html(message);
                }
            })
            .fail((error) => {
                console.error(error);
            })
    }
</script>