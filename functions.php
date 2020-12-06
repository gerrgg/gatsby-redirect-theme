<?php

add_action("rest_api_init", "gregbastianelli_register_post_meta");
/**
 * Add hearts post meta to API
 */
function gregbastianelli_register_post_meta()
{
	register_post_meta( 'post', 'hearts', array(
        'show_in_rest' => true,
        'single' => true,
        'type' => 'integer',
    ) );
}

add_action( 'graphql_register_types', 'gregbastianelli_add_hearts_post_meta_to_graphql');
/**
 * Add hearts post meta to graphQL
 */
function gregbastianelli_add_hearts_post_meta_to_graphql() {
  register_graphql_field( 'Post', 'hearts', [
    'type' => 'Integer',
    'description' => __( 'Get number of times a post has been hearted', 'gregbastianelli' ),
    'resolve' => function( \WPGraphQL\Model\Post $post, $args, $context, $info ) {
      $hearts = get_post_meta( $post->ID, 'hearts', true );
		return (! empty($hearts)) ? $hearts : 0;
    }
  ] );
}



add_action("wp_body_open", "gregbastianelli_redirect_to_frontend", 1);

function gregbastianelli_redirect_to_frontend()
{
  ?>
    <script>
    window.location.replace("https://www.gregbastianelli.com");
    </script>
  <?php
}
