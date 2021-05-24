<?php 
class People extends WEOC_post_types_parent {
    public $cpt_name = "People";
    public $cpt_id = "crrc_wsrc_people";
    public $cpt_dashicon = "dashicons-admin-users";
    public $taxonomy = "Group";
    public $taxonomy_url = "group";

    public function __construct(){

        $this->meta_boxes = array(		
            "role" => array(
                "name" => "role",
                "std" => "",
                "type"=> "input",
                "title" => "Position/Role",
            ),
            "facebook" => array(
                "name" => "facebook",
                "std" => "",
                "type"=>"input",
                "title" => "facebook",
            ),
            "twitter" => array(
                "name" => "twitter",
                "std" => "",
                "type"=>"input",
                "title" => "twitter",
            ),
            "email" => array(
                "name" => "email",
                "std" => "",
                "type"=>"input",
                "title" => "Email Address",
            ),
            "linkedin" => array(
                "name" => "linkedin",
                "std" => "",
                "type"=>"input",
                "title" => "linkedin",
            ),          
        );
        add_theme_support( 'post-thumbnails' );
        $this->cpt_init();
        add_shortcode( 'people', array($this,'people') );
        add_action('init', array($this, 'add_taxonomy'));  
    }

    public function people( $atts ){
       global $wpdb;
        $args = array( 'post_type' => 'crrc_wsrc_people', 'posts_per_page' => 10 );
        $the_query = new WP_Query( $args ); 
        if ( $the_query->have_posts() ){
               while ( $the_query->have_posts() ){
                    $the_query->the_post();
                ?>
                    <div class='wsrc_fields' style='padding:20px;color:#fff;background: #000;width: 30%;margin-top: 20px'>
                        <a href='<?php the_permalink()?>' style='color:#fff'><?php the_title()?></a>
                        <p style='color:#fff'><?php the_content()?></p>
                 
                        <?php the_meta()?></div>  
                    <?php
                    wp_reset_postdata(); ?>

                    <?php
             }
        } 
    }


} 
new People;