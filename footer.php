        <footer class="section">
            <div class="container grid">
                <div class="brand">
                    <a href="#">
                        <h1 class="logo alt">beauty<span>salon</span>.</h1>
                    </a>
                    <p>©2021 Beautysalon.</p>
                    <p>Todos os direitos reservados.</p>
                </div>
                <div class="social">
                    <?php 
                    $instagramLink = get_field('instagramLink');
                    if( $instagramLink ): ?>
                        <a href="<?php echo esc_url( $instagramLink ); ?>"><i class="icon-instagram"></i></a>
                    <?php endif; ?>
                    <?php 
                    $facebookLink = get_field('facebookLink');
                    if( $facebookLink ): ?>    
                        <a href="<?php echo esc_url( $facebookLink ); ?>"><i class="icon-facebook"></i></a>
                    <?php endif; ?>
                    <?php 
                    $youtubeLink = get_field('youtubeLink');
                    if( $youtubeLink ): ?>
                        <a href="<?php echo esc_url( $youtubeLink ); ?>"><i class="icon-youtube"></i></a>
                    <?php endif; ?>
                </div>
            </div>
            
            <!-- ========OPEN FOOTER =========== -->
            <?php wp_footer(); ?>

            <!-- ========CLOSE FOOTER =========== -->
        </footer>

        <a href="#home" class="back-to-top"><i class="icon-arrow-up"></i></a>

        
        <!-- SCROLLREVEAL -->
        <script src="https://unpkg.com/scrollreveal"></script>

        <!-- MAINJS -->
        <script src="<?php echo get_stylesheet_directory_uri(); ?>/main.js"></script>
    </body>
</html>
