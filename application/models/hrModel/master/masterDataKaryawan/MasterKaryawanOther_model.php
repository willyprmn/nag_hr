<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class MasterKaryawanOther_model extends CI_Model
{
    public function read()
    {
        $data = $this->db->select('*')
                         ->from('karyawan')
                         ->get()->result();
                         return $data;
    }

    public function createNewKaryawanOther($data)
    {
        $res = $this->db->insert('masterkaryawan_Other',$data);
        
        if($res){
            return true;
        }
        else{
            return false;
        }
    }

    public function getDetailKaryawanOther($id)
    {
        $data = $this->db->select('*')
                         ->from('masterkaryawan_other')
                         ->where('id_karyawan',$id)
                         ->get()->row();
                         return $data;
    }

    public function updateKaryawanOther($data,$id)
    {        
        $res = $this->db->update('masterkaryawan_other', $data, array('id_karyawan' => $id));
        return $res;
    }
    
    public function deleteKaryawanOther($id)
    {        
        $res = $this->db->delete('masterkaryawan_other', array('id_karyawan' => $id));
        return $res;
    }
}