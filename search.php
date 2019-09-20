<?php get_header();?>

<!-- Page Title
================================================== -->
<div id="page-title">

    <div class="row">

        <div class="ten columns centered text-center">

            <h1><?php echo 'Searching results' ?> <span><?php echo $_GET['s']; ?></span></h1>

        </div>

    </div>

</div> 
<!-- Page Title End-->

<!-- Content
================================================== -->
<div class="content-outer">

    <div id="page-content" class="row">

        <div id="primary" class="eight columns">
            <?php
                $search = $_GET['s'];
                $query = new WP_Query(array('s' => $search, 'post_type' => array('post', 'portfolio')));
            ?>
            <?php while ($query->have_posts()):
                $query->the_post();
                $post_type = get_post_type($post_id);
            if ($post_type == 'post') {
            ?>
	        <article class="post">

	            <div class="entry-header cf">

	                <h1><a href="<?php the_permalink();?>" title=""><?php the_title();?></a></h1>

	                    <p class="post-meta">

	                        <time class="date" ><?php the_time('F j, Y');?></time>
	                           /
	                        <?php the_category(' / ', '', '');?>

	                    </p>

	            </div>

	            <div class="post-thumb">
	                <a href="<?php the_permalink();?>" title=""><?php the_post_thumbnail('post-image');?></a>
	            </div>

	            <div class="post-content">

	                <?php the_excerpt();?>

	            </div>

	        </article> <!-- post end -->
	        <?php
                } elseif ($post_type == 'portfolio') {
            ?>
            <div id="portfolio-wrapper" class="bgrid-halves cf">
               

                <div class="columns portfolio-item ">
                    <div class="item-wrap">
          				<a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail(); ?>
                        <div class="overlay"></div>
                        <div class="link-icon"><i class="fa fa-link"></i></div>
                        </a>
          				<div class="portfolio-item-meta">
          					<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                            <p><?php the_category(' '); ?></p>
          				</div>
                    </div>
          		</div>
            </div>
            <?php
            }
            endwhile;
            ?>
        </div> <!-- Primary End-->

    </div>

</div> <!-- Content End-->

<?php get_footer();?>