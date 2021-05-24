<?php 
class Faq extends WEOC_post_types_parent{
	public $cpt_name = "Faq";
	public $cpt_id = "crrc_wsrc_faq";
	public $cpt_dashicon = "dashicons-editor-help";
	
	public function __construct() {
		$this->meta_boxes = array(		
			"Question" => array(
		        "name" => "Question",
		        "std" => "",
		        "type"=>"textarea",
		        "title" => "Question",
		   	),   
			"Answer" => array(
			    "name" => "Answer",
			    "std" => "",
			    "type"=>"textarea",
			    "title" => "Answer",
			)
		);		
		$this->cpt_init();
		add_shortcode( 'faq', array($this,'faq') );

	}
    public function faq(){
        if ( ! is_admin() ){
            global $wpdb;
            $args = array( 'post_type' => 'faq', 'posts_per_page' => 10 );
            $the_query = new WP_Query( $args ); 
            ?>
            <?php
             if ( $the_query->have_posts() ){ 
                while ( $the_query->have_posts() ){
                    $the_query->the_post();
                    ?>
                    <div class='wsrc_fields' style='padding:20px;color:#fff;background: #000;width: 30%;margin-top: 20px'>
	                    <?php the_post_thumbnail();?>
	                    <?php the_title()?>
	                    <p style='color:#fff'><?php the_content()?></p>
	                    <?php
	                     the_meta()?>
                 	</div>
                     <?php
                    wp_reset_postdata(); 

                }
            }
        } 
    }
} 

$Faq = new Faq;
