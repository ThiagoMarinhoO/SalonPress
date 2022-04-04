<?php get_header(); ?>
        <main>
            <section class="section" id="home">
                <div class="container grid">
                    <div class="image">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/sources/Img.svg" alt="Cabeleirira" />
                    </div>
                    <div class="text">
                        <h2 class="title">
                            Saúde natural para os seus cabelos
                        </h2>
                        <p>
                            Um salão exclusivo em São Paulo, especializado em
                            cabelos naturais.
                        </p>
                        <a href="#" class="button">Agendar horário</a>
                    </div>
                </div>
            </section>

            <div class="divider-1"></div>

            <section class="section" id="about">
                <div class="container grid">
                    <div class="image">
                        <img
                            src="https://images.unsplash.com/photo-1559599101-f09722fb4948?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8aGFpcmRyZXNzZXJ8ZW58MHx8MHx8&auto=format&fit=crop&w=500&q=60"
                            alt="três cabeleireiras posando para a foto"
                        />
                    </div>
                    <div class="text">
                        <h2 class="title">Sobre nós</h2>
                        <p>
                            Lorem ipsum dolor sit amet consectetur, adipisicing
                            elit. Ex voluptas molestias quam, maxime
                            exercitationem ab fuga veritatis tempora, soluta
                            delectus eos nisi libero!
                        </p>
                        <br />
                        <p>
                            Lorem ipsum dolor sit amet consectetur, adipisicing
                            elit. Ex voluptas molestias quam, maxime
                            exercitationem ab fuga veritatis tempora, soluta
                            delectus eos nisi libero!
                        </p>
                        <br />
                        <p>
                            Lorem ipsum dolor sit amet consectetur, adipisicing
                            elit. Ex voluptas molestias quam, maxime
                            exercitationem ab fuga veritatis tempora, soluta
                            delectus eos nisi libero!
                        </p>
                    </div>
                </div>
            </section>

            <div class="divider-2"></div>

            <section class="section" id="services">
                <div class="container grid">
                    <header>
                        <h2 class="title">Serviços</h2>
                        <p>
                            Com mais de 10 anos no mercado, o
                            <strong>Beautysalon</strong> já conquistou clientes
                            de inúmeros países com seus tratamentos exclusivos e
                            totalmente naturais
                        </p>
                    </header>

                    <?php
                        // Check rows exists.
                        if( have_rows('services') ):
                            ?>
                    <div class="cards grid">
                        <?php
                        // Loop through rows.
                        while( have_rows('services') ) : the_row();
                        ?>

                        <div class="card">
                            <i class="<?php the_sub_field('icon'); ?>"></i>
                            <h3 class="title"><?php the_sub_field('title'); ?></h3>
                            <p>
                                <?php the_sub_field('paragraph'); ?>
                            </p>
                        </div>  
                        
                        <?php endwhile; ?>
                    </div>
                        <?php endif; ?>
                </div>
            </section>

            <div class="divider-1"></div>

            <section class="section" id="testimonials">
                <div class="container grid">
                    <header>
                        <h2 class="title">
                            Depoimentos de quem passou por aqui
                        </h2>
                    </header>

                    <div class="testimonials">

                    <?php 
                        if( have_rows('testimonials') ):
                    ?>

                        <div class="testimonial">
                        
                        <?php 
                            while( have_rows('testimonials') ) : the_row();
                        ?>
                            <blockquote>
                                <p>
                                    <span>&ldquo;</span> <?php the_sub_field('testimonial'); ?>
                                </p>
                                <cite>
                                    <img
                                        src="<?php the_sub_field('userPhoto'); ?>"
                                        alt=""
                                    />
                                    <?php the_sub_field('usersName'); ?>
                                </cite>
                            </blockquote>
                        <?php endwhile; ?>    
                        </div>
                    <?php endif; ?>
                        <!-- If we need pagination -->
                        <!-- <div class="swiper-pagination"></div> -->
                    </div>
                </div>
            </section>

            <div class="divider-2"></div>

            <section class="section" id="contact">
                <div class="container grid">
                    <div class="text">
                        <h2 class="title">Entre em contato com a gente!</h2>
                        <p>
                            Entre em contato com a Beautysalon, queremos tirar
                            suas dúvidas, ouvir suas críticas e sugestões.
                        </p>
                        <a
                            class="button"
                            href="https://api.whatsapp.com/send?phone=SeuNúmero&text=suaMensagem"
                            target="_blank"
                        >
                            <i class="icon-whatsapp"></i>
                            Entrar em contato
                        </a>
                    </div>

                    <div class="links">
                        <ul>
                            <li>
                                <i class="icon-phone"></i>
                                <?php the_field('contactPhone'); ?>
                            </li>
                            <li>
                                <i class="icon-map-pin"></i>
                                <?php the_field('contactAddress'); ?>
                            </li>
                            <li>
                                <i class="icon-mail"></i>
                                <?php the_field('contactEmail'); ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
        </main>
<?php get_footer(); ?>