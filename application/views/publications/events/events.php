<!-- Breadcroumb Area -->

    <div class="breadcroumb-area bread-bg-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcroumb-title text-center">
                        <h1>Upcoming Events</h1>
                        <h6><a href="<?php echo base_url(); ?>">Home</a> / Events</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row" style="width: 100%;">
        <div class="col-lg-12 text-center mar-tp-20">
            <a href="<?php echo base_url('home/all_events'); ?>" class="main-btn">View All Events</a>
        </div>
    </div> 
    <!--Events Area -->

    <div class="event-area section-padding">
        <div class="container">

            <?php 
            if ( $total_records > 0) { ?>

            <div class="row">

                <?php
                $count = 1;
                foreach ($events as $y) { ?>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 20px !important;">
                    <div class="section-bg">
                        <div class="section-absolute-bg absolute-b-1">
                            <img src="<?php echo base_url('assets/uploads/events/' .$y->featured_image); ?>" />
                        </div>
                        <div class="row">
                            <div class="offset-6 col-lg-6 col-md-6">
                                <div class="single-event">
                                    <p class="event-date"><i class="las la-calendar-check"></i><?php echo x_date($y->event_date); ?></p>
                                    <h6><?php echo $y->caption; ?></h6>
                                    <p class="event-meta"> <i class="las la-clock"></i> <span><?php echo $y->time; ?> | <i class="las la-map-marker"></i> </span> <span><?php echo $y->venue; ?></span> </p>
                                    <p><?php echo $y->snippet; ?></p>
                                    <a href="<?php echo base_url('home/single_event/'.$y->id); ?>">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php } //endforeach } ?>

            </div>

            <?php } else { ?>

                <h3 class="text-danger">No event to show.</h3>

            <?php } ?>

            <?php echo pagination_links($links, 'pagination'); ?>
        </div>
    </div>

