<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ip_model extends CI_Model {

	public function getIps($estado = false){
		if ($estado != false) {
			$this->db->where("estado",1);
		}
		$resultados = $this->db->get("ip");
		return $resultados->result();
	}
	public function getIpsReporte($estado = false,$search,$fechainicio = false, $fechafinal =false){
		$this->db->select("i.*");
		$this->db->from("ip i");
	
		$this->db->like("CONCAT(i.id)",$search);
		$resultados = $this->db->get();
		return $resultados->result();
	}
	public function getIpLibre(){
		$this->db->where("estado",0);
		$resultados = $this->db->get("ip");
		return $resultados->result();
	}

	public function save($data){
		return $this->db->insert("ip",$data);
	}

	public function getIp($id){
		$this->db->where("id", $id);
		$resultados = $this->db->get("ip");
		return $resultados->row();
	}

	public function update($id,$data){
		$this->db->where("id", $id);
		return $this->db->update("ip",$data);
	}


}