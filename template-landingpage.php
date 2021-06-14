<?php
/*
Template Name: Landinpage new
*/

get_header();
?>

<section role="region" class="section section-lphero">
    <div class="container section-lphero__container">
    <?php
    if( have_rows('hero_section') ): ?>
            <?php
            while( have_rows('hero_section') ): the_row(); 
                if( have_rows('hero_texts') ): ?>
                    <?php 
                    while( have_rows('hero_texts') ): the_row(); ?>
                    
                    <div class="section-hero__text section-hero__text--nopadding">
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
                    </div>
                    <?php
                    endwhile; ?>
                <?php
                endif; ?>
                <?php
                if(get_sub_field('hero_image')):?>
                    <?php
                        $image = get_sub_field('hero_video_bg');
                        $size = 'full'; ?>
                    <video controls autoplay <?php if( $image ) : echo 'poster="'.wp_get_attachment_image_url( $image, $size ).'"'; endif;?>>
                        <source src="<?php the_sub_field('hero_image');?>" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                <?php
                else:
                    $image = get_sub_field('hero_video_bg');
                    $size = 'full';
                    if( $image ) :
                        echo wp_get_attachment_image( $image, $size );
                    endif;
                endif;
                if(get_sub_field('hero_button')):
                    $link = get_sub_field('hero_button');?>
                    <a href="<?php echo esc_url( $link['url'] ); ?>" class="btn btn-primary btn-primary--noshadow"><?php echo esc_attr( $link['title'] ); ?></a>
                <?php 
                endif;
            endwhile; ?>
            <?php
        endif; ?>
    </div>    
</section>
<section role="region" class="section section-feature section--grey">
    <div class="container">
        <?php
        if( have_rows('features_copy') ): ?>
            <?php
            while( have_rows('features_copy') ): the_row(); ?>
                <?php
                if( get_sub_field('features_heading') ): ?>
                    <h2 class="section-feature__heading"><?php the_sub_field('features_heading'); ?></h2>
                <?php
                endif; ?>
                <?php
                if( have_rows('features_subsection') ): ?>
                    <div class="section-feature__grid">
                        <?php
                        $i = 1;
                        while( have_rows('features_subsection') ): the_row(); ?>
                            <?php
                            if( have_rows('features_text') ): ?>
                                <?php
                                
                                while( have_rows('features_text') ): the_row();
                                    ?>
                                        <div class="section-feature__grid-item">
                                            <div class="section-feature__grid-container <?php if($i == 1) echo 'section-feature__grid-container--active'?>" data-number="<?php echo $i;?>">
                                                <?php
                                                if(get_sub_field('features_tag')):?>
                                                    <span><?php the_sub_field('features_tag');?></span>
                                                <?php
                                                endif;
                                                ?>
                                                <?php
                                                if(get_sub_field('features_icon')):?>
                                                    <?php $icon = get_sub_field('features_icon'); ?>
                                                    <?php echo file_get_contents( $icon ); ?>
                                                <?php
                                                endif;
                                                ?>
                                            </div>
                                        </div>
                                    <?php
                                    
                                endwhile;
                            endif;?>  
                        <?php
                            $i++;
                        endwhile;
                    ?>
                    </div>
                    <section class="section-solutions section-solutions--nopadding">
                        <?php
                        $m = 1;
                        while( have_rows('features_subsection') ): the_row(); ?>
                            <section role="region" class="subsection-solutions subsection-solutions--smallpadding subsection-solutions--feature <?php if($m == 1) echo 'subsection-solutions--show'?>" data-number="<?php echo $m;?>">
                                <div class="subsection-solutions__container subsection-solutions__container--feature">
                                    <div class="subsection-solutions__text subsection-solutions__text--smaller">
                                        <?php
                                        if( have_rows('features_text') ): ?>
                                            <?php
                                            while( have_rows('features_text') ): the_row();
                                                ?>
                                                <?php
                                                if(get_sub_field('features_tag')):?>
                                                    <div class="subsection-solutions__text-preicon">
                                                    <?php 
                                                        if(get_sub_field('features_icon')):?>
                                                        <?php $icon = get_sub_field('features_icon'); ?>
                                                            <?php echo file_get_contents( $icon ); ?>
                                                        <?php
                                                        endif;
                                                        ?>
                                                        <span><?php the_sub_field('features_tag');?><span>
                                                    </div>
                                                <?php
                                                endif;
                                                ?>
                                            
                                            <?php
                                            if(get_sub_field('features_heading')):?>
                                                <h3><?php the_sub_field('features_heading');?></h3>
                                            <?php
                                            endif;
                                            ?>
                                            <?php
                                            if(get_sub_field('features_content')):?>
                                                <?php the_sub_field('features_content');?>
                                            <?php
                                            endif;
                                            ?>
                                            <?php
                                            endwhile;
                                        endif;?>
                                    </div>
                                    <?php
                                    $image = get_sub_field('features_image');
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
                        $m++;
                    endwhile;?>
                    </section>
                <?php
                endif;?>                            
            <?php
            endwhile;
        endif;?>
    </div>
</section>   
<section role="region" class="section section-versatile">
    <div class="container">

    <?php if( have_rows('versatile') ): ?>
        <?php
        while( have_rows('versatile') ): the_row(); ?>
            <?php
            if(get_sub_field('versatile_heading')):?>
                <h2 class="section-versatile__heading"><?php the_sub_field('versatile_heading');?></h2>
            <?php
            endif;
            ?>
            <?php
            if(get_sub_field('meet_text')):?>
                <div class="section-versatile__text"><?php the_sub_field('versatile_text');?></div>
            <?php
            endif;
            ?>
            <?php
            if( have_rows('versatile_items') ): ?>
                <div class="section-versatile__points">
                <?php
                while( have_rows('versatile_items') ): the_row(); ?>
                        <?php
                    if( have_rows('versatile_content') ): ?>
                        <?php
                        while( have_rows('versatile_content') ): the_row(); ?>
                                <div class="section-versatile__points-item">
                                    <div class="section-versatile__points-content">
                                        <?php if( get_sub_field('versatile_item_heading') ): ?>
                                            <h3><?php the_sub_field('versatile_item_heading'); ?></h3>
                                        <?php endif; ?>
                                        <?php
                                        $image = get_sub_field('versatile_item_image');
                                        ?>
                                        <div class="section-versatile__points-img">
                                            <?php
                                            $size = 'full'; // (thumbnail, medium, large, full or custom size)
                                                if( $image ) :
                                                    echo wp_get_attachment_image( $image, $size );
                                                endif;
                                            ?>
                                        </div>
                                        <?php if( get_sub_field('versatile_item_text') ): ?>
                                                <?php the_sub_field('versatile_item_text'); ?>
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
</section>    
<!--<section role="region" class="section section-clients section-clients--light">
    <div class="container">
        <h2 class="section-clients__heading">What customers say about ROIVENUE 2.0</h2>
    </div>
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
                                    <div class="section-clients__item section-clients__item--nopadding">
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
            <div class="swiper-pagination swiper-pagination--dark"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>
</section>-->
<section role="region" class="section section-seeit">
    <div class="container section-seeit__container">
        <?php
        if( have_rows('video') ): ?>
            <?php
            while( have_rows('video') ): the_row(); ?>
            <?php
                if(get_sub_field('video_heading')):?>
                    <h2 class="section-seeit__heading"><?php the_sub_field('video_heading');?></h2>
                <?php
                endif;
            ?>
            <div class="section-discover__video section-discover__video--large">
                <div class="section-discover__video-overlay section-discover__video-overlay--blue">
                    <span class="section-discover__video-play section-discover__video-play--centered" onclick="toggleControls()";>Watch now</span>
                </div>
                <?php
                if(get_sub_field('video')):?>
                    <?php
                        $image = get_sub_field('video_background');
                        ?>
                    <?php
                    $size = 'full'; ?>
                    <video id="video" preload="none" <?php if( $image ) : echo 'poster="'.wp_get_attachment_image_url( $image, $size ).'"'; endif;?> class="section-discover__video-file blurred">
                        <source src="<?php the_sub_field('video');?>" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                <?php
                endif;
            endwhile;
        endif;
                ?>
                
            </div>
    </div>
</section>
<section role="region" class="section section--grey section-analyze">
    <div class="container">
        <?php
        if( have_rows('table') ): ?>
            <?php
            while( have_rows('table') ): the_row(); ?>
                <?php if(get_sub_field('analyze_heading')):?>
                    <h2 class="section-analyze__heading"><?php the_sub_field('analyze_heading')?></h2>
                <?php endif;?>
                <?php
                if( have_rows('feature_row') ): ?>
                    <table class="analyze-table">
                        <thead>
                            <tr class="analyze-table__header">
                                <th>
                                    <div class="analyze-table__header-heading--first">
                                    </div>
                                </th>
                                <th>
                                    <div class="analyze-table__header-heading">
                                        <div class="analyze-table__header-inner">
                                            <img src="<?php bloginfo('stylesheet_directory')?>/src/img/roi-logo.png">
                                            <span>Roivenue 2.0</span>
                                        </div>    
                                    </div>
                                </th>
                                <th>
                                    <div class="analyze-table__header-heading">
                                        <div class="analyze-table__header-inner">
                                            <img src="<?php bloginfo('stylesheet_directory')?>/src/img/roi-logo.png">
                                            <span>Roivenue 1.0</span>
                                        </div>    
                                    </div>    
                                </th>
                                <th>
                                    <div class="analyze-table__header-heading">
                                        <div class="analyze-table__header-inner">
                                        <img src="<?php bloginfo('stylesheet_directory')?>/src/img/analytics-logo.png">
                                            <span>Google Analytics</span>
                                        </div>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while( have_rows('feature_row') ): the_row(); ?>
                                <tr class="analyze-table__body">
                                    <?php if(get_sub_field('feature_name')):?>
                                    <td><span class="analyze-table__body-property">
                                        <span class="info-text"><?php the_sub_field('feature_name');?></span>
                                        <?php if(get_sub_field('feature_content')):?>
                                            <span class="info">
                                                <img src="<?php bloginfo('stylesheet_directory')?>/src/img/info-icon.svg">
                                                <span class="info-tooltip"><?php the_sub_field('feature_content');?></span>
                                            </span>
                                        <?php endif;?>
                                    </td>        
                                    <?php endif;?>
                                    <td class="analyze-table__body-content">
                                        <span class="analyze-table__body-text">
                                            <?php
                                            if(get_sub_field('feature_for_roi2')):
                                                echo 'Yes';
                                            else:
                                                echo '-';
                                            endif;?>
                                        </span>
                                    </td>
                                    <td class="analyze-table__body-content">
                                        <span class="analyze-table__body-text">
                                            <?php
                                            if(get_sub_field('feature_for_roi1')):
                                                echo 'Yes';
                                            else:
                                                echo '-';
                                            endif;?>
                                        </span>
                                    </td>
                                    <td class="analyze-table__body-content">
                                        <span class="analyze-table__body-text">
                                            <?php
                                            if(get_sub_field('feature_for_analytics')):
                                                echo 'Yes';
                                            else:
                                                echo '-';
                                            endif;?>
                                        </span>
                                    </td>
                                </tr>
                            <?php 
                            endwhile;?>
                        </tbody>
                    </table>
                <?php    
                endif;?>        
                        
            <?php
            endwhile;
        endif;
        ?>    
    </div>
</section>
    <section role="region" class="section section-cta">
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
                        <?php the_sub_field('cta_text')?>
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
                  <a href="https://roivenue.com/wp-content/uploads/2020/04/ROIVENUE_Terms_and_Conditions-1.pdf">Terms of Service</a>
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
                           <li class="roi-Footer-menu-item">
                  <a href="https://roivenue.com/zdravi-ceskych-eshopu-covid-19/">COVID-19 #SpolečněToZvládneme</a>
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