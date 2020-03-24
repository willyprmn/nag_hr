<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class MasterKaryawanDetail_model extends CI_Model
{
    public function read()
    {
        $data = $this->db->select('*')
                         ->from('karyawan')
                         ->get()->result();
                         return $data;
    }

    public function createNewKaryawanDetail($data)
    {
        $res = $this->db->insert('masterkaryawan_det',$data);
        
        if($res){
            return true;
        }
        else{
            return false;
        }
    }

    public function getDetailKaryawanDetail($id)
    {
        $data = $this->db->select('*')
                         ->from('masterkaryawan_det')
                         ->where('id_karyawan',$id)
                         ->get()->row();
                         return $data;
    }

    public function updateKaryawanDetail($data,$id)
    {        
        $res = $this->db->update('masterkaryawan_det', $data, array('id_karyawan' => $id));
        return $res;
    }
    
    public function deleteKaryawanDetail($id)
    {        
        $res = $this->db->delete('masterkaryawan_det', array('id_karyawan' => $id));
        return $res;
    }
}