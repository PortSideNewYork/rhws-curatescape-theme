<aside id="action-buttons">
	<?php echo random_item_link("View A Random ".mh_item_label('singular'),'big-button');?>
	<?php mh_appstore_downloads(); ?>
</aside> 

<div class="clearfix"></div>
</div><!--end wrap-->
<footer class="main">
    <?php /* 
	<nav id="footer-nav">
	    
	    
    	<div id="search-wrap">
	    	<?php echo mh_simple_search($formProperties=array('id'=>'footer-search')); ?>
	    </div>  
	    	        
    </nav>	
     */ ?>
 
	<p class="default">
		<span id="app-store-links"><?php mh_appstore_footer(); ?></span>
		<?php echo mh_footer_find_us();?>
		<div class="footer-items">
		<span id="copyright">
		<?php echo mh_license();?>
		&ensp;
		<a href='http://portsidenewyork.org' target='_blank'>
		<img src='<?php  echo img('portsidelogo.png') ?>' style='height:50px;'>
		</a>
		</span> <?php /* end copyright span */?>

		<span id="powered-by"><?php echo __('Powered by <a href="http://omeka.org/" target="_blank">Omeka</a> + <a href="http://curatescape.org" target="_blank">Curatescape</a>');?></span>
        <span id="sponsored-by">
          <span style="float:left;width:50%;">
          Site hosting provided by 
          <a href="http://www.siliconservers.com" target="_blank">
            <img height="50" src="<?php echo img('siliconservers.png'); ?>" />
          </a>
          </span>
          <span style="width:50%;">
          Support provided by 
          <a href="http://www.nyc.gov/culture" target="_blank">
            <img src="https://static1.squarespace.com/static/50dcbaa5e4b00220dc74e81f/t/580b968520099e55b48b2d41/1477154437724/NYCulture_logo_CMYK.jpg?format=750w" height="50" />
          </a>
          </span>
        </span>
        </div>
	</p>
	
	<div class="custom">
		<?php echo get_theme_option('custom_footer_html');?>
	</div>

	<?php 		
		echo mh_footer_scripts_init(); 
	?>
	
	
	<!-- Plugin Stuff -->
	<?php echo fire_plugin_hook('public_footer', array('view'=>$this)); ?>	
		
<div class="clearfix"></div>
</footer>
</body>

</html>