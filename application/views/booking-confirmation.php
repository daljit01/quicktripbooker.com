
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="format-detection" content="">
<title><?php echo $this->Site_Model->websitename; ?></title>
<meta name="author" content="">
<meta name="description" content="">
<meta name="keywords" content="">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"> 

</head>


<style>
.thankyou-text1 h2 {
    width: 100%;
    margin: 30px auto;
    color: #000;
    font-size: 30px;
    font-weight: 700;
}
.thankyou-text1 a {
    color: #943b94;
    text-decoration: none !important;
    font-weight: bold;
    font-size: 30px;
}
.thankyou-text1{
    padding: 20px;
    box-shadow: 0px 1px 10px 0px #ddd;margin-top: 60px;}
.thankyou-social{margin-top: 35px;}
.bntchatthank {
    background: #943b94 !important;
    font-weight: bold;
    padding: 10px 50px;
    color: #fff !important;
    border-radius: 25px;
    height: inherit;
}
.thankyou-bg {
    position:relative;
}
.overlay-thankyou{position:absolute;width:100%;height:100%;background:#fff;}
.thankyou-text i{font-size: 30px;color: #000;}
.thankyou-social ul{text-align: center;margin-top: 20px;}
.thankyou-social ul li a{color:#fff;font-size:20px;}
.thankyou-social ul li:hover{background: #2196f3;}
.thankyou-social ul li{
    display: inline-block;
    margin-right: 20px;
    background: #2196f3;
    box-shadow: 1px 1px 1px 1px #ddd;
    width: 50px;
    height: 50px;
    line-height: 50px;
    text-align: center;
    border-radius: 50%;}
    .thanyou-footer p{font-size:12px;padding:30px 0;margin-bottom:0;}
    @media screen and (max-width: 767px){
        .thankyou-social img{width: 100%;}
        .thankyou-text1 a {white-space: nowrap;display: block;}
    }

</style>
<body>
    <div class="thankyou-bg" style="background-image: url(<?php echo base_url('assets/images/thankyou-banner.jpg');?>);">  
    <div class="overlay-thankyou"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-3"><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url('assets/images/logo-header-b.png');?>" width="150px" alt="Your Store"  class="pt-4" title="Your Store"></a></div>
            <div class="col-md-9">
                <div class="thankyoudate text-right">
                    <p class="pt-4"><?php echo date("F j Y") ?></p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="thankyou-text1">   
                    <p><b>Thank you for choosing anatripgo.com! </b><br><br><span>Your Booking id is <?php echo $confirmationid; ?></span><br><br>We faced with an issue while processing your payment with the card. One of our executive will get back to you soon to help with the booking.
                    <br><br>You may also contact us at our <a href="<?php echo base_url('contact'); ?>">Support Page</a><br> for immediate help.<br><br>Inconvenience is regreted</p>        
                    <div class="thankyou-btn"><a href="<?php echo base_url(); ?>"><button type="button"  class="btn bntchatthank mt-4">Back To Home </button></a></div>
                 </div>
                 
            </div>
            <div class="col-md-6">
                
                <div class="thankyou-social">
                    <img src="<?php echo base_url('assets/images/img_thnak you page-01.png');?>" alt="booking confirmation"  class="pt-4" title="Your Store">
                    <!-- <ul>
                      <li><a href="https://www.facebook.com/Airlines-Trip-100341748744725/" target="_blank" title="Facebook"><span class="fa fa-facebook"></span></a></li>  
                      <li><a href="https://twitter.com/airlinestrip_" target="_blank" title="Twitter"><span class="fa fa-twitter"></span></a></li> 
                      <li><a href="https://www.instagram.com/airlinestrip/" target="_blank" title="Instagram"><span class="fa fa-instagram"></span></a></li> 
                    </ul> -->   
				</div>
            </div>
        </div>
    </div>  

    </div>
    
    <footer class="thanyou-footer">
        <p class="text-center">By proceeding you agree to <a href="<?php echo base_url('privacy-policy'); ?>">Privacy Policy</a> and <a href="<?php echo base_url('terms-and-conditions'); ?>">Terms and Conditions.</a></p>
    </footer>
</body>

