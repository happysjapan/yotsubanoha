<?php
/*
Plugin Name: Yotsubanoha plugin
Description: Site specific pluggin adding widgets
Author: Neopa
*/
/* Start Adding Functions Below this Line */

// Creating the widget yotsubanoha_lawyer_date_widget
class yotsubanoha_lawyer_date_widget extends WP_Widget {

  function __construct() {
    parent::__construct(
    // Base ID of your widget
    'yotsubanoha_lawyer_date_widget',

    // Widget name will appear in UI
    __('Neopa Lawyer by date', 'yotsubanoha_lawyer_date_widget_domain'),

    // Widget description
    array( 'description' => __( 'Get the last lawyers created', 'yotsubanoha_lawyer_date_widget_domain' ), )
    );
  }

  // Creating widget front-end
  // This is where the action happens
  public function widget( $args, $instance ) {
    $title = apply_filters( 'widget_title', $instance['title'] );
    // before and after widget arguments are defined by themes
    echo $args['before_widget'];
    if ( ! empty( $title ) )
    echo $args['before_title'] . $title . $args['after_title'];

    // This is where you run the code and display the output ?>
    <?php $post_args = array(
      'posts_per_page'   => 6,
      'post_type'        => 'post',
      'orderby'          => 'date',
    	'order'            => 'DESC'
    );
    $the_query = new WP_Query( $post_args ); ?>

    <div class="sideWidget postInFrontPage">
      <h2>新着事業所一覧</h2>
      <div class="inner">
        <ul>
          <?php if ( $the_query->have_posts() ) { while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

            <li id="post-<?php echo get_the_id(); ?>">
              <div>
                    <p class="ttl"><?php echo the_title(); ?></p>
                    <p class="desc"><?php echo get_field('office_address'); ?></p>
                    <p class="reward">お祝い金：<?php echo get_field('reward'); ?>円</p>
                    <img src="<?php echo get_field('office_image'); ?>" alt="<?php echo the_title(); ?>" />
                    <a href="<?php echo get_the_permalink(); ?>" title="<?php echo the_title(); ?>" class="btn">詳細</a>
              </div>
            </li>

          <?php endwhile; } else { echo 'No result'; } ?>
        </ul>
        <div class="more"><a href="/search/" title="もっと見る">もっと見る</a></div>
      </div>
    </div>

    <?php echo $args['after_widget'];
  }

  // Widget Backend
  public function form( $instance ) {
    if ( isset( $instance[ 'title' ] ) ) {
      $title = $instance[ 'title' ];
    }
    else {
      $title = __( 'New title', 'yotsubanoha_lawyer_date_widget_domain' );
    }
    // Widget admin form
    ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>
  <?php
  }

  // Updating widget replacing old instances with new
  public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    return $instance;
  }
} // Class yotsubanoha_lawyer_date_widget ends here




// Creating the widget yotsubanoha_lawyer_reward_widget
class yotsubanoha_lawyer_reward_widget extends WP_Widget {

  function __construct() {
    parent::__construct(
    // Base ID of your widget
    'yotsubanoha_lawyer_reward_widget',

    // Widget name will appear in UI
    __('Neopa Lawyer by rewards', 'yotsubanoha_lawyer_reward_widget_domain'),

    // Widget description
    array( 'description' => __( 'Get the last lawyers created', 'yotsubanoha_lawyer_reward_widget_domain' ), )
    );
  }

  // Creating widget front-end
  // This is where the action happens
  public function widget( $args, $instance ) {
    $title = apply_filters( 'widget_title', $instance['title'] );
    // before and after widget arguments are defined by themes
    echo $args['before_widget'];
    if ( ! empty( $title ) )
    echo $args['before_title'] . $title . $args['after_title'];

    // This is where you run the code and display the output ?>
    <?php
    $post_args = array(
      'posts_per_page'	=> 6,
      'post_type'        => 'post',
      'meta_key'			=> 'reward',
      'orderby'			=> 'meta_value_num',
      'order'				=> 'DESC'
    );
    $the_query = new WP_Query( $post_args ); ?>

  <div class="sideWidget postInFrontPage">
      <h2>お祝い金が多い事業所一覧</h2>
      <div class="inner">
        <ul>
          <?php if ( $the_query->have_posts() ) { while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

              <li class="ttBox" id="post-<?php echo get_the_id(); ?>">
                <div>
                    <p class="ttl"><?php echo the_title(); ?></p>
                    <p class="desc"><?php echo get_field('office_address'); ?></p>
                    <p class="reward">お祝い金：<?php echo get_field('reward'); ?>円</p>
                    <img src="<?php echo get_field('office_image'); ?>" alt="<?php echo the_title(); ?>" />
                    <a href="<?php echo get_the_permalink(); ?>" title="<?php echo the_title(); ?>" class="btn">詳細</a>
                </div>
              </li>

          <?php endwhile; } else { echo 'No result'; } ?>
        </ul>
        <div class="more"><a href="/search/" title="もっと見る">もっと見る</a></div>
      </div>

    </div>

    <?php echo $args['after_widget'];
  }

  // Widget Backend
  public function form( $instance ) {
    if ( isset( $instance[ 'title' ] ) ) {
      $title = $instance[ 'title' ];
    }
    else {
      $title = __( 'New title', 'yotsubanoha_lawyer_reward_widget_domain' );
    }
    // Widget admin form
    ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>
  <?php
  }

  // Updating widget replacing old instances with new
  public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    return $instance;
  }
} // Class yotsubanoha_lawyer_reward_widget ends here




// Register and load the widget
function yotsubanoha_load_widget() {
	register_widget( 'yotsubanoha_lawyer_date_widget' );
  register_widget( 'yotsubanoha_lawyer_reward_widget' );
}
add_action( 'widgets_init', 'yotsubanoha_load_widget' );

/* Stop Adding Functions Below this Line */
?>