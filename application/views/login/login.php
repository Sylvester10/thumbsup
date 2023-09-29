
		

        <!-- Start Slider Area -->
        <div class="login-area area-padding fix" style="background: url('<?php echo base_url();?>assets/img/background/slide1.jpg'); position: relative; height: 870px;">
            <div class="login-overlay"></div>
            <div class="table">
                <div class="table-cell">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8 col-xs-12">
                                <div class="login-form">
                                    <h4 class="login-title text-center">LOGIN</h4>
                                    <div class="row">


                                        <?php 
                                            //process form asynchronously using AJAX
                                            $form_attributes = array("id" => "admin_login_form");
                                            echo form_open('login/login_ajax', $form_attributes);

                                        if ($this->session->is_requested) { ?>                                  
                                            <input type="hidden" id="requested_page" value="<?php echo $this->session->requested_page;?>" />
                                            <?php }
                                        else { ?>
                                             <input type="hidden" id="requested_page" value="<?php echo base_url('admin'); ?>" />
                                        <?php } ?>

                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <input type="text" id="name" name="email" class="form-control" placeholder="Email" required data-error="Please enter your email">
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <input type="password" id="msg_subject" name="password" class="form-control" placeholder="Password" required data-error="Please enter your password">
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                                <button type="submit" id="submit" class="slide-btn login-btn">Login</button>
                                                <div id="msgSubmit" class="h3 text-center hidden"></div> 
                                                <div class="clearfix"></div>
                                            </div>

                                        <?php echo form_close(); ?>

                                    </div>
                                            
                                    <div>
                                       <?php echo flash_message_success('status_msg'); ?>
                                       <?php echo flash_message_danger('status_msg_error'); ?>
                                    </div>

                                    <div class="text-center" id="status_msg"></div>
                                </div>
                            </div>
                        </div>
                     </div>
                </div>
            </div>
        </div>
        <!-- End Slider Area -->
		
		