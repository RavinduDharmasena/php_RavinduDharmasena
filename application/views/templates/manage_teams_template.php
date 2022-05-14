<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Management Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Sales Team</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo base_url('team'); ?>">Manage Teams</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('member'); ?>">Manage Member Members</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Manage Team Member Comments</a>
                </li>
            </ul>
        </div>
    </nav>
    <?php echo $contents; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>

    <script>
        const SITE_URL = "<?php echo base_url(); ?>";

        function openAddTeamModal() {
            $("#addUpdateTeamModalTitle").html('Add Team');
            $("#btnSave").show();
            $("#btnDelete").hide();
        }

        function submitForm() {
            $.ajax({
                    url: SITE_URL + "team",
                    method: "POST",
                    data: $("#teamForm").serialize(),
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

        function updateForm() {
            $.ajax({
                    url: SITE_URL + "team/update/" + $("#teamID").val(),
                    method: "POST",
                    data: $("#teamForm").serialize(),
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

        function resetForm() {
            $("#teamForm")[0].reset();
        }

        function updateTeamForm(teamID) {
            $("#teamID").val(teamID);
            $("#addUpdateTeamModalTitle").html('Update Team');
            $("#btnSave").hide();
            $("#btnDelete").show();
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

        function setTeamID(teamId) {
            $("#teamID").val(teamId);
        }

        function deleteTeam(teamId) {
            console.log(teamId);

            $.ajax({
                    url: SITE_URL + "team/delete/" + $("#teamID").val(),
                    method: "POST",
                    data: {
                        teamID: $("#teamID").val()
                    },
                    beforeSend: function() {
                        console.log("Deleting Data")
                    }
                })
                .done((message) => {
                    if (message === "success") {
                        location.reload();
                    }
                })
                .fail((error) => {
                    console.error(error);
                })
        }
    </script>
</body>

</html>