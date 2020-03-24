<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class MasterKaryawanKontrak_model extends CI_Model
{
    public function read()
    {
        $data = $this->db->select('*')
                         ->from('karyawan')
                         ->get()->result();
                         return $data;
    }

    public function createNewKaryawanKontrak($data)
    {
        $res = $this->db->insert('masterkaryawan_kontrak',$data);
        
        if($res){
            return true;
        }
        else{
            return false;
        }
    }

    public function getDetailKaryawanKontrak($id)
    {
        $data = $this->db->select('*')
                         ->from('masterkaryawan_kontrak')
                         ->where('id_karyawan',$id)
                         ->get()->row();
                         return $data;
    }

    public function updateKaryawanKontrak($data,$id)
    {        
        $res = $this->db->update('masterkaryawan_kontrak', $data, array('id_karyawan' => $id));
        return $res;
    }
    
    public function deleteKaryawanKontrak($id)
    {        
        $res = $this->db->delete('masterkaryawan_kontrak', array('id_karyawan' => $id));
        return $res;
    }
}