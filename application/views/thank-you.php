<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
	<title><?php echo $this->Site_Model->websitename; ?></title>
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.png');?>" type="image/x-icon"/>
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
  	<link rel="stylesheet" href="<?php echo base_url('assets/css/animate.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/jquerysctipttop.css');?>">
	<link rel="stylesheet" href="https://rawgit.com/LeshikJanz/libraries/master/Bootstrap/baguetteBox.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css');?>">	
</head>

<style>
    .thankyou-text h2 {
        width: 100%;
    margin: 30px auto;
    color: #ffffff;
    font-size: 35px;
    /* text-align: center; */
    font-weight: 500;
    margin-left: -100px;
}
.bntchatthank {
    background: #fff !important;
    font-weight: bold;
    padding: 10px 50px;
    color: #000 !important;
    border-radius: 25px;
    height: inherit;
}
.thankyou-bg {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    background-size: cover;
    min-height: 100vh;
    text-align: center;
}
.thankyou-text i{font-size: 30px;color: #000;}
</style>
<body>
    <div class="thankyou-bg" style="background-image: url(<?php echo base_url('assets/images/Thank-you.jpg');?>);">  
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="thankyou-text text-left">                    
                    <a href="index.html"><img src="<?php echo base_url('assets/images/logo-header.png');?>" width="200px" alt="Your Store" class="pt-5" title="Your Store"></a>      
                    <h2>Thank you for contacting <?php echo $this->Site_Model->websitename; ?>. One of our expert will get in touch with you shortly.</h2>        
                    <a href="<?php echo base_url('/');?>"><button type="button"  class="btn bntchatthank mt-4">Back To Home </button></a>
                    
                </div>
            </div>
        </div>
    </div>  

    </div>
</body>

</html>