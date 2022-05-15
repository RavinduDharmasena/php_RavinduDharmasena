<?php 
    $addUpdateModalData['addButtonCaption'] = 'Add Team';
    $addUpdateModalData['addModalCaption'] = 'Add Team';
    $addUpdateModalData['addModalSaveButtonCaption'] = 'Save Team';
    $addUpdateModalData['addModalUpdateButtonCaption'] = 'Update Team';
    $addUpdateModalData['modalFormFilePath'] = 'forms/team_form.php';
    $addUpdateModalData['formSubmitURL'] = base_url('team');
    $addUpdateModalData['formID'] = 'teamForm';
    $this->load->view('templates/add_update_modal.php',$addUpdateModalData);

    $deleteModalData['deleteModalCaption'] = 'Are you sure that you want to delete this team ?';
    $deleteModalData['deletePendingCaption'] = 'Deleting team. Hold for a moment';
    $deleteModalData['deleteSuccessCaption'] = 'Team deleted succcessfully';
    $deleteModalData['deleteFailCaption'] = 'Team deletion failed';
    
    $deleteModalData['deleteModalTitle'] = 'Delete Team';
    $this->load->view('templates/delete_modal.php',$deleteModalData);
    
    $this->load->view('tables/team_tables.php',$deleteModalData);
?>