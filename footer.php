<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package KBM
 */

?>

	<footer class="w-100 flex-shrink-0">
        <div class="footer-top container">
            <div class="row gy-4 gx-5 align-items-center">
                <div class="col-lg-4 col-md-6">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/footer-logo.png" class="img-fluid" alt="footer-logo">
                    <p class="first_column_text"><?php echo esc_html(get_option('footer_content')); ?>
                    </p>
                    <div class="download_section_footer">
                        <!-- <ul class="d-flex"> -->
                            <?php 
//                             wp_nav_menu( array( 
//                             'menu' => 'privacy menu', 
//                             'menu_class'=>'d-flex', 
//                                 ) );
                            ?>
                        <!-- </ul> -->
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <!-- <ul class="list-unstyled first_column_list"> -->
                        <?php 
                            wp_nav_menu( array( 
                            'menu' => 'quick links', 
                            'menu_class'=>'list-unstyled first_column_list', 
                                ) );
                            ?>
                    <!-- </ul> -->
                </div>
                <div class="col-lg-4 col-md-6 footer_newsletter">
                    <ul class="footer-info-list">
                        <li><?php echo esc_html(get_option('footer_number_1')); ?></li>
                        <li><?php echo esc_html(get_option('footer_email')); ?></li>
                    </ul>
                    <h5 class="mb-3">Our Social Links</h5>
                    <ul class="d-flex">
						<li><a href="https://www.facebook.com/john.pierre.796"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/fb.png" class="img-fluid" alt="footer social icons"></a></li>
                        <li><a href="https://twitter.com/jepierre4"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/tw.png" class="img-fluid" alt="footer social icons"></a></li>
                        <li><a href="https://www.instagram.com/johnepierresr/"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/ig.png" class="img-fluid" alt="footer social icons"></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <p class="copyright">
                    <?php echo esc_html(get_option('copright_content')); ?>
                    </p>
                </div>
            </div>
        </div>
    </footer> 
    
    
    <!-- Appointment Modal -->
    <div class="modal fade" id="appointmentModal" tabindex="-1" role="dialog" aria-labelledby="appointmentModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="appointmentModalLabel">Book an Appointment</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeappointmentmodal">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
                
                <div class="date_time_slots_form">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="date" class="form-control" id="appointmentdate_cstid" />
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <b><i>*Available Working Days are from Tuesday-Saturday, please make your Appointments respectively.*</i></b>
                            <h5>MORNING SLOTS</h5>
                            <ul class="slots_cst_cls_elem">
                                
                                <li>
                                    <input class="form-check-input" type="radio" name="slotsradiosel" id="slotsradiosel" value="02:00 PM">
                                    <label class="form-check-label" for="slotsradiosel">
                                        02:00 PM
                                    </label>
                                </li>
                                <li>
                                    <input class="form-check-input" type="radio" name="slotsradiosel" id="slotsradiosel1" value="02:30 PM">
                                    <label class="form-check-label" for="slotsradiosel1">
                                        02:30 PM
                                    </label>
                                </li>
                                <li>
                                    <input class="form-check-input" type="radio" name="slotsradiosel" id="slotsradiosel2" value="03:00 PM">
                                    <label class="form-check-label" for="slotsradiosel2">
                                        03:00 PM
                                    </label>
                                </li>
                                <li>
                                    <input class="form-check-input" type="radio" name="slotsradiosel" id="slotsradiosel3" value="03:30 PM">
                                    <label class="form-check-label" for="slotsradiosel3">
                                        03:30 PM
                                    </label>
                                </li>
                                <li>
                                    <input class="form-check-input" type="radio" name="slotsradiosel" id="slotsradiosel4" value="04:00 PM">
                                    <label class="form-check-label" for="slotsradiosel4">
                                        04:00 PM
                                    </label>
                                </li>
                                <li>
                                    <input class="form-check-input" type="radio" name="slotsradiosel" id="slotsradiosel5" value="04:30 PM">
                                    <label class="form-check-label" for="slotsradiosel5">
                                        04:30 PM
                                    </label>
                                </li>
                                
                            </ul>
                            
                            <hr>
                            
                            <h5>EVENING SLOTS</h5>
                            <ul class="slots_cst_cls_elem">
                                
                                <li>
                                    <input class="form-check-input" type="radio" name="slotsradiosel" id="slotsradiosel6" value="05:00 PM">
                                    <label class="form-check-label" for="slotsradiosel6">
                                        05:00 PM
                                    </label>
                                </li>
                                <li>
                                    <input class="form-check-input" type="radio" name="slotsradiosel" id="slotsradiosel7" value="05:30 PM">
                                    <label class="form-check-label" for="slotsradiosel7">
                                        05:30 PM
                                    </label>
                                </li>
                                <li>
                                    <input class="form-check-input" type="radio" name="slotsradiosel" id="slotsradiosel8" value="06:00 PM">
                                    <label class="form-check-label" for="slotsradiosel8">
                                        06:00 PM
                                    </label>
                                </li>
                                <li>
                                    <input class="form-check-input" type="radio" name="slotsradiosel" id="slotsradiosel9" value="06:30 PM">
                                    <label class="form-check-label" for="slotsradiosel9">
                                        06:30 PM
                                    </label>
                                </li>
                                <li>
                                    <input class="form-check-input" type="radio" name="slotsradiosel" id="slotsradiosel10" value="07:00 PM">
                                    <label class="form-check-label" for="slotsradiosel10">
                                        07:00 PM
                                    </label>
                                </li>
                                <li>
                                    <input class="form-check-input" type="radio" name="slotsradiosel" id="slotsradiosel11" value="07:30 PM">
                                    <label class="form-check-label" for="slotsradiosel11">
                                        07:30 PM
                                    </label>
                                </li>
                                <li>
                                    <input class="form-check-input" type="radio" name="slotsradiosel" id="slotsradiosel12" value="08:00 PM">
                                    <label class="form-check-label" for="slotsradiosel12">
                                        08:00 PM
                                    </label>
                                </li>
                                <li>
                                    <input class="form-check-input" type="radio" name="slotsradiosel" id="slotsradiosel13" value="08:30 PM">
                                    <label class="form-check-label" for="slotsradiosel13">
                                        08:30 PM
                                    </label>
                                </li>
                                
                                
                            </ul>
                        </div>
                    </div>
                    
                </div>
                <div class="payments_opts_cst">
                    <h4>Payment Options</h4>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                      <label class="form-check-label" for="inlineRadio1">Paypal</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                      <label class="form-check-label" for="inlineRadio2">Credit Card</label>
                    </div>
                </div>
                
              <div class="paypalform_parent" style="display:none;">
                <?php echo do_shortcode('[contact-form-7 id="5721949" title="appointment form paypal"]'); ?>
              </div>
              <div class="stripeform_parent" style="display:none;">
                <?php echo do_shortcode('[contact-form-7 id="01e970e" title="appointment form credit card"]'); ?>
              </div>
          </div>
        </div>
      </div>
    </div>

