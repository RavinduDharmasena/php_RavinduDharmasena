<table id="memberTable" class="table table-striped table-hover table-bordered">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Joined Date</th>
            <th scope="col">Telephone No</th>
            <th scope="col">Team</th>
            <th scope="col">Role</th>
            <th scope="col">Current Route</th>
            <th scope="col">Status</th>
            <th>Operations</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($memberData as $member) {
        ?>
            <tr>
                <th scope="row"><?php echo $member->id; ?></th>
                <td><?php echo $member->name; ?></td>
                <td><?php echo $member->email; ?></td>
                <td><?php echo $member->joined_date; ?></td>
                <td><?php echo $member->telephone_no; ?></td>
                <td><?php echo $member->team_name; ?></td>
                <td><?php echo $member->role; ?></td>
                <td><?php echo $member->current_route; ?></td>
                <td>
                    <?php
                    if ($member->status == "0") {
                        echo "Deactive";
                    } else {
                        echo "Active";
                    }
                    ?>
                </td>
                <td>
                    <button class="btn btn-primary" onclick="prepareUpdateMemberForm('<?php echo $member->id; ?>')" data-toggle="modal" data-target="#addUpdateModal">Edit</button>
                    <button class="btn btn-danger" onclick="setMemberID('<?php echo $member->id; ?>')" data-toggle="modal" data-target="#deleteModal">Delete</button>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<script>
    $("#memberTable").DataTable();

    function setMemberID(memberId) {
        $("#memberID").val(memberId);
        resetDeleteModal();
    }

    function prepareUpdateMemberForm(memberID) {
        $("#memberID").val(memberID);
        $("#addUpdateModalTitle").html('Update Member');
        $("#btnSave").hide();
        $("#btnUpdate").show();
        console.log("executing")
        $.ajax({
                url: SITE_URL + "member/" + memberID,
                method: "POST",
                beforeSend: function() {
                    console.log("Getting Data")
                }
            })
            .done((member) => {
                console.log(member);
                $("#txtMemberName").val(member.name);
                $("#txtMemberEmail").val(member.email);
                $("#txtMemberJoinedDate").val(member.joined_date);
                $("#chkmemberTeam").val(member.teamID);
                $("#txtmemberRoute").val(member.current_route);
                $("#txtMemberTelephone").val(member.telephone_no);

                let html = '<option value="" disabled>Please Select</option>';
                let selected = (member.role === "MANAGER") ? 'selected' : '';
                html += '<option value="MANAGER" ' + selected + '>Manager</option>';

                selected = (member.role === "MEMBER") ? 'selected' : '';
                html += '<option value="MEMBER" ' + selected + '>Team Member</option>';

                $("#chkmemberRole").html(html);

                if (member.status === "1") {
                    $("#memberActiveStatus").prop("checked", true);
                    $("#memberDeactiveStatus").prop("checked", false);
                } else {
                    $("#memberActiveStatus").prop("checked", false);
                    $("#memberDeactiveStatus").prop("checked", true);
                }
            })
            .fail((error) => {
                console.error(error);
            })
    }

    function deleteItem(memberId) {
        $.ajax({
                url: SITE_URL + "member/delete/" + $("#memberID").val(),
                method: "POST",
                data: {
                    memberID: $("#memberID").val()
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
                } else {
                    $("#deleteModalCaption").html("<?php echo $deleteFailCaption; ?>");
                }
            })
            .fail((error) => {
                console.error(error);
                $("#deleteModalCaption").html("<?php echo $deleteFailCaption; ?>");
            })
    }
</script>