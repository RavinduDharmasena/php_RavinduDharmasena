<table id="commentTable" class="table table-striped table-hover table-bordered">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Comment</th>
            <th scope="col">Team</th>
            <th scope="col">Member Name</th>
            <th scope="col">Manager Name</th>
            <th scope="col">Added Date</th>
            <th>Operations</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($commentData as $comment) {
        ?>
            <tr>
                <th scope="row"><?php echo $comment->id; ?></th>
                <td><?php echo $comment->comment; ?></td>
                <td><?php echo $comment->team_name; ?></td>
                <td><?php echo $comment->member_name; ?></td>
                <td><?php echo $comment->manager_name; ?></td>
                <td><?php echo $comment->added_date; ?></td>
                <td>
                    <button class="btn btn-primary" onclick="prepareUpdateCommentForm('<?php echo $comment->id; ?>')" data-toggle="modal" data-target="#addUpdateModal">Edit</button>
                    <button class="btn btn-danger" onclick="setCommentID('<?php echo $comment->id; ?>')" data-toggle="modal" data-target="#deleteModal">Delete</button>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<script>
    $("#commentTable").DataTable();

    function setCommentID(commentId) {
        $("#commentID").val(commentId);
        resetDeleteModal();
    }

    function prepareUpdateCommentForm(commentID) {
        $("#commentID").val(commentID);
        $("#addUpdateModalTitle").html('Update Comment');
        $("#btnSave").hide();
        $("#btnUpdate").show();
        console.log("executing")
        $.ajax({
                url: SITE_URL + "comment/" + commentID,
                method: "POST",
                beforeSend: function() {
                    console.log("Getting Data")
                }
            })
            .done((comment) => {
                console.log(comment);
                getMembersByTeamId(comment.teamID);
                $("#txtAreaComment").html(comment.comment);
                $("#chkteam").val(comment.teamID);
                $("#chkMember").val(comment.memberID);

                $("#chkManager").val(comment.managerID);
            })
            .fail((error) => {
                console.error(error);
            })
    }

    function deleteItem(commentId) {
        $.ajax({
                url: SITE_URL + "comment/delete/" + $("#commentID").val(),
                method: "POST",
                data: {
                    commentID: $("#commentID").val()
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