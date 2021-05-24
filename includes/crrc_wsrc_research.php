<?php 
class Research extends WEOC_post_types_parent{
	public $cpt_name = "Research (Projects)";
	public $cpt_id = "crrc_wsrc_research";
	public $cpt_dashicon = "dashicons-search";
	
    public function __construct() {
        $this->meta_boxes = array(	
           "Project_Status" => array(
                "name" => "Project_Status",
                "std" => "",
                "type"=>"select",
                "title" => "Project Status",
                "values" => array("Ongoing","Completed"),
            ),   
            "Project_Country" => array(
                "name" => "Project_Country",
                "std" => "",
                "type"=>"input",
                "title" => "Project Country",
            ),
              "Project_Funder" => array(
                "name" => "Project_Funder",
                "std" => "",
                "type"=>"input",
                "title" => "Project Funder",
            ),
              "Project_Dates" => array(
                "name" => "Project_Dates",
                "std" => "",
                "type"=>"date",
                "title" => "Project Dates",
            ),
        );		
        $this->cpt_init();  
        add_shortcode( 'research', array($this,'research_shortcode') );
	}

    public function research_shortcode( $atts ){
        if ( ! is_admin() ) {
                global $wpdb;
                $args = array( 'post_type' => 'crrc_wsrc_research', 'posts_per_page' => 10 );
                $the_query = new WP_Query( $args ); 
                ?>
                <?php
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
$customers = new Research;
