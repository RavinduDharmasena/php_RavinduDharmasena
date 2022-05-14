<div style="margin:15px;">
    <button type="button" onclick="openAddMemberModal()" class="btn btn-success" style="margin-bottom: 10px;float:right;" data-toggle="modal" data-target="#addUpdateMemberModal" onclick="resetForm()">
        Add Member
    </button>
    <div class="modal fade" id="addUpdateMemberModal" tabindex="-1" role="dialog" aria-labelledby="addUpdateMemberModalTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="addUpdateMemberModalTitle" class="modal-title" id="exampleModalLongTitle">Add Member</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="memberForm">
                        <input type="hidden" name="memberID" id="memberID">
                        <div class="form-group">
                            <label for="memberName">Name</label>
                            <input type="text" class="form-control" id="txtMemberName" name="memberName" aria-describedby="memberName" placeholder="Team Name">
                        </div>
                        <div class="form-group">
                            <label for="memberEmail">Email</label>
                            <input type="text" class="form-control" id="txtMemberEmail" name="memberEmail" aria-describedby="memberName" placeholder="Team Name">
                        </div>
                        <div class="form-group">
                            <label for="memberJoinedDate">Joined Date</label>
                            <input type="date" class="form-control" id="txtMemberJoinedDate" name="memberJoinedDate" aria-describedby="memberName" placeholder="Team Name">
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
                            <input type="text" class="form-control" id="txtmemberRoute" name="memberRoute" aria-describedby="memberName" placeholder="Team Name">
                        </div>
                        <div class="form-group">
                            <label for="memberTelephone">Telephone No</label>
                            <input type="number" class="form-control" id="txtMemberTelephone" name="memberTelephone" aria-describedby="memberName" placeholder="Team Name">
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
                    <div id="statusMessage" style="display: none;" class="alert alert-primary"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="btnSave" class="btn btn-primary" onclick="submitForm()">Save Member</button>
                    <button type="button" id="btnDelete" class="btn btn-primary" onclick="updateForm()">Update Member</button>
                    <button type="reset" class="btn btn-success" onclick="resetForm()">Reset Form</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deleteMemberModal" tabindex="-1" role="dialog" aria-labelledby="deleteMemberModalTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Delete Team</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span>
                        Do you really want to delete Team ?
                    </span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="deleteTeam()">Yes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Joined Date</th>
                <th scope="col">Telephone No</th>
                <th scope="col">Team ID</th>
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
                    <td><?php echo $member->joined_date; ?></td>
                    <td><?php echo $member->joined_date; ?></td>
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
                        <button class="btn btn-primary" onclick="updateTeamForm('<?php echo $member->id; ?>')" data-toggle="modal" data-target="#addUpdateMemberModal">Edit</button>
                        <button class="btn btn-danger" onclick="setTeamID('<?php echo $member->id; ?>')" data-toggle="modal" data-target="#deleteMemberModal">Delete</button>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>