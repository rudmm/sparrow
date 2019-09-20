<?php get_header(); ?>
<?php the_post(); ?>

   <!-- Page Title
   ================================================== -->
   <div id="page-title">

      <div class="row">

         <div class="ten columns centered text-center">
            <h1>Single<span>.</span></h1>

            <p>Aenean condimentum, lacus sit amet luctus lobortis, dolores et quas molestias excepturi
            enim tellus ultrices elit, amet consequat enim elit noneas sit amet luctu. </p>
         </div>

      </div>

   </div> <!-- Page Title End-->

   <!-- Content
   ================================================== -->
   <div class="content-outer">

      <div id="page-content" class="row">

         <div id="primary" class="eight columns">

            <article class="post">

               <div class="entry-header cf">

                  <h1><?php the_title(); ?></h1>

                  <p class="post-meta">

                     <time class="date" datetime="2014-01-14T11:24"><?php the_time('F j, Y') ?></time>
                     /
                     <span class="categories">
                     <?php the_category(' / ', '',''); ?>
                     </span>

                  </p>

               </div>

               <div class="post-thumb">
                 
                  <?php the_post_thumbnail('post_image'); ?>
               </div>

               <div class="post-content all">
               
               <?php the_content(); ?>

                  <p class="tags">
  				        <?php the_tags('Tagged in : ', ', ') ?>
  			         </p>

                  <ul class="post-nav cf">
                  
  			            <li class="prev"><?php previous_post_link('%link','<strong>PREVIOUS ARTICLE</strong> %title'); ?></li>
  				         <li class="next"><?php next_post_link('%link','<strong>Next Article</strong> %title'); ?></li>
  			         </ul>

               </div>

            </article> <!-- post end -->

            <!-- Comments
            ================================================== -->
                
            <div id="comments">
            

               <h3>Comments</h3>
               

               
               <?php comments_template(); ?>
               <!--<div class="respond">
                  

                 <h3>Leave a Comment</h3>
                  <form name="contactForm" id="contactForm" method="post" action="">
  					   <fieldset>

                     <div class="cf">
  						      <label for="cName">Name <span class="required">*</span></label>
  						      <input name="cName" type="text" id="cName" size="35" value="" />
                     </div>

                     <div class="cf">
  						      <label for="cEmail">Email <span class="required">*</span></label>
  						      <input name="cEmail" type="text" id="cEmail" size="35" value="" />
                     </div>

                     <div class="cf">
  						      <label for="cWebsite">Website</label>
  						      <input name="cWebsite" type="text" id="cWebsite" size="35" value="" />
                     </div>

                     <div class="message cf">
                        <label  for="cMessage">Message <span class="required">*</span></label>
                        <textarea name="cMessage"  id="cMessage" rows="10" cols="50" ></textarea>
                     </div>

                     <button type="submit" class="submit">Submit</button>

  					   </fieldset>
  				      </form> 
               </div>--> 

            </div> <!-- Comments End -->

         </div>

         <div id="secondary" class="four columns end">
         <?php get_sidebar();?>

           

         </div> <!-- Comments End -->

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