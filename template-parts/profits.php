<?php
$profitsTitle = get_field( 'profits_title' );
$profitsSubtitle = get_field( 'profits_subtitle' );

//box 1
$profitsBox1Icon = get_field( 'profits_box_1_icon' );
$profitsBox1IconUrl = $profitsBox1Icon['url'];
$profitsBox1IconAlt = $profitsBox1Icon['alt'];
$profitsBox1Title = get_field( 'profits_box_1_title' );

//box 2
$profitsBox2Icon = get_field( 'profits_box_2_icon' );
$profitsBox2IconUrl = $profitsBox2Icon['url'];
$profitsBox2IconAlt = $profitsBox2Icon['alt'];
$profitsBox2Title = get_field( 'profits_box_2_title' );

//box 3
$profitsBox3Icon = get_field( 'profits_box_3_icon' );
$profitsBox3IconUrl = $profitsBox3Icon['url'];
$profitsBox3IconAlt = $profitsBox3Icon['alt'];
$profitsBox3Title = get_field( 'profits_box_3_title' );

?>
<section class="profits">
	<div class="container">
		<div class="container--small">
			<h2 class="profits__title"><?php echo $profitsTitle;?></h2>
			<p class="profits__subtitle"><?php echo $profitsSubtitle;?></p>
			<div class="profits__wrapper">
				<div class="profit profit--reverse">
					<div class="profit__icon--wrapper">
						<img class="profit__icon" src="<?php echo $profitsBox1IconUrl?>" alt="<?php echo $profitsBox1IconUrl?>">
					</div>
					<p class="profit__title"><?php echo $profitsBox1Title;?></p>
				</div>
				<div class="profit">
					<div class="profit__icon--wrapper">
						<img class="profit__icon" src="<?php echo $profitsBox2IconUrl?>" alt="<?php echo $profitsBox2IconUrl?>">
					</div>
					<p class="profit__title"><?php echo $profitsBox2Title;?></p>
				</div>
				<div class="profit profit--reverse">
					<div class="profit__icon--wrapper">
						<img class="profit__icon" src="<?php echo $profitsBox3IconUrl?>" alt="<?php echo $profitsBox1IconUrl?>">
					</div>
					<p class="profit__title"><?php echo $profitsBox3Title;?></p>
				</div>
			</div>
		</div>
	</div>
</section>
