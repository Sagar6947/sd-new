<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function index()
    {
        $data['title'] = "Home |  SaharDirectory - Get a Personal Visiting Card";

        $data['companycate'] = $this->CommonModal->getRowByIdWithLimit('company_category', 'premium', '0', 7);
        $data['category'] = $this->CommonModal->getAllRowsWithLimit('company_category', '12', 'cate_id');
        $data['blogs'] = $this->CommonModal->getAllRows('blog');

        $this->load->view('home', $data);
    }

    public function search()
    {
        $searchname = $this->input->get('listing-name');
        $searchlocation = $this->input->get('listing-location');

        $serch_sql = "SELECT website_subservice.id, website_subservice.name, website_subservice.description, website_subservice.featured FROM website_subservice
            LEFT JOIN company_subcategory ON website_subservice.service_id = company_subcategory.category_id
            WHERE website_subservice.name LIKE '%{$searchname}%' OR website_subservice.description LIKE '%{$searchname}%'";

        $data['search_data'] = $this->CommonModal->runQuery($serch_sql);
        $data['category'] = $this->CommonModal->getAllRowsWithLimit('company_category', '12', 'cate_id');

        $data['title'] = "Search |  SaharDirectory - Get a Personal Visiting Card";

        $this->load->view('search', $data);
    }



    public function login()
    {
        if ($this->session->has_userdata('login_user_id')) {
            redirect(base_url('dashboard'));
        }
        $data['logo'] = 'assets/logo.png';

        $data['title'] = "Login | SaharDirectory - Get a Personal Visiting Card";
        if (count($_POST) > 0) {
            extract($this->input->post());
            $table = "tbl_registration";
            $login_data = $this->CommonModal->getRowByOr($table, array('email' => $email), array('mobile' => $mobile));

            if (!empty($login_data)) {
                if ($login_data[0]['password'] == $password) {
                    $session = $this->session->set_userdata(array('login_user_id' => $login_data[0]['rgid'], 'login_user_name' => $login_data[0]['name'], 'login_user_emailid' => $login_data[0]['email'], 'login_user_contact' => $login_data[0]['mobile'], 'login_user_profile' => $login_data[0]['profile']));
                    $profile = $this->CommonModal->getRowById('company', 'rgid', $login_data[0]['rgid']);
                    if ($profile[0]['company_type'] == '' || $profile[0]['company_name'] == '' || $profile[0]['company_person'] == '' || $profile[0]['company_designation'] == '' || $profile[0]['company_category'] == '' || $profile[0]['company_subcategory'] == '' || $profile[0]['company_tagline'] == '' || $profile[0]['company_address'] == '' || $profile[0]['company_city'] == '' || $profile[0]['company_state'] == '' || $profile[0]['pin_code'] == '' || $profile[0]['company_email'] == '' || $profile[0]['company_contact'] == '' || $profile[0]['company_whatsapp'] == '')
                        redirect(base_url('my-profile'));
                    else {
                        redirect(base_url('dashboard'));
                    }
                } else {
                    $this->session->set_userdata('msg', '<h6 class="alert alert-danger">The <b>password</b> you entered is <b>incorrect</b> Please try again.</h6>');
                    redirect(base_url('login'));
                }
            } else {
                $this->session->set_flashdata('loginError', '<h6 class="alert alert-warning">Username or password doesnt match</h6>');
                redirect(base_url('login'));
            }
        } else {
            if ($this->session->has_userdata('login_user_id')) {
                redirect(base_url('dashboard'));
            }
        }

        $this->load->view('login', $data);
    }

    public function register()
    {
        if ($this->session->has_userdata('login_user_id')) {
            redirect(base_url('dashboard'));
        }

        $data['title'] = 'Register | SaharDirectory - Get a Personal Visiting Card';
        if (count($_POST) > 0) {
            $count = $this->CommonModal->getNumRows('tbl_registration', array('mobile' => $this->input->post('mobile'), 'email' => $this->input->post('email')));
            $company_count = $this->CommonModal->getNumRows('company', array('company_contact' => $this->input->post('mobile'), 'company_email' => $this->input->post('email')));


            if ($count > 0 || $company_count > 0) {
                $this->session->set_userdata('msg', '<h6 class="alert alert-danger">You have already registered with this email id or contact no.</h6>');
                redirect(base_url('signup'));
            } else {
                $post = $this->input->post();
                if ($post['password'] !=  $post['cpassword']) {
                    $this->session->set_userdata('msg', '<h6 class="alert alert-warning">Your Password and Confirm Password are not match .</h6>');
                    redirect(base_url('signup'));
                } else {

                    $rgid = $this->CommonModal->insertRowReturnId('tbl_registration', $post);
                    $lastid = $this->CommonModal->getRowById('tbl_registration', 'rgid', $rgid);
                    $profileid = $this->CommonModal->insertRowReturnId('company', array('rgid' => $rgid, 'company_contact' => $lastid[0]['mobile']));

                    $session = $this->session->set_userdata(array(
                        'login_user_id' => $lastid[0]['rgid'], 'login_user_name' => $lastid[0]['name'],
                        'login_user_emailid' => $lastid[0]['email'], 'login_user_contact' => $lastid[0]['mobile'], 'login_user_profile' => $lastid[0]['profile']
                    ));

                    $profile = $this->CommonModal->getRowById('company', 'rgid', $rgid);
                    if ($profile != '') {
                        if ($profile[0]['company_type'] == '' || $profile[0]['company_name'] == '' || $profile[0]['company_person'] == '' || $profile[0]['company_designation'] == '' || $profile[0]['company_category'] == '' || $profile[0]['company_subcategory'] == '' || $profile[0]['company_tagline'] == '' || $profile[0]['company_address'] == '' || $profile[0]['company_city'] == '' || $profile[0]['company_state'] == '' || $profile[0]['pin_code'] == '' || $profile[0]['company_email'] == '' || $profile[0]['company_contact'] == '' || $profile[0]['company_whatsapp'] == '') {
                            redirect(base_url('my-profile'));
                        } else {
                            redirect(base_url('dashboard'));
                        }
                    } else {
                        redirect(base_url('my-profile'));
                    }

                    if (!empty($rgid)) {
                        $this->session->set_userdata('msg', '<h6 class="alert alert-success">You have Registered Successfully. Login to continue.</h6>');
                        redirect(base_url('my-profile'));
                    } else {
                        $this->session->set_userdata('msg', '<h6 class="alert alert-danger">Server error</h6>');
                    }
                }
            }
        } else {
        }
        $this->load->view('signup', $data);
    }



    public function my_profile()
    {
        if (!$this->session->has_userdata('login_user_id')) {
            redirect(base_url('login'));
        }
        if (!sessionId('sahar')) {
            //====== add Profile
            if (count($_POST) > 0) {

                $post = $this->input->post();
                $post['company_logo'] = imageUpload('company_logo', 'uploads/company/');
                $post['company_banner'] = imageUpload('company_banner', 'uploads/company/');
                $uid = sessionId('login_user_id');
                $datarow = $this->CommonModal->getRowByMoreId('company', array('rgid' => $uid));
                if ($datarow != '') {
                    $insert = $this->CommonModal->updateRowById('company', 'rgid', $uid, $post);
                } else {
                    $insert = $this->CommonModal->insertRowReturnId('company', $post);
                }

                if ($insert) {
                    $this->session->set_flashdata('msg', 'Profile Update  successfully');
                    $this->session->set_flashdata('msg_class', 'alert-success');
                } else {
                    $this->session->set_flashdata('msg', 'Profile Update  successfull');
                    $this->session->set_flashdata('msg_class', 'alert-success');
                }
                redirect(base_url() . 'dashboard');
            } else {

                $data['title'] = "Complete Your Profile | SaharDirectory - Get a Personal Visiting Card";
                $data['login_user'] = $this->session->userdata();
                $data['profiledata'] = $this->CommonModal->getRowById('tbl_registration', 'rgid', $this->session->userdata('login_user_id'));
                $data['category'] = $this->CommonModal->getAllRows('company_category');
                $data['state_list'] = $this->CommonModal->getAllRows('tbl_state');
                $this->load->view('my-profile', $data);
            }
        } else {
            // ====Update profile=======
            if (count($_POST) > 0) {

                $post = $this->input->post();
                $post['company_logo'] = imageUpload('company_logo', 'uploads/company/');
                $post['company_banner'] = imageUpload('company_banner', 'uploads/company/');
                $uid = sessionId('login_user_id');
                $datarow = $this->CommonModal->getRowByMoreId('company', array('rgid' => $uid));
                if ($datarow != '') {
                    $insert = $this->CommonModal->updateRowById('company', 'rgid', $uid, $post);
                }

                if ($insert) {
                    $this->session->set_userdata('msg', '<h6 class="alert alert-success">Profile Updated  successfully</h6>');
                    $this->session->set_userdata('msg_class', 'alert-success');
                } else {
                    $this->session->set_userdata('msg', '<h6 class="alert alert-danger">Profile Not Update</h6>');
                    $this->session->set_userdata('msg_class', 'alert-success');
                }
                redirect(base_url() . 'dashboard');
            } else {
                $uid = sessionId('login_user_id');
                $data['title'] = "My Profile | SaharDirectory - Get a Personal Visiting Card";
                $data['login_user'] = $this->session->userdata();
                $data['profiledata'] = $this->CommonModal->getRowById('tbl_registration', 'rgid', $this->session->userdata('login_user_id'));
                $data['datarow'] = $this->CommonModal->getRowByMoreId('company', array('rgid' => $uid));
                $data['category'] = $this->CommonModal->getAllRows('company_category');
                $data['state_list'] = $this->CommonModal->getAllRows('tbl_state');
                $this->load->view('my-profile', $data);
            }
        }
    }

    public function getcity()
    {
        $state = $this->input->post('state');
        $data['city'] = $this->CommonModal->getRowByIdInOrder('tbl_cities', array('state_id' => $state), 'name', 'asc');
        $this->load->view('select_city', $data);
    }
    public function searchcontact()
    {
        $contact = $this->input->post('mobile');
        $data['contact'] = runQuery("SELECT * FROM `tbl_registration` WHERE `mobile`='" . $contact . "' ");
        $this->load->view('select_contact', $data);
    }



    public function select_subcat()
    {
        $cate = $this->input->post('company_category');
        $data['subcat'] = $this->CommonModal->getRowByIdInOrder('company_subcategory', array('category_id' => $cate), 'subcategory', 'asc');
        $this->load->view('select_subcategory', $data);
    }

    public function dashboard()
    {
        if (!$this->session->has_userdata('login_user_id')) {
            redirect(base_url('login'));
        }
        if (!sessionId('sahar')) {
            redirect(base_url('my-profile'));
        }

        $data['title'] = "Dashboard | SaharDirectory - Get a Personal Visiting Card";
        $data['login_user'] = $this->session->userdata();
        $data['profiledata'] = $this->CommonModal->getRowById('tbl_registration', 'rgid', $this->session->userdata('login_user_id'));
        $this->load->view('dashboard', $data);
    }

    public function logout()
    {
        $this->session->unset_userdata('login_user_id');
        $this->session->unset_userdata('login_user_name');
        $this->session->unset_userdata('login_user_emailid');
        $this->session->unset_userdata('login_user_contact');
        redirect(base_url());
    }
}