<?php wp_footer(); ?>
	<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/bootstrap.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/popper.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/owl.carousel.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/custom.js"></script>
    
    <script>
        $('#bookappointment').on('click',function(){

            $('#appointmentModal').modal('show');
            
        });
        $('#closeappointmentmodal').on('click',function(){

            $('#appointmentModal').modal('hide');
            
        });
        
         $("#appointmentamount").attr('readonly','readonly');
         $("#appointmentamount2").attr('readonly','readonly');
         $("#datetobefilled1").attr('readonly','readonly');
         $("#datetobefilled2").attr('readonly','readonly');
         $("#timetobefilled1").attr('readonly','readonly');
         $("#timetobefilled2").attr('readonly','readonly');
        
        
        $(document).ready(function () {
                // var todaysDate = new Date();
                // var year = todaysDate.getFullYear();
                // var month = ("0" + (todaysDate.getMonth() + 1)).slice(-2);
                // var day = ("0" + todaysDate.getDate()).slice(-2);
                // var maxDate = (year +"-"+ month +"-"+ day);
                // console.log(maxDate);
                
                var today = new Date();
                var minDate = new Date(today.setDate(today.getDate() + 1)).toISOString().split("T")[0];
                console.log(minDate);
                
            
                $('#appointmentdate_cstid').attr('min',minDate);
                
                $('#appointmentdate_cstid').change(function() {
                    var date = $(this).val();
                    $('#datetobefilled1').val(date);
                    $('#datetobefilled2').val(date);
                });
            
          });
          
          
           $(document).ready(function(){
              $('#inlineRadio1').click(function() {
                if (!$("#inlineRadio1:checked").val()) {
                  $('.paypalform_parent').css('display','none')
                }
                else {
                  $('.paypalform_parent').css('display','block')
                  $('.stripeform_parent').css('display','none')
                }
              });
              
              $('#inlineRadio2').click(function() {
                if (!$("#inlineRadio2:checked").val()) {
                  $('.stripeform_parent').css('display','none')
                }
                else {
                  $('.stripeform_parent').css('display','block')
                  $('.paypalform_parent').css('display','none')
                }
              });
              
            });
            
            
            $("input[name='slotsradiosel']").click(function() {
                var timeslot = $(this).val();
                $('#timetobefilled1').val(timeslot);
                $('#timetobefilled2').val(timeslot);
                
                if ($(this).is(':checked')) {
                    $("input[name='slotsradiosel']").parent().removeClass('active');
                    $(this).parent().addClass('active');
                }
            });
    </script>
    
        <script>
            document.addEventListener( 'wpcf7mailsent', function( event ) {
              location = 'https://kingdom.trangotech.dev/thankyou/';
            }, false );
        </script>
</body>
</html>
