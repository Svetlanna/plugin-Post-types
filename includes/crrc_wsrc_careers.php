<?php 
class Careers extends WEOC_post_types_parent {
    public $cpt_name = "Careers";
    public $cpt_id = "crrc_wsrc_careers";
    public $cpt_dashicon = "dashicons-admin-users";
    public $taxonomy = "Position type";
    public $taxonomy_url = "position_type";

    public function __construct(){
        $this->meta_boxes = array(		
            "Deadline" => array(
                "name" => "Deadline",
                "std" => "",
                "type"=>"date",
                "title" => "Deadline ",
            ),
            "Employment_type" => array(
                    "name" => "Employment_type",
                    "std" => "",
                    "type"=>"select",
                    "title" => "Employment type",
                    "values" => array("part","full time","internship"),

            ),         
        );

        add_theme_support( 'post-thumbnails' );
        $this->cpt_init();
        add_shortcode( 'Careers', array($this,'Careers_shortcode') );
        add_action('init', array($this, 'add_taxonomy'));  

    }

    public function Careers_shortcode( $atts ){
       global $wpdb;
        $args = array( 'post_type' => 'crrc_wsrc_careers', 'posts_per_page' => 10 );
        $the_query = new WP_Query( $args ); 
        ?>
        <?php if ( $the_query->have_posts() ){
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
new Careers;