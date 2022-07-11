<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;
global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>

<div class="container mt-5">
        <div class="row wc-single-main-content-wrapper">
            <div class="col-lg-8">
                <div class="wc-single-content-left single-content">
                    <div class="content-block">
                        <div class="title">
                          <h2>  <?php the_title(); ?> </h2>
                        </div>
                        <div class="course-meta">
                            <div class="top-meta">
                              
                              <?php 
                              $ins_name = carbon_get_the_post_meta( 'fca_instructor_name' );
                              $course_level = carbon_get_the_post_meta( 'fca_course_label' );
                              $course_cat = carbon_get_the_post_meta( 'fca_course_categories' );
                              $course_duration = carbon_get_the_post_meta( 'fca_course_duration' );
                              $course_tot_enrolled = carbon_get_the_post_meta( 'fca_course_tot_enrolled' );
                              $course_about = carbon_get_the_post_meta( 'fca_course_about' );
                              ?>
                                <p><span>by</span><?php echo $ins_name; ?></p>
                                <p><span>Course level</span><?php echo $course_level; ?></p>
                              
                            </div>
                            <div class="course-details">
                                <div class="sinlge-details"><span>Categories</span><?php echo $course_cat; ?></div>
                                <div class="sinlge-details"><span>Duration</span><?php echo $course_duration; ?></div>
                                <div class="sinlge-details"><span>Total Enrolledment</span><?php echo $course_tot_enrolled; ?></div>
                                <div class="sinlge-details"><span>Last Update</span><?php echo the_modified_time('F jS, Y') ?></div>
                            </div>
                            <div class="bottom-meta about-course">
                                <h4 class="block-title">About Course</h4>
                                <p class="about-content">
                              <?php echo $course_about; ?>
                              </p>
                            </div>
                        </div>
                    </div>

                    <div class="content-block description">
                      <?php
                      $fca_course_desc_head = carbon_get_the_post_meta( 'fca_course_desc_heading' );
                      $fca_course_desc = carbon_get_the_post_meta( 'fca_course_description' );
                      $fca_course_what_learn_head = carbon_get_the_post_meta( 'fca_course_learn_point_heading' );
                      $fca_course_what_learn_points = carbon_get_the_post_meta( 'fca_course_what_will_i_learn' );
                      ?>
                        <h4 class="block-title">
                          <?php if($fca_course_desc_head == NULL): ?>
                          Description
                          <?php else:
                          echo $fca_course_desc_head;
                          endif; ?>
                      </h4>
                  <div class="course-description">
                        <?php echo  wp_kses_post( wpautop( $fca_course_desc ) ); ?>
                  </div>
                    </div>
                    <div class="content-block what-will-i-learn">
                           <h4 class="block-title">
                          <?php if( $fca_course_learn_point_heading == NULL): ?>
                          What Will I Learn
                          <?php else:
                          echo $fca_course_learn_point_heading;
                          endif; ?>
                      </h4>
                    <?php if ($fca_course_what_learn_points) : ?>
                        <ul class="single-learn course-meta-list">
                        <?php
                        foreach ($fca_course_what_learn_points as $data) : ?>   
                                <li><?php echo $data['fca_what_learn']; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
                    </div>
                    <div class="content-block course-topics">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Accordion Item #1
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                    aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <strong>This is the first item's accordion body.</strong> It is shown by
                                        default,
                                        until
                                        the collapse plugin adds the appropriate classes that we use to style each
                                        element.
                                        These classes control the overall appearance, as well as the showing and hiding
                                        via
                                        CSS
                                        transitions. You can modify any of this with custom CSS or overriding our
                                        default
                                        variables. It's also worth noting that just about any HTML can go within the
                                        <code>.accordion-body</code>, though the transition does limit overflow.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Accordion Item #2
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <strong>This is the second item's accordion body.</strong> It is hidden by
                                        default,
                                        until the collapse plugin adds the appropriate classes that we use to style each
                                        element. These classes control the overall appearance, as well as the showing
                                        and
                                        hiding
                                        via CSS transitions. You can modify any of this with custom CSS or overriding
                                        our
                                        default variables. It's also worth noting that just about any HTML can go within
                                        the
                                        <code>.accordion-body</code>, though the transition does limit overflow.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        Accordion Item #3
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <strong>This is the third item's accordion body.</strong> It is hidden by
                                        default,
                                        until
                                        the collapse plugin adds the appropriate classes that we use to style each
                                        element.
                                        These classes control the overall appearance, as well as the showing and hiding
                                        via
                                        CSS
                                        transitions. You can modify any of this with custom CSS or overriding our
                                        default
                                        variables. It's also worth noting that just about any HTML can go within the
                                        <code>.accordion-body</code>, though the transition does limit overflow.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content-block about-the-instructor">
                        <div class="instructor">
                            <div class="thumb"><img src="https://images.unsplash.com/photo-1547425260-76bcadfb4f2c?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80" alt=""></div>
                            <div class="ins-name">
                              <h4 class="title"> Team TechChef </h4>
                            </div>
                        </div>
                        <div class="instructor-history">
                            <div class="single-history">
                                <div class="total-courses">
                                    <i class="fa fa-academy"></i>
                                    3 Courses
                                </div>
                            </div>
                            <div class="single-history">
                                <div class="total-student">
                                    <i class="fa fa-person"></i>
                                    80 students
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="wc-single-content-right single-content">
                    <div class="single-sidebar-block">
                      <?php
                          $fca_course_material_video = carbon_get_the_post_meta('fca_course_material_video');
                          ?>
                      
                          <?php
                          foreach ($fca_course_material_video as $data) : ?>
                              <?php if ($data['fca_mat_vid']) : ?>
                                  <div class="local-video">
                                      <video width="100%" height="100%" controls src="<?php echo $data['fca_mat_vid'] ?>">
                                          Your browser does not support the video tag.
                                      </video>
                                  </div>
                              <?php elseif( $data['fca_mat_yt'] ): ?>
                                  <div class="videowrapper">
                                      <iframe width="560" height="315" src="<?php echo $data['fca_mat_yt'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                  </div>
                              <?php endif; ?>

                          <?php endforeach; ?>
                        <div class="sidebar-course-meta">
                            <div class="price">
                                <h2><?php
                                  
                                  $fca_price = get_post_meta( get_the_ID(), '_regular_price', true);
                                  $fca_sale = get_post_meta( get_the_ID(), '_sale_price', true);
                                  
                                 // echo 'Regular Price: ' . $fca_price; 
                                  //echo 'Sale Price: ' . $fca_sale; 
                                  echo 'Price: ' . $product->get_price_html();
                                  ?>
                              </h2>
                            </div>
                          <?php 
                          $fca_course_material_head = carbon_get_the_post_meta( 'fca_course_material_heading' );
                          $fca_course_material = carbon_get_the_post_meta( 'fca_course_material' );
                          ?>
                            
                          <div class="title">
                          <h2>
                            <?php if($fca_course_material_head == NULL): ?>
                              Description
                              <?php else:
                              echo $fca_course_material_head;
                            endif; ?>
                          </h2>
                            </div>
                               <?php if ($fca_course_material) : ?>
                                    <ul class="sidebar-course-includes course-meta-list">
                                    <?php
                                    foreach ($fca_course_material as $data) : ?>   
                                            <li><?php echo $data['fca_material']; ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                          
                            <div class="add-to-cart">
                              <?php 
                              global $product;

                                echo apply_filters( 'woocommerce_loop_add_to_cart_link',
                                    sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" class="button %s product_type_%s">%s</a>',
                                        esc_url( $product->add_to_cart_url() ),
                                        esc_attr( $product->get_id() ),
                                        esc_attr( $product->get_sku() ),
                                        $product->is_purchasable() ? 'add_to_cart_button' : '',
                                        esc_attr( $product->get_type() ),
                                        esc_html( $product->add_to_cart_text() )
                                    ),
                                $product );
                              ?>
                            </div>
                        </div>
                    </div>
                    <div class="single-sidebar-block">
                        <div class="title">
                            <h2>Requirements</h2>
                            <ul class="course-meta-list">
                                <li>A Yoga mat.</li>
                                <li>Blcoks and a strap.</li>
                                <li>And your dedication over the next 30 days. </li>
                            </ul>
                        </div>
                    </div>
                    <div class="single-sidebar-block">
                        <div class="title">
                            <h2>Target Audience</h2>
                            <ul class="course-meta-list">
                                <li>Understand the secrets to physical and mental harmony.</li>
                                <li>Learn Yoga breathing techniques.</li>
                                <li>Learn the basics of meditation</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

