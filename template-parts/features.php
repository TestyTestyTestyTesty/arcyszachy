<?php
$featuresTitle = get_field( 'features_title' );
$featuresSubtitle = get_field( 'features_subtitle' );

//box 1
$box1Icon = get_field( 'box_1_icon' );
$box1IconUrl = $box1Icon['url'];
$box1IconAlt = $box1Icon['alt'];
$box1Title = get_field( 'box_1_title' );
$box1Subtitle = get_field( 'box_1_subtitle' );
//box 2
$box2Icon = get_field( 'box_2_icon' );
$box2IconUrl = $box2Icon['url'];
$box2IconAlt = $box2Icon['alt'];
$box2Title = get_field( 'box_2_title' );
$box2Subtitle = get_field( 'box_2_subtitle' );
//box 3
$box3Icon = get_field( 'box_3_icon' );
$box3IconUrl = $box3Icon['url'];
$box3IconAlt = $box3Icon['alt'];
$box3Title = get_field( 'box_3_title' );
$box3Subtitle = get_field( 'box_3_subtitle' );
//box 4
$box4Icon = get_field( 'box_4_icon' );
$box4IconUrl = $box4Icon['url'];
$box4IconAlt = $box4Icon['alt'];
$box4Title = get_field( 'box_4_title' );
$box4Subtitle = get_field( 'box_4_subtitle' );
?>
<section id="features" class="features">
	<div class="container">
		<div class="container--medium">
			<h2 class="features__title"><?php echo $featuresTitle;?></h2>
			<p class="features__subtitle"><?php echo $featuresSubtitle;?></p>
			<div class="features__wrapper">
				<div class="feature">
					<div class="feature__icon--wrapper">
						<img class="feature__icon" src="<?php echo $box1IconUrl?>" alt="<?php echo $box1IconUrl?>">
					</div>
					<h3 class="feature__title"><?php echo $box1Title;?></h3>
					<h3 class="feature__subtitle"><?php echo $box1Subtitle;?></h3>
				</div>
				<div class="feature">
					<div class="feature__icon--wrapper">
						<img class="feature__icon" src="<?php echo $box2IconUrl?>" alt="<?php echo $box2IconUrl?>">
					</div>
					<h3 class="feature__title"><?php echo $box2Title;?></h3>
					<h3 class="feature__subtitle"><?php echo $box2Subtitle;?></h3>
				</div>
				<div class="feature">
					<div class="feature__icon--wrapper">
						<img class="feature__icon" src="<?php echo $box3IconUrl?>" alt="<?php echo $box1IconUrl?>">
					</div>
					<h3 class="feature__title"><?php echo $box3Title;?></h3>
					<h3 class="feature__subtitle"><?php echo $box3Subtitle;?></h3>
				</div>
				<div class="feature">
					<div class="feature__icon--wrapper">
						<img class="feature__icon" src="<?php echo $box4IconUrl?>" alt="<?php echo $box1IconUrl?>">
					</div>
					<h3 class="feature__title"><?php echo $box4Title;?></h3>
					<h3 class="feature__subtitle"><?php echo $box4Subtitle;?></h3>
				</div>
			</div>
		</div>
	</div>
</section>
