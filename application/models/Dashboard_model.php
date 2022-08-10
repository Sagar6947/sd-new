<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{

        public function fetchalldesc($table, $id)
        {
                $get = $this->db->select()
                ->from($table)
               
                ->order_by($id, 'DESC')
                ->get();
        if ($get->num_rows() > 0) {
                return $get->result_array();
        } else {
                return false;
        }
        }


        public function fetchallasc($table, $id)
        {
                $get = $this->db->select()
                ->from($table) 
                ->order_by($id, 'ASC')
                ->get();
        if ($get->num_rows() > 0) {
                return $get->result_array();
        } else {
                return false;
        }
        }

        public function fetchlimit($table)
        {
                $this->db->select('*');
                //$this->db->from($table);
                //$this->db->where('id',$id);
                $query = $this->db->get($table);
                return $query->result_array();
        }
        public function fetchbysearch($table, $searchString)
        {
                $this->db->select('*');
                $this->db->like('description', $searchString);
                $this->db->or_like('pro_name', $searchString);
                $query = $this->db->get($table);
                return $query->result_array();
        }

        public function fetchwhere($table, $col, $id)
        {
                $this->db->select('*');
                //$this->db->from($table);
                $this->db->where($col, $id);
                $query = $this->db->get($table);
                return $query->result_array();
        }

        public function fetchorderby($table)
        {
                $this->db->select('*');
                $this->db->from($table);
                //$this->db->where('id',$id);
                $this->db->order_by('pro_name', 'ASC');
                $this->db->limit(8);
                $query = $this->db->get();
                return $query->result_array();
        }

        public function fetchcatorderby($table)
        {
                $this->db->select('*');
                $this->db->from($table);
                //$this->db->where('id',$id);
                $this->db->order_by('category_id', 'DESC');

                $query = $this->db->get();
                return $query->result_array();
        }

        public function fetchproorderby($table)
        {
                $this->db->select('*');
                $this->db->from($table);
                //$this->db->where('id',$id);
                $this->db->order_by('product_id', 'DESC');
                $this->db->limit(6);
                $query = $this->db->get();
                return $query->result_array();
        }

        public function fetch_collection($table, $id)
        {
                $this->db->select('*');
                $this->db->from($table);
                $this->db->where('product_id', $id);
                $query = $this->db->get();

                return $query->row();
        }

        public function get_ship($id)
        {
                $this->db->select('*');
                $this->db->from('client_ship_address');
                $this->db->where('client_id', $id);
                $query = $this->db->get();

                return $query->result_array();
        }

        public function insertdata($table, $data)
        {
                //$this->db->where('id',$id);
                $query = $this->db->insert($table, $data);
                $insert_id = $this->db->insert_id();
                return  $insert_id;
        }

        public function updatedata($table, $data, $id)
        {
                $this->db->where('team_id', $id);
                $query = $this->db->update($table, $data);
        }



        public function update_products_data($table, $data, $id)
        {
                $this->db->where('product_id', $id);
                $query = $this->db->update($table, $data);
        }

        public function update_profile_data($table, $data, $id)
        {
                $this->db->where('id', $id);
                $query = $this->db->update($table, $data);
        }

        public function update_category_data($table, $data, $id)
        {
                $clean_post = $this->security->xss_clean($data);
                $this->db->set($clean_post);
                $this->db->where('category_id', $id);
                $query = $this->db->update($table, $data);
        }

        public function update_beneficiary_data($table, $data, $id)
        {
                $this->db->where('beneficiary_id', $id);
                $query = $this->db->update($table, $data);
        }

        public function update_clients_data($table, $data, $id)
        {
                $this->db->where('id', $id);
                $query = $this->db->update($table, $data);
        }

        function add_pid($pid)
        {
                $this->db->insert('product_id', $pid);
                $insert_id = $this->db->insert_id();
                return  $insert_id;
        }

        public function get_clients_Info($id)
        {
                $this->db->select('*');
                $this->db->from('clients');
                $this->db->where('id', $id);
                $query = $this->db->get();

                return $query->result();
        }

        public function get_ship_address($id)
        {
                $this->db->select('*');
                $this->db->from('client_ship_address');
                $this->db->where('client_id', $id);
                $query = $this->db->get();

                return $query->result_array();
        }



        public function get_category_data()
        {
                $this->db->select('category.*, product_subcategory.*');
                $this->db->from('category');
                $this->db->join('product_subcategory', 'product_subcategory.category_id = category.category_id');

                $query = $this->db->get();

                return $query->result_array();
        }

        public function get_products()
        {
                $this->db->select('products.*, category.*');
                $this->db->from('products');
                $this->db->join('category', 'category.category_id = products.category_id');

                $query = $this->db->get();

                return $query->result_array();
        }


        public function get_category_Info($category_id)
        {
                $this->db->select('*');
                $this->db->from('category');
                $this->db->where('category_id', $category_id);
                $query = $this->db->get();

                return $query->result();
        }

        public function get_productss($id)
        {
                $this->db->select('products.*, category.*');
                $this->db->from('products')
                        ->where('product_id', $id);

                $this->db->join('category', 'category.category_id = products.category_id');

                $query = $this->db->get();

                return $query->result_array();
        }


        public function get_profile_Info($id)
        {
                $this->db->select('*');
                $this->db->from('profile');
                $this->db->where('id', $id);
                $query = $this->db->get();

                return $query->result_array();
        }


        public function get_product_details($id)
        {
                $this->db->select('*');
                $this->db->from('products');
                $this->db->where('product_id', $id);
                $query = $this->db->get();

                return $query->row();
        }

        public function get_product_category_Info($category_id)
        {
                $this->db->select('*');
                $this->db->from('category');
                $this->db->where('category_id', $category_id);
                $query = $this->db->get();

                return $query->result();
        }

        public function deletecategory($table, $id)
        {
                $this->db->where('category_id', $id);
                $query = $this->db->delete($table);
        }

        public function deleteproducts($table, $id)
        {
                $this->db->where('product_id', $id);
                $query = $this->db->delete($table);
        }

        public function deleteshipaddress($table, $id)
        {
                $this->db->where('id', $id);
                $query = $this->db->delete($table);
        }

        public function deleteclients($table, $id)
        {
                $this->db->where('id', $id);
                $query = $this->db->delete($table);
        }

        public function deletesalesman($table, $id)
        {

                $this->db->where('id', $id);
                $query = $this->db->delete($table);
        }


        public function deletecontact($table, $id)
        {
                $this->db->where('contact_id', $id);
                $query = $this->db->delete($table);
        }
}
