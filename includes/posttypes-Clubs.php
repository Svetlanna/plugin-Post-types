<?php
class Caucasus extends WEOC_post_types_parent {
    public $cpt_name = "Sportcourse";
    public $cpt_id = "caucasus-barometer";
    public $cpt_id1 = "caucasus-barometer";
    public $cpt_id2 = "caucasus-barometer";
    public $cpt_dashicon = "dashicons-dashboard";
    public $taxonomy = "SportClube";
    public $taxonomy_url = "SportClube";

    public $taxonomy1 = "Trainers";
    public $taxonomy_url1 = "Trainers";



    public $taxonomy2 = "Gym";
    public $taxonomy_url2 = "Gym";



    public function __construct(){
        $taxonomy= "Trainer";
        $taxonomy_url = "Trainer";

        $this->meta_boxes = array(
     /*       "Trainer" => array(
                "name" => "Trainer",
                "std" => "",
                "type"=>"input",
                "title" => "Trainer",
            ),*/
     /*       "Gym" => array(
                "name" => "Gym",
                "std" => "",
                "type"=>"input",
                "title" => "Gym",
            )*/
        );
        $this->cpt_init();

        add_action('init', array($this, 'add_taxonomy'));
        add_action( 'init', 'wpdocs_register_private_taxonomy', 0 );
        add_shortcode( 'Login_shortcode', array($this,'Login_shortcode') );


    }
    function wpdocs_register_private_taxonomy() {
        $args = array(
            'label'        => __( 'Genre', 'textdomain' ),
            'public'       => false,
            'rewrite'      => false,
            'hierarchical' => true
        );

        register_taxonomy( 'genre', 'caucasus-barometer', $args );
    }






    public function Login_shortcode( $atts ){

?>


    <?php
}







}
new Caucasus;
