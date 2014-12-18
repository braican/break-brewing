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



    <?php if( $the_post = get_page_by_title('About') ) : ?>
        <div class="about-content">
            <div class="about-container">
                <?php echo apply_filters('the_content', $the_post->post_content); ?>
            </div>
        </div>
    <?php endif; ?>

</div><!-- #page -->

<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="site-info">
        &copy; <?php echo date('Y'); ?> Nick Braica | <a href="http://braican.com">braican.com</a>
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
