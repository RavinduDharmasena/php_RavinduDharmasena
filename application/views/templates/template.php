<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Management Admin</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/jquery.dataTables.min.css'); ?>">
    <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.dataTables.min.js'); ?>"></script>
</head>

<body>
    <?php
    $this->load->view('templates/navigation_bar.php');
    ?>
    <div style="margin:15px;">
        <?php echo $contents; ?>
    </div>
    <script src="<?php echo base_url('assets/js/popper.min.js'); ?>" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    

    <script>
        const SITE_URL = "<?php echo base_url(); ?>";

        // function openAddMemberModal() {
        //     $("#addUpdateMemberModalTitle").html('Add Member');
        //     $("#btnSave").show();
        //     $("#btnDelete").hide();
        // }

        // function submitForm() {
        //     $.ajax({
        //             url: SITE_URL + "member",
        //             method: "POST",
        //             data: $("#memberForm").serialize(),
        //             beforeSend: function() {
        //                 $("#statusMessage").removeAttr('style');
        //                 $("#statusMessage").html("Hold for a Moment")
        //                 $("#statusMessage").removeClass("alert-success");
        //                 $("#statusMessage").removeClass("alert-danger");
        //                 $("#statusMessage").addClass("alert-warning");
        //             }
        //         })
        //         .done((msg) => {
        //             let messageStatus = msg.split("####")[0];
        //             let message = msg.split("####")[1];

        //             if (messageStatus === "success") {
        //                 $("#statusMessage").addClass("alert-success");
        //                 $("#statusMessage").removeClass("alert-danger");
        //                 $("#statusMessage").removeClass("alert-warning");
        //             } else {
        //                 $("#statusMessage").removeClass("alert-success");
        //                 $("#statusMessage").addClass("alert-danger");
        //                 $("#statusMessage").removeClass("alert-warning");
        //             }
        //             $("#statusMessage").html(message);
        //             setTimeout(() => {
        //                 $("#statusMessage").css('display', 'none');
        //                 location.reload();
        //             }, 5000);
        //         })
        //         .fail((error) => {
        //             console.error(error);
        //         })
        // }

        // function updateForm() {
        //     $.ajax({
        //             url: SITE_URL + "member/update/" + $("#memberID").val(),
        //             method: "POST",
        //             data: $("#memberForm").serialize(),
        //             beforeSend: function() {
        //                 $("#statusMessage").removeAttr('style');
        //                 $("#statusMessage").html("Hold for a Moment")
        //                 $("#statusMessage").removeClass("alert-success");
        //                 $("#statusMessage").removeClass("alert-danger");
        //                 $("#statusMessage").addClass("alert-warning");
        //             }
        //         })
        //         .done((msg) => {
        //             let messageStatus = msg.split("####")[0];
        //             let message = msg.split("####")[1];

        //             if (messageStatus === "success") {
        //                 $("#statusMessage").addClass("alert-success");
        //                 $("#statusMessage").removeClass("alert-danger");
        //                 $("#statusMessage").removeClass("alert-warning");
        //             } else {
        //                 $("#statusMessage").removeClass("alert-success");
        //                 $("#statusMessage").addClass("alert-danger");
        //                 $("#statusMessage").removeClass("alert-warning");
        //             }
        //             $("#statusMessage").html(message);
        //             setTimeout(() => {
        //                 $("#statusMessage").css('display', 'none');
        //                 location.reload();
        //             }, 5000);
        //         })
        //         .fail((error) => {
        //             console.error(error);
        //         })
        // }

        // function resetForm() {
        //     $("#memberForm")[0].reset();
        // }

        // function updateMemberForm(memberID) {
        //     $("#memberID").val(memberID);
        //     $("#addUpdateMemberModalTitle").html('Update Member');
        //     $("#btnSave").hide();
        //     $("#btnDelete").show();
        //     console.log("executing")
        //     $.ajax({
        //             url: SITE_URL + "member/" + memberID,
        //             method: "POST",
        //             beforeSend: function() {
        //                 console.log("Getting Data")
        //             }
        //         })
        //         .done((member) => {
        //             console.log(member);
        //             $("#txtMemberName").val(member.name);

        //             if (member.status === "1") {
        //                 $("#memberActiveStatus").prop("checked", true);
        //                 $("#memberDeactiveStatus").prop("checked", false);
        //             } else {
        //                 $("#memberActiveStatus").prop("checked", false);
        //                 $("#memberDeactiveStatus").prop("checked", true);
        //             }
        //         })
        //         .fail((error) => {
        //             console.error(error);
        //         })
        // }

        // function setMemberID(memberId) {
        //     $("#memberID").val(memberId);
        // }

        // function deleteMember(memberId) {
        //     console.log(memberId);

        //     $.ajax({
        //             url: SITE_URL + "member/delete/" + $("#memberID").val(),
        //             method: "POST",
        //             data: {
        //                 memberID: $("#memberID").val()
        //             },
        //             beforeSend: function() {
        //                 console.log("Deleting Data")
        //             }
        //         })
        //         .done((message) => {
        //             if (message === "success") {
        //                 location.reload();
        //             }
        //         })
        //         .fail((error) => {
        //             console.error(error);
        //         })
        // }
    </script>
</body>

</html>