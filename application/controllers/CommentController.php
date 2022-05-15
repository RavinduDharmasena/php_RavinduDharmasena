<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CommentController extends CI_Controller {
    public function __construct()
    {
        parent::__construct();    
        $this->load->model('CommentModel');
        $this->load->model('TeamModel');

    }

    public function viewManageComments()
    {
        $data['commentData'] = $this->CommentModel->getComments();
        $data['teamData'] = $this->TeamModel->getTeams();
        $this->template->load('templates/template','pages/manage_comments',$data);
    }

    public function addComments()
    {
        $comment = $this->input->post('comment');
        $teamID = $this->input->post('team');
        $memberID = $this->input->post('member');
        $insertedID = $this->CommentModel->saveComment($teamID,$memberID,$comment);

        if($insertedID > 0){
            echo "success####Comment has been saved successfully";
        }
        else{
            echo "error####Comment haven't saved successfully";
        }
    }

    public function getCommentData()
    {
        $commentID = $this->uri->segment(2);
        header("Content-Type:allication/json");
        echo json_encode($this->CommentModel->getCommentById($commentID)[0]);
    }

    public function deleteCommentById()
    {
        $commentID = $this->input->post('commentID');
        $deleteResult = $this->CommentModel->deleteComment($commentID);

        if($deleteResult){
            echo "success";
        }
        else{
            echo "error";
        }
    }

    public function updateCommentById()
    {
        $commentID = $this->input->post('commentID');
        $comment = $this->input->post('comment');
        $teamID = $this->input->post('team');
        $memberID = $this->input->post('member');
        $deleteResult = $this->CommentModel->updateComment($comment,$teamID,$memberID,$commentID);

        if($deleteResult){
            echo "success####Comment is Updated Successfully";
        }
        else{
            echo "error####Comment haven't Updated Successfully";
        }
    }
}