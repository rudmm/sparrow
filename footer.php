      <!-- footer
      ================================================== -->
      <footer>

         <div class="row">

            <div class="twelve columns">
            <?php wp_nav_menu([
                  'theme_location'  => 'bottom',
                  'container'       => null,
                  'menu_class'      => 'footer-nav',
                  'menu_id'         => null
                  ] );
            ?>

            <ul class="copyright">
               <li>Copyright &copy; 2014 Sparrow</li> 
               <li>Design by <a href="http://www.styleshout.com/">Styleshout</a></li>               
            </ul>

            </div>

            <div id="go-top" style="display: block;"><a title="Back to Top" href="#">Go To Top</a></div>

         </div>

      </footer> <!-- Footer End-->
      <?php wp_footer(); ?>
   </body>

</html>