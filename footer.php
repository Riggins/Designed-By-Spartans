	

<?php if ( is_active_sidebar( 'gridly_footer')) { ?>     
   <div id="footer-area">
			<?php dynamic_sidebar( 'gridly_footer' ); ?>
			
			 <div id="copyright">
 <p>&copy; <?php echo date("Y"); echo " "; bloginfo('name'); ?></p>
 </div><!-- // copyright --> 
			
        </div><!-- // footer area -->   
<?php }  ?>     
    
     
</div><!-- // wrap -->   

</div><!-- /container -->

	<?php wp_footer(); ?>
	
</body>
</html>