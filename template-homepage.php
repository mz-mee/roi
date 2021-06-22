<?php
/*
Template Name: Homepage new
*/

get_header();
?>

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
                        <?php the_sub_field('hero_text')?>
                        <?php 
                        endif;?>
                        <?php 
                        if(get_sub_field('hero_button')):
                            $link = get_sub_field('hero_button');?>
                            <a href="<?php echo esc_url( $link['url'] ); ?>" class="btn btn-primary btn-primary--noshadow"><?php echo esc_attr( $link['title'] ); ?></a>
                            <a href="https://app.livestorm.co/roivenue/roivenue-pre-recorded-demo?type=detailed" target="_blank" class="btn-link">Watch pre-recorded demo</a>
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
                            if(get_sub_field('budget_content')):?>
                            <?php the_sub_field('budget_content')?>
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
                            $logos = get_sub_field('logo_img');
                            if( $logos ): ?>
                                <?php foreach( $logos as $post ): 
                                    // Setup this post for WP functions (variable must be named $post).
                                    setup_postdata($post); ?>
                                    <div class="section-brands__item">
                                        <?php if( get_field('client_image') ): ?>
                                            <img src="<?php the_field('client_image'); ?>" />
                                        <?php endif; ?>
                                    </div>    
                                <?php endforeach; ?>
                                <?php 
                                // Reset the global post object so that the rest of the page works correctly.
                                wp_reset_postdata(); ?>
                            <?php endif; ?>
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
                                $clients = get_sub_field('clients_content');
                                if( $clients ): ?>
                                    <?php
                                    foreach( $clients as $post ): 
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
            </div>
            <div class="swiper-pagination"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
        </div>
    </section>
    <section role="region" class="section section--grey section-leader">
        <div class="container">
            <?php
            if( have_rows('leader') ): ?>
                <?php
                while( have_rows('leader') ): the_row(); ?>
                <?php if( get_sub_field('leader_heading') ): ?>
                    <h2><?php the_sub_field('leader_heading'); ?></h2>
                <?php endif; ?>
                <div class="section-leader__awards">
                    <?php
                    if( have_rows('leader_items') ): ?>
                        <?php
                        $c=0;
                        while( have_rows('leader_items') ): the_row(); $c++; ?>
                        <?php
                        $image = get_sub_field('leader_image');
                        ?>
                        <div class="section-leader__awards-item">
                            <?php if($c == 2): ?>
                                <a href="https://www.g2.com/products/roivenue-attribution/reviews#reviews" target="_blank">
                            <?php endif; ?>
                            <?php
                            $size = 'full'; // (thumbnail, medium, large, full or custom size)
                                if( $image ) :
                                    echo wp_get_attachment_image( $image, $size );
                                endif;
                            ?>
                            <?php if($c == 2): ?>
                                </a>
                            <?php endif; ?>
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
                            <div class="section-meet__text"><?php the_sub_field('meet_text');?></div>
                        <?php
                        endif;
                        ?>
                        <?php
                        if( have_rows('meet_items') ): ?>
                            <div class="section-meet__points">
                            <?php
                            while( have_rows('meet_items') ): the_row(); ?>
                                    <?php
                                if( have_rows('meet_content') ): ?>
                                    <?php
                                    while( have_rows('meet_content') ): the_row(); ?>
                                            <div class="section-meet__points-item">
                                                <div class="section-meet__points-content">
                                                    <?php if( get_sub_field('meet_item_heading') ): ?>
                                                        <h3><?php the_sub_field('meet_item_heading'); ?></h3>
                                                    <?php endif; ?>
                                                    <?php
                                                    $image = get_sub_field('meet_item_image');
                                                    ?>
                                                    <div class="section-meet__points-img">
                                                        <?php
                                                        $size = 'full'; // (thumbnail, medium, large, full or custom size)
                                                            if( $image ) :
                                                                echo wp_get_attachment_image( $image, $size );
                                                            endif;
                                                        ?>
                                                    </div>
                                                    <?php if( get_sub_field('meet_item_text') ): ?>
                                                            <?php the_sub_field('meet_item_text'); ?>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        
                                        <?php
                                    endwhile;?>
                                <?php
                                endif?>
                                <?php
                            endwhile;?>
                            </div>
                        <?php
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
                    <?php if( get_sub_field('solutions_heading') ): ?>
                        <h2 class="section-solutions__heading"><?php the_sub_field('solutions_heading'); ?></h2>
                    <?php endif; ?>
                    <?php if( get_sub_field('solutions_text') ): ?>
                        <div class="section-solutions__text"><?php the_sub_field('solutions_text'); ?></div>
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
                    <div class="section-discover__points">
                        <?php
                        while( have_rows('discover_content') ): the_row(); ?>
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
                                            <?php the_sub_field('discover_item_text');?>
                                        <?php
                                        endif;
                                        ?>
                                    </div>
                                </div>
                        <?php
                        endwhile;?>
                        </div>
                    <?php
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
                            <?php
                                $image = get_sub_field('video_background');
                                ?>
                                <div class="subsection-solutions__pic">
                                    <?php
                                    $size = 'full'; ?>
                                        
                            <video id="video" preload="none" <?php if( $image ) : echo 'poster="'.wp_get_attachment_image_url( $image, $size ).'"'; endif;?> class="section-discover__video-file blurred">
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
                                                
                                                        <?php if( get_field('client_image') ): ?>
                                                            <div class="section-stories__logos-item">
                                                                <div class="section-stories__logos-content">
                                                                    <img src="<?php the_field('client_image'); ?>" />
                                                                </div>
                                                            </div>  
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
                    </div>
                    <?php
                endwhile;
            endif;?>    
        </div>
    </section>
    <div class="et_pb_section et_pb_section_2 roi-Footer-section et_section_regular">
				
				
				
				
					<div class="et_pb_row et_pb_row_2 roi-Footer-row et_pb_row_fullwidth">
				<div class="et_pb_column et_pb_column_4_4 et_pb_column_2  et_pb_css_mix_blend_mode_passthrough et-last-child">
				
				
				<div class="et_pb_module et_pb_code et_pb_code_0">
				
				
				<div class="et_pb_code_inner">      <div class="roi-Footer">
         <div class="roi-Footer-section logo-and-social">
            <img class="roi-Footer-logo" src="https://roivenue.com/wp-content/uploads/2019/03/roivenue_logo.png">

            <div class="roi-Footer-social-icons">
                                                                                          <a class="roi-Footer-social-icon" href="https://www.linkedin.com/company/roivenue/">
                        <img src="https://roivenue.com/wp-content/uploads/2019/03/footer-linkedin.png">
                     </a>
                                                            <a class="roi-Footer-social-icon" href="https://www.youtube.com/channel/UCzrOMbxErWasRv95maadenQ">
                        <img src="https://roivenue.com/wp-content/uploads/2019/03/footer-youtube.png">
                     </a>
                                                            <a class="roi-Footer-social-icon" href="https://www.instagram.com/roivenue/?hl=en">
                        <img src="https://roivenue.com/wp-content/uploads/2019/03/footer-instagram.png">
                     </a>
                                                            <a class="roi-Footer-social-icon" href="https://twitter.com/@roivenue">
                        <img src="https://roivenue.com/wp-content/uploads/2019/03/footer-twitter.png">
                     </a>
                                                            <a class="roi-Footer-social-icon" href="https://www.facebook.com/roivenue/">
                        <img src="https://roivenue.com/wp-content/uploads/2019/03/footer-facebook.png">
                     </a>
                                             </div>

            <p class="roi-Footer-location">Visionary Building, Plynarni 1617/10, Czech Republic, 170 00 Prague 7, +420 774 140 220</p>
         </div>

         <div class="roi-Footer-section navigations">
            		               <div class="roi-Footer-section roi-Footer-menu">
                                   	<h4 class="roi-Footer-title"><a href="https://roivenue.com/contact-roivenue/">CONTACT US</a></h4>
                  <ul class="roi-Footer-menu-items">
                           <li class="roi-Footer-menu-item">
                  <a href="https://resources.roivenue.com/jobs">Jobs</a>
               </li>
                           <li class="roi-Footer-menu-item">
                  <a href="https://roivenue.com/privacy-policy/">Privacy Policy</a>
               </li>
                      <li class="roi-Footer-menu-item">
                          <a href="https://roivenue.com/wp-content/uploads/2020/04/ROIVENUE_Terms_and_Conditions-1.pdf">Terms of Use</a>
                      </li>
                      <li class="roi-Footer-menu-item">
                          <a href="https://roivenue.com/wp-content/uploads/2021/06/Terms-of-service.pdf">Terms of Service</a>
                      </li>
                     </ul>
                     </div>
            		               <div class="roi-Footer-section roi-Footer-menu">
                           	         <h4 class="roi-Footer-title">PRODUCTS</h4>
                  <ul class="roi-Footer-menu-items">
                           <li class="roi-Footer-menu-item">
                  <a href="https://roivenue.com/data-connectors/">Data Connectors</a>
               </li>
                           <li class="roi-Footer-menu-item">
                  <a href="/data-integration">Data Integration</a>
               </li>
                           <li class="roi-Footer-menu-item">
                  <a href="/marketing-attribution">Marketing Attribution</a>
               </li>
                           <li class="roi-Footer-menu-item">
                  <a href="/pricing">Pricing</a>
               </li>
                     </ul>
                     </div>
            		               <div class="roi-Footer-section roi-Footer-menu">
                           	         <h4 class="roi-Footer-title">RESOURCES</h4>
                  <ul class="roi-Footer-menu-items">
                           <li class="roi-Footer-menu-item">
                  <a href="https://resources.roivenue.com/roivenue-scorecard">ROIVENUE Scorecards</a>
               </li>
                           <li class="roi-Footer-menu-item">
                  <a href="https://roivenue.com/articles-home-page/#case-studies" data-et-has-event-already="true">Case Studies</a>
               </li>
                           <li class="roi-Footer-menu-item">
                  <a href="https://resources.roivenue.com/articles-home-page">Blog Posts</a>
               </li>
                     </ul>
                     </div>
                     </div>

         <div class="roi-Footer-section awards-and-partners">
            <h4 class="roi-Footer-title">AWARDS</h4>
            <div class="roi-Footer-images roi-Footer-awards">
                                    <img src="https://roivenue.com/wp-content/uploads/2020/09/awards_microsoft-e1600245905810.png">
                     <img src="https://roivenue.com/wp-content/uploads/2020/09/awards_pm.png">
                           </div>

            <h4 class="roi-Footer-title">PARTNERS</h4>
            <div class="roi-Footer-images roi-Footer-partners">
                                    <img src="https://roivenue.com/wp-content/uploads/2019/03/partners_amcham.png">
                     <img src="https://roivenue.com/wp-content/uploads/2019/03/partners_iab.png">
                     <img src="https://roivenue.com/wp-content/uploads/2019/03/partners_superbrands.png">
                           </div>
         </div>
      </div>
   </div>
			</div> <!-- .et_pb_code -->
			</div> <!-- .et_pb_column -->
				
				
			</div> <!-- .et_pb_row -->
				
				
			</div>
<?php wp_footer();
?>