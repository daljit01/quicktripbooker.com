<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>Infinity Travel mate</title>
  <!--favicon-->
  <link rel="icon" href="<?php echo base_url('assects/images/favicon.ico');?>" type="image/x-icon"/>
  
</head>

<body>

<!-- start loader -->
<div id="pageloader-overlay" class="visible incoming">
	<div class="loader-wrapper-outer">
		<div class="loader-wrapper-inner">
			<div class="loader"></div>
		</div>
	</div>
</div>
<!-- end loader -->

<!-- Start wrapper-->
<?php echo $contents;?>
<!--wrapper-->

<!-- Bootstrap core JavaScript-->
  <script src='<?php echo base_url('assects/js/jquery-min.js');?>'></script>
  <script>
    jQuery(document).ready(function(){
      jQuery(".print_box").on("click",function(){
              var container = $(this).attr("rel");
              tablePrint(container);
             }); 
    });
    function tablePrint(container)
    { 
        var display_setting="toolbar=no,location=no,directories=no,menubar=nos,";  
        var content_innerhtml = document.getElementById(container).innerHTML;
        var document_print=window.open("","",display_setting); 
        document_print.document.open();
        document_print.document.write('<body style="font-family:Arial; font-size:12px;" onLoad="self.print();self.close();" >');  
        document_print.document.write(content_innerhtml); 
        document_print.document.write('</body></html>');  
        document_print.print(); 
        document_print.document.close(); 
        return false;  
    }  
</script>
</body>
</html>
