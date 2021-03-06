<?php 
    $addUpdateModalData['addButtonCaption'] = 'Add Member';
    $addUpdateModalData['addModalCaption'] = 'Add Member';
    $addUpdateModalData['addModalSaveButtonCaption'] = 'Save Member';
    $addUpdateModalData['addModalUpdateButtonCaption'] = 'Update Member';
    $addUpdateModalData['modalFormFilePath'] = 'forms/member_form.php';
    $addUpdateModalData['formSubmitURL'] = base_url('member');
    $addUpdateModalData['formID'] = 'memberForm';
    $this->load->view('templates/add_update_modal.php',$addUpdateModalData);

    $deleteModalData['deleteModalCaption'] = 'Are you sure that you want to delete this member ?';
    $deleteModalData['deletePendingCaption'] = 'Deleting member. Hold for a moment';
    $deleteModalData['deleteSuccessCaption'] = 'Member deleted succcessfully';
    $deleteModalData['deleteFailCaption'] = 'Member deletion failed';
    
    $deleteModalData['deleteModalTitle'] = 'Delete Member';
    $this->load->view('templates/delete_modal.php',$deleteModalData);
    
    $this->load->view('tables/member_tables.php',$deleteModalData);
?>