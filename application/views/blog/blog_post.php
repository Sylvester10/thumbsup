<!-- Breadcroumb Area -->

   <div class="breadcroumb-area bread-bg">
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <div class="breadcroumb-title text-center">
                  <h1><?php echo $y->title; ?></h1>
                  <h6><a href="index.html">Home</a> / Blog Details</h6>
               </div>
            </div>
         </div>
      </div>
   </div>

   <!-- Blog Area  -->

   <div class="blog-section section-padding">
      <div class="container">
         <div class="row">
            <div class="col-lg-12 col-md-12">
               <div class="single-blog-wrap">
                  <img src="<?php echo base_url('assets/uploads/blog/'.$y->featured_image); ?>" alt="">
                  <div class="blog-meta">
                     <span><i class="las la-user"></i>Admin</span>
                     <span><i class="las la-calendar"></i><?php echo x_date($y->date); ?></span>
                     <span><i class="las la-comments"></i><?php echo $total_comments; ?> Comments</span>
                  </div>
                  <h3><?php echo $y->title; ?></h3>
                  <p><?php echo $y->body; ?></p>
                  
                  <div class="row pad-top-20 pad-bot-20">
                     <div class="col-lg-6 text-right">
                        <div class="social-icon">
                           <ul>
                              <li class="share">Share:</li>
                              <li><a href="#" class=""><i class="lab la-facebook-f"></i></a></li>
                              <li><a href="#" class=""><i class="lab la-twitter"></i></a></li>
                              <li><a href="#" class=""><i class="lab la-pinterest-p"></i></a></li>
                              <li><a href="#" class=""><i class="lab la-instagram"></i></a></li>
                           </ul>
                        </div>
                     </div>
                  </div>

                  <div class="comments-section">
                     <h5>Comments (<?php echo $total_comments; ?>)</h5>

                     <?php
                     if ($total_comments > 0) { 

                        foreach ($comments as $c) { ?>
                     <hr>
                     <div class="single-comments-section">
                        <img src="<?php echo user_avatar; ?>" alt="">
                        <p><b><?php echo $c->name; ?></b><span><?php echo x_date($c->date); ?></span></p>
                        <p><?php echo $c->comment; ?></p>
                     </div>
                     <hr>

                     <?php }

                     } ?>
                  </div>

               </div>

               <div class="comments-form">
                  <h3>Leave A Reply</h3>
                  <p>Your email address will not be published. Required fiels are marked</p>

                  <?php 
                  $form_attributes = array("id" => "create_comment_form");
                  echo form_open('home/create_comment_ajax/'.$post_id, $form_attributes); ?>

                  <div class="row">
                     <div class="col-lg-6">
                        <input type="text" name="name" placeholder="Your Name">
                     </div>
                     <div class="col-lg-6">
                        <input type="email" name="email" placeholder="Email here">
                     </div>
                     <div class="col-lg-12">
                        <textarea name="comment" cols="30" rows="10" placeholder="Write Your Comment"></textarea>
                     </div>
                     <div class="col-lg-6">
                        <input type="text" name="captcha_code" id="captcha_code" value="<?php echo mt_rand(111111, 999999); ?>" readonly />
                     </div>
                     <div class="col-lg-6">
                        <input type="text" name="c_captcha_code" placeholder="Enter Captcha code" >
                     </div>

                     <div class="col-lg-12">
                        <button class="main-btn" type="submit">Post Comment</button>
                     </div>
                  </div>

                  <?php echo form_close(); ?>

               </div>               

                  <div id="status_msg"></div>

            </div>
         </div>
      </div>
   </div>

   <!-- CTA Area-->

   <div class="cta-area theme-2">
      <div class="container">
         <div class="row">
            <div class="col-lg-6 col-md-7 text-center">
               <h2>Lets make the world <br>better <b>together</b></h2>
            </div>
            <div class="col-lg-6 col-md-5 wow fadeInUp animated" data-wow-delay=".2s">
               <a href="#" class="main-btn">Become a Donor</a>
            </div>
         </div>
      </div>
   </div>
