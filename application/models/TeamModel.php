<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TeamModel extends CI_Model
{
    public function saveTeam($teamName,$teamStatus)
    {
        $data = array(
            'name' => $teamName,
            'status' => $teamStatus
        );

        $this->db->insert('team', $data);
        return $this->db->insert_id();
    }

    public function getTeams()
    {
        return $this->db->select("*")->from("team")->where("status !=","-1")->get()->result();
    }

    public function getActiveTeams()
    {
        return $this->db->select("*")->from("team")->where("status","1")->get()->result();
    }

    public function getTeamById($teamID)
    {
        return $this->db->get_where('team', array("id" => $teamID))->result();
    }

    public function deleteTeam($teamID)
    {
        $this->db->set('status', '-1');
        $this->db->where('id', $teamID);
        return $this->db->update('team');
    }

    public function updateTeam($teamID,$teamName,$teamStatus)
    {
        $data = array();

        $data = array(
            'name' => $teamName,
            'status' => $teamStatus
        );

        $this->db->where('id', $teamID);
        return $this->db->update('team',$data);
    }
}
