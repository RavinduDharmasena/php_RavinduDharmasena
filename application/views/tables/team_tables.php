<table id="teamTable" class="table table-striped table-hover table-bordered">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Status</th>
            <th>Operations</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($teamData as $team) {
        ?>
            <tr>
                <th scope="row"><?php echo $team->id; ?></th>
                <td><?php echo $team->name; ?></td>
                <td>
                    <?php
                    if ($team->status == "0") {
                        echo "Deactive";
                    } else {
                        echo "Active";
                    }
                    ?>
                </td>
                <td>
                    <button class="btn btn-primary" onclick="prepareUpdateTeamForm('<?php echo $team->id; ?>')" data-toggle="modal" data-target="#addUpdateTeamModal">Edit</button>
                    <button class="btn btn-danger" onclick="setTeamID('<?php echo $team->id; ?>')" data-toggle="modal" data-target="#deleteTeamModal">Delete</button>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<script>
    $("#teamTable").DataTable();

    function setTeamID(teamId) {
        $("#teamID").val(teamId);
        resetDeleteModal();
    }

    function prepareUpdateTeamForm(teamID) {
        $("#teamID").val(teamID);
        $("#addUpdateTeamModalTitle").html('Update Team');
        $("#btnSave").hide();
        $("#btnUpdate").show();
        console.log("executing")
        $.ajax({
                url: SITE_URL + "team/" + teamID,
                method: "POST",
                beforeSend: function() {
                    console.log("Getting Data")
                }
            })
            .done((team) => {
                console.log(team);
                $("#txtTeamName").val(team.name);

                if (team.status === "1") {
                    $("#teamActiveStatus").prop("checked", true);
                    $("#teamDeactiveStatus").prop("checked", false);
                } else {
                    $("#teamActiveStatus").prop("checked", false);
                    $("#teamDeactiveStatus").prop("checked", true);
                }
            })
            .fail((error) => {
                console.error(error);
            })
    }

    function deleteItem(teamId) {
        $.ajax({
                url: SITE_URL + "team/delete/" + $("#teamID").val(),
                method: "POST",
                data: {
                    teamID: $("#teamID").val()
                },
                beforeSend: function() {
                    $("#deleteModalCaption").html("<?php echo $deletePendingCaption; ?>");
                }
            })
            .done((message) => {
                if (message === "success") {
                    $("#deleteModalCaption").html("<?php echo $deleteSuccessCaption; ?>");
                    $("#deleteBtn").hide();
                    $("#dismissBtn").hide();
                    $("#OkBtn").show();
                }
                else{
                    $("#deleteModalCaption").html("<?php echo $deleteFailCaption; ?>");
                }
            })
            .fail((error) => {
                console.error(error);
                $("#deleteModalCaption").html("<?php echo $deleteFailCaption; ?>");
            })
    }
</script>