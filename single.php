<?php get_header(); ?>

<div id="single">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    
    <?php setPostViews(get_the_ID()); ?>

    <?php $args = array(
        'post_type' => 'attachment',
        'numberposts' => -1, 
        'orderby' => 'menu_order', 
        'order' => 'ASC', 
        'post_mime_type' => 'image', 
        'post_status' => null, 
        'post_parent' => $post->ID 
    ); ?> 

    <div id="top">
        <a href="javascript:history.back()">home</a>
        <div class="tab">
            <div class="text"></div>
            <div class="pic"></div>
        </div>
        <div class="social">
            <div class="share"></div>
		    <?php tz_printLikes(get_the_ID()); ?>
		    <?php get_template_part( 'social' ); ?>
            <div class="like"></div>
        </div>
        <div class="control">
        </div>
    </div>

    <div class="section">

    <?php $attachments = get_posts($args); if ($attachments) { ?>

	<div class="images">

        <?php foreach ( $attachments as $attachment ) { $img = wp_get_attachment_image_src($attachment->ID,'thumbnail'); ?>
			<a class="zoom" target="_blank" href="<?php echo wp_get_attachment_url( $attachment->ID , false ); ?>"><img width="300" height="<?php echo $img[2] ?>" src="<?php echo $img[0] ?>"/></a>
		<?php } ?>

	</div><?php } ?><div class="article">

        <div>

		<h1><?php the_title(); ?></h1>

        <div class="content">
		    <?php the_content(); ?>
        </div>
        
        <div class="stuff">
            <span><?php the_time('F j, Y'); ?> </span>
            <span>Pageview <?php echo getPostViews(get_the_ID()); ?></span>
        </div>

        <div id="comment" class="link" data-id="<?php the_ID(); ?>">添加评论</div>

        </div>

    </div>

    </div>

    <div class="relate">
		<?php get_template_part( 'related' ); ?>
    </div>

	<?php endwhile; endif; ?>

</div>       
</body>
</html><!--
