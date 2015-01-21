<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Breakbrewing
 */
?>
        
    </div><!-- #content -->

</div><!-- #page -->

<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="social">
      <ul>
        <li><a target="_blank" href="https://plus.google.com/113286017182861587914" rel="publisher"><?php include_svg('social-google'); ?></a></li>
        <li><a target="_blank" href="http://instagram.com/breakbrewing/" rel="publisher"><?php include_svg('social-instagram'); ?></a></li>
        <li><a target="_blank" href="https://untappd.com/breakbrewingproject" rel="publisher"><?php include_svg('social-untappd'); ?></a></li>
      </ul>
    </div>


    <div class="site-info">
        &copy; <?php echo date('Y'); ?> Nick Braica and Break Brewing Project | <a href="http://braican.com">braican.com</a>
    </div><!-- .site-info -->
</footer><!-- #colophon -->


<?php wp_footer(); ?>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-20596099-18', 'auto');
  ga('send', 'pageview');

</script>

</body>
</html>
