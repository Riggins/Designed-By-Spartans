<?php /* Template Name: Directory Page */ ?>

<?php get_header(); ?>


<br/>

					<!-- Display Recent Articles -->
						<div class="row">
						<div class="large-12 columns">
							<h2>All Posts</h2>
							
						</div>
						</div>
						
						<hr/>
						
						
						<div class="row">
						
						
							<div class="large-3 columns">
								
								<?php include('searchform.php') ?>
								
								<select name="archive-menu" onChange="document.location.href=this.options[this.selectedIndex].value;">
								<option value="">Select month</option>
								<?php wp_get_archives('type=monthly&format=option'); ?>
								</select>
								

								<form action="<?php bloginfo('url'); ?>/" method="get">
									<div>
									<?php
									$select = wp_dropdown_categories('show_option_none=Select category&show_count=1&orderby=name&echo=0');
									$select = preg_replace("#<select([^>]*)>#", "<select$1 onchange='return this.form.submit()'>", $select);
									echo $select;
									?>
									<noscript><div><input type="submit" value="View" /></div></noscript>
									</div>
								</form>
								
								

								   <form action="<?php bloginfo('url'); ?>" method="get">
								   
								   <div>
								   <?php
								   $select = wp_dropdown_users('show_option_none=Select author&order=DESC&show=display_name&name=author&who=authors&echo=0');
								   $select = preg_replace("#<select([^>]*)>#", "<select$1 onchange='return this.form.submit()'>", $select);
								   echo $select;
								   ?>
								   

								   <noscript><input type="submit" name="submit" value="view" /></noscript>
								   </div>
								   </form>

							</div>
							
							
						
							<div class="large-9 columns">
										
									<?php wp_list_authors('exclude_admin=0&optioncount=0&show_fullname=1&hide_empty=0'); ?>	
									
							</div>
							
						</div><!-- end 12 columns -->

	<?php get_footer(); ?>