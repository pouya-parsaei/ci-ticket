<?php

class MY_Model extends CI_Model
{
	protected $table;

	public function add($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function find($conditions)
	{
		return $this->db->get_where($this->table, $conditions)->row();
	}

	public function getRow($data)
	{
		return $this->db->get_where($this->table, $data)->num_rows();

	}

	public function get($columns, $conditions)
	{
		return $this->db->select($columns)->get_where($this->table, $conditions)->result_object();
	}

	public function getAll()
	{
		return $this->db->get($this->table)->result_object();
	}

	public function getAllWhere($conditions)
	{
		return $this->db->get_where($this->table, $conditions)->result_object();
	}

	public function selectColumnGetAll($columns)
	{
		return $this->db->select($columns)->get($this->table)->result_object();
	}

	public function update($data, $conditions)
	{
		$this->db->update($this->table, $data, $conditions);
		return $this->db->affected_rows();
	}

	public function delete($conditions)
	{
		$this->db->delete($this->table, $conditions);
	}

	public function getAllWhereJoin($conditions, $joinConditions)
	{
		return $this->db->get_where($this->table, $conditions)->result_object();

	}

	public function getColumnsWhereJoin($columns, $joinTable, $joinConditions)
	{
		return $this->db->select($columns)
			->from($this->table)
			->join($joinTable, $joinConditions)
			->get()->result_object();
	}

	public function getColumnsWithWhereAndJoin($columns, $joinTable, $joinConditions,$whereConditions)
	{
		return $this->db->select($columns)
			->from($this->table)
			->join($joinTable, $joinConditions)
			->where($whereConditions)
			->get()->result_object();
	}

	public function getColumnsWithMultipleWhereAndJoin($columns, $joinTable, $joinConditions,$whereConditions)
	{
		return $this->db->select($columns)
			->from($this->table)
			->join($joinTable, $joinConditions)
			->where($whereConditions->firstCondition)
			->where($whereConditions->secondCondition)
			->get()->result_object();
	}


	public function getColumnsWithMultipleJoin($columns, $MainTable, $joinTablesAndConditions)
	{
		return $this->db->select($columns)
			->from($MainTable)
			->join($joinTablesAndConditions->firstJoinTable, $joinTablesAndConditions->firstJoinConditions)
			->join($joinTablesAndConditions->secondJoinTable, $joinTablesAndConditions->secondJoinConditions)
			->get()->result_object();
	}

	public function getColumnsWithWhereAndMultipleJoin($columns, $MainTable, $joinTablesAndConditions,$whereConditions)
	{
		return $this->db->select($columns)
			->from($MainTable)
			->join($joinTablesAndConditions->firstJoinTable, $joinTablesAndConditions->firstJoinConditions)
			->join($joinTablesAndConditions->secondJoinTable, $joinTablesAndConditions->secondJoinConditions)
			->where($whereConditions)
			->get()->result_object();
	}

	public function multipleJoinRowResult($columns, $from, $joinTablesAndConditions)
	{
		return $this->db->select($columns)
			->from($from)
			->join($joinTablesAndConditions->firstJoinTable, $joinTablesAndConditions->firstJoinConditions)
			->join($joinTablesAndConditions->secondJoinTable, $joinTablesAndConditions->secondJoinConditions)
			->get()->row();
	}

	public function countWithWhere($conditions)
	{
		return $this->db->where($conditions)->from($this->table)->count_all_results();
	}

	public function countAll()
	{
		return $this->db->count_all_results($this->table);
	}

}
