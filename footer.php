<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_4
 */

?>

		</main><!-- #content -->
		</div>	</div>
	<footer id="colophon" class="site-footer text-center bg-white mt-4 text-muted">

		<section class="footer-widgets text-left">
			<div class="container">
				<div class="row">
					<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
						<div class="col">
							<aside class="widget-area footer-1-area mb-2">
								<?php dynamic_sidebar( 'footer-1' ); ?>
							</aside>
						</div>
					<?php endif; ?>

					<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
						<div class="col">
							<aside class="widget-area footer-2-area mb-2">
								<?php dynamic_sidebar( 'footer-2' ); ?>
							</aside>
						</div>
					<?php endif; ?>

					<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
						<div class="col">
							<aside class="widget-area footer-3-area mb-2">
								<?php dynamic_sidebar( 'footer-3' ); ?>
							</aside>
						</div>
					<?php endif; ?>

					<?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
						<div class="col">
							<aside class="widget-area footer-4-area mb-2">
								<?php dynamic_sidebar( 'footer-4' ); ?>
							</aside>
						</div>
					<?php endif; ?>
				</div>
				<!-- /.row -->
			</div>
		</section>

		<div class="container">
			<div class="site-info">
				<a href="<?php echo esc_url( '#' ); ?>"><?php esc_html_e( 'ALL RIGHTS RESERVED', 'wp-bootstrap-4' ); ?></a>
				<span class="sep"> | </span>
				<?php
					/* translators: 1: Theme name. */
					printf( esc_html__( 'COPYRIGHT &copy; : %1$s. 2020-21', 'wp-bootstrap-4' ), 'MATRIX SE' );
				?>
			</div><!-- .site-info -->
		</div>
		<!-- /.container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
	<script>
      jQuery(document).ready(function(){

         // jQuery(".pin_div").clone().appendTo(jQuery("#check-postcode"));
         // jQuery(".woocommerce .pin_div").remove();
         // jQuery("#checkpin").unbind();
         // jQuery('#checkpin').bind('click',function(){
         //    var pin_code = jQuery('#pincode_field_id').val();
         //    if(pin_code != '')
         //    {

         //          jQuery('#error_pin').hide();

         //          jQuery('#chkpin_loader').show();

         //             jQuery.ajax({
         //                      url : pincode_check.ajaxurl,
         //                      type : 'post',
         //                      data : {
         //                      action : 'picodecheck_ajax_submit',
         //                      pin_code : pin_code
         //                      },
         //                      success : function( response ) {
         //                      // alert(response)
         //                      if(response == 1)
         //                {
      
         //                   location.reload(); 
      
         //                }
         //                else
         //                {
         //                   jQuery('#chkpin_loader').hide();
      
         //                   jQuery('#error_pin').show();
                                    
         //                            jQuery('#pincode_field_id').val('');                                                                                       
      
         //                }
         //                      }
         //                      }); 

         //    }
         //    else
         //    {

         //          jQuery('#error_pin').show();
         //          jQuery('#pincode_field_id').val('');                

         //    }
         // });
         // jQuery(".pin_div").clone().appendTo(jQuery("#check-postcode"));
         // jQuery("#delivery-info").append(jQuery(".wc-delivery-time-response"));
         
         // jQuery("#change_pin").unbind();
         // jQuery('#change_pin').bind('click',function(){
         //    jQuery('#my_custom_checkout_field2').show();
         //    jQuery('#avlpin').hide();
         //    jQuery('.delivery-info-wrap').hide();
         // });

         //jQuery("#delivery-info").html(jQuery(".delivery"));
         

         
         // wc-delivery-time-response
      });
      function createCookie(name,value,days) {
         if (days) {
            var date = new Date();
            date.setTime(date.getTime()+(days*24*60*60*1000));
            var expires = "; expires="+date.toGMTString();
         }
         else var expires = "";
         document.cookie = name+"="+value+expires+"; path=/";
      }
      function eraseCookie(name) {
         createCookie(name,"",-1);
      }

      jQuery(document).ready(function(){
         jQuery(".button-minus").click(function(e){
            e.preventDefault();
            var par = jQuery(this).parent().parent().parent();
            par.find( "input" ).val(parseInt(par.find( "input" ).val())-1);
         });
         jQuery(".button-plus").click(function(){
            var par = jQuery(this).parent().parent();
            par.find( "input" ).val(parseInt(par.find( "input" ).val())+1);
            par.find( ".add_to_cart_button" ).trigger('click');
         });
         jQuery('#main .card .qty').val(0);

         if(jQuery('.cart-contents .count').html()=="0"){
            jQuery('.cart-contents').addClass('hide-cart-data');
         }else{
            jQuery('.header-link-to-checkout').css('margin-left','0em');
            jQuery('.header-link-to-checkout img').css('left','10px');            
         }

         // Category 

       

         jQuery( ".cat-name" ).click(function( event ) {

            if(jQuery(this).parent().parent().parent().hasClass('product-categories') && !jQuery(this).parent().parent().hasClass("current-cat")){
               jQuery(".children").collapse('hide');
            }

            jQuery(".cat-item").removeClass("current-cat");
            jQuery(".cat-parent").removeClass("current-cat-parent");
            jQuery(this).parent().parent().addClass("current-cat");
            jQuery(this).parent().parent().parent().parent().addClass("current-cat-parent");
            jQuery(this).parent().parent().parent().parent().parent().parent().addClass("current-cat-parent");
            console.log(jQuery(this).parent().attr('href'));
            var url = jQuery(this).parent().attr('href')+"?type=json";
            jQuery("#main").load(url);       

            // jQuery(this).parent().trigger('click');
            jQuery(this).parent().parent().children(".children").collapse('show');

            if(jQuery(this).parent().parent().hasClass('current-cat')){
               event.preventDefault();
               // jQuery(".cat-parent").removeClass("current-cat");

               jQuery(this).parent().parent().children(".children").collapse('toggle');
               return false;
            }

            if(jQuery(this).parent().parent().hasClass('cat-parent')){
               alert("is parent");
            }else{
               alert("child");
               event.preventDefault();
               return false;
            }
            





                
         });
         

         // jQuery( ".cat-parent" ).click(function( event ) {
         //    jQuery(this).children(".children").collapse('show');
         //    event.stopPropagation(); event.preventDefault(); return false;
         // });
         // jQuery( ".cat-item.cat-parent" ).click(function( event ) {
         //    jQuery(this).children(".children.show").collapse('hide');
         //    event.stopPropagation(); event.preventDefault(); return false;
         // });




         // jQuery( ".cat-parent" ).click(function( event ) {
         //    // event.preventDefault();
         //    if (!jQuery(this).parent().parent().hasClass('current-cat-parent') || !jQuery(this).parent().parent().hasClass('current-cat')){
         //       jQuery(this).children(".children").collapse('show');
         //    }
         //    else{
         //       event.preventDefault();
         //    }
         //    event.stopPropagation();
         //    return false;
         // });
         // jQuery( ".cat-item.cat-parent" ).click(function( event ) {
         //    // event.preventDefault();
         //    if (!jQuery(this).parent().parent().hasClass('current-cat-parent') || !jQuery(this).parent().parent().hasClass('current-cat')){
         //       jQuery(this).children(".children.show").collapse('hide');
         //    } else{
         //       event.preventDefault();
         //    }
         //    // event.stopPropagation();
         //    return false;
         // });


         jQuery( ".product-categories a" ).addClass('nav-link'); 

         // all having children are collapsed by default
         jQuery( ".children" ).addClass('collapse');         

         // jQuery( ".current-cat-parent .children").first().collapse('show');  

         jQuery( ".current-cat .children").first().collapse('show');    
         jQuery( ".current-cat").parent().collapse('show');    
         jQuery( ".current-cat").parent().parent().parent().collapse('show');    


         
         jQuery( "nav.sidebar li.cat-item.cat-parent > .nav-link > span.cat-name" ).addClass('right-arrow');
         jQuery( "nav.sidebar li.cat-item.cat-parent.current-cat-parent > .nav-link > span.cat-name" ).removeClass('right-arrow');

         

         jQuery(".cat-item .nav-link").click(function( event ) {
            event.preventDefault();
            jQuery(this).children( ".cat-name" ).trigger('click');
            return false;
         });

         // jQuery( ".cat-item" ).click(function() {
         //    jQuery(this).collapse('toggle');
         //    // jQuery(this).children(".children").collapse('toggle');

         //    alert( "Handler for .click() called." );
         // });
      });
      
	</script>
</body>
</html>
