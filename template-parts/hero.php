<?php
$file = get_field( 'hero_video' );
$videoPoster = get_field( 'hero_poster' );
$heroTitle = get_field( 'hero_title' );
$heroDescription = get_field( 'hero_description' );
$videoUrl = $file['url'];
?>
<section class="hero">
	<video class="hero__video" playsinline autoplay muted loop poster="<?php echo $videoPoster; ?>"  width="x" height="y">
		<source src="<?php echo $videoUrl;?>" type="video/mp4">
	</video>
	<div class="hero__texts">
		<h1 class="hero__title"><?php echo $heroTitle?></h1>
		<h2 class="hero__description"><?php echo $heroDescription?></h2>
	</div>
	<div class="hero__arrow--wrapper">
		<span class="hero__arrow"></span>
	</div>
</section>
