<?php
/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/single-event.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$events_label_singular = tribe_get_event_label_singular();
$events_label_plural = tribe_get_event_label_plural();

$event_id = get_the_ID();

?>

<div id="tribe-events-content" class="tribe-events-single">

	<div class="row collapse">
		<div class="small-12 columns">
			<p class="tribe-events-back no-margin-bottom">
				<a href="<?php echo esc_url( tribe_get_events_link() ); ?>"> <?php printf( '&laquo; ' . esc_html__( 'All %s', 'the-events-calendar' ), $events_label_plural ); ?></a>
			</p>
			<hr class="tin-dotted margin-top-050rem">
		</div>
	</div>
	<div class="row collapse">
		<div class="small-12 medium-12 large-7 columns">
			<!-- Notices -->
			<?php tribe_the_notices() ?>
			<?php the_title( '<h1 class="tribe-events-single-event-title single-title font-size-h1-hero-bold">', '</h1>' ); ?>
			<div class="tribe-events-schedule tribe-clearfix">
				<?php echo tribe_events_event_schedule_details( $event_id, '<h2 class="no-margin-bottom">', '</h2>' ); ?>
				<?php echo tribe_get_venue() ?> &nbsp;|&nbsp; <?php echo tribe_get_city( $venue_id ); ?><?php if ( tribe_get_region( $venue_id ) ) : ?>, <?php echo tribe_get_region( $venue_id ); ?><?php else :?>, <?php echo tribe_get_country( $venue_id ); ?><?php endif;?>
				<?php if ( tribe_get_cost() ) : ?>
					<a href=""></a>
					<span class="tribe-events-cost"><span>Cost:</span> <?php echo tribe_get_cost( null, true ) ?></span>
				<?php endif; ?>
			</div>
			<!-- Event header -->
			<div id="tribe-events-header" <?php tribe_events_the_header_attributes() ?>>
				<!-- Navigation -->
				<h3 class="tribe-events-visuallyhidden"><?php printf( esc_html__( '%s Navigation', 'the-events-calendar' ), $events_label_singular ); ?></h3>
				<ul class="tribe-events-sub-nav">
					<li class="tribe-events-nav-previous"><?php tribe_the_prev_event_link( '<span>&laquo;</span> %title%' ) ?></li>
					<li class="tribe-events-nav-next"><?php tribe_the_next_event_link( '%title% <span>&raquo;</span>' ) ?></li>
				</ul>
				<!-- .tribe-events-sub-nav -->
			</div>
			<!-- #tribe-events-header -->
			<!-- Event header -->
			<div id="tribe-events-header" <?php tribe_events_the_header_attributes() ?>>
				<!-- Navigation -->
				<h3 class="tribe-events-visuallyhidden"><?php printf( esc_html__( '%s Navigation', 'the-events-calendar' ), $events_label_singular ); ?></h3>
				<ul class="tribe-events-sub-nav">
					<li class="tribe-events-nav-previous"><?php tribe_the_prev_event_link( '<span>&laquo;</span> %title%' ) ?></li>
					<li class="tribe-events-nav-next"><?php tribe_the_next_event_link( '%title% <span>&raquo;</span>' ) ?></li>
				</ul>
				<!-- .tribe-events-sub-nav -->
			</div>
			<!-- #tribe-events-header -->
			<!-- Event header -->
			<div id="tribe-events-header" <?php tribe_events_the_header_attributes() ?>>
				<!-- Navigation -->
				<h3 class="tribe-events-visuallyhidden"><?php printf( esc_html__( '%s Navigation', 'the-events-calendar' ), $events_label_singular ); ?></h3>
				<ul class="tribe-events-sub-nav">
					<li class="tribe-events-nav-previous"><?php tribe_the_prev_event_link( '<span>&laquo;</span> %title%' ) ?></li>
					<li class="tribe-events-nav-next"><?php tribe_the_next_event_link( '%title% <span>&raquo;</span>' ) ?></li>
				</ul>
				<!-- .tribe-events-sub-nav -->
			</div>
			<!-- #tribe-events-header -->
			<?php while ( have_posts() ) :  the_post(); ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<!-- Event featured image, but exclude link -->
					<a href="<?php echo tribe_get_event_website_url(); ?>" target="_blank" class="display-block" title="Register for this event">
						<?php echo tribe_event_featured_image( $event_id, 'full', false ); ?>
					</a>
					<!-- Event content -->
					<?php do_action( 'tribe_events_single_event_before_the_content' ) ?>
					<div class="tribe-events-single-event-description tribe-events-content">
						<?php the_content(); ?>
					</div>
					<div class="show-for-large-up">
						<p class="margin-top-200rem"><a href="<?php echo tribe_get_event_website_url(); ?>" target="_blank" class="button" title="Register for this event">Register Now</a></p>
					</div>
					<div class="show-for-medium-down">
						<p class="margin-top-200rem"><a href="<?php echo tribe_get_event_website_url(); ?>" target="_blank" class="button small" title="Register for this event">Register Now</a></p>
					</div>
					<hr class="tin">
					<p class="color-lead uppercase font-size-smallest font-weight-bold letter-spacing-1 no-margin-bottom">Calendar Options:</p>
					<?php do_action( 'tribe_events_single_event_after_the_content' ) ?>

				</div>
			<?php endwhile; ?>
		</div>
		<div class="small-12 medium-12 large-4 large-offset-1 columns">
			<?php while ( have_posts() ) :  the_post(); ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
					<!-- Event meta -->
					<?php do_action( 'tribe_events_single_event_before_the_meta' ) ?>
					<?php tribe_get_template_part( 'modules/meta' ); ?>
					<?php do_action( 'tribe_events_single_event_after_the_meta' ) ?>
				</div> <!-- #post-x -->
				<?php if ( get_post_type() == Tribe__Events__Main::POSTTYPE && tribe_get_option( 'showComments', false ) ) comments_template() ?>
			<?php endwhile; ?>
		</div>
	</div>


	<!-- Event footer -->
	<div id="tribe-events-footer">
		<!-- Navigation -->
		<h3 class="tribe-events-visuallyhidden"><?php printf( esc_html__( '%s Navigation', 'the-events-calendar' ), $events_label_singular ); ?></h3>
		<ul class="tribe-events-sub-nav">
			<li class="tribe-events-nav-previous"><?php tribe_the_prev_event_link( '<span>&laquo;</span> Previous Event:&nbsp; <span class="font-lato-italic">%title%</span>' ) ?></li>
			<li class="tribe-events-nav-next"><?php tribe_the_next_event_link( 'Next Event:&nbsp; <span class="font-lato-italic">%title%</span> <span>&raquo;</span>' ) ?></li>
		</ul>
		<!-- .tribe-events-sub-nav -->
	</div>
	<!-- #tribe-events-footer -->

</div><!-- #tribe-events-content -->
