<?php

defined('BASEPATH') or exit('No direct script access allowed');

class admin_model extends CI_Model
{
public function get_user()
    {
        $this->db->select('id_user,username,password');
        $this->db->from('user');
        $query = $this->db->get();
        if ($query->num_rows() >= 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }
    function grafik() { 
        $sql= $this->db->query("
            select
            ifnull((SELECT COUNT(nomor) FROM (antrian)WHERE((id_instansi)=11 AND (Month(tanggal)=1)AND (YEAR(tanggal)=2019))),0) AS `Januari`,
            ifnull((SELECT COUNT(nomor) FROM (antrian)WHERE((id_instansi)=11 AND(Month(tanggal)=2)AND (YEAR(tanggal)=2019))),0) AS `Februari`,
            ifnull((SELECT COUNT(nomor) FROM (antrian)WHERE((id_instansi)=11 AND(Month(tanggal)=3)AND (YEAR(tanggal)=2019))),0) AS `Maret`,
            ifnull((SELECT COUNT(nomor) FROM (antrian)WHERE((id_instansi)=11 AND(Month(tanggal)=4)AND (YEAR(tanggal)=2019))),0) AS `April`,
            ifnull((SELECT COUNT(nomor) FROM (antrian)WHERE((id_instansi)=11 AND(Month(tanggal)=5)AND (YEAR(tanggal)=2019))),0) AS `Mei`,
            ifnull((SELECT COUNT(nomor) FROM (antrian)WHERE((id_instansi)=11 AND(Month(tanggal)=6)AND (YEAR(tanggal)=2019))),0) AS `Juni`,
            ifnull((SELECT COUNT(nomor) FROM (antrian)WHERE((id_instansi)=11 AND(Month(tanggal)=7)AND (YEAR(tanggal)=2019))),0) AS `Juli`,
            ifnull((SELECT COUNT(nomor) FROM (antrian)WHERE((id_instansi)=11 AND(Month(tanggal)=8)AND (YEAR(tanggal)=2019))),0) AS `Agustus`,
            ifnull((SELECT COUNT(nomor) FROM (antrian)WHERE((id_instansi)=11 AND(Month(tanggal)=9)AND (YEAR(tanggal)=2019))),0) AS `September`,
            ifnull((SELECT COUNT(nomor) FROM (antrian)WHERE((id_instansi)=11 AND(Month(tanggal)=10)AND (YEAR(tanggal)=2019))),0) AS `Oktober`,
            ifnull((SELECT COUNT(nomor) FROM (antrian)WHERE((id_instansi)=11 AND(Month(tanggal)=11)AND (YEAR(tanggal)=2019))),0) AS `November`,
            ifnull((SELECT COUNT(nomor) FROM (antrian)WHERE((id_instansi)=11 AND(Month(tanggal)=12)AND (YEAR(tanggal)=2019))),0) AS `Desember`
            from antrian where id_instansi=11 and year(tanggal)=2019 GROUP BY year(tanggal) ");
    return $sql;
    
 } 
 public function get_loket()
    {
        $this->db->select('id_loket,loket');
        $this->db->from('loket');
        $this->db->where('status', 'Kosong');
        $query = $this->db->get();
        if ($query->num_rows() >= 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }
    public function choice($id_loket)
    {
        $this->db->set('status', 'Kosong');
        $this->db->from('loket');
        $this->db->where('id_loket', $id_loket);                
        $this->db->update();
    }
    function search($startdate,$enddate){
        $this->db->where('id_instansi', 11);
        $this->db->where('tanggal >=', $startdate);
        $this->db->where('tanggal <', $enddate);
        $antrian = $this->db->get('antrian')->result();
        return $antrian;
    }
}
?>