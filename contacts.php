<?php
/**
 * Template Name: Get in touch
 * Template Post Type: post, page
 */
?>
<?php get_header(); ?>
 
<!-- Page Title
================================================== -->
<div id="page-title">

   <div class="row">

      <div class="ten columns centered text-center">
         <h1>Get In Touch<span>.</span></h1>

         <p>Aenean condimentum, lacus sit amet luctus lobortis, dolores et quas molestias excepturi
            enim tellus ultrices elit, amet consequat enim elit noneas sit amet luctu. </p>
      </div>

   </div>

</div> <!-- Page Title End-->

<!-- Content
================================================== -->
<div class="content-outer">

   <div id="page-content" class="row page">

      <div id="primary" class="eight columns">

         <section>

            <h1>Hello. Let's talk.</h1>

            <p class="lead">Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor,
              nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate
              cursus a sit amet mauris. Morbi accumsan ipsum velit. </p>

            <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor,
              nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate
              cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a
              ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. </p>

            <div id="contact-form">
               <?php echo do_shortcode('[contact-form-7 id="101" title="Контактная форма 1"]'); ?>
                  <!-- form -->
                 <!-- <form name="contactForm" id="contactForm" method="post" action="<?php echo admin_url('admin-ajax.php?action=send_mail') ?>">
      					<fieldset>

                        <div class="half">
      						   <label for="contactName">Name <span class="required">*</span></label>
      						   <input name="contactName" type="text" id="contactName" size="35" value="" />
                        </div>

                        <div class="half pull-right">
      						   <label for="contactEmail">Email <span class="required">*</span></label>
      						   <input name="contactEmail" type="text" id="contactEmail" size="35" value="" />
                        </div>

                        <div>
      						   <label for="contactSubject">Subject</label>
      						   <input name="contactSubject" type="text" id="contactSubject" size="35" value="" />
                        </div>

                        <div>
                           <label  for="contactMessage">Message <span class="required">*</span></label>
                           <textarea name="contactMessage"  id="contactMessage" rows="15" cols="50" ></textarea>
                        </div>

                        <div>
                           <button class="submit">Submit</button>
                           <span id="image-loader">
                              <img src="images/loader.gif" alt="" />
                           </span>
                        </div>

      					</fieldset>
      				</form>--> <!-- Form End -->

               <!-- contact-warning -->
               <div id="message-warning"></div>
               <!-- contact-success -->
      			<div id="message-success">
                  <i class="icon-ok"></i>Your message was sent, thank you!<br />
      			</div>

            </div>

         </section> <!-- section end -->

      </div>

      <div id="secondary" class="four columns end">

         <?php get_sidebar('contacts'); ?>

      </div>

   </div>

</div> <!-- Content End-->

<!-- Tweets Section
================================================== -->
<section id="tweets">

   <div class="row">

      <div class="tweeter-icon align-center">
         <i class="fa fa-twitter"></i>
      </div>

      <ul id="twitter" class="align-center">
         <li>
            <span>
               This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet.
               Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum
               <a href="#">http://t.co/CGIrdxIlI3</a>
            </span>
            <b><a href="#">2 Days Ago</a></b>
         </li>
            <!--
            <li>
               <span>
               This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet.
               Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum
               <a href="#">http://t.co/CGIrdxIlI3</a>
               </span>
               <b><a href="#">3 Days Ago</a></b>
            </li>
            -->
      </ul>

      <p class="align-center"><a href="#" class="button">Follow us</a></p>

   </div>

</section> <!-- Tweet Section End-->
<?php get_footer(); ?>