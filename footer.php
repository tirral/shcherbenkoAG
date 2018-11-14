<?php global $vrb_global; ?>
<!-- FOOTER -->
<div class="full-width">

<footer class="flx wrapper footer">


 <?php echo do_shortcode( '[contact-form-7 id="21" title="Контактная форма 1"]' ); ?>




	<!-- <form class="form">
	<h4 class="form-title">Подписка на новости</h4>

	<input type="text" placeholder="Ваше имя">
	<input type="text" placeholder="Ваш E-Mail">

	<label class="form-accept flx">
			<input class="form-checkbox" type="checkbox">
			<span class="form-checkbox-custom"></span>
			<span class="form-checkbox-text"><strong>Я принимаю условия</strong> использования персональных данных</span>
	</label>

	<button class="btn form-btn">Подписаться</button>
</form> -->


<div class="footer-main flx-column">

<nav>
	<?php
	wp_nav_menu( array(
		'theme_location' => 'menu-2',
		'menu_id'        => 'footer-menu',
		'container'       => 'ul',
		'menu_class'      => 'footer-nav'
	) );
	?>
</nav>



<?php echo get_search_form(); ?>



<div class="footer-copy">
  <p><?php echo $vrb_global['footer-copyright-text'] ?></p>
</div>

<a href="#top" class="top">
	<img src="<?php echo get_template_directory_uri();?>/img/top.png" alt="top">
</a>
</div>




<div class="sidebar vertical-text">
<div>
	<a href="<?php echo $vrb_global['footer-social-buttons-first-link'] ?>" class="footer-social"><?php echo $vrb_global['footer-social-buttons-first-icon'] ?></a>
	<a href="<?php echo $vrb_global['footer-social-buttons-second-link'] ?>" class="footer-social"><?php echo $vrb_global['footer-social-buttons-second-icon'] ?></a>
</div>

<div>
	<a href="<?php echo $vrb_global['footer-social-buttons-third-link'] ?>" class="footer-social"><?php echo $vrb_global['footer-social-buttons-third-icon'] ?></a>
	<a href="<?php echo $vrb_global['footer-social-buttons-fourth-link'] ?>" class="footer-social"><?php echo $vrb_global['footer-social-buttons-fourth-icon'] ?></a>
</div>


</div>
</footer>
</div>
<!-- <script src="js/common.js"></script> -->
<?php wp_footer(); ?>
</body>
</html>
