<?php 
class zerdaWedgetsdiapv2 extends \Elementor\widget_Base{
    public function get_name(){
        return 'diaporama_tab_v2';
    }
    public function get_title(){
        return esc_html__('Zerda diaporama v2', 'elementor-addon');
    }
    public function get_icon(){
        return 'eicon-code';
    }
    public function get_categories(){
        return ['basic'];
    }
    public function get_keywords(){
        return ['diaporama_tab_v2', 'Addon'];
    }

    protected function register_controls(){
        $this->start_controls_section(
            'section_title',
            [
                'label' => esc_html__('config', 'elementor-addon'),
                'tab' => \Elementor\Controls_manager::TAB_CONTENT,
            ]
        );

        $categories = get_terms( 'category' );

        $options = [];
        foreach ( $categories as $category ) {
            $options[ $category->term_id ] = $category->name;
        }

        $this->add_control(
            'include_categories_diaporama',
            [
                'label' => __( 'Categories( Include )', 'elementor-pro' ),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => $options,
                'default' => [],
                'label_block' => true,
                'multiple' => false,
            ]
        );

        $this->add_control(
			'title_plg',
			[
				'label' => esc_html__( 'Title', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter your title', 'textdomain' ),
			]
		);

        $this->add_control(
            'section_acctive_nb_poste',
            [
                'label' => __( 'Hidden number poste', 'elementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'On', 'elementor' ),
                'label_off' => __( 'Off', 'elementor' ),
                'return_value'	=> 'none',
                'default'	=> 'none',
                'selectors' => [
                    '{{WRAPPER}} .nb_person' => 'display: {{VALUE}}',
                ], 
            ]
        );


        $this->add_control(
            'number_pj',
            [
                'label'=>esc_html__('element number', 'elementor-addon'),
                'tab' => \Elementor\Controls_manager::NUMBER,
                'default'=>esc_html__('3', 'elementor-addon'),
            ]
        );
		$this->add_control(
			'type_pg',
			[
				'type' => \Elementor\Controls_Manager::SELECT,
				'label' => esc_html__( 'type affichage', 'textdomain' ),
				'options' => [
					'featured' => esc_html__( 'Featured', 'textdomain' ),
					'standard' => esc_html__( 'Standard', 'textdomain' ),
				],
				'default' => 'featured',
			]
		);
     
        $this->end_controls_section();
        //filtre
        $this->start_controls_section(
            'section_config_filter',
            [
                'label' => esc_html__('Configue filter', 'elementor-addon'),
                'tab' => \Elementor\Controls_manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
			'label_load_more',
			[
				'label' => esc_html__( 'Load more', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter your title', 'textdomain' ),
			]
		);
        

        $this->add_control(
			'label_Read_more',
			[
				'label' => esc_html__( 'Read more', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter your title', 'textdomain' ),
			]
		);

        $this->add_control(
			'label_filtre',
			[
				'label' => esc_html__( 'filtre', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter your title', 'textdomain' ),
			]
		);

        $this->add_control(
			'label_filtre_all',
			[
				'label' => esc_html__( 'all', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter your title', 'textdomain' ),
			]
		);

        $this->add_control(
			'label_filtre_search',
			[
				'label' => esc_html__( 'search', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter your title', 'textdomain' ),
			]
		);

        $this->add_control(
			'label_filtre_resultat',
			[
				'label' => esc_html__( 'Resultat', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter your title', 'textdomain' ),
			]
		);

        $this->add_control(
			'label_filtre_champvide',
			[
				'label' => esc_html__( 'champ vide', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter your title', 'textdomain' ),
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
            'section_condigue label',
            [
                'label' => esc_html__('Configue label', 'elementor-addon'),
                'tab' => \Elementor\Controls_manager::TAB_CONTENT,
            ]
        );

        $this->add_control(  
			'erreur_poste_f_a_plg',
			[
				'label' => esc_html__( 'text erreur with non have poste Featured Articles', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'placeholder' => esc_html__( 'Enter your title', 'textdomain' ),
			]
		);
              
        $this->end_controls_section();

        //COLOR
        $this->start_controls_section(
            'section_title_style',
            [
                'label' => esc_html__('Couleur', 'elementor-addon'),
                'tab' => \Elementor\Controls_manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label'=>esc_html__('Couleur', 'elementor-addon'),
                'type' => \Elementor\Controls_manager::COLOR,
                'selectors'=>[
                    '{{WRAPPER}} .zerda' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();
    }
    protected function render(){
		    
	       $settings = $this->get_settings_for_display();
		   
            $titre_pj = $settings["title_plg"];
            $number_pj = $settings["number_pj"];
			$type_pg = $settings["type_pg"];
            $erreur_poste_f_a_plg = $settings["erreur_poste_f_a_plg"];
           // echo $settings["label_filtre_all"];
            //filtre
            $filter_label=array();
            $filter_label["label_Read_more"] = $settings["label_Read_more"];
            $filter_label["label_load_more"] = $settings["label_load_more"];
            $filter_label["label_filtre"] = $settings["label_filtre"];
            $filter_label["label_filtre_search"] = $settings["label_filtre_search"];
            $filter_label["label_filtre_resultat"] = $settings["label_filtre_resultat"];
            $filter_label["label_load_all"] = $settings["label_filtre_all"];
            $filter_label["label_filtre_champvide"] = $settings["label_filtre_champvide"];
            


         //   echo $erreur_poste_f_a_plg;
            $section_acctive_nb_poste= $settings["section_acctive_nb_poste"];

            //get categorie

            
            $filter_label["include_categories_diaporama"]= $settings["include_categories_diaporama"];
             
			
			$bread = new zerdAddondiaporama();
			$bread->createAddonZerd_diaporama();
			
			
    }
}

?>