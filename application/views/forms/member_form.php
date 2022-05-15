<form id="memberForm">
    <input type="hidden" name="memberID" id="memberID">
    <div class="form-group">
        <label for="txtMemberName">Name</label>
        <input type="text" class="form-control" id="txtMemberName" name="memberName" aria-describedby="memberName" placeholder="Name">
        <span class="error-message" id="nameValidationError"></span>
    </div>
    <div class="form-group">
        <label for="chkMemberRole">Role</label>
        <select name="memberRole" id="chkMemberRole" class="form-control">
            <option value="" selected disabled>Please Select</option>
            <option value="MANAGER">Manager</option>
            <option value="MEMBER">Team Member</option>
        </select>
        <span class="error-message" id="roleValidationError"></span>
    </div>
    <div class="form-group">
        <label for="memberEmail">Email</label>
        <input type="email" class="form-control" id="txtMemberEmail" name="memberEmail" aria-describedby="memberEmail" placeholder="Email">
        <span class="error-message" id="emailValidationError"></span>
    </div>
    <div class="form-group">
        <label for="memberJoinedDate">Joined Date</label>
        <input type="date" class="form-control" id="txtMemberJoinedDate" name="memberJoinedDate" aria-describedby="memberJoinedDate" value="<?php echo date('Y-m-d'); ?>">
    </div>
    <div class="form-group">
        <label for="chkMemberTeam">Team</label>
        <select name="memberTeam" id="chkMemberTeam" class="form-control">
            <option value="" selected disabled>Please Select</option>
            <?php
            foreach ($teamData as $team) {
            ?>
                <option value="<?php echo $team->id; ?>"><?php echo $team->name; ?></option>
            <?php
            }
            ?>
        </select>
        <span class="error-message" id="teamValidationError"></span>
    </div>
    <div class="form-group">
        <label for="txtmemberRoute">Current Route</label>
        <input type="text" class="form-control" id="txtmemberRoute" name="memberRoute" aria-describedby="memberRoute" placeholder="Route">
        <span class="error-message" id="RouteValidationError"></span>
    </div>
    <div class="form-group">
        <label for="txtMemberTelephone">Telephone No</label>
        <input type="number" class="form-control" id="txtMemberTelephone" name="memberTelephone" aria-describedby="memberTelephone" placeholder="Telephone">
        <span class="error-message" id="telephoneValidationError"></span>
    </div>
    <div class="form-group">
        <label for="memberStatus">Member Status</label>
        <div class="form-group">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="memberStatus" id="memberActiveStatus" value="1">
                <label class="form-check-label" for="memberActiveStatus">
                    Active
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="memberStatus" id="memberDeactiveStatus" value="0">
                <label class="form-check-label" for="memberDeactiveStatus">
                    Deactive
                </label>
            </div>
        </div>
        <span class="error-message" id="statusValidationError"></span>
    </div>
</form>

<script>
    function isEmail(email) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
    }

    function validateForm() {
        let isValid = true;
        if (!$("#txtMemberName").val()) {
            $("#nameValidationError").html("Name is required");
            $("#nameValidationError").addClass("show");
            isValid = false;
        } else {
            $("#nameValidationError").html("");
            $("#nameValidationError").removeClass("show");
        }

        if (!$("#chkMemberRole").val()) {
            $("#roleValidationError").html("Role is required");
            $("#roleValidationError").addClass("show");
            isValid = false;
        } else {
            $("#roleValidationError").html("");
            $("#roleValidationError").removeClass("show");
        }

        if (!$("#txtMemberEmail").val()) {
            $("#emailValidationError").html("Email is required");
            $("#emailValidationError").addClass("show");
            isValid = false;
        } else {
            $("#emailValidationError").html("");
            $("#emailValidationError").removeClass("show");
        }

        if(!isEmail($("#txtMemberEmail").val())){
            $("#emailValidationError").html("Email is invalid");
            $("#emailValidationError").addClass("show");
            isValid = false;
        } else {
            $("#emailValidationError").html("");
            $("#emailValidationError").removeClass("show");
        }

        if (!$("#chkMemberTeam").val()) {
            $("#teamValidationError").html("Team is required");
            $("#teamValidationError").addClass("show");
            isValid = false;
        } else {
            $("#teamValidationError").html("");
            $("#teamValidationError").removeClass("show");
        }

        if (!$("#txtmemberRoute").val()) {
            $("#RouteValidationError").html("Current Route is required");
            $("#RouteValidationError").addClass("show");
            isValid = false;
        } else {
            $("#RouteValidationError").html("");
            $("#RouteValidationError").removeClass("show");
        }

        if (!$("#txtMemberTelephone").val()) {
            $("#telephoneValidationError").html("Telephone is required");
            $("#telephoneValidationError").addClass("show");
            isValid = false;
        } else {
            $("#telephoneValidationError").html("");
            $("#telephoneValidationError").removeClass("show");
        }

        if ($("#txtMemberTelephone").val().length !== 10) {
            $("#telephoneValidationError").html("Telephone is invalid");
            $("#telephoneValidationError").addClass("show");
            isValid = false;
        } else {
            $("#telephoneValidationError").html("");
            $("#telephoneValidationError").removeClass("show");
        }

        if (!$("[name='memberStatus']:checked").val()) {
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
        $("#memberForm")[0].reset();
        $("#addUpdateTeamModalTitle").html('Add Team');
        $("#btnSave").show();
        $("#btnUpdate").hide();
        $("#chkMemberRole")[0].selectedIndex = 0
        $(".error-message").removeClass("show");
        $("#statusMessage").css('display', 'none');
    }

    function updateForm() {
        $.ajax({
                url: SITE_URL + "member/update/" + $("#memberID").val(),
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