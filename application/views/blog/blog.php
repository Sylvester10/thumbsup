<!-- Breadcroumb Area -->

   <div class="breadcroumb-area bread-bg">
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <div class="breadcroumb-title text-center">
                  <h1>Our Articles</h1>
                  <h6><a href="index.html">Home</a> / Blog</h6>
               </div>
            </div>
         </div>
      </div>
   </div>

   <!-- Blog Area-->

   <div class="blog-area mar-top-50 section-padding">
      <div class="container">

         <?php
         if ($total_records > 0) { ?>

         <div class="row">

            <?php
            foreach ($blog as $y) { ?>

            <div class="col-lg-4 col-md-6 mar-bt-50">
               <div class="single-blog-item">
                  <div class="blog-bg">
                     <img src="<?php echo base_url('assets/uploads/blog/'.$y->featured_image); ?>" alt="">
                     <div class="blog-content">
                        <p class="blog-meta">Posted by <b>Admin</b> on <?php echo x_date($y->date); ?></p>
                        <h5><a href="<?php echo base_url('home/single_blog/'.$y->id.'/'.$y->slug); ?>"><?php echo $y->title; ?></a></h5>
                        <p><?php echo $y->snippet; ?></p>
                        <a href="<?php echo base_url('home/single_blog/'.$y->id.'/'.$y->slug); ?>" class="read-more">Read More</a>
                     </div>
                  </div>
               </div>
            </div>

            <?php } ?>

         </div>

         <?php } else { ?>

            <h3 class="text-danger">No blog to show.</h3>

         <?php } ?>

         <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6 text-center">
               <?php echo pagination_links($links, 'pagination'); ?>
            </div>
            <div class="col-lg-3"></div>
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