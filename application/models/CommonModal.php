<?php

class CommonModal extends CI_Model
{
	public function insertRow($table, $post)
	{
		$clean_post = $this->security->xss_clean($post);
		return $this->db->insert($table, $clean_post);
	}

	function insertRowReturnId($table, $post)
	{
		$clean_post = $this->security->xss_clean($post);
		$this->db->insert($table, $clean_post);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
	}

	function insertRowReturnIdWithClean($table, $post)
	{
		$this->db->insert($table, $post);
		return $this->db->insert_id();
	}

	function insertRowInBatch($table, $post)
	{
		$clean_post = $this->security->xss_clean($post);
		return $this->db->insert_batch($table, $clean_post);
	}

	function updateRowById($table, $column, $id, $data)
	{
		$clean_post = $this->security->xss_clean($data);
		$this->db->set($clean_post)
			->where($column, $id)
			->update($table);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	function updateRowByMoreId($table, $where, $data)
	{
		$clean_post = $this->security->xss_clean($data);
		$this->db->set($clean_post)
			->where($where)
			->update($table);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function getAllRows($table)
	{
		$get = $this->db->select()
			->from($table)
			->get();
		if ($get->num_rows() > 0) {
			return $get->result_array();
		} else {
			return false;
		}
	}

	public function search($search)
	{
		$this->db->select('*');
		$this->db->from('website_subservice');
		$this->db->like('username', 'fname', 'lname', 'mname', $search);
		$query = $this->db->get();
		return $query->result();
	}

	public function getAllRowsWithLimit($table, $limit, $orderCol)
	{
		$get = $this->db->select()
			->from($table)
			->limit($limit)
			->order_by($orderCol, "asc")
			->get();
		if ($get->num_rows() > 0) {
			return $get->result_array();
		} else {
			return false;
		}
	}
	public function getRowRandomly($table, $limit)
	{
		$get = $this->db->select()
			->from($table)
			->limit($limit)
			// ->order_by($orderCol, "desc")
			->order_by('rand()')
			->get();
		if ($get->num_rows() > 0) {
			return $get->result_array();
		} else {
			return false;
		}
	}

	public function getAllRowsInOrder($table, $orderColumn, $orderType)
	{
		$get = $this->db->select()
			->from($table)
			->order_by($orderColumn, $orderType)
			->get();
		if ($get->num_rows() > 0) {
			return $get->result_array();
		} else {
			return false;
		}
	}
	public function getAllRowsInOrderWithLimit($table, $limit, $orderColumn, $orderType)
	{
		$get = $this->db->select()
			->from($table)
			->limit($limit)
			->order_by($orderColumn, $orderType)
			->get();
		if ($get->num_rows() > 0) {
			return $get->result_array();
		} else {
			return false;
		}
	}



	public function getRowById($table, $column, $id)
	{
		$get = $this->db->select()
			->from($table)
			->where($column, $id)
			->get();
		if ($get->num_rows() > 0) {
			return $get->result_array();
		} else {
			return false;
		}
	}
	public function getRowByOr($table, $where, $or_where)
	{
		$get = $this->db->select()
			->from($table)
			->group_start()
			->where($where)
			->or_where($or_where)
			->group_end()
			->get();
		if ($get->num_rows() > 0) {
			return $get->result_array();
		} else {
			return false;
		}
	}
	public function getRowByIdWithLimit($table, $column, $id, $limit)
	{
		$get = $this->db->select()
			->from($table)
			->where($column, $id)
			->limit($limit)
			->get();
		if ($get->num_rows() > 0) {
			return $get->result_array();
		} else {
			return false;
		}
	}

	function getDataByIdInOrderLimit($table, $where, $orderColumn, $orderType, $start, $end)
	{
		$get = $this->db->select()
			->from($table)
			->where($where)
			->limit($start, $end)
			->order_by($orderColumn, $orderType)
			->get();
		if ($get->num_rows() > 0) {
			return $get->result_array();
		} else {
			return false;
		}
	}
	function getAllDataWithLimitInOrder($table, $orderColumn, $orderType, $start, $end)
	{
		$get = $this->db->select()
			->from($table)
			->limit($start, $end)
			->order_by($orderColumn, $orderType)
			->get();
		if ($get->num_rows() > 0) {
			return $get->result_array();
		} else {
			return false;
		}
	}

	public function getRowByIdInOrder($table, $where, $orderColumn, $orderType)
	{
		$get = $this->db->select()
			->from($table)
			->where($where)
			->order_by($orderColumn, $orderType)
			->get();
		if ($get->num_rows() > 0) {
			return $get->result_array();
		} else {
			return false;
		}
	}


	public function getRowByMoreId($table, $where)
	{
		$get = $this->db->select()
			->from($table)
			->where($where)
			->get();
		if ($get->num_rows() > 0) {
			return $get->result_array();
		} else {
			return false;
		}
	}

	public function getSingleRowById($table, $where)
	{
		$get = $this->db->select()
			->from($table)
			->where($where)
			->get();
		if ($get->num_rows() > 0) {
			return $get->row_array();
		} else {
			return false;
		}
	}

	public function deleteRowById($table, $where)
	{
		return $this->db->where($where)->delete($table);
	}

	public function getNumRow($table)
	{
		$ci = &get_instance();
		$get = $ci->db->select()
			->from($table)
			->get();
		return $get->num_rows();
	}
	public function getNumRows($table, $where)
	{
		$ci = &get_instance();
		$get = $ci->db->select()
			->from($table)
			->where($where)
			->get();
		return $get->num_rows();
	}

	public function getColumnById($selectColumn, $table, $where)
	{
		$get = $this->db->select($selectColumn)
			->from($table)
			->where($where)
			->get();
		if ($get->num_rows() > 0) {
			return $get->row_array();
		} else {
			return false;
		}
	}

	public function getRowByLikeInOrder($table, $where, $like, $name, $orderBy, $orderType)
	{
		$ci = &get_instance();
		$get = $ci->db->select()
			->from($table)
			->where($where)
			->like($like, $name, 'both')
			->order_by($orderBy, $orderType)
			->get();
		if ($get->num_rows() > 0) {
			return $get->result_array();
		} else {
			return false;
		}
	}

	public function runQuery($query)
	{
		$query = $this->db->query($query);
		if ($query->num_rows() > 0) {
			return $query->result_array();
		} else {
			return false;
		}
	}
}
