<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	<label>
		<span class="screen-reader-text">Wyszukaj w sklepie...</span>
		<input type="search" class="search-field" placeholder="Wyszukaj w sklepie..." value="<?php echo get_search_query(); ?>" name="s" title="Search">
	</label>
	<label class="search-form__submit">
		<img class="search-form__icon" src="<?php echo get_template_directory_uri(); ?>/assets/dist/images/svg/loop.svg" width="22px" height="22px" alt="click to search" />
		<input type="submit" class="search-submit" value="Szukaj">
	</label>
</form>
