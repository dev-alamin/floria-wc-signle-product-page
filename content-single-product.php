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
                                <p><span>by</span>Team TechChef</p>
                                <p><span>Course level</span> Intermediate</p>
                              
                            </div>
                            <div class="course-details">
                                <div class="sinlge-details"><span>Categories</span>Fitness</div>
                                <div class="sinlge-details"><span>Duration</span>5h</div>
                                <div class="sinlge-details"><span>Total Enrolledment</span>5h</div>
                                <div class="sinlge-details"><span>Last Update</span>July 12, 2022</div>
                            </div>
                            <div class="bottom-meta about-course">
                                <h4>About Course</h4>
                                <p class="about-content">
                              The 30 Days Power Yoga For Weight Loss course is a progressive journey divided into 4 weeks.
                              </p>
                            </div>
                        </div>
                    </div>

                    <div class="content-block description">
                        <h4>Description</h4>
                        <p><span>10 Ways To Increase your Vitility:</span> Lorem ipsum dolor, sit amet consectetur
                            adipisicing
                            elit. Voluptate animi voluptatibus velit quibusdam distinctio esse quasi a iure debitis
                            dolorum.
                        </p>
                        <p><span>10 Ways To Increase your Vitility:</span> Lorem ipsum dolor, sit amet consectetur
                            adipisicing
                            elit. Voluptate animi voluptatibus velit quibusdam distinctio esse quasi a iure debitis
                            dolorum.
                        </p>
                        <p><span>10 Ways To Increase your Vitility:</span> Lorem ipsum dolor, sit amet consectetur
                            adipisicing
                            elit. Voluptate animi voluptatibus velit quibusdam distinctio esse quasi a iure debitis
                            dolorum.
                        </p>
                    </div>
                    <div class="content-block what-will-i-learn">
                        <h4 class="block-title">What Will I Learn</h4>
                        <ul class="single-learn course-meta-list">
                            <li>Lose weight and gain muscle mass.</li>
                            <li>Grasp yoga concepts and have in depth knowledge of aasanas and excercise.</li>
                            <li>Have a deep understanding of diet and nutrition.</li>
                        </ul>
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
                        <div class="videowrapper">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/1Rs2ND1ryYc"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        </div>
                        <div class="sidebar-course-meta">
                            <div class="price">
                                <h2>Rs 500</h2>
                            </div>
                            <div class="title">
                                <h2>Material Includes</h2>
                            </div>
                            <ul class="sidebar-course-includes course-meta-list">
                                <li>12 hours on-demand video</li>
                                <li>3 articles</li>
                                <li>13 downloadable resources</li>
                                <li>Full lifetime access</li>
                                <li>Access on mobile and TV</li>
                                <li>Certification of Completion</li>
                            </ul>
                            <div class="add-to-cart">
                                <button>Add to cart</button>
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

