<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo $deleteModalTitle; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <span id="deleteModalCaption">
                    <?php echo $deleteModalCaption; ?>
                </span>
            </div>
            <div class="modal-footer">
                <button id="deleteBtn" type="button" class="btn btn-primary" onclick="deleteItem()">Yes</button>
                <button id="dismissBtn" type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button id="OkBtn" onclick="reloadPage()" type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>
<script>
    function resetDeleteModal() {
        $("#deleteModalCaption").html("<?php echo $deleteModalCaption; ?>");
        $("#deleteBtn").show();
        $("#dismissBtn").show();
        $("#OkBtn").hide();
    }

    function reloadPage() {
        location.reload();
    }
</script>