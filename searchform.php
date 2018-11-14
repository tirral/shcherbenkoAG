<?php
/**
 * Template for displaying search forms
 */
?>

<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ) ?>" >
<div class="footer-search-wrapper">
  <div class="footer-search">
	<label class="screen-reader-text" for="s"></label>
	<input type="text" value="<?php echo get_search_query() ?>" name="s" id="s" placeholder="Поиск"/>
  </div>

	<input type="submit" id="searchsubmit" value=""  />
      </div>
</form>
