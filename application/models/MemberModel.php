<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MemberModel extends CI_Model
{
    public function saveMember($memberName,$memberRole,$memberEmail,$memberJoinedDate,$memberTeam,$memberRoute,$memberTelephone,$memberStatus)
    {
        $data = array(
            'name' => $memberName,
            'role' => $memberRole,
            'status' => $memberStatus,
            'email' => $memberEmail, 
            'telephone_no' => $memberTelephone, 
            'joined_date' => $memberJoinedDate, 
            'current_route' => $memberRoute, 
            'teamID' => $memberTeam,
            'status' => $memberStatus
        );

        $this->db->insert('member', $data);
        return $this->db->insert_id();
    }

    public function getManagerByTeamID($teamID)
    {
        return $this->db->get_where('member',array('role' => 'MANAGER','teamID' => $teamID))->result();
    }

    public function getManagers()
    {
        return $this->db->get_where('member',array('role' => 'MANAGER','status' => '1'))->result();
    }

    public function getMembers()
    {
        return $this->db->select(
            "m.id,m.name,m.role, m.email, m.telephone_no, m.joined_date, m.current_route, m.status,t.name AS 'team_name'"
        )
        ->from("member m")->join("team t","m.teamID = t.id")->where("m.status !=","-1")->get()->result();
    }

    public function getMemberById($memberID)
    {
        return $this->db->get_where('member', array("id" => $memberID))->result();
    }

    public function getMemberByTeamId($teamID)
    {
        return $this->db->get_where('member', array("teamID" => $teamID))->result();
    }

    public function deleteMember($memberID)
    {
        $this->db->set('status', '-1');
        $this->db->where('id', $memberID);
        return $this->db->update('member');
    }

    public function updateMember($memberName,$memberRole,$memberEmail,$memberJoinedDate,$memberTeam
    ,$memberRoute,$memberTelephone,$memberStatus,$memberID)
    {
        $data = array(
            'name' => $memberName,
            'role' => $memberRole,
            'status' => $memberStatus,
            'email' => $memberEmail, 
            'telephone_no' => $memberTelephone, 
            'joined_date' => $memberJoinedDate, 
            'current_route' => $memberRoute, 
            'teamID' => $memberTeam,
            'status' => $memberStatus
        );

        $this->db->where('id', $memberID);
        return $this->db->update('member',$data);
    }
}
