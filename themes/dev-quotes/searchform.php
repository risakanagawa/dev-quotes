<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	<fieldset>
		<label>
			<input type="search" class="search-field" placeholder="SEARCH ..." value="<?php echo esc_attr( get_search_query() ); ?>" name="s" title="Search for:" />
		</label>
		<button type="submit" id="searchsubmit" class="search-icon">
			<span class="icon"><i class="fa fa-search"></i></span>
		</button>
	</fieldset>
</form>