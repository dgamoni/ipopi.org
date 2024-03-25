<?php
/**
 * get_firms_by_region
 */
add_action( 'wp_ajax_get_products_by_country', 'deco_get_firms_by_tax' );
add_action( 'wp_ajax_nopriv_get_products_by_country', 'deco_get_firms_by_tax' );

function deco_get_firms_by_tax( $first_term_id = 0 ) {

	if ( empty( $first_term_id ) ) {
		$first_term_id = intval( $_POST['term_id'] );
	}

	$term = get_term( $first_term_id);
	$taxonomy = 'country';
	$title = $term->name;

// Country profile
// ipopi_country_patientgroup
// ipopi_country_link 
// ipopi_country_medicaladvisory
// ipopi_country_numberofpatients
// ipopi_country_basedon
	$ipopi_country_patientgroup = get_field('ipopi_country_patientgroup', $taxonomy. '_' . $first_term_id) ? get_field('ipopi_country_patientgroup', 'term_' . $first_term_id) : 'No patient group';
	$ipopi_country_link = get_field('ipopi_country_link', $taxonomy. '_' . $first_term_id) ? get_field('ipopi_country_link', 'term_' . $first_term_id) : '';
	$ipopi_country_medicaladvisory = get_field('ipopi_country_medicaladvisory', $taxonomy. '_' . $first_term_id) ? get_field('ipopi_country_medicaladvisory', 'term_' . $first_term_id) : 'No information available';
	$ipopi_country_numberofpatients = get_field('ipopi_country_numberofpatients', $taxonomy. '_' . $first_term_id) ? get_field('ipopi_country_numberofpatients', 'term_' . $first_term_id) : 'No information available';
	$ipopi_country_basedon = get_field('ipopi_country_basedon', $taxonomy. '_' . $first_term_id) ? get_field('ipopi_country_basedon', 'term_' . $first_term_id) : 'No information available';


	ob_start(); ?>
	
	<blockquote>
		<p><?php echo $title;?></p>
	</blockquote>

		<div class="country_profile">
			<h3>Country profile</h3>
			<p><strong>Patient group: </strong>
			<?php 
			if($ipopi_country_link):
				echo '<a href="'.$ipopi_country_link.'" target="_blank">'.$ipopi_country_patientgroup.'</a>';
			else:
				echo $ipopi_country_patientgroup;
			endif; ?>
			</p>
			<!-- <p><strong>Link: </strong><a href="<?php echo $ipopi_country_link; ?>"><?php echo $ipopi_country_link; ?></a></p> -->
			<p><strong>Patient group medical advisory: </strong><?php echo $ipopi_country_medicaladvisory; ?></p>
			<p><strong>Estimated number of patients: </strong><?php echo $ipopi_country_numberofpatients; ?></p>
			<p><strong>Based on: </strong><?php echo $ipopi_country_basedon; ?></p>
		</div>
	<?php
	$profile = ob_get_contents();
	ob_end_clean();

// Diagnostics
// ipopi_country_diagnostic_blood
// ipopi_country_diagnostic_molecular
// ipopi_country_diagnostic_prenatal
// ipopi_country_diagnostic_genetictesting
// ipopi_country_diagnostic_other

$ipopi_country_diagnostic_blood = get_field('ipopi_country_diagnostic_blood', $taxonomy. '_' . $first_term_id) ? get_field('ipopi_country_diagnostic_blood', 'term_' . $first_term_id) : 'No';
$ipopi_country_diagnostic_molecular = get_field('ipopi_country_diagnostic_molecular', $taxonomy. '_' . $first_term_id) ? get_field('ipopi_country_diagnostic_molecular', 'term_' . $first_term_id) : 'No';
$ipopi_country_diagnostic_prenatal = get_field('ipopi_country_diagnostic_prenatal', $taxonomy. '_' . $first_term_id) ? get_field('ipopi_country_diagnostic_prenatal', 'term_' . $first_term_id) : 'No';
$ipopi_country_diagnostic_genetictesting = get_field('ipopi_country_diagnostic_genetictesting', $taxonomy. '_' . $first_term_id) ? get_field('ipopi_country_diagnostic_genetictesting', 'term_' . $first_term_id) : 'No';
$ipopi_country_diagnostic_other = get_field('ipopi_country_diagnostic_other', $taxonomy. '_' . $first_term_id) ? get_field('ipopi_country_diagnostic_other', 'term_' . $first_term_id) : 'No';
	
	ob_start(); ?>

		<div class="diagnostics">
			<strong>Diagnostics</strong>
			<ul>
				<li><strong>Peripheral blood: </strong><?php echo $ipopi_country_diagnostic_blood; ?></li>
				<li><strong>Molecular: </strong><?php echo $ipopi_country_diagnostic_molecular; ?></li>
				<li><strong>Pre-natal: </strong><?php echo $ipopi_country_diagnostic_prenatal; ?></li>
				<li><strong>Genetic testing: </strong><?php echo $ipopi_country_diagnostic_genetictesting; ?></li>
				<li><strong>Other: </strong><?php echo $ipopi_country_diagnostic_other; ?></li>
			</ul>
		</div>
	<?php
	$diagnostics = ob_get_contents();
	ob_end_clean();


// SCID Newborn Screening
// 1
// Details
// ipopi_country_scid_details Text
// 2
// Further information
// ipopi_country_scid_furtherinformation1 Text
// 3
// Further information
// Edit Duplicate Move Delete
// ipopi_country_scid_furtherinformation2 Text
// 4
// Screening of other rare diseases
// ipopi_country_scid_screening Text
// 5
// Last updated
// ipopi_country_scid_lastupdated Date Picker
// 6
// IPOPI SCID Campaign
// ipopi_country_scid_urlcampaign Text

$ipopi_country_scid_details = get_field('ipopi_country_scid_details', $taxonomy. '_' . $first_term_id) ? get_field('ipopi_country_scid_details', 'term_' . $first_term_id) : 'No information currently available';
$ipopi_country_scid_furtherinformation1 = get_field('ipopi_country_scid_furtherinformation1', $taxonomy. '_' . $first_term_id);
$ipopi_country_scid_furtherinformation2 = get_field('ipopi_country_scid_furtherinformation2', $taxonomy. '_' . $first_term_id);
$ipopi_country_scid_screening = get_field('ipopi_country_scid_screening', $taxonomy. '_' . $first_term_id);
$ipopi_country_scid_lastupdated = get_field('ipopi_country_scid_lastupdated', $taxonomy. '_' . $first_term_id);
$ipopi_country_scid_urlcampaign = get_field('ipopi_country_scid_urlcampaign', $taxonomy. '_' . $first_term_id);

	ob_start(); ?>

		<div class="scid_newborn_screening">
			<strong>SCID Newborn Screening:</strong>
			<ul>
				<li><strong>Details: </strong><?php echo $ipopi_country_scid_details; ?></li>
				<?php if($ipopi_country_scid_furtherinformation1): ?><li><strong>Further information: </strong><?php echo $ipopi_country_scid_furtherinformation1; ?></li><?php endif;?>
				<?php if($ipopi_country_scid_furtherinformation2): ?><li><strong>Further information: </strong><?php echo $ipopi_country_scid_furtherinformation2; ?></li><?php endif;?>
				<?php if($ipopi_country_scid_screening): ?><li><strong>Screening of other rare diseases: </strong><?php echo $ipopi_country_scid_screening; ?></li><?php endif;?>
				<?php if($ipopi_country_scid_lastupdated): ?><li><strong>Last updated: </strong><?php echo $ipopi_country_scid_lastupdated; ?></li><?php endif;?>
				<!-- <li><strong>IPOPI SCID Campaign: </strong><a href="<?php echo $ipopi_country_scid_urlcampaign; ?>"><?php echo $ipopi_country_scid_urlcampaign; ?></a></li> -->
			</ul>
		</div>
	<?php
	$scid_newborn_screening = ob_get_contents();
	ob_end_clean();

// Treatment
// 1
// Bone Marrow Transplant
// ipopi_country_treatment_transplant Text
// 2
// Gene therapy
// ipopi_country_treatment_genetherapy

//product list
	$r = new WP_Query( array(
		'post_type'      => 'pid-products',
		'posts_per_page' => - 1,
		'post_status'    => 'publish',
		'orderby'		 => 'brand',
		'tax_query'      => array(
			array(
				'taxonomy' => 'country',
				'field'    => 'id',
				'terms'    => array( $first_term_id )
			)
		)
	) );

	ob_start();?>

		<div class="treatment">
			<strong>Treatment:</strong>
			<ul>
				<li><strong>Replacement therapy: </strong></li>
					<p class="label_companies_products">Companies/products</p>

				<div id="togg" class="togg el_after_av_textblock  el_before_av_hr  enable_toggles">
				
				<?php
				//var_dump($r->post_count);
				$i = 1;
				while ( $r->have_posts() ): $r->the_post();	

					$object_terms = wp_get_object_terms( $r->post->ID, 'country' ); 
					$object_terms_brand = wp_get_object_terms( $r->post->ID, 'brand' );

// 1
// Countries where available for hospital therapy
// ipopi_product_hospitaltherapy Text
// 2
// Countries where available for home therapy
// ipopi_product_hometherapy Text
// 3
// IVIG, SCIG or IMIG
// ipopi_product_ivigscigimig Checkbox
// 4
// Patient´s age
// ipopi_product_patientsage Text
// 5
// Presentation
// ipopi_product_presentation Text
// 6
// Concentration %
// ipopi_product_concentration Text
// 7
// Content of IgG
// ipopi_product_contentofigg Text
// 8
// IgG1
// ipopi_product_igg1 Text
// 9
// IgG2
// ipopi_product_igg2 Text
// 10
// IgG3
// ipopi_product_igg3 Text
// 11
// IgG4
// ipopi_product_igg4 Text
// 12
// Content of IgA
// ipopi_product_contentofiga Text
// 13
// Excipients
// ipopi_product_excipients Text
// 14
// Average dosage for PID
// ipopi_product_averagedosage Text
// 15
// Max. Speed of infusion
// ipopi_product_maxspeed Text Area
// 16
// Intervals of infusion for PID
// ipopi_product_intervalsofinfusionpid Text
// 17
// Storage/Preservation
// ipopi_product_storagepreservation Text
// 18
// Time for reconstitution
// ipopi_product_timeforreconstitution Text
// 19
// Packaging*
// ipopi_product_packaging Text
$ipopi_product_hospitaltherapy = get_field('ipopi_product_hospitaltherapy', $r->post->ID) ? get_field('ipopi_product_hospitaltherapy', $r->post->ID) : 'N/A';
$ipopi_product_hometherapy = get_field('ipopi_product_hometherapy', $r->post->ID) ? get_field('ipopi_product_hometherapy', $r->post->ID) : 'N/A';
$ipopi_product_ivigscigimig = get_field('ipopi_product_ivigscigimig', $r->post->ID);
	if($ipopi_product_ivigscigimig){
		$ipopi_product_ivigscigimig_ = implode(',', $ipopi_product_ivigscigimig);
	} else {
		$ipopi_product_ivigscigimig_ = 'N/A';
	}
$ipopi_product_patientsage = get_field('ipopi_product_patientsage', $r->post->ID) ? get_field('ipopi_product_patientsage', $r->post->ID) : 'N/A';
$ipopi_product_presentation = get_field('ipopi_product_presentation', $r->post->ID) ? get_field('ipopi_product_presentation', $r->post->ID) : 'N/A';
$ipopi_product_concentration = get_field('ipopi_product_concentration', $r->post->ID) ? get_field('ipopi_product_concentration', $r->post->ID) : 'N/A';
$ipopi_product_contentofigg = get_field('ipopi_product_contentofigg', $r->post->ID) ? get_field('ipopi_product_contentofigg', $r->post->ID) : 'N/A';
$ipopi_product_igg1 = get_field('ipopi_product_igg1', $r->post->ID) ? get_field('ipopi_product_igg1', $r->post->ID) : 'N/A';
$ipopi_product_igg2 = get_field('ipopi_product_igg2', $r->post->ID) ? get_field('ipopi_product_igg2', $r->post->ID) : 'N/A';
$ipopi_product_igg3 = get_field('ipopi_product_igg3', $r->post->ID) ? get_field('ipopi_product_igg3', $r->post->ID) : 'N/A';
$ipopi_product_igg4 = get_field('ipopi_product_igg4', $r->post->ID) ? get_field('ipopi_product_igg4', $r->post->ID) : 'N/A';
$ipopi_product_contentofiga = get_field('ipopi_product_contentofiga', $r->post->ID) ? get_field('ipopi_product_contentofiga', $r->post->ID) : 'N/A';
$ipopi_product_excipients = get_field('ipopi_product_excipients', $r->post->ID) ? get_field('ipopi_product_excipients', $r->post->ID) : 'N/A';
$ipopi_product_averagedosage = get_field('ipopi_product_averagedosage', $r->post->ID) ? get_field('ipopi_product_averagedosage', $r->post->ID) : 'N/A';
$ipopi_product_maxspeed = get_field('ipopi_product_maxspeed', $r->post->ID) ? get_field('ipopi_product_maxspeed', $r->post->ID) : 'N/A';
$ipopi_product_intervalsofinfusionpid = get_field('ipopi_product_intervalsofinfusionpid', $r->post->ID) ? get_field('ipopi_product_intervalsofinfusionpid', $r->post->ID) : 'N/A';
$ipopi_product_storagepreservation = get_field('ipopi_product_storagepreservation', $r->post->ID) ? get_field('ipopi_product_storagepreservation', $r->post->ID) : 'N/A';
$ipopi_product_timeforreconstitution = get_field('ipopi_product_timeforreconstitutiony', $r->post->ID) ? get_field('ipopi_product_timeforreconstitution', $r->post->ID) : 'N/A';
$ipopi_product_packaging = get_field('ipopi_product_packaging', $r->post->ID) ? get_field('ipopi_product_packaging', $r->post->ID) : 'N/A';
?>
<?php //var_dump($i); ?>

	<!-- brand	 -->
	<?php if($i==1): ?>
		<p class="brand_title"><?php echo $object_terms_brand[0]->name; ?></p>
		<div class="brand_wrap"><!-- brand wrap1 -->
			<p class="brand_products"><?php echo _e('Products:','ipopi'); ?></p>
		<?php $brand_id = $object_terms_brand[0]->term_id; ?>
	<?php endif;?>	

	<?php if($brand_id != $object_terms_brand[0]->term_id): ?>
		</div><!-- end brand wrap -->
		<p class="brand_title"><?php echo $object_terms_brand[0]->name; ?></p>
		<div class="brand_wrap"><!-- brand wrap -->
			<p class="brand_products"><?php echo _e('Products:','ipopi'); ?></p>
	<?php endif;?>

	<?php
		$brand_id = $object_terms_brand[0]->term_id;
	?>


		<section class="av_toggle_section" > 
		   <div class="pid-product single_toggle" >
		        <p data-fake-id="#toggle-id-<?php echo $r->post->post_name; ?>" class="toggler pid-product_title"><?php echo get_the_title( $r->post->ID ); ?>
	<!-- 		        <span class="toggle_icon"> 
			            <span class="vert_icon"></span><span class="hor_icon"></span>
			        </span> -->
		        </p>       
		        <div id="toggle-id-<?php echo $r->post->post_name; ?>-container" class="toggle_wrap" >    
	                <div class="toggle_content invers-color pid-product_wrap" >
						<p><strong>Countries where available for hospital therapy: </strong><?php echo $ipopi_product_hospitaltherapy; ?></p>
						<p><strong>Countries where available for home therapy: </strong><?php echo $ipopi_product_hometherapy; ?></p>
						<p><strong>IVIG, SCIG or IMIG: </strong><?php echo $ipopi_product_ivigscigimig_; ?></p>
						<p><strong>Patient´s age: </strong><?php echo $ipopi_product_patientsage; ?></p>
						<p><strong>Presentation: </strong><?php echo $ipopi_product_presentation; ?></p>
						<p><strong>Concentration %: </strong><?php echo $ipopi_product_concentration; ?></p>
						<p><strong>Content of IgG: </strong><?php echo $ipopi_product_contentofigg; ?></p>
						<p><strong>IgG1: </strong><?php echo $ipopi_product_igg1; ?></p>
						<p><strong>IgG2: </strong><?php echo $ipopi_product_igg2; ?></p>
						<p><strong>IgG3: </strong><?php echo $ipopi_product_igg3; ?></p>
						<p><strong>IgG4: </strong><?php echo $ipopi_product_igg4; ?></p>
						<p><strong>Content of IgA: </strong><?php echo $ipopi_product_contentofiga; ?></p>
						<p><strong>Excipients: </strong><?php echo $ipopi_product_excipients; ?></p>
						<p><strong>Average dosage for PID: </strong><?php echo $ipopi_product_averagedosage; ?></p>
						<p><strong>Max. Speed of infusion: </strong><?php echo $ipopi_product_maxspeed; ?></p>
						<p><strong>Intervals of infusion for PID: </strong><?php echo $ipopi_product_intervalsofinfusionpid; ?></p>
						<p><strong>Storage/Preservation: </strong><?php echo $ipopi_product_storagepreservation; ?></p>
						<p><strong>Time for reconstitution: </strong><?php echo $ipopi_product_timeforreconstitution; ?></p>
						<p><strong>Packaging: </strong><?php echo $ipopi_product_packaging; ?></p>
	        		</div> 
	            </div>
	         </div>
	    </section>

	<?php if($r->post_count == $i): ?>
		</div><!-- end last brand -->
	<?php endif; ?>

<!-- 					<div class="pid-product">
						<div class="pid-product_title"><?php echo get_the_title( $r->post->ID ); ?></div>
						<div class="pid-product_wrap">
							<p><strong>Countries where available for hospital therapy: </strong><?php echo $ipopi_product_hospitaltherapy; ?></p>
							<p><strong>Countries where available for home therapy: </strong><?php echo $ipopi_product_hometherapy; ?></p>
							<p><strong>IVIG, SCIG or IMIG: </strong><?php echo $ipopi_product_ivigscigimig_; ?></p>
							<p><strong>Patient´s age: </strong><?php echo $ipopi_product_patientsage; ?></p>
							<p><strong>Presentation: </strong><?php echo $ipopi_product_presentation; ?></p>
							<p><strong>Concentration %: </strong><?php echo $ipopi_product_concentration; ?></p>
							<p><strong>Content of IgG: </strong><?php echo $ipopi_product_contentofigg; ?></p>
							<p><strong>IgG1: </strong><?php echo $ipopi_product_igg1; ?></p>
							<p><strong>IgG2: </strong><?php echo $ipopi_product_igg2; ?></p>
							<p><strong>IgG3: </strong><?php echo $ipopi_product_igg3; ?></p>
							<p><strong>IgG4: </strong><?php echo $ipopi_product_igg4; ?></p>
							<p><strong>Content of IgA: </strong><?php echo $ipopi_product_contentofiga; ?></p>
							<p><strong>Excipients: </strong><?php echo $ipopi_product_excipients; ?></p>
							<p><strong>Average dosage for PID: </strong><?php echo $ipopi_product_averagedosage; ?></p>
							<p><strong>Max. Speed of infusion: </strong><?php echo $ipopi_product_maxspeed; ?></p>
							<p><strong>Intervals of infusion for PID: </strong><?php echo $ipopi_product_intervalsofinfusionpid; ?></p>
							<p><strong>Storage/Preservation: </strong><?php echo $ipopi_product_storagepreservation; ?></p>
							<p><strong>Time for reconstitution: </strong><?php echo $ipopi_product_timeforreconstitution; ?></p>
							<p><strong>Packaging*: </strong><?php echo $ipopi_product_packaging; ?></p>
						</div>
					</div> -->

				<?php 
				$i++;
				endwhile;

				$ipopi_country_treatment_transplant = get_field('ipopi_country_treatment_transplant', $taxonomy. '_' . $first_term_id) ? get_field('ipopi_country_treatment_transplant', 'term_' . $first_term_id) : 'No information currently available';
				$ipopi_country_treatment_genetherapy = get_field('ipopi_country_treatment_genetherapy', $taxonomy. '_' . $first_term_id) ? get_field('ipopi_country_treatment_genetherapy', 'term_' . $first_term_id) : 'No';
				?>
				</div>
				<li><strong>BMT: </strong><?php echo $ipopi_country_treatment_transplant; ?></li>
				<li><strong>Gene therapy: </strong><?php echo $ipopi_country_treatment_genetherapy; ?></li>

			</ul>
		</div>




	<?php
	$content = ob_get_contents();
	ob_end_clean();


	if ( count( $_POST ) > 0 ) {
		$res['profile'] = $profile;
		$res['diagnostics'] = $diagnostics;
		$res['scid_newborn_screening'] = $scid_newborn_screening;
		$res['content'] = $content;
		$res['name'] = $title;

		// $pieces                = explode( ",", $office_coords );
		// $res['office_coords']  = $pieces;
		// $res['office_address'] = $office_address;

		echo json_encode( $res );
		exit;
	} else {
		echo $content;
	}
}  


/**
 * get_firms_by_region for map
 */
add_action( 'wp_ajax_get_products_by_country_name', 'deco_get_firms_by_tax_name' );
add_action( 'wp_ajax_nopriv_get_products_by_country_name', 'deco_get_firms_by_tax_name' );

function deco_get_firms_by_tax_name( $name = '' ) {

	if ( empty( $name ) ) {
		$name = $_POST['name'];
	}

	//$term = get_term( $first_term_id);
	$term = get_term_by('name', $name, 'country');
	$first_term_id = $term->term_id;
	$taxonomy = 'country';
	$title = $term->name;

// Country profile
// ipopi_country_patientgroup
// ipopi_country_link 
// ipopi_country_medicaladvisory
// ipopi_country_numberofpatients
// ipopi_country_basedon
	$ipopi_country_patientgroup = get_field('ipopi_country_patientgroup', $taxonomy. '_' . $first_term_id) ? get_field('ipopi_country_patientgroup', 'term_' . $first_term_id) : 'No patient group';
	$ipopi_country_link = get_field('ipopi_country_link', $taxonomy. '_' . $first_term_id) ? get_field('ipopi_country_link', 'term_' . $first_term_id) : '';
	$ipopi_country_medicaladvisory = get_field('ipopi_country_medicaladvisory', $taxonomy. '_' . $first_term_id) ? get_field('ipopi_country_medicaladvisory', 'term_' . $first_term_id) : 'No information available';
	$ipopi_country_numberofpatients = get_field('ipopi_country_numberofpatients', $taxonomy. '_' . $first_term_id) ? get_field('ipopi_country_numberofpatients', 'term_' . $first_term_id) : 'No information available';
	$ipopi_country_basedon = get_field('ipopi_country_basedon', $taxonomy. '_' . $first_term_id) ? get_field('ipopi_country_basedon', 'term_' . $first_term_id) : 'No information available';


	ob_start(); ?>

		<blockquote>
			<p><?php echo $title;?></p>
		</blockquote>
		
		<div class="country_profile">
			<h3>Country profile</h3>
			<!-- <p><strong>Patient group: </strong><?php echo $ipopi_country_patientgroup; ?></p> -->
			<!-- <p><strong>Link: </strong><a href="<?php echo $ipopi_country_link; ?>"><?php echo $ipopi_country_link; ?></a></p> -->
			<p><strong>Patient group: </strong>
			<?php 
			if($ipopi_country_link):
				echo '<a href="'.$ipopi_country_link.'" target="_blank">'.$ipopi_country_patientgroup.'</a>';
			else:
				echo $ipopi_country_patientgroup;
			endif; ?>
			</p>
			<p><strong>Patient group medical advisory: </strong><?php echo $ipopi_country_medicaladvisory; ?></p>
			<p><strong>Estimated number of patients: </strong><?php echo $ipopi_country_numberofpatients; ?></p>
			<p><strong>Based on: </strong><?php echo $ipopi_country_basedon; ?></p>
		</div>
	<?php
	$profile = ob_get_contents();
	ob_end_clean();

// Diagnostics
// ipopi_country_diagnostic_blood
// ipopi_country_diagnostic_molecular
// ipopi_country_diagnostic_prenatal
// ipopi_country_diagnostic_genetictesting
// ipopi_country_diagnostic_other

$ipopi_country_diagnostic_blood = get_field('ipopi_country_diagnostic_blood', $taxonomy. '_' . $first_term_id) ? get_field('ipopi_country_diagnostic_blood', 'term_' . $first_term_id) : 'No';
$ipopi_country_diagnostic_molecular = get_field('ipopi_country_diagnostic_molecular', $taxonomy. '_' . $first_term_id) ? get_field('ipopi_country_diagnostic_molecular', 'term_' . $first_term_id) : 'No';
$ipopi_country_diagnostic_prenatal = get_field('ipopi_country_diagnostic_prenatal', $taxonomy. '_' . $first_term_id) ? get_field('ipopi_country_diagnostic_prenatal', 'term_' . $first_term_id) : 'No';
$ipopi_country_diagnostic_genetictesting = get_field('ipopi_country_diagnostic_genetictesting', $taxonomy. '_' . $first_term_id) ? get_field('ipopi_country_diagnostic_genetictesting', 'term_' . $first_term_id) : 'No';
$ipopi_country_diagnostic_other = get_field('ipopi_country_diagnostic_other', $taxonomy. '_' . $first_term_id) ? get_field('ipopi_country_diagnostic_other', 'term_' . $first_term_id) : 'No';
	
	ob_start(); ?>

		<div class="diagnostics">
			<strong>Diagnostics</strong>
			<ul>
				<li><strong>Peripheral blood: </strong><?php echo $ipopi_country_diagnostic_blood; ?></li>
				<li><strong>Molecular: </strong><?php echo $ipopi_country_diagnostic_molecular; ?></li>
				<li><strong>Pre-natal: </strong><?php echo $ipopi_country_diagnostic_prenatal; ?></li>
				<li><strong>Genetic testing: </strong><?php echo $ipopi_country_diagnostic_genetictesting; ?></li>
				<li><strong>Other: </strong><?php echo $ipopi_country_diagnostic_other; ?></li>
			</ul>
		</div>
	<?php
	$diagnostics = ob_get_contents();
	ob_end_clean();


// SCID Newborn Screening
// 1
// Details
// ipopi_country_scid_details Text
// 2
// Further information
// ipopi_country_scid_furtherinformation1 Text
// 3
// Further information
// Edit Duplicate Move Delete
// ipopi_country_scid_furtherinformation2 Text
// 4
// Screening of other rare diseases
// ipopi_country_scid_screening Text
// 5
// Last updated
// ipopi_country_scid_lastupdated Date Picker
// 6
// IPOPI SCID Campaign
// ipopi_country_scid_urlcampaign Text

$ipopi_country_scid_details = get_field('ipopi_country_scid_details', $taxonomy. '_' . $first_term_id) ? get_field('ipopi_country_scid_details', 'term_' . $first_term_id) : 'No information currently available';
$ipopi_country_scid_furtherinformation1 = get_field('ipopi_country_scid_furtherinformation1', $taxonomy. '_' . $first_term_id);
$ipopi_country_scid_furtherinformation2 = get_field('ipopi_country_scid_furtherinformation2', $taxonomy. '_' . $first_term_id);
$ipopi_country_scid_screening = get_field('ipopi_country_scid_screening', $taxonomy. '_' . $first_term_id);
$ipopi_country_scid_lastupdated = get_field('ipopi_country_scid_lastupdated', $taxonomy. '_' . $first_term_id);
$ipopi_country_scid_urlcampaign = get_field('ipopi_country_scid_urlcampaign', $taxonomy. '_' . $first_term_id);

	ob_start(); ?>

		<div class="scid_newborn_screening">
			<strong>SCID Newborn Screening:</strong>
			<ul>
				<li><strong>Details: </strong><?php echo $ipopi_country_scid_details; ?></li>
				<?php if($ipopi_country_scid_furtherinformation1): ?><li><strong>Further information: </strong><?php echo $ipopi_country_scid_furtherinformation1; ?></li><?php endif;?>
				<?php if($ipopi_country_scid_furtherinformation2): ?><li><strong>Further information: </strong><?php echo $ipopi_country_scid_furtherinformation2; ?></li><?php endif;?>
				<?php if($ipopi_country_scid_screening): ?><li><strong>Screening of other rare diseases: </strong><?php echo $ipopi_country_scid_screening; ?></li><?php endif;?>
				<?php if($ipopi_country_scid_lastupdated): ?><li><strong>Last updated: </strong><?php echo $ipopi_country_scid_lastupdated; ?></li><?php endif;?>
				<!-- <li><strong>IPOPI SCID Campaign: </strong><a href="<?php echo $ipopi_country_scid_urlcampaign; ?>"><?php echo $ipopi_country_scid_urlcampaign; ?></a></li> -->
			</ul>
		</div>
	<?php
	$scid_newborn_screening = ob_get_contents();
	ob_end_clean();

// Treatment
// 1
// Bone Marrow Transplant
// ipopi_country_treatment_transplant Text
// 2
// Gene therapy
// ipopi_country_treatment_genetherapy

//product list
	$r = new WP_Query( array(
		'post_type'      => 'pid-products',
		'posts_per_page' => - 1,
		'post_status'    => 'publish',
		'orderby'		 => 'brand',
		'tax_query'      => array(
			array(
				'taxonomy' => 'country',
				'field'    => 'id',
				'terms'    => array( $first_term_id )
			)
		)
	) );

	ob_start();?>

		<div class="treatment">
			<strong>Treatment:</strong>
			<ul>
				<li><strong>Replacement therapy: </strong></li>
					<p class="label_companies_products">Companies/products</p>

				<div id="togg" class="togg el_after_av_textblock  el_before_av_hr  enable_toggles">
				
				<?php

				$i = 1;
				while ( $r->have_posts() ): $r->the_post();	

					$object_terms = wp_get_object_terms( $r->post->ID, 'country' ); 
					$object_terms_brand = wp_get_object_terms( $r->post->ID, 'brand' );

// 1
// Countries where available for hospital therapy
// ipopi_product_hospitaltherapy Text
// 2
// Countries where available for home therapy
// ipopi_product_hometherapy Text
// 3
// IVIG, SCIG or IMIG
// ipopi_product_ivigscigimig Checkbox
// 4
// Patient´s age
// ipopi_product_patientsage Text
// 5
// Presentation
// ipopi_product_presentation Text
// 6
// Concentration %
// ipopi_product_concentration Text
// 7
// Content of IgG
// ipopi_product_contentofigg Text
// 8
// IgG1
// ipopi_product_igg1 Text
// 9
// IgG2
// ipopi_product_igg2 Text
// 10
// IgG3
// ipopi_product_igg3 Text
// 11
// IgG4
// ipopi_product_igg4 Text
// 12
// Content of IgA
// ipopi_product_contentofiga Text
// 13
// Excipients
// ipopi_product_excipients Text
// 14
// Average dosage for PID
// ipopi_product_averagedosage Text
// 15
// Max. Speed of infusion
// ipopi_product_maxspeed Text Area
// 16
// Intervals of infusion for PID
// ipopi_product_intervalsofinfusionpid Text
// 17
// Storage/Preservation
// ipopi_product_storagepreservation Text
// 18
// Time for reconstitution
// ipopi_product_timeforreconstitution Text
// 19
// Packaging*
// ipopi_product_packaging Text
$ipopi_product_hospitaltherapy = get_field('ipopi_product_hospitaltherapy', $r->post->ID) ? get_field('ipopi_product_hospitaltherapy', $r->post->ID) : 'N/A';
$ipopi_product_hometherapy = get_field('ipopi_product_hometherapy', $r->post->ID) ? get_field('ipopi_product_hometherapy', $r->post->ID) : 'N/A';
$ipopi_product_ivigscigimig = get_field('ipopi_product_ivigscigimig', $r->post->ID);
	if($ipopi_product_ivigscigimig){
		$ipopi_product_ivigscigimig_ = implode(',', $ipopi_product_ivigscigimig);
	} else {
		$ipopi_product_ivigscigimig_ = 'N/A';
	}
$ipopi_product_patientsage = get_field('ipopi_product_patientsage', $r->post->ID) ? get_field('ipopi_product_patientsage', $r->post->ID) : 'N/A';
$ipopi_product_presentation = get_field('ipopi_product_presentation', $r->post->ID) ? get_field('ipopi_product_presentation', $r->post->ID) : 'N/A';
$ipopi_product_concentration = get_field('ipopi_product_concentration', $r->post->ID) ? get_field('ipopi_product_concentration', $r->post->ID) : 'N/A';
$ipopi_product_contentofigg = get_field('ipopi_product_contentofigg', $r->post->ID) ? get_field('ipopi_product_contentofigg', $r->post->ID) : 'N/A';
$ipopi_product_igg1 = get_field('ipopi_product_igg1', $r->post->ID) ? get_field('ipopi_product_igg1', $r->post->ID) : 'N/A';
$ipopi_product_igg2 = get_field('ipopi_product_igg2', $r->post->ID) ? get_field('ipopi_product_igg2', $r->post->ID) : 'N/A';
$ipopi_product_igg3 = get_field('ipopi_product_igg3', $r->post->ID) ? get_field('ipopi_product_igg3', $r->post->ID) : 'N/A';
$ipopi_product_igg4 = get_field('ipopi_product_igg4', $r->post->ID) ? get_field('ipopi_product_igg4', $r->post->ID) : 'N/A';
$ipopi_product_contentofiga = get_field('ipopi_product_contentofiga', $r->post->ID) ? get_field('ipopi_product_contentofiga', $r->post->ID) : 'N/A';
$ipopi_product_excipients = get_field('ipopi_product_excipients', $r->post->ID) ? get_field('ipopi_product_excipients', $r->post->ID) : 'N/A';
$ipopi_product_averagedosage = get_field('ipopi_product_averagedosage', $r->post->ID) ? get_field('ipopi_product_averagedosage', $r->post->ID) : 'N/A';
$ipopi_product_maxspeed = get_field('ipopi_product_maxspeed', $r->post->ID) ? get_field('ipopi_product_maxspeed', $r->post->ID) : 'N/A';
$ipopi_product_intervalsofinfusionpid = get_field('ipopi_product_intervalsofinfusionpid', $r->post->ID) ? get_field('ipopi_product_intervalsofinfusionpid', $r->post->ID) : 'N/A';
$ipopi_product_storagepreservation = get_field('ipopi_product_storagepreservation', $r->post->ID) ? get_field('ipopi_product_storagepreservation', $r->post->ID) : 'N/A';
$ipopi_product_timeforreconstitution = get_field('ipopi_product_timeforreconstitutiony', $r->post->ID) ? get_field('ipopi_product_timeforreconstitution', $r->post->ID) : 'N/A';
$ipopi_product_packaging = get_field('ipopi_product_packaging', $r->post->ID) ? get_field('ipopi_product_packaging', $r->post->ID) : 'N/A';
?>
<?php //var_dump($r->post); ?>

	<!-- brand	 -->
	<?php if($i==1): ?>
		<p class="brand_title"><?php echo $object_terms_brand[0]->name; ?></p>
		<div class="brand_wrap"><!-- brand wrap1 -->
			<p class="brand_products"><?php echo _e('Products:','ipopi'); ?></p>
		<?php $brand_id = $object_terms_brand[0]->term_id; ?>
	<?php endif;?>	

	<?php if($brand_id != $object_terms_brand[0]->term_id): ?>
		</div><!-- end brand wrap -->
		<p class="brand_title"><?php echo $object_terms_brand[0]->name; ?></p>
		<div class="brand_wrap"><!-- brand wrap -->
			<p class="brand_products"><?php echo _e('Products:','ipopi'); ?></p>
	<?php endif;?>

	<?php
		$brand_id = $object_terms_brand[0]->term_id;
	?>

	<section class="av_toggle_section" > 
	   <div class="pid-product single_toggle" >
	        <p data-fake-id="#toggle-id-<?php echo $r->post->post_name; ?>" class="toggler pid-product_title"><?php echo get_the_title( $r->post->ID ); ?>
<!-- 		        <span class="toggle_icon"> 
		            <span class="vert_icon"></span><span class="hor_icon"></span>
		        </span> -->
	        </p>       
	        <div id="toggle-id-<?php echo $r->post->post_name; ?>-container" class="toggle_wrap" >    
                <div class="toggle_content invers-color pid-product_wrap" >
					<p><strong>Countries where available for hospital therapy: </strong><?php echo $ipopi_product_hospitaltherapy; ?></p>
					<p><strong>Countries where available for home therapy: </strong><?php echo $ipopi_product_hometherapy; ?></p>
					<p><strong>IVIG, SCIG or IMIG: </strong><?php echo $ipopi_product_ivigscigimig_; ?></p>
					<p><strong>Patient´s age: </strong><?php echo $ipopi_product_patientsage; ?></p>
					<p><strong>Presentation: </strong><?php echo $ipopi_product_presentation; ?></p>
					<p><strong>Concentration %: </strong><?php echo $ipopi_product_concentration; ?></p>
					<p><strong>Content of IgG: </strong><?php echo $ipopi_product_contentofigg; ?></p>
					<p><strong>IgG1: </strong><?php echo $ipopi_product_igg1; ?></p>
					<p><strong>IgG2: </strong><?php echo $ipopi_product_igg2; ?></p>
					<p><strong>IgG3: </strong><?php echo $ipopi_product_igg3; ?></p>
					<p><strong>IgG4: </strong><?php echo $ipopi_product_igg4; ?></p>
					<p><strong>Content of IgA: </strong><?php echo $ipopi_product_contentofiga; ?></p>
					<p><strong>Excipients: </strong><?php echo $ipopi_product_excipients; ?></p>
					<p><strong>Average dosage for PID: </strong><?php echo $ipopi_product_averagedosage; ?></p>
					<p><strong>Max. Speed of infusion: </strong><?php echo $ipopi_product_maxspeed; ?></p>
					<p><strong>Intervals of infusion for PID: </strong><?php echo $ipopi_product_intervalsofinfusionpid; ?></p>
					<p><strong>Storage/Preservation: </strong><?php echo $ipopi_product_storagepreservation; ?></p>
					<p><strong>Time for reconstitution: </strong><?php echo $ipopi_product_timeforreconstitution; ?></p>
					<p><strong>Packaging: </strong><?php echo $ipopi_product_packaging; ?></p>
        		</div> 
            </div>
         </div>
    </section>

	<?php if($r->post_count == $i): ?>
		</div><!-- end last brand -->
	<?php endif; ?>

<!-- 					<div class="pid-product">
						<div class="pid-product_title"><?php echo get_the_title( $r->post->ID ); ?></div>
						<div class="pid-product_wrap">
							<p><strong>Countries where available for hospital therapy: </strong><?php echo $ipopi_product_hospitaltherapy; ?></p>
							<p><strong>Countries where available for home therapy: </strong><?php echo $ipopi_product_hometherapy; ?></p>
							<p><strong>IVIG, SCIG or IMIG: </strong><?php echo $ipopi_product_ivigscigimig_; ?></p>
							<p><strong>Patient´s age: </strong><?php echo $ipopi_product_patientsage; ?></p>
							<p><strong>Presentation: </strong><?php echo $ipopi_product_presentation; ?></p>
							<p><strong>Concentration %: </strong><?php echo $ipopi_product_concentration; ?></p>
							<p><strong>Content of IgG: </strong><?php echo $ipopi_product_contentofigg; ?></p>
							<p><strong>IgG1: </strong><?php echo $ipopi_product_igg1; ?></p>
							<p><strong>IgG2: </strong><?php echo $ipopi_product_igg2; ?></p>
							<p><strong>IgG3: </strong><?php echo $ipopi_product_igg3; ?></p>
							<p><strong>IgG4: </strong><?php echo $ipopi_product_igg4; ?></p>
							<p><strong>Content of IgA: </strong><?php echo $ipopi_product_contentofiga; ?></p>
							<p><strong>Excipients: </strong><?php echo $ipopi_product_excipients; ?></p>
							<p><strong>Average dosage for PID: </strong><?php echo $ipopi_product_averagedosage; ?></p>
							<p><strong>Max. Speed of infusion: </strong><?php echo $ipopi_product_maxspeed; ?></p>
							<p><strong>Intervals of infusion for PID: </strong><?php echo $ipopi_product_intervalsofinfusionpid; ?></p>
							<p><strong>Storage/Preservation: </strong><?php echo $ipopi_product_storagepreservation; ?></p>
							<p><strong>Time for reconstitution: </strong><?php echo $ipopi_product_timeforreconstitution; ?></p>
							<p><strong>Packaging*: </strong><?php echo $ipopi_product_packaging; ?></p>
						</div>
					</div> -->

				<?php 
				$i++;
				endwhile;

				$ipopi_country_treatment_transplant = get_field('ipopi_country_treatment_transplant', $taxonomy. '_' . $first_term_id) ? get_field('ipopi_country_treatment_transplant', 'term_' . $first_term_id) : 'No information currently available';
				$ipopi_country_treatment_genetherapy = get_field('ipopi_country_treatment_genetherapy', $taxonomy. '_' . $first_term_id) ? get_field('ipopi_country_treatment_genetherapy', 'term_' . $first_term_id) : 'No';
				?>
				</div>
				<li><strong>BMT: </strong><?php echo $ipopi_country_treatment_transplant; ?></li>
				<li><strong>Gene therapy: </strong><?php echo $ipopi_country_treatment_genetherapy; ?></li>

			</ul>
		</div>




	<?php
	$content = ob_get_contents();
	ob_end_clean();

	ob_start();?>
		<script>
			jQuery(document).ready(function($) {
				console.log('script load');
			    $('.togg').avia_sc_toggle_();
				//collapse brand
		        $('.brand_wrap').hide();
		        $('.brand_wrap').each(function(index) {
		           $(this).css('height', $(this).height());
		        });

		        $('.brand_title').click(function(e) {
		            e.preventDefault();
		            $(this).next('.brand_wrap').slideToggle();
		            $(this).toggleClass("brand_active");
		        });
			}); //ready
		</script>
	<?php 
	$script = ob_get_contents();
	ob_end_clean();

	if ( count( $_POST ) > 0 ) {
		$res['profile'] = $profile;
		$res['diagnostics'] = $diagnostics;
		$res['scid_newborn_screening'] = $scid_newborn_screening;
		$res['content'] = $content;
		$res['termid'] = $first_term_id;
		$res['script'] = $script;

		// $pieces                = explode( ",", $office_coords );
		// $res['office_coords']  = $pieces;
		// $res['office_address'] = $office_address;

		echo json_encode( $res );
		exit;
	} else {
		echo $content;
	}
}  