<?php

/**
 * 
 */
class Pps_m extends CI_model
{
	public function tambahdatapps($data)
	
	{
		

		$this->db->insert('pps',$data);
	}
	public function hapusdatapps($id)
	{
		$this->db->where('id_pps',$id);
		$this->db->delete('pps');
	}
	public function ubahdatapps($where,$data)
	
	{
		$this->db->where($where);
		$this->db->update('pps',$data);
	}

	public function tampilpps()
	{
		
		$this->db->select('*');
		$this->db->from('pps');
		$this->db->join('pengujian','pps.id_uji=pengujian.id_uji','left');
		$this->db->join('petugas','pps.id_ptgs=petugas.id_ptgs','left');
		$this->db->join('sampel','pps.id_sampel=sampel.id_sampel','left');
		$query=$this->db->get();


		return $query; 

	}
	//list chekbox 
	public function tampilPengujian()
	{
		
		$this->db->select('*');
		$this->db->from('pengujian');
		$query=$this->db->get();
		return $query; 
	}

	// for insert get id pps 
	function select_by_id($nama){
		$sql="SELECT id_pps FROM `pps` WHERE nama_cs = '$nama' ORDER BY id_pps DESC  LIMIT 1";

		$result = $this->db->query($sql);
		return $result->row();
	}


//checkbox
	public function tambahdatappsUji($data)
	
	{
		
		$this->db->insert_batch('pps_uji',$data);
		
	}


}