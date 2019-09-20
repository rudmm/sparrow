<form action="<?php bloginfo( 'url' ); ?>" method="get">
   <input class="text-search" type="text" onfocus="if (this.value == 'Search here...') { this.value = ''; }" onblur="if(this.value == '') { this.value = 'Search here...'; }" value="Search here...">
   <input type="submit" class="submit-search" value="">
</form>