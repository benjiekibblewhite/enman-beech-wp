<?php
/**
 * The template for displaying all single posts.
 *
 * @package onetone
 */

get_header(); 
$enable_page_title_bar  = onetone_option('enable_page_title_bar');
$display_title_bar_title= onetone_option('display_title_bar_title',1 );
$left_sidebar           = onetone_option('left_sidebar_blog_posts');
$right_sidebar          = onetone_option('right_sidebar_blog_posts');
$display_author_info    = onetone_option('display_author_info',1 );
$display_related_posts  = onetone_option('display_related_posts',1 );

$aside          = 'no-aside';
if( $left_sidebar !='' )
$aside          = 'left-aside';
if( $right_sidebar !='' )
$aside          = 'right-aside';
if(  $left_sidebar !='' && $right_sidebar !='' )
$aside          = 'both-aside';

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">

<?php if( $enable_page_title_bar == 'yes' || $enable_page_title_bar == '1' ):?>
<section class="page-title-bar title-left no-subtitle" style="">
            <div class="container">
            <?php if($display_title_bar_title == 1):?>
                <hgroup class="page-title">
                    <h1><?php the_title();?></h1>
                </hgroup>
                <?php endif;?>
                <?php onetone_get_breadcrumb(array("before"=>"<div class=''>","after"=>"</div>","show_browse"=>false,"separator"=>'','container'=>'div'));?> 
                <div class="clearfix"></div>            
            </div>
        </section>
        <?php endif;?>
 
<div class="post-wrap">
            <div class="container">
                <div class="post-inner row <?php echo $aside; ?>">
                    <div class="col-main">
                        <section class="post-main" role="main" id="content">
                         <?php if ( have_posts() ) : ?>
                        <?php while ( have_posts() ) : the_post(); ?>
                            <article class="post type-post">
                            <?php if (  has_post_thumbnail() ): ?>
                                <div class="feature-img-box">
                                    <div class="img-box">
                                            <?php the_post_thumbnail();?>
                                    </div>                                                 
                                </div>
                                <?php endif;?>
                                <div class="entry-main condition-main">
                                    <div class="condition-header">                                            
                                        <h1 class="condition-title entry-title"><?php the_title();?></h1>
                                        <p class="condition-sub-title"><?php the_field( 'subtitle' ); ?></p>
                                    </div>
                                    <div class="condition-content">                                        
                                        <?php the_field( 'description' ); ?>
                                        <p><a href="<?php echo get_site_url(); ?>">Go Back</a></p>
                                    </div>
                                    <div class="condition-footer entry-footer">
                                    </div>
                                </div>
                            </article>
<?php endwhile; // end of the loop. ?>
<?php endif;?>
                            
                            
                            
                        </section>
                    </div>
                    <?php if( $left_sidebar !='' ):?>
                    <div class="col-aside-left">
                        <aside class="blog-side left text-left">
                            <div class="widget-area">
                                <?php get_sidebar('postleft');?> 
                            </div>
                        </aside>
                    </div>
                    <?php endif; ?>
                    <?php if( $right_sidebar !='' ):?>
                    <div class="col-aside-right">
                       <?php get_sidebar('postright');?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>  
        </div>

      </article>
<?php get_footer(); ?>