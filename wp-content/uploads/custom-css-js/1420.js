<!-- start Simple Custom CSS and JS -->
<script type="text/javascript">
/* Default comment here */ 

//$(document).ready(function( ){
//  alert(1);
//    $("#more_products_btn").html('<div class="link-box"><a class="theme-btn btn-style-two" href="http://layerdrops.com/linoorwp/contact-us/"><i class="btn-curve"></i><span class="btn-title">Contact with us</span></a></div>');
//});
jQuery(document).ready(function( $ ){
    // Your code in here
  $("#more_products_btn").html('<div class="link-box"><a class="theme-btn btn-style-one" href="#"><i class="btn-curve"></i><span id="more_prod_btn_txt" class="btn-title">Discover More</span></a></div>');
  $("#more_prod_btn_txt").html("Show More Products");
  $("#mapDiv").addClass("hide");
  $("#mapDiv .place-card-large .place-name").html("IngeniousLabs");
  $("#more_products_btn a").attr("href", "http://www.ingenious-labs.com/our-products")
  $(".project-single.style-two .text-col.col-md-12").removeClass("col-lg-8");
  $(".project-single.style-two .text-col.col-md-12").css("text-align", "justify");
});
</script>
<!-- end Simple Custom CSS and JS -->
