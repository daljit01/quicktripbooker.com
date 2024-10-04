<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

    public function __construct() {
		parent::__construct();
		$this->load->model('Auth_model','auth_model');
		$this->load->model('Page_model', 'page_model');
		$this->load->helper('form');
		$this->apiurl = 'http://192.168.1.88/getavoyage';
		
	}
    public function blogdetail($id=0)
	{
		//echo $this->session->userdata('user_id'); exit;
		if(!($this->session->userdata('user_id'))){
			redirect(base_url().'/');
		}
		$date = "";
		$subject = "";
		$s_url = "";
		$thumb = "";
		$alttag = "";
		$metakeywords = "";
		$metadescription = "";
		$description = "";
		$date = "";
		$date = "";
		$date = "";
		$data = array();
		$msg =  !empty($this->input->get('msg')) ? str_replace("-"," ",$this->input->get('msg')) : "";
		$data['msg'] = $msg;
		$this->authtemplate->set('title', 'APP:Medicalserenity Blog');
		$this->authtemplate->load('defaultTemplate', 'contents' , 'medicalserenity/blogdetail' , $data);
	}

	public function blog_categories()
	{
		if(!($this->session->userdata('user_id'))){
			redirect(base_url().'/');
		}
		$data = array();
		$url = "blog/categories/1";
    	//$apiurl = "https://medicalserenity.com/";
		$resp = $this->page_model->GetBlogCategories(1);
		$data['blogcategories'] = $resp;
		$msg =  !empty($this->input->get('msg')) ? str_replace("-"," ",$this->input->get('msg')) : "";
		$data['msg'] = $msg;
		$this->authtemplate->set('title', "APP : Blog Categories");
		$this->authtemplate->load('defaultTemplate', 'contents' , 'blog-categories' , $data);
	}
	public function blog_category_details($id = 0)
	{
		//echo $this->session->userdata('user_id'); exit;
		if(!($this->session->userdata('user_id'))){
			redirect(base_url().'/');
		}
		$data = array();
		$msg =  !empty($this->input->get('msg')) ? str_replace("-"," ",$this->input->get('msg')) : "";
		$data['msg'] = $msg;
		$Name="";
		$Slug ="";
		$IsActive = "1";
		if($id > 0)
		{
		 	$resp = $this->page_model->GetBlogCategorydetails($id);
			$Name= !empty($resp->name) ? $resp->name : "";
			$Slug= !empty($resp->slug) ? $resp->slug : "";
			$IsActive= ($resp->is_active > 0) ? $resp->is_active : 0;
		}
		$data['Id'] = $id;
		$data['Name'] = $Name;
		$data['Slug'] = $Slug;
		$data['IsActive'] = $IsActive;
		$this->authtemplate->set('title', 'Blog category details');
		$this->authtemplate->load('defaultTemplate', 'contents' , 'blog-category-details' , $data);
	}

   public function save_blog_category()
	{	
		$Id = !empty($this->input->post('Id')) ? $this->input->post('Id') : 0;
		$Name = !empty($this->input->post('Name')) ? $this->input->post('Name') : "";
		$Slug = !empty($this->input->post('Slug')) ? $this->input->post('Slug') : "";
		$IsActive = $this->input->post('IsActive');
		$CreateDate = date("Y-m-d h:i:s");
		$ModifiedDate = date("Y-m-d h:i:s");
		$saveparam = array(
			'Id' => $Id,
			'Name' => $Name,
			'Slug' => $Slug,
			'IsActive' => $IsActive,
			'CreateDate' => $CreateDate,
			'ModifiedDate' => $ModifiedDate
		);
		$resp = $this->page_model->SaveBlogcategoryDetails($saveparam);
		// echo '<pre>';
		// print_r($saveparam);
		// echo '</pre>';	
		//$resp = $this->page_model->SaveBlogcategoryDetails($saveparam);
		//  $url = "blog/categoryinfo";
    	//  //$apiurl = "https://medicalserenity.com/";
		//  $apiurl = $this->apiurl;
		//  $resp = $this->auth_model->MakeAPICall($apiurl,"POST",$url,$reqjson);
		/*echo '<pre>';
		print_r($resp);
		echo '</pre>';
		die;*/
		if($resp['Id'] > 0)
		{
			echo "<script>window.location='".base_url('blog-categories')."?status=".$resp['Status']."&msg=".$resp['Message']."'</script>";
		}
		else
		{
			$data['msg'] = $resp['Message'];			
			$data['Id'] = $Id;
			$data['Name'] = $Name;
			$data['Slug'] = $Slug;
			$data['IsActive'] = $IsActive;
			//$data['pagecategories'] = $this->page_model->GetCategories();
			$this->authtemplate->set('title', 'APP : Save Blog Category');
			$this->authtemplate->load('defaultTemplate', 'contents' , 'blog-category-details' , $data);
		}
        
	}
	public function check_blog_category()
	{
		$slug = !empty($this->input->get('slug')) ? $this->input->get('slug') : "";
		$id = !empty($this->input->get('id')) ? $this->input->get('id') : 0;
		$resp = $this->page_model->categoryslug($slug,$id);		
		echo json_encode($resp);
	}
	public function delete_category_details($id = 0)
	{
		if($id > 0)
		{
			$this->db->where('id', $id);
			$this->db->delete('blogcategories');
			$msg = "Category deleted successfully";
		// 	 echo '<pre>';
		//  print_r($resp);
		//  echo '</pre>';
		//  die;
			echo "<script>window.location='".base_url('blog-categories')."?msg=".$msg."'</script>";
			
		}
	}
	
	public function blogs()
	{
		if(!($this->session->userdata('user_id'))){
			redirect(base_url().'/');
		}
		$data = array();

		//$url = "blog/allBlogs";
    	//$apiurl = "https://medicalserenity.com/";
		//$apiurl = $this->apiurl;//"http://192.168.1.136/MedicalSerenity_site/";
		//$resp = $this->auth_model->MakeAPICall($apiurl,"GET",$url);
		$resp = $this->page_model->GetallBlogs();
		$data['blogs'] = $resp;
		$msg =  !empty($this->input->get('msg')) ? str_replace("-"," ",$this->input->get('msg')) : "";
		$data['msg'] = $msg;
		$this->authtemplate->set('title', "APP : Blogs");
		$this->authtemplate->load('defaultTemplate', 'contents' , 'bloglist' , $data);
	}
	public function blog_details($id = 0)
	{
		//echo $id; exit;
		if(!($this->session->userdata('user_id'))){
			redirect(base_url().'/');
		}
		$data = array();
		$msg =  !empty($this->input->get('msg')) ? str_replace("-"," ",$this->input->get('msg')) : "";
		$data['msg'] = $msg;
		$date= date("Y-m-d");
		$thumb="";
		$alttag="";
		$subject ="";
		$s_url = "";
		$date = "";
		$description = "";
		$Category = "";
		$metakeywords = "";
		$metadescription = "";
		$status = 0;
		$tags="";
		$url="";
		//if($id > 0)
		if($id > 0)
		{
			//$title = "APP : edit blog";
			//$url = "blog/details/".$id;
		 	$blogdt = $this->page_model->GetBlogDetails($id);
			// echo '<pre>';
			// print_r($blogdt);exit;
			if(count((array)$blogdt) > 0)
			{
				$blog =$blogdt;
			    $id= !empty($blog->id) ? $blog->id : 0;
				$thumb= !empty($blog->thumb) ? $blog->thumb : "";
				$alttag= !empty($blog->alttag) ? $blog->alttag : "";
				$subject= !empty($blog->subject) ? $blog->subject : "";
				$s_url= !empty($blog->s_url) ? $blog->s_url : "";
				$date= !empty($blog->date) ? $blog->date : "";
				$description= !empty($blog->description) ? $blog->description : "";
				$Category= !empty($blog->Category) ? $blog->Category : "";
				$metakeywords= !empty($blog->metakeywords) ? $blog->metakeywords : "";
				$metadescription= !empty($blog->metadescription) ? $blog->metadescription : "";
				$status= !empty($blog->status) ? $blog->status : "";
				$tags= !empty($blog->tags) ? $blog->tags : "";
			}
		}
		else
		{
			$title = "APP : Create blog";
		}
		$caturl = "blog/categories";
    	//$apiurl = "https://medicalserenity.com/";
		//$catapiurl = $this->apiurl;//"http://192.168.1.136/MedicalSerenity_site/";
		//$blogcategories = $this->auth_model->MakeAPICall($catapiurl,"GET",$caturl);
		$data['blogcategories'] =$this->page_model->GetBlogCategories(1);
		$data['id'] = $id;
		$data['thumb'] = $thumb;
		$data['alttag'] = $alttag;
		$data['subject'] = $subject;
		$data['s_url'] = $s_url;
		$data['date'] = $date;
		$data['description'] = $description;
		$data['blogcategory'] = $Category;
		$data['Category'] = $Category;
		$data['metakeywords'] = $metakeywords;
		$data['metadescription'] = $metadescription;
		$data['status'] = $status;
		$data['tags'] = $tags;
		/*echo '<pre>';
		print_r($data);exit;*/
		$this->authtemplate->set('title', $subject);
		$this->default_template->set('metaDescription', $metadescription);		
		$this->authtemplate->load('defaultTemplate', 'contents' , 'blogdetail' , $data);
	}

   public function save_blog()
	{	
		// echo '<pre>';	
		// print_r($_REQUEST);
		// echo '</pre>';
		// echo '<pre>';	
		// print_r($_FILES);
		// echo '</pre>';exit;
		$resp = array();
		$id = !empty($this->input->post('blogid')) ? $this->input->post('blogid') : 0;
		$date = !empty($this->input->post('date')) ? $this->input->post('date') : "";
		$tags = !empty($this->input->post('tags')) ? $this->input->post('tags') : "";
		$subject = !empty($this->input->post('subject')) ? $this->input->post('subject') : "";
		$s_url = !empty($this->input->post('blog_url')) ? $this->input->post('blog_url') : 0;
		$metakeywords = !empty($this->input->post('metakeywords')) ? $this->input->post('metakeywords') : "";
		$metadescription = !empty($this->input->post('metadescription')) ? $this->input->post('metadescription') : "";
		$description = !empty($this->input->post('description')) ? $this->input->post('description') : 0;
		$Category = !empty($this->input->post('Category')) ? $this->input->post('Category') : 0;
		$alttag = !empty($this->input->post('alttag')) ? $this->input->post('alttag') : "";
		
		$thumb = "";
		$saveparam = array(
			'id' => $id,
			'date' => $date,
			'subject' => $subject,
			'thumb' => $_FILES['thumb'],
			'alttag' => $alttag,
			's_url' => $s_url,
			'category' => $Category,
			'metakeywords' => $metakeywords,
			'metadescription' => $metadescription,
			'description' => $description,
			'is_active' => 1,
			'tags' => $tags
		);	
		/*echo '<pre>';	
		print_r($saveparam);
		echo '</pre>';
		die;*/
		//$url = "blog/details";
		//$apiurl = "https://medicalserenity.com/";
		//$apiurl = $this->apiurl;
		$resp = $this->page_model->SaveBlogDetails($saveparam);
		// echo '<pre>';	
		// print_r($resp);
		// echo '</pre>';
		// die;
		
		if($resp['Id'] > 0)
		{
			echo "<script>window.location='".base_url('blog-details/'.$resp['Id'])."?status=".$resp['status']."&msg=".$resp['message']."'</script>";
		}
		else
		{
			if($resp['status'] == 1)
			{
				$data['msg'] = $resp['Message'];
			}
			else
			{
				$data['msg'] = $resp['message'];
			}
			$data['blogcategories'] =$this->page_model->GetBlogCategories(1);
			$data['id'] = $id;
			$data['thumb'] = $thumb;
			$data['alttag'] = $alttag;
			$data['subject'] = $subject;
			$data['s_url'] = $s_url;
			$data['date'] = $date;
			$data['description'] = $description;
			$data['blogcategory'] = $Category;
			$data['Category'] = $Category;
			$data['metakeywords'] = $metakeywords;
			$data['metadescription'] = $metadescription;
			//$data['status'] = $status;
			$data['tags'] = $tags;
			// echo '<pre>';
			// print_r($data);
			// echo '</pre>';
			// die;
			$this->authtemplate->set('title', 'APP : Save Blog');
			$this->authtemplate->load('defaultTemplate', 'contents' , 'blogdetail' , $data);
		}       
	}
	public function check_blog_url()
	{
		$slug = !empty($this->input->get('slug')) ? $this->input->get('slug') : "";
		$id = !empty($this->input->get('id')) ? $this->input->get('id') : 0;
		$resp = $this->page_model->blogslug($slug,$id);
		//$resp = $this->auth_model->MakeAPICall($apiurl,"GET",$url);		
		echo json_encode($resp);
	}
	public function delete_blog($id)
	{
	     //echo $id;
		 $this->db->where('blog_id', $id);
		 $this->db->delete('blogtagrelationship');
		 $this->db->where('id', $id);
		 $this->db->delete('blog');
		 $response['status']=0;
		 $response['message']="Blog deleted successfully";
	 	echo '<script>window.location="'.base_url('blogs').'"</script>';
	 }
    // public function medicalserenity_blog_list()
	// {
	// 	$url = "blog";
    //     $apiurl = "https://medicalserenity.com/";
	// 		$resp = $this->auth_model->MakeAPICall($apiurl,"GET",$url);
    //     $data['aaa'] = $resp;
    //     $this->authtemplate->set('title', 'APP:Medicalserenity Blog List');
    //     $this->authtemplate->load('defaultTemplate', 'contents' , 'medicalserenity/bloglist' , $data);
	// }
	
	// public function blogdetail($id)
	// {
	// 	$subject="";
	// 	$s_url="";
	// 	$s_url="";
	//     $url = "blog/details/".$id;
    //     $apiurl = "https://medicalserenity.com";
	// 	$resp = $this->auth_model->MakeAPICall($apiurl,"GET",$url);
    //     $data['ddd'] = $resp;
    //     $msg =  !empty($this->input->get('msg')) ? str_replace("-"," ",$this->input->get('msg')) : "";
	// 	$data['msg'] = $msg;
	// 	$this->authtemplate->set('title', 'APP:Medicalserenity Blog Info');
    //     $this->authtemplate->load('defaultTemplate', 'contents' , 'medicalserenity/blogdetail' , $data);
	// }
	
	

}

?>