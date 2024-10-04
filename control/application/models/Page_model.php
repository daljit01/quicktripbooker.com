<?php 

date_default_timezone_set('Asia/Kolkata');

class Page_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->websitelink = 'https://192.168.1.88/gofarehub/';
        $this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
	}
    public function GetallBlogs()
	{
		$this->db->select("*");
		$this->db->from("blog");
		$this->db->order_by("date desc");
		$msblog = $this->db->get();
		$rowblogs = $msblog->result();
		return $rowblogs;
	}
	public function GetBlogDetails($id=0)
	{
		$resp= NULL;
		$this->db->select('*');
		$this->db->from('blog');
		$this->db->where('id',$id);
		$Rsblogdetails = $this->db->get();
		//echo $this->db->last_query();exit;
        if($Rsblogdetails->num_rows() > 0)
        {
            $blogdetails = $Rsblogdetails->row();
            $blogdetails->thumb = base_url('assets/images/blog/'.$blogdetails->thumb);
            $blogdetails->tags =array();
            $this->db->select('*');
            $this->db->from('blogtagrelationship');
            $this->db->join('blogtags','blogtagrelationship.tag_id = blogtags.id');
            $this->db->where('blogtagrelationship.blog_id',$blogdetails->id);
            $Rsblogtagdetails = $this->db->get();
			//echo $this->db->last_query();exit;
            if($Rsblogtagdetails->num_rows() > 0)
            {
                $blogdetails->tags =$Rsblogtagdetails->result();
            }
			//print_r($blogdetails);exit;
           // $resp['blogdetail'] = $blogdetails;
            //$resp['blog_categories'] = $this->GetBlogCategories($showall = 0);
            //$resp['blog_tags'] = $this->GetBlogTags($blogdetails->s_url);
			//print_r($resp);exit;
        }        
		return $blogdetails;
	}
	public function GetBlogCategories($showall = 0)
	{
	    $rowblog=array();
        $sql="";
	    $sql .="SELECT c.*,(SELECT COUNT(*) FROM blog WHERE blog.Category = c.id) as totalpost FROM blogcategories as c"; 
        if($showall == 0)
        {
            $sql .=" WHERE c.is_active = '1'";
        }       
        $sql .=" ORDER BY c.id desc";
        //echo $sql;
	    $rssql=$this->db->query($sql);
	    if($rssql->num_rows() > 0)
	    {
	        $rowblog = $rssql->result();
	    }
	    return $rowblog;
	}

	public function SaveBlogDetails($data=array(),$file=array())
    {
        $resp = array();
        // $resp['data']= $data;
        // $resp['file']= $file;
        $validatedata = $this->ValidateBlog($data);
        if($validatedata['isvalid'] == 1)
        {
            $thumb = "";
            if(!empty($_FILES['thumb']['name']))
            {
                $upload_path  = "assets/images/blog/";
                $image = $_FILES['thumb']['name'];
                if(!is_dir($upload_path))
                {
                    mkdir($upload_path,0777,true);                    
                }
                if(!empty($image))
                {
                    $ext = pathinfo($image, PATHINFO_EXTENSION);
                    $newfilename = uniqid().time().".".$ext;
                    move_uploaded_file($_FILES['thumb']['tmp_name'],$upload_path.$newfilename);
                    $thumb = $newfilename;
                }
            }
            //echo $thumb."==========";
            if($data['id'] > 0)
            {
                $this->db->select('*');
                $this->db->from('blog');
                $this->db->where('s_url',$data['s_url']);
                $this->db->where("id !='".$data['id']."'");
                $rscheckblog = $this->db->get();
                //echo $this->db->last_query();
                if($rscheckblog->num_rows() == 0)
                {                    
                    $updatedata = array();
                    $updatedata['alttag'] = $data['alttag'];
                    $updatedata['s_url'] = $data['s_url'];
                    $updatedata['subject'] = $data['subject'];
                    $updatedata['alttag'] = $data['alttag'];
                    $updatedata['date'] = $data['date'];
                    if(!empty($thumb))
                    {
                        $updatedata['thumb'] = $thumb;
                    }                
                    $updatedata['description'] = $data['description'];
                    $updatedata['Category'] = $data['category'];
                    $updatedata['metakeywords'] = $data['metakeywords'];
                    $updatedata['metadescription'] = $data['metadescription'];
                    $updatedata['status'] = $data['is_active'];
                    $this->db->update('blog',$updatedata,array('id' => $data['id']));
                    //echo $this->db->last_query();
                    $blog_id= $data['id'];
                }
                else
                {
                    $blog_id = 0;
					$resp['Id'] = $blog_id;
                    $resp['status'] = 0;
                    $resp['message'] = "Blog url already exists";
                }
            }
            else
            {
                $this->db->select('*');
                $this->db->from('blog');
                $this->db->where('s_url',$data['s_url']);
                $rsblog = $this->db->get();
                if($rsblog->num_rows() > 0)
                {
                    $blog_id = 0;
					$resp['Id'] = $blog_id;
                    $resp['status'] = 0;
                    $resp['message'] = "Blog url already exists";
                }
                else
                {
                    $adddata = array();
                    $adddata['thumb'] = $thumb;
                    $adddata['alttag'] = $data['alttag'];
                    $adddata['subject'] = $data['subject'];
                    $adddata['s_url'] = $data['s_url'];
                    $adddata['date'] =$data['date'];
                    $adddata['description'] = $data['description'];
                    $adddata['Category'] = $data['category'];
                    $adddata['metakeywords'] = $data['metakeywords'];
                    $adddata['metadescription'] = $data['metadescription'];
                    $adddata['status'] = $data['is_active'];
                    $this->db->insert('blog',$adddata);
                    $blog_id= $this->db->insert_id();
                }
            }
            
            if($blog_id > 0)
            {
                $tags = $data['tags'];
                $tagArr = explode(",",$tags);
                if(count($tagArr) > 0)
                {
                    $seletedtags = "'".implode("','",$tagArr);
                    foreach($tagArr as $tag)
                    {
                        if(!empty($tag))
                        {
                            $tagslug = preg_replace("![^a-z0-9]+!i", "-", $tag);
                            $this->db->select('*');
                            $this->db->from('blogtags');
                            $this->db->where('slug',$tagslug);
                            $rstag = $this->db->get();
                            if($rstag->num_rows() == 0)
                            {
                                $tagaddinfo = array();
                                $tagaddinfo['name'] = $tag;
                                $tagaddinfo['slug'] = $tagslug;
                                $tagaddinfo['created_at'] = date("Y-m-d H:i:s");
                                $this->db->insert('blogtags',$tagaddinfo);
                                $tag_id = $this->db->insert_id();
                            }
                            else
                            {
                                $rowtag = $rstag->row();
                                $tag_id = $rowtag->id;
                            }
                            if($tag_id > 0)
                            {
                                $this->db->select('*');
                                $this->db->from('blogtagrelationship');
                                $this->db->where('blog_id',$blog_id);
                                $this->db->where('tag_id',$tag_id);
                                $rstagrel = $this->db->get();
                                if($rstagrel->num_rows() == 0)
                                {
                                    $this->db->insert(
                                        'blogtagrelationship',
                                    array(
                                        'blog_id' => $blog_id,
                                        'tag_id' => $tag_id
                                        )
                                    );
                                }
                            }
                        }
                        
                    }
                    
                }
                $resp['Id'] = $blog_id;
                $resp['status'] = 1;
                $resp['message'] = "Blog info saved successfully";
            }
        }
        else
        {
            $resp['Id'] = 0;
            $resp['status'] = 0;
            $resp['message'] = $validatedata['message'];
        }
		//die;
        return $resp;
    }
    public function ValidateBlog($data=array())
    {
        $resp = array();
        if(empty($data['subject']))
        {
            $resp['isvalid'] = 0;
            $resp['status'] = 0;
            $resp['message'] = "Blog title is required";
            return $resp;
        }
        if(empty($data['s_url']))
        {
            $resp['isvalid'] = 0;
            $resp['status'] = 0;
            $resp['message'] = "Blog url is required";
            return $resp;
        }
        if(empty($data['alttag']))
        {
            $resp['isvalid'] = 0;
            $resp['status'] = 0;
            $resp['message'] = "Blog image alttag is required";
            return $resp;
        }
        if(empty($data['date']))
        {
            $resp['isvalid'] = 0;
            $resp['status'] = 0;
            $resp['message'] = "Blog date is required";
            return $resp;
        }
        if(empty($data['description']))
        {
            $resp['isvalid'] = 0;
            $resp['status'] = 0;
            $resp['message'] = "Blog content is required";
            return $resp;
        }
        if(empty($data['metakeywords']))
        {
            $resp['isvalid'] = 0;
            $resp['status'] = 0;
            $resp['message'] = "Blog meta keywords is required";
            return $resp;
        }
        if(empty($data['metadescription']))
        {
            $resp['isvalid'] = 0;
            $resp['status'] = 0;
            $resp['message'] = "Blog meta description is required";
            return $resp;
        }
        if(empty($data['tags']))
        {
            $resp['isvalid'] = 0;
            $resp['status'] = 0;
            $resp['message'] = "Blog tags is required";
            return $resp;
        }
        $resp['isvalid'] = 1;
        return $resp;
    }
	public function blogslug($slug="",$id=0)
    {
        $reap = array();
        $this->db->select('*');
        $this->db->from('blog');
        $this->db->where('s_url',$slug);
        if($id > 0)
        //if($id != 0)
        {
            $this->db->where("id !='".$id."'");
            //$this->db->where("id ='".$id."'");
        }
        $rsblogcategories = $this->db->get();

        if($rsblogcategories->num_rows() > 0)
        {
            $reap['status'] = 0;
            $reap['messasge'] = "Blog url already exists";
        }
        else
        {
            $reap['status'] = 1;
            $reap['messasge'] = "Blog url available";
        }
        return $reap;
    }
	public function GetBlogTags($curblog="")
	{
	    $rowblog=NULL;
        $sql="";
	    $sql .="SELECT b.*,(SELECT COUNT(*) FROM blogtagrelationship WHERE blogtagrelationship.tag_id = b.id) as totalpost FROM blogtagrelationship as bt,blog as b";
        $sql .=" WHERE bt.blog_id = b.id";
        if(!empty($curblog))
        {
            $sql .=" AND b.s_url != '".$curblog."'";
        }
        $sql .=" GROUP BY bt.blog_id ORDER BY b.id desc";
	    $rssql=$this->db->query($sql);
	    if($rssql->num_rows() > 0)
	    {
	        $rowblog = $rssql->result();
	    }
	    return $rowblog;
	}
	public function GetBlogCategorydetails($id=0)
    {
        $details = null;
        if($id > 0)
        {
            $this->db->select("*");
            $this->db->from("blogcategories");
            $this->db->where("id = '".$id."'");
            $rspage = $this->db->get();
            $details = $rspage->row();
        }
        return $details;
    }
	public function categoryslug($slug="",$id=0)
    {
        $reap = array();
        $this->db->select('*');
        $this->db->from('blogcategories');
        $this->db->where('slug',$slug);
        if($id > 0)
        {
            $this->db->where("id !='".$id."'");
        }
        $rsblogcategories = $this->db->get();
        if($rsblogcategories->num_rows() > 0)
        {
            $reap['status'] = 0;
            $reap['messasge'] = "Category url already exists";
        }
        else
        {
            $reap['status'] = 1;
            $reap['messasge'] = "Category url available";
        }
        return $reap;
    }
	public function SaveBlogcategoryDetails($data)
    {
        $resp = array();        
        $picture1 ="";
        $path ="";
        $errormsg ="";
        $validate = $this->ValidateBlogcategoryData($data); 
        if($validate['Isvalid'] == 1)
        {           
            if($data['Id'] > 0)
            {
                $this->db->select('*');
                $this->db->from('blogcategories');
                $this->db->where("slug='".$data['Slug']."'");
                $this->db->where("id !='".$data['Id']."'");
                $Rspages = $this->db->get();
                //echo $this->db->last_query();
                if($Rspages->num_rows() == 0)
                {
                      
                    $updateparam['name'] = $data['Name'];
                    $updateparam['slug'] = $data['Slug'];
                    $updateparam['is_active'] = $data['IsActive'];
                    $updateparam['modified_at'] = $data['ModifiedDate'];
                    $this->db->update("blogcategories",$updateparam,array('id' => $data['Id']));
                    $resp['Id'] = $data['Id'];
                    $resp['Status'] = 1;
                    $resp['Message'] = "Blog category details updated successfully";
                }
                else
                {
                    $errormsg .= "Blog category slug already exists";
                }
            }
            else
            {
                $this->db->select('*');
                $this->db->from('blogcategories');
                $this->db->where("Slug='".$data['Slug']."'");
                $Rscheckpage = $this->db->get();
                if($Rscheckpage->num_rows() == 0)
                {
                    $insertdata = array();
                    $insertdata['Name'] = $data['Name'];
                    $insertdata['Slug'] = $data['Slug'];
                    $insertdata['is_active'] = $data['IsActive'];
                    $insertdata['created_at'] = $data['CreateDate'];
                    $this->db->insert("blogcategories",$insertdata);
                    $Id = $this->db->insert_id();
                    $resp['Id'] =  $Id;
                    $resp['Status'] = 1;
                    $resp['Message'] = "Blog category details created successfully";
                }
                else
                {
                   $errormsg .= "Blog category slug already exists";
                }
            }
        }
        else
        {
            $errormsg .= $validate['Message'];
        }
        if(!empty($errormsg))
        {
            $resp['Id'] = 0;
            $resp['Status'] = 0;
            $resp['Message'] = $errormsg;
        }
        return $resp;
    }
	function ValidateBlogcategoryData($data)
    {
        $resp = array();
        if(empty($data['Name']))
        {
            $resp['Status'] = 0;
            $resp['Isvalid'] = 0;
            $resp['Id'] = 0;
            $resp['Message'] = "Name is required";
            return $resp;
        }
        if(empty($data['Slug']))
        {
            $resp['Status'] = 0;
            $resp['Isvalid'] = 0;
            $resp['Id'] = 0;
            $resp['Message'] = "Slug is required";
            return $resp;
        }
        $resp['Isvalid'] = 1;
        return $resp;
    }
}
?>