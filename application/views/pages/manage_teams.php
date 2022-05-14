<div style="margin:15px;">
    <button type="button" onclick="openAddTeamModal()" class="btn btn-success" style="margin-bottom: 10px;float:right;" data-toggle="modal" data-target="#addUpdateTeamModal" onclick="resetForm()">
        Add Team
    </button>
    <div class="modal fade" id="addUpdateTeamModal" tabindex="-1" role="dialog" aria-labelledby="addUpdateTeamModalTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="addUpdateTeamModalTitle" class="modal-title" id="exampleModalLongTitle">Add Team</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="teamForm">
                        <input type="hidden" name="teamID" id="teamID">
                        <div class="form-group">
                            <label for="teamName">Name</label>
                            <input type="text" class="form-control" id="txtTeamName" name="teamName" aria-describedby="teamName" placeholder="Team Name">
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
                        </div>
                    </form>
                    <div id="statusMessage" style="display: none;" class="alert alert-primary"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="btnSave" class="btn btn-primary" onclick="submitForm()">Save Team</button>
                    <button type="button" id="btnDelete" class="btn btn-primary" onclick="updateForm()">Update Team</button>
                    <button type="reset" class="btn btn-success" onclick="resetForm()">Reset Form</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deleteTeamModal" tabindex="-1" role="dialog" aria-labelledby="deleteTeamModalTitle" aria-hidden="true">
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
                        <button class="btn btn-primary" onclick="updateTeamForm('<?php echo $team->id; ?>')" data-toggle="modal" data-target="#addUpdateTeamModal">Edit</button>
                        <button class="btn btn-danger" onclick="setTeamID('<?php echo $team->id; ?>')" data-toggle="modal" data-target="#deleteTeamModal">Delete</button>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>