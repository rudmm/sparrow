<form action="<?php bloginfo( 'url' ); ?>" method="get" id="searchform" role="search" class="searchform">
   <input name="s" id="s" class="text-search" type="text" onfocus="if (this.value == 'Search here...') { this.value = ''; }" onblur="if(this.value == '') { this.value = 'Search here...'; }" value="Search here...">
   <input type="submit" class="submit-search" id="searchsubmit" value="">
</form>