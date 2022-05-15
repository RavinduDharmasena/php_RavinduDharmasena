<?php 
    $addUpdateModalData['addButtonCaption'] = 'Add Comment';
    $addUpdateModalData['addModalCaption'] = 'Add Comment';
    $addUpdateModalData['addModalSaveButtonCaption'] = 'Save Comment';
    $addUpdateModalData['addModalUpdateButtonCaption'] = 'Update Comment';
    $addUpdateModalData['modalFormFilePath'] = 'forms/comment_form.php';
    $addUpdateModalData['formSubmitURL'] = base_url('comment');
    $addUpdateModalData['formID'] = 'commentForm';
    $this->load->view('templates/add_update_modal.php',$addUpdateModalData);

    $deleteModalData['deleteModalCaption'] = 'Are you sure that you want to delete this comment ?';
    $deleteModalData['deletePendingCaption'] = 'Deleting comment. Hold for a moment';
    $deleteModalData['deleteSuccessCaption'] = 'Comment deleted succcessfully';
    $deleteModalData['deleteFailCaption'] = 'Comment deletion failed';
    
    $deleteModalData['deleteModalTitle'] = 'Delete Comment';
    $this->load->view('templates/delete_modal.php',$deleteModalData);
    
    $this->load->view('tables/comment_tables.php',$deleteModalData);
?>