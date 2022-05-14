<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TeamController extends CI_Controller {
    public function __construct()
    {
        parent::__construct();    
        $this->load->model('TeamModel');
    }

    public function viewManageTeams()
    {
        $data['teamData'] = $this->TeamModel->getTeams();
        $this->template->load('templates/manage_teams_template','pages/manage_teams',$data);
    }

    public function addTeams()
    {
        $teamName = $this->input->post('teamName');
        $teamStatus = $this->input->post('teamStatus');
        $insertedID = $this->TeamModel->saveTeam($teamName,$teamStatus);

        if($insertedID > 0){
            echo "success####Team has been saved successfully";
        }
        else{
            echo "error####Team haven't saved successfully";
        }
    }

    public function getTeamData()
    {
        $teamID = $this->uri->segment(2);
        header("Content-Type:allication/json");
        echo json_encode($this->TeamModel->getTeamById($teamID)[0]);
    }

    public function deleteTeamById()
    {
        $teamID = $this->input->post('teamID');
        $deleteResult = $this->TeamModel->deleteTeam($teamID);

        if($deleteResult){
            echo "success";
        }
        else{
            echo "error";
        }
    }

    public function updateTeamById()
    {
        $teamID = $this->input->post('teamID');
        $teamName = $this->input->post('teamName');
        $teamStatus = $this->input->post('teamStatus');
        $deleteResult = $this->TeamModel->updateTeam($teamID,$teamName,$teamStatus);

        if($deleteResult){
            echo "success####Team is Updated Successfully";
        }
        else{
            echo "error####Team haven't Updated Successfully";
        }
    }
}