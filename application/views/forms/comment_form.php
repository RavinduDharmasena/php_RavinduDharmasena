<form id="commentForm">
    <input type="hidden" name="commentID" id="commentID">
    <div class="form-group">
        <label for="chkTeam">Team</label>
        <select name="team" id="chkTeam" onchange="getMembersByTeamId(this.value)" class="form-control">
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
        <label for="chkMember">Member</label>
        <select name="member" id="chkMember" class="form-control">
            <option value="" selected disabled>Please Select</option>
        </select>
        <span class="error-message" id="memberValidationError"></span>
    </div>
    <div class="form-group">
        <label for="chkManager">Manager</label>
        <select name="manager" id="chkManager" class="form-control">
            <option value="" selected disabled>Please Select</option>
            <?php
            foreach ($managerData as $manager) {
            ?>
                <option value="<?php echo $manager->id; ?>"><?php echo $manager->name; ?></option>
            <?php
            }
            ?>
        </select>
        <span class="error-message" id="managerValidationError"></span>
    </div>
    <div class="form-group">
        <label for="txtAreaComment">Comment</label>
        <textarea class="form-control" name="comment" id="txtAreaComment" cols="30" rows="10"></textarea>
        <span class="error-message" id="commentValidationError"></span>
    </div>
</form>

<script>
    function validateForm() {
        let isValid = true;
        if(!$("#chkTeam").val()){
            $("#teamValidationError").html("Team is required");
            $("#teamValidationError").addClass("show");
            isValid = false;
        }
        else{
            $("#teamValidationError").html("");
            $("#teamValidationError").removeClass("show");
        }

        if(!$("#chkMember").val()){
            $("#memberValidationError").html("Member is required");
            $("#memberValidationError").addClass("show");
            isValid = false;
        }
        else{
            $("#memberValidationError").html("");
            $("#memberValidationError").removeClass("show");
        }

        if(!$("#chkManager").val()){
            $("#managerValidationError").html("Manager is required");
            $("#managerValidationError").addClass("show");
            isValid = false;
        }
        else{
            $("#managerValidationError").html("");
            $("#managerValidationError").removeClass("show");
        }

        if($("#txtAreaComment").val() === ""){
            $("#commentValidationError").html("Comment is required");
            $("#commentValidationError").addClass("show");
            isValid = false;
        }
        else{
            $("#commentValidationError").html("");
            $("#commentValidationError").removeClass("show");
        }

        return isValid;
    }

    function getMembersByTeamId(teamId) {
        $.ajax({
                url: SITE_URL + "member/team/" + teamId,
                method: "POST",
                data:{
                    teamId:teamId
                },
                beforeSend: function() {
                    console.log("Getting Data")
                }
            })
            .done((member) => {
                let html = '<option value="" disabled>Please Select</option>';
                member.forEach(element => {
                    console.log(element);
                    html += '<option value="' + element.id + '">' + element.name + '</option>';
                });
                $("#chkMember").html(html);
            })
            .fail((error) => {
                console.error(error);
            })
    }

    function prepareSaveForm() {
        $("#commentForm")[0].reset();
        $("#addUpdateTeamModalTitle").html('Add Comment');
        $("#btnSave").show();
        $("#btnUpdate").hide();
        $("#chkTeam")[0].selectedIndex = 0
        $("#chkMember")[0].selectedIndex = 0
        $("#chkManager")[0].selectedIndex = 0
        $("#txtAreaComment").html('');
        $(".error-message").removeClass("show")
    }

    function updateForm() {
        $.ajax({
                url: SITE_URL + "comment/update/" + $("#commentID").val(),
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