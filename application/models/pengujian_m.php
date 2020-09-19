<?php

/**
 * 
 */
class Pengujian_m extends CI_model
{
	public function tambahdatauji($data)
	
	{

		$this->db->insert('pengujian',$data);
	}

	public function hapusdatauji($id)
	{
		$this->db->where('id_uji',$id);
		$this->db->delete('pps');
	}
public function ubahdatauji($where,$data)
	
	{
		$this->db->where($where);
		$this->db->update('pengujian',$data);
	}


}