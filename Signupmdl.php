<?php


class Signupmdl extends CI_Model
{
	public function insertdb($user)
		{
		  	$this->db->insert('tpnihaltbl',$user);
		  	print_r($user);
		}

	public function fetch_data()
		{
			$q=$this->db->get('tpnihaltbl');
			return $q->result_array();
		}

	public function fetch_dist()
		{
			$qry=$this->db->get('dist_tbl');
			return $qry->result_array();
		}

						public function delete($id)
							{
							    $this->db->where('pk_id', $id);
						        $qry=$this->db->delete('tpnihaltbl');
						        return $qry;
							}	
						public function update_fetch($id)
							{
							    $this->db->where('pk_id', $id);
							    $q=$this->db->get('tpnihaltbl');
							    return $q->result_array();
							}

						public function update_data($user,$id)
							{
							    $this->db->where('pk_id',$id);
							    $this->db->update('tpnihaltbl', $user);
							}

	public function loginm($username,$password)
		{
			$this->db->where('vchr_uname',$username);
			$this->db->where('vchr_pword',$password);
			$query = $this->db->get('tbluser');
				
				if ($query->num_rows() > 0) 
				{
					return $query->result_array();
				}
				else
				{
				 echo "sorry no file";
				}
		}

}
?>

