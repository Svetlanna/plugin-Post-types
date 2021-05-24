<?php
class Sponsors extends WEOC_post_types_parent{
	public $cpt_name = "Sponsors";
	public $cpt_id = "crrc_wsrs_sponsors";
	public $cpt_dashicon = "dashicons-portfolio";


	public function __construct(){
		$this->meta_boxes = array(
			"external_link" => array(
				"name" => "external_link",
				"std" => "",
				"type"=>"input",
				"title" => "Organization Website",
			),
		);
		$this->cpt_init();
		add_shortcode( 'Sponsors', array($this,'sponsors_shortcode') );
	}

	public function sponsors_shortcode( $atts ){
        if ( ! is_admin() ) {
           global $wpdb;
            $args = array( 'post_type' => 'crrc_wsrs_sponsors', 'posts_per_page' => 10 );
            $the_query = new WP_Query( $args ); 
            if ( $the_query->have_posts() ){ 
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
new Sponsors;