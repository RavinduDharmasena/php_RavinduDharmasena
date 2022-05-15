<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MemberController extends CI_Controller {
    public function __construct()
    {
        parent::__construct();    
        $this->load->model('MemberModel');
        $this->load->model('TeamModel');

    }

    public function viewManageMembers()
    {
        $data['memberData'] = $this->MemberModel->getMembers();
        $data['teamData'] = $this->TeamModel->getTeams();
        $this->template->load('templates/template','pages/manage_members',$data);
    }

    public function addMembers()
    {

        $memberName = $this->input->post('memberName');
        $memberEmail = $this->input->post('memberEmail');
        $memberJoinedDate = $this->input->post('memberJoinedDate');
        $memberTeam = $this->input->post('memberTeam');
        $memberRoute = $this->input->post('memberRoute');
        $memberTelephone = $this->input->post('memberTelephone');
        $memberStatus = $this->input->post('memberStatus');
        $insertedID = $this->MemberModel->saveMember($memberName,$memberEmail,$memberJoinedDate,$memberTeam
                                                    ,$memberRoute,$memberTelephone,$memberStatus);

        if($insertedID > 0){
            echo "success####Member has been saved successfully";
        }
        else{
            echo "error####Member haven't saved successfully";
        }
    }

    public function getMemberData()
    {
        $memberID = $this->uri->segment(2);
        header("Content-Type:allication/json");
        echo json_encode($this->MemberModel->getMemberById($memberID)[0]);
    }

    public function deleteMemberById()
    {
        $memberID = $this->input->post('memberID');
        $deleteResult = $this->MemberModel->deleteMember($memberID);

        if($deleteResult){
            echo "success";
        }
        else{
            echo "error";
        }
    }

    public function updateMemberById()
    {
        $memberID = $this->input->post('memberID');
        $memberName = $this->input->post('memberName');
        $memberStatus = $this->input->post('memberStatus');
        $deleteResult = $this->MemberModel->updateMember($memberID,$memberName,$memberStatus);

        if($deleteResult){
            echo "success####Member is Updated Successfully";
        }
        else{
            echo "error####Member haven't Updated Successfully";
        }
    }
}