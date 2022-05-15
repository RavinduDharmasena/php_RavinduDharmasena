<form id="memberForm">
    <input type="hidden" name="memberID" id="memberID">
    <div class="form-group">
        <label for="memberName">Name</label>
        <input type="text" class="form-control" id="txtMemberName" name="memberName" aria-describedby="memberName" placeholder="Name">
    </div>
    <div class="form-group">
        <label for="chkmemberRole">Role</label>
        <select name="memberRole" id="chkmemberRole" class="form-control">
            <option value="" selected disabled>Please Select</option>
            <option value="MANAGER">Manager</option>
            <option value="MEMBER">Team Member</option>
        </select>
    </div>
    <div class="form-group">
        <label for="memberEmail">Email</label>
        <input type="text" class="form-control" id="txtMemberEmail" name="memberEmail" aria-describedby="memberEmail" placeholder="Email">
    </div>
    <div class="form-group">
        <label for="memberJoinedDate">Joined Date</label>
        <input type="date" class="form-control" id="txtMemberJoinedDate" name="memberJoinedDate" aria-describedby="memberJoinedDate" placeholder="<?php echo date('Y-m-d'); ?>">
    </div>
    <div class="form-group">
        <label for="chkmemberTeam">Team</label>
        <select name="memberTeam" id="chkmemberTeam" class="form-control">
            <option value="" selected disabled>Please Select</option>
            <?php
            foreach ($teamData as $team) {
            ?>
                <option value="<?php echo $team->id; ?>"><?php echo $team->name; ?></option>
            <?php
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="memberRoute">Current Route</label>
        <input type="text" class="form-control" id="txtmemberRoute" name="memberRoute" aria-describedby="memberRoute" placeholder="Route">
    </div>
    <div class="form-group">
        <label for="memberTelephone">Telephone No</label>
        <input type="number" class="form-control" id="txtMemberTelephone" name="memberTelephone" aria-describedby="memberTelephone" placeholder="Telephone">
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
    </div>
</form>

<script>
    function prepareSaveForm() {
        $("#memberForm")[0].reset();
        $("#addUpdateTeamModalTitle").html('Add Team');
        $("#btnSave").show();
        $("#btnUpdate").hide();
        $("#chkmemberRole")[0].selectedIndex = 0
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
                } else {
                    $("#statusMessage").removeClass("alert-success");
                    $("#statusMessage").addClass("alert-danger");
                    $("#statusMessage").removeClass("alert-warning");
                }
                $("#statusMessage").html(message);
                setTimeout(() => {
                    $("#statusMessage").css('display', 'none');
                    location.reload();
                }, 5000);
            })
            .fail((error) => {
                console.error(error);
            })
    }
</script>