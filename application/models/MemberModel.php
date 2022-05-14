<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MemberModel extends CI_Model
{
    public function saveMember($memberName,$memberEmail,$memberJoinedDate,$memberTeam,$memberRoute,$memberTelephone,$memberStatus)
    {
        $data = array(
            'name' => $memberName,
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

    public function getMembers()
    {
        return $this->db->select("*")->from("member")->where("status !=","-1")->get()->result();
    }

    public function getMemberById($memberID)
    {
        return $this->db->get_where('member', array("id" => $memberID))->result();
    }

    public function deleteMember($memberID)
    {
        $this->db->set('status', '-1');
        $this->db->where('id', $memberID);
        return $this->db->update('member');
    }

    public function updateMember($memberID,$memberName = null,$memberStatus = null)
    {
        if($memberName){
            $this->db->set('name', $memberName);
        }

        if($memberStatus){
            $this->db->set('status', $memberStatus);
        }

        $this->db->where('id', $memberID);
        return $this->db->update('member');
    }
}
