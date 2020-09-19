<?php

/**
 * 
 */
class Sampel_m extends CI_model
{
	public function tambahdatasampel()
	
	{
		$data=
		[
			"jns_sampel"=>$this->input->post('jns_sampel',true)
		];
		$this->db->insert('sampel',$data);
	}

	public function hapusdatasampel($id)
	{
		$this->db->where('id_sampel',$id);
		$this->db->delete('sampel');
	}
public function ubahdatasampel($where,$data)
	
	{
		$this->db->where($where);
		$this->db->update('sampel',$data);
		
	}
	
	
}