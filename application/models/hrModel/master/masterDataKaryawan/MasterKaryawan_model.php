<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class MasterKaryawan_model extends CI_Model
{
    public function read()
    {
        $data = $this->db->select('*')
                         ->from('masterkaryawan as k')
                         ->join('masterkaryawan_det as kd','k.n_id_karyawan=kd.n_id_karyawan')
                         ->join('masterkaryawan_kontrak as kk','k.n_id_karyawan=kk.n_id_karyawan')
                         ->join('masterkaryawan_other as ko','k.n_id_karyawan=ko.n_id_karyawan')
                         ->get()->result();
                         return $data;
    }

    public function createNewKaryawan($data)
    {
        return $this->db->insert('masterkaryawan',$data) ? $this->db->insert_id() : false ; 
    }

    public function getDetailKaryawan($id)
    {
        $data = $this->db->select('*')
                         ->from('masterkaryawan')
                         ->where('id_karyawan',$id)
                         ->get()->row();
                         return $data;
    }

    public function updateKaryawan($data,$id)
    {        
        $res = $this->db->update('masterkaryawan', $data, array('id_karyawan' => $id));
        return $res;
    }
    
    public function deleteKaryawan($id)
    {        
        $res = $this->db->delete('masterkaryawan', array('id_karyawan' => $id));
        return $res;
    }
}