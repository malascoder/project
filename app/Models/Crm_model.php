<?php
class Crm_model extends CI_Model{
	function cari_user($username, $password){
		$query = $this->db->query("select * from users where and username='$username' and password= '$password'");
		return $query;
	}

	function listpesanan(){
		$listpesanan = $this->db->query('select * from t1_detail_order');
		return $listpesanan;
	}
	function listorder(){
		$listorder = $this->db->query('select * from t1_order');
		return $listorder;
	}
	function listuser(){
		$listuser = $this->db->query('select * from t1_user');
		return $listuser;
	}

	function listmakanan(){
		$listmakanan = $this->db->query('select * from t1_masakan');
		return $listmakanan;
	}
	function listlevel(){
		$listlevel = $this->db->query('select * from t1_level');
		return $listlevel;
	}

	function levelsimpan(){
		$arraydata = array ('nama_level' => $this->input->post ('namalevel'));
		$this->db->insert('t1_level',$arraydata);
	}
	function registersimpan(){
		$arraydata = array('id_user' => $this->input->post('nama'),
						   'username' => $this->input->post('username'),
						   'password' => $this->input->post('password'),
						   'nama_lengkap' => $this->input->post('namalengkap'),
						   'id_level' => $this->input->post('level'));
		$this->db->insert('t1_user',$arraydata);
	}
	function ordersimpan(){
		$arraydata = array('no_meja' => $this->input->post('nomeja'),
						   'tanggal_order' => $this->input->post('tanggalorder'),
						   'keterangan' =>$this->input->post('keterangan'));
		$this->db->insert('t1_order',$arraydata);
	}
	function detailordersimpan(){
		$arraydata = array ('id_order' => $this->input->post('idorder'),
							'id_masakan' => $this->input->post('idmasakan'),
							'status_detail_order' => $this->input->post ('statusdetailorder'));
		$this->db->insert('t1_detail_order',$arraydata);
	}
	function makanansimpan(){
		$arraydata = array ('nama_masakan' => $this->input->post('namamasakan'),
							'harga_masakan' => $this->input->post('hargamasakan'),
							'status_masakan' => $this->input->post ('statusmasakan'));
		$this->db->insert('t1_masakan',$arraydata);
	}
	function deletedetailorder(){

	}
	function editdetailorder(){

	}
	function updatedt(){

	}
	function makananedit($id){
		$this->db->where('id_masakan', $id);
		$query = $this->db->get('t1_masakan');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}
	function updatemakanan(){
		$id = $this->input->post('hiddenmakanan');
			$arraydata = array ('nama_masakan' => $this->input->post('namamasakan'),
							'harga_masakan' => $this->input->post('hargamasakan'),
							'status_masakan' => $this->input->post ('statusmasakan'));
		$this->db->where('id_masakan',$id);
		$this->db->update('t1_masakan', $arraydata);
		//echo $this->db->last_query();
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}	
	public function deletemakanan($id){
		$this->db->where('id_masakan', $id);
		$this->db->delete('t1_masakan');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	public function deleteorder($id){
		$this->db->where('id_order', $id);
		$this->db->delete('t1_order');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	public function deletelevel($id){
		$this->db->where('id_level', $id);
		$this->db->delete('t1_level');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false();
		}
	}
	}