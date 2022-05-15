<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CommentModel extends CI_Model
{
    public function saveComment($teamID,$memberID,$comment,$managerID)
    {
        $data = array(
            'managerID' => $managerID,
            'status' => '1',
            'memberID' => $memberID, 
            'teamID' => $teamID, 
            'comment' => $comment, 
            'added_date' => date('Y-m-d')
        );

        $this->db->insert('comment', $data);
        return $this->db->insert_id();
    }

    public function getComments()
    {
        return $this->db->select(
            "c.id,c.comment,c.added_date,t.name AS 'team_name', m.name AS 'member_name', 
            mm.name AS 'manager_name'"
        )
        ->from("comment c")->join("team t","c.teamID = t.id")
        ->join("member m","c.memberID = m.id")->join("member mm","c.managerID = mm.id")
        ->where("c.status","1")->get()->result();
    }

    public function getCommentById($commentID)
    {
        return $this->db->get_where('comment', array("id" => $commentID))->result();
    }

    public function deleteComment($commentID)
    {
        $this->db->set('status', '-1');
        $this->db->where('id', $commentID);
        return $this->db->update('comment');
    }

    public function updateComment($comment,$teamID,$memberID,$commentID,$managerID)
    {
        $data = array(
            'managerID' => $managerID, 
            'memberID' => $memberID, 
            'teamID' => $teamID, 
            'comment' => $comment
        );

        $this->db->where('id', $commentID);
        return $this->db->update('comment',$data);
    }
}
