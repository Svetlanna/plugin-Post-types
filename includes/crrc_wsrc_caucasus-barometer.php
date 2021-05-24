<?php 
class Caucasus extends WEOC_post_types_parent {
    public $cpt_name = "Caucasus Barometer";
    public $cpt_id = "caucasus-barometer";
    public $cpt_dashicon = "dashicons-dashboard";
    public $taxonomy = "Year";
    public $taxonomy_url = "Year";

    public function __construct(){




        $this->meta_boxes = array(	
            "Document" => array(
                "name" => "Document",
                "std" => "",
                "type"=>"input",
                "title" => "Document",
            ),   
            "document_type" => array(
                    "name" => "document_type",
                    "std" => "",
                    "type"=>"file",
                    "title" => "Document Type",
            )
        );		
        $this->cpt_init();
        add_action('init', array($this, 'add_taxonomy'));
        add_shortcode( 'caucasus', array($this,'caucasus_shortcode') );


    
    }

    public function caucasus_shortcode( $atts ){
        if ( ! is_admin() ) {
           global $wpdb;
            $args = array( 'post_type' => 'caucasus-barometer', 'posts_per_page' => 10 );
            $the_query = new WP_Query( $args ); 
            ?>
                <?php if ( $the_query->have_posts() ){ 
                    while ( $the_query->have_posts() ){
                        $the_query->the_post();
                        ?>
                            <div class='wsrc_fields' style='padding:20px;color:#fff;background: #000;width: 30%;margin-top: 20px'>
                                <a href='<?php the_permalink()?>' style='color:#fff'><?php the_title()?></a>
                                <p style='color:#fff'><?php the_content()?></p>
                         
                                <?php the_meta()?>
                            </div>  
                        <?php
                        wp_reset_postdata(); ?>
                        <?php
                    }
                }
        } 

    }
}
new Caucasus;