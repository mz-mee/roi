<!doctype html>
<html class="no-js" lang="cs">

<head>

  <meta charset="utf-8">

  <title>ROI</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
  
  <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

  <link rel="stylesheet" type="text/css" href="assets/css/style.css">

  
</head>

<body>
    <section role="region" class="section section-hero">
        <div class="container section-hero__container">
        <?php
        if( have_rows('hero_section') ): ?>
            <?php
            while( have_rows('hero_section') ): the_row(); 
                $image = get_sub_field('hero_image');
                ?>
                <div class="section-hero__graphic">
                    <?php
                    $size = 'full'; // (thumbnail, medium, large, full or custom size)
                        if( $image ) :
                            echo wp_get_attachment_image( $image, $size );
                        endif;
                    ?>
                </div>
                <?php 
                if( have_rows('hero_texts') ): ?>
                    <?php 
                    while( have_rows('hero_texts') ): the_row(); ?>
                    
                    <div class="section-hero__text">
                        <?php 
                        if(get_sub_field('hero_heading')):?>
                        <h1><?php the_sub_field('hero_heading')?></h1>
                        <?php 
                        endif;?>
                        <?php
                        if(get_sub_field('hero_text')):?>
                        <p><?php the_sub_field('hero_text')?></p>
                        <?php 
                        endif;?>
                        <?php 
                        if(get_sub_field('hero_button')):
                            $link = get_sub_field('hero_button');?>
                            <a href="<?php echo esc_url( $link['url'] ); ?>" class="btn btn-primary btn-primary--noshadow"><?php echo esc_attr( $link['title'] ); ?></a>
                        <?php 
                        endif;?>
                    </div>
                    <?php
                    endwhile; ?>
                <?php
                endif; ?>
                <?php
            endwhile; ?>
            <?php
        endif; ?>
            
        </div>
    </section>
    <section role="region" class="section section--grey section-budget">
    <?php
        if( have_rows('budget_section') ): ?>
            <?php
            while( have_rows('budget_section') ): the_row(); ?>
                <div class="container section-budget__container">
                    <div class="section-budget__graphic">
                        <?php
                        $image = get_sub_field('budget_image');
                        ?>

                        <?php
                        $size = 'full'; // (thumbnail, medium, large, full or custom size)
                            if( $image ) :
                                echo wp_get_attachment_image( $image, $size );
                            endif;
                        ?>
                    </div>
                    <?php 
                    if( have_rows('budget_texts') ): ?>
                        <?php 
                        while( have_rows('budget_texts') ): the_row(); ?>
                        <div class="section-budget__text">
                            <?php
                            if(get_sub_field('budget_heading')):?>
                            <h2><?php the_sub_field('budget_heading')?></h2>
                            <?php 
                            endif;?>
                            <?php
                            if(get_sub_field('budget_text')):?>
                            <p><?php the_sub_field('budget_text')?></p>
                            <?php 
                            endif;?>
                        </div>
                    <?php
                        endwhile;
                    endif;
                    ?>
                </div>
            <?php
            endwhile;?>
        <?php
        endif;?>
    </section>
    <section role="region" class="section section-brands">
        <?php
            if( have_rows('logos') ): ?>
                <?php
                while( have_rows('logos') ): the_row(); ?>
                <?php
                    if( have_rows('logo_item') ): ?>
                        <?php
                        while( have_rows('logo_item') ): the_row(); ?>
                            <?php
                            $logos = get_sub_field('logo_img');
                            if( $logos ): ?>
                                <?php foreach( $logos as $post ): 
                                    // Setup this post for WP functions (variable must be named $post).
                                    setup_postdata($post); ?>
                                    <?php if( get_field('client_image') ): ?>
                                        <img src="<?php the_field('client_image'); ?>" />
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <?php 
                                // Reset the global post object so that the rest of the page works correctly.
                                wp_reset_postdata(); ?>
                            <?php endif; ?>
                        <?php
                        endwhile;
                    endif;?>
                <?php
                endwhile;
            endif;?>
    </section>
    <section role="region" class="section section-clients">
        <div class="container section-clients__container">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                <?php
                if( have_rows('clients') ): ?>
                    <?php
                    while( have_rows('clients') ): the_row(); ?>
                    <?php
                        if( have_rows('clients_item') ): ?>
                            <?php
                            while( have_rows('clients_item') ): the_row(); ?>
                                <?php
                                $client = get_sub_field('clients_content');
                                if( $featured_posts ): ?>
                                    <?php
                                    foreach( $logos as $post ): 
                                        // Setup this post for WP functions (variable must be named $post).
                                        setup_postdata($post); ?>
                                        <div class="swiper-slide">
                                            <div class="section-clients__item">
                                                <div class="section-clients__content">
                                                    <?php if( get_field('testimonial_title') ): ?>
                                                        <h3><?php the_field('testimonial_title'); ?></h3>
                                                    <?php endif; ?>
                                                    <?php if( get_field('testimonial_text') ): ?>
                                                        <p><?php the_field('testimonial_text'); ?></p>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="section-clients__name">
                                                    <div class="section-clients__name-img">
                                                    <?php if( get_field('testimonial_image') ): ?>
                                                        <img src="<?php the_field('testimonial_image'); ?>" />
                                                    <?php endif; ?>
                                                    </div>
                                                    <div class="section-clients__name-text">
                                                        <?php if( get_field('testimonial_name') ): ?>
                                                            <strong><?php the_field('testimonial_name'); ?></strong>
                                                        <?php endif; ?>
                                                        <?php if( get_field('testimonial_name') ): ?>
                                                            <small><?php the_field('testimonial_position'); ?>, <?php the_field('testimonial_company'); ?></small>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>            
                                    <?php
                                    endforeach; ?>
                                    <?php 
                                    // Reset the global post object so that the rest of the page works correctly.
                                    wp_reset_postdata(); ?>
                                <?php endif; ?>
                            <?php
                            endwhile;
                        endif;?>
                    <?php
                    endwhile;
                endif;?>
                <div class="swiper-pagination"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
        </div>
    </section>
    <section role="region" class="section section--grey section-leader">
        <div class="container">
            <?php
            if( have_rows('leader') ): ?>
                <?php
                while( have_rows('leader') ): the_row(); ?>
                <?php if( get_field('leader_heading') ): ?>
                    <h2><?php the_field('leader_heading'); ?></h2>
                <?php endif; ?>
                <div class="section-leader__awards">
                    <?php
                    if( have_rows('leader_items') ): ?>
                        <?php
                        while( have_rows('leader_items') ): the_row(); ?>
                        <?php
                        $image = get_sub_field('leader_image');
                        ?>
                        <div class="section-leader__awards-item">
                            <?php
                            $size = 'full'; // (thumbnail, medium, large, full or custom size)
                                if( $image ) :
                                    echo wp_get_attachment_image( $image, $size );
                                endif;
                            ?>
                        </div>    
                        <?php
                        endwhile;
                    endif;?>
                </div>
            <?php
                endwhile;
            endif;
            ?>
        </div>
    </section>
    <section role="region" class="section section--grey section-meet">
        <div class="container">
            <div class="section-meet__container">
                <?php
                if( have_rows('meet') ): ?>
                    <?php
                    while( have_rows('meet') ): the_row(); ?>
                        <?php
                        if(get_sub_field('meet_heading')):?>
                            <h2 class="section-meet__heading"><?php the_sub_field('meet_heading');?></h2>
                        <?php
                        endif;
                        ?>
                        <?php
                        if(get_sub_field('meet_text')):?>
                            <p class="section-meet__text"><?php the_sub_field('meet_text');?></p>
                        <?php
                        endif;
                        ?>
                        <?php
                        if( have_rows('meet_items') ): ?>
                            <?php
                            while( have_rows('meet_items') ): the_row(); ?>
                                    <?php
                                if( have_rows('meet_content') ): ?>
                                    <?php
                                    while( have_rows('meet_content') ): the_row(); ?>
                                        <div class="section-meet__points">
                                            <div class="section-meet__points-item">
                                                <div class="section-meet__points-content">
                                                    <?php if( get_field('meet_item_heading') ): ?>
                                                        <h3><?php the_field('meet_item_heading'); ?></h3>
                                                    <?php endif; ?>
                                                    <?php
                                                    $image = get_sub_field('neet_item_image');
                                                    ?>
                                                    <div class="section-meet__points-img">
                                                        <?php
                                                        $size = 'full'; // (thumbnail, medium, large, full or custom size)
                                                            if( $image ) :
                                                                echo wp_get_attachment_image( $image, $size );
                                                            endif;
                                                        ?>
                                                    </div>
                                                    <?php if( get_field('meet_item_text') ): ?>
                                                            <?php the_field('meet_item_text'); ?>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    endwhile;
                                endif?>
                                <?php
                            endwhile;
                        endif?>
                        <?php if(get_sub_field('meet_button')):
                            $link = get_sub_field('meet_button');?>
                            <div class="center">
                            <a href="<?php echo esc_url( $link['url'] ); ?>" class="btn btn-primary"><?php echo esc_attr( $link['title'] ); ?></a>
                            </div>
                        <?php 
                        endif;?>
                    <?php
                    endwhile;
                endif;
                    ?>
            </div>
        </div>
    </section>
    <section role="region" class="section section-solutions">
        <?php
            if( have_rows('solutions') ): ?>
                <?php
                while( have_rows('solutions') ): the_row(); ?>
                <div class="container">
                    <?php if( get_field('solutions_heading') ): ?>
                        <h2 class="section-solutions__heading"><?php the_field('solution_heading'); ?></h2>
                    <?php endif; ?>
                    <?php if( get_field('solutions_text') ): ?>
                        <p class="section-solutions__text"><?php the_field('solutions_text'); ?></p>
                    <?php endif; ?>
                </div>
                <?php
                if( have_rows('solutions_subsection') ): ?>
                    <?php
                    while( have_rows('solutions_subsection') ): the_row(); ?>
                        <section role="region" class="subsection-solutions">
                            <div class="container subsection-solutions__container">
                                <div class="subsection-solutions__text">
                                <?php
                                if( have_rows('solutions_text') ): ?>
                                    <?php
                                    while( have_rows('solutions_text') ): the_row(); ?>
                                        <?php
                                        if(get_sub_field('solutions_preheading')):?>
                                            <span class="subsection-solutions__text-preheading"><?php the_sub_field('solutions_preheading');?></span>
                                        <?php
                                        endif;
                                        ?>
                                        <?php
                                        if(get_sub_field('solutions_heading')):?>
                                            <h3><?php the_sub_field('solutions_heading');?></h3>
                                        <?php
                                        endif;
                                        ?>
                                        <?php
                                        if(get_sub_field('solutions_content')):?>
                                            <?php the_sub_field('solutions_content');?>
                                        <?php
                                        endif;
                                        ?>
                                        <?php
                                        if(get_sub_field('solutions_content_small')):?>
                                            <div class="subsection-solutions__text-protip">
                                                <?php the_sub_field('solutions_content_small');?>
                                            </div>
                                        <?php
                                        endif;
                                        ?>
                                        <?php if(get_sub_field('solutions_link')):
                                            $link = get_sub_field('solutions_link');?>
                                            <a href="<?php echo esc_url( $link['url'] ); ?>" class="btn btn-secondary"><?php echo esc_attr( $link['title'] ); ?></a>
                                        <?php 
                                        endif;?>
                                    <?php
                                    endwhile;
                                endif;
                                ?>   
                                </div>
                                <?php
                                $image = get_sub_field('solutions_image');
                                ?>
                                <div class="subsection-solutions__pic">
                                    <?php
                                    $size = 'full'; // (thumbnail, medium, large, full or custom size)
                                        if( $image ) :
                                            echo wp_get_attachment_image( $image, $size );
                                        endif;
                                    ?>
                                </div>
                            </div>
                        </section>
                    <?php
                    endwhile;
                endif;
                ?>    
        <?php
        endwhile;
        endif;?>
    </section>
    <section role="region" class="section section-discover">
        <div class="container">
            <?php
            if( have_rows('discover') ): ?>
                <?php
                while( have_rows('discover') ): the_row(); ?>
                    <?php
                    if(get_sub_field('discover_heading')):?>
                        <h2 class="section-discover__heading"><?php the_sub_field('discover_heading');?></h2>
                    <?php
                    endif;
                    ?>
                     <?php
                    if( have_rows('discover_content') ): ?>
                        <?php
                        while( have_rows('discover_content') ): the_row(); ?>
                            <div class="section-discover__points">
                                <div class="section-discover__points-item">
                                    <div class="section-discover__points-content">
                                        <?php
                                        if(get_sub_field('discover_item_heading')):?>
                                            <h3><?php the_sub_field('discover_item_heading');?></h3>
                                        <?php
                                        endif;
                                        ?>
                                        <?php
                                        $image = get_sub_field('discover_item_img');
                                        ?>
                                        <div class="section-discover__points-image">
                                            <?php
                                            $size = 'full'; // (thumbnail, medium, large, full or custom size)
                                                if( $image ) :
                                                    echo wp_get_attachment_image( $image, $size );
                                                endif;
                                            ?>
                                        </div>
                                        <?php
                                        if(get_sub_field('discover_item_text')):?>
                                            <h3><?php the_sub_field('discover_item_text');?></h3>
                                        <?php
                                        endif;
                                        ?>
                                    </div>
                                </div>
                            </div>
                        <?php
                        endwhile;
                    endif;
                    ?>
                    <div class="section-discover__video">
                        <div class="section-discover__video-overlay">
                            <?php
                            if(get_sub_field('overlay_video_text')):?>
                            <p>
                                <?php the_sub_field('overlay_video_text');?>
                            </p>
                            <?php endif;?>
                            <span class="section-discover__video-play" onclick="toggleControls()";>Watch now</span>
                        </div>
                        <?php
                        if(get_sub_field('video')):?>
                            <video id="video" class="section-discover__video-file blurred">
                                <source src="<?php the_sub_field('video');?>" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        <?php
                        endif;
                        ?>
                        <svg class="blur-filter" id="svg-image-blur">
                            <filter id="blur-effect-1">
                                <feGaussianBlur stdDeviation="2" />
                            </filter>
                        </svg>

                        </div>
                        
                    </div>
                <?php
                endwhile;
            endif;
            ?>
        </div>
    </section>
    <section role="region" class="section section--grey section-cta">
        <div class="container">
            <?php
                if( have_rows('cta') ): ?>
                    <?php
                    while( have_rows('cta') ): the_row(); ?>
                    <?php
                        if(get_sub_field('cta_heading')):?>
                        <h2><?php the_sub_field('cta_heading')?></h2>
                        <?php 
                        endif;?>
                        <?php
                        if(get_sub_field('cta_text')):?>
                        <p><?php the_sub_field('cta_text')?></p>
                        <?php 
                        endif;?>
                        <?php 
                        if(get_sub_field('cta_button')):
                            $link = get_sub_field('cta_button');?>
                            <a href="<?php echo esc_url( $link['url'] ); ?>" class="btn btn-primary"><?php echo esc_attr( $link['title'] ); ?></a>
                        <?php 
                        endif;?>
                    <?php
                    endwhile;
                endif;?>
        </div>
    </section>
    <section role="region" class="section section-stories">
        <div class="container section-stories__container">
            <?php
            if( have_rows('stories') ): ?>
                <?php
                while( have_rows('stories') ): the_row(); ?>
                    <div class="section-stories__text">
                    <?php
                    if( have_rows('stories_content') ): ?>
                        <?php
                        while( have_rows('stories_content') ): the_row(); ?>
                            <?php
                            if(get_sub_field('stories_heading')):?>
                            <h2><?php the_sub_field('stories_heading')?></h2>
                            <?php 
                            endif;?>
                            <?php
                            if(get_sub_field('stories_text')):?>
                            <?php the_sub_field('stories_text')?>
                            <?php 
                            endif;?>
                            <?php 
                            if(get_sub_field('stories_button')):
                                $link = get_sub_field('stories_button');?>
                                <a href="<?php echo esc_url( $link['url'] ); ?>" class="btn btn-primary"><?php echo esc_attr( $link['title'] ); ?></a>
                            <?php 
                        endif;?>
                        <?php
                        endwhile;
                    endif;?>    
                    </div>
                    <div class="section-stories__logos">
                        <?php
                        if( have_rows('stories_company') ): ?>
                            <?php
                            while( have_rows('stories_company') ): the_row(); ?>
                                <?php
                                if( have_rows('stories_company_item') ): ?>
                                    <?php
                                    while( have_rows('stories_company_item') ): the_row(); ?>
                                        <?php
                                        $logos = get_sub_field('stories_company_logo');
                                        if( $logos ): ?>
                                            <?php foreach( $logos as $post ): 
                                                // Setup this post for WP functions (variable must be named $post).
                                                setup_postdata($post); ?>
                                                <div class="section-stories__logos-item">
                                                    <div class="section-stories__logos-content">
                                                        <?php if( get_field('client_image') ): ?>
                                                            <img src="<?php the_field('client_image'); ?>" />
                                                        <?php endif; ?>
                                                    </div>
                                                </div>        
                                            <?php endforeach; ?>
                                            <?php 
                                            // Reset the global post object so that the rest of the page works correctly.
                                            wp_reset_postdata(); ?>
                                            
                                        <?php endif; ?>
                                        <?php
                                    endwhile;
                                endif;?>
                            <?php
                            endwhile;
                        endif;?>
                    </div>
                    <?php
                endwhile;
            endif;?>    
        </div>
    </section>
<script>
    const swiper = new Swiper('.swiper-container', {
    // Optional parameters
    direction: 'horizontal',
    loop: true,
    autoHeight: true,

    // If we need pagination
    pagination: {
        el: '.swiper-pagination',
    },

    // Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },

    // And if we need scrollbar
    scrollbar: {
        el: '.swiper-scrollbar',
    },
    });

</script>
<script>
var video = document.getElementById("video");

function toggleControls() {

   video.setAttribute("controls","controls");
   video.play()
   video.volume = 0.5;   

  video.classList.remove("blurred");

  document.getElementsByClassName('section-discover__video-overlay')[0].style.visibility='hidden';
}
</script>
</body>
</html>