<?php $currentlang = pll_current_language();
if($currentlang=="en"):?>

    <div class="col-md-3">
        <div class="hexagon-services">
            <div class="hexagon-mask">
                <span class="num num-blue">1</span>
                <span class="mask"></span>
                <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Management Consulting' ) ) ); ?>"><span class="mask-bg"></span></a>

                <img src="<?php bloginfo('template_directory'); ?>/images/dev/light_house.png" alt="">
            </div>

            <h3>MANAGEMENT<br>CONSULTING</h3>
            <p>We Show You The Way</p>
            <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Management Consulting' ) ) ); ?>" class="btn btn-blue">Check details</a>
        </div>
    </div>

    <div class="col-md-3">
        <div class="hexagon-services">
            <div class="hexagon-mask">
                <span class="num num-orange">2</span>
                <span class="mask"></span>
                <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Project Ownership and Implementation' ) ) ); ?>"><span class="mask-bg"></span></a>
                <img src="<?php bloginfo('template_directory'); ?>/images/dev/luggage.png" alt="">
            </div>
            <h3>PROJECT OWNERSHIP<br> AND IMPLEMENTATION</h3>
            <p>We help you get there</p>
            <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Project Ownership and Implementation' ) ) ); ?>" class="btn btn-carrot">Check details</a>
        </div>
    </div>

    <div class="col-md-3">
        <div class="hexagon-services">
            <div class="hexagon-mask">
                <span class="num num-grey">3</span>
                <span class="mask"></span>
                <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Engineering and Agile Professionals' ) ) ); ?>"><span class="mask-bg"></span></a>
                <img src="<?php bloginfo('template_directory'); ?>/images/dev/airplane.jpg" alt="">
            </div>
            <h3>ENGINEERING AND<br> AGILE PROFESSIONALS</h3>
            <p>Our people are world class</p>
            <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Engineering and Agile Professionals' ) ) ); ?>" class="btn btn-grey">Check details</a>
        </div>
    </div>

    <div class="col-md-3">
        <div class="hexagon-services">
            <div class="hexagon-mask">
                <span class="num num-red">4</span>
                <span class="mask"></span>
                <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Avenue Code Academy' ) ) ); ?>"><span class="mask-bg"></span></a>
                <img src="<?php bloginfo('template_directory'); ?>/images/dev/sunglasses.png" alt="">
            </div>
            <h3>AVENUE CODE<br>ACADEMY<br></h3>
            <p>We give you the right skills</p>
            <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Avenue Code Academy' ) ) ); ?>" class="btn btn-red">Check details</a>
        </div>
    </div>

<?php elseif($currentlang=="pt"):?>
    <div class="col-md-4">
        <div class="hexagon-services">
            <div class="hexagon-mask">
                <span class="num num-blue">1</span>
                <span class="mask"></span>
                <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Gestão e Consultoria' ) ) ); ?>"><span class="mask-bg"></span></a>

                <img src="<?php bloginfo('template_directory'); ?>/images/dev/light_house.png" alt="">
            </div>

            <h3>GESTÃO<br>E CONSULTORIA</h3>
            <p>Nós te mostramos o caminho</p>
            <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Gestão e Consultoria' ) ) ); ?>" class="btn btn-blue">Detalhes</a>
        </div>
    </div>

    <div class="col-md-4">
        <div class="hexagon-services">
            <div class="hexagon-mask">
                <span class="num num-orange">2</span>
                <span class="mask"></span>
                <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Gestão e Implementação de Projeto' ) ) ); ?>"><span class="mask-bg"></span></a>
                <img src="<?php bloginfo('template_directory'); ?>/images/dev/luggage.png" alt="">
            </div>
            <h3>GESTÃO E IMPLEMENTAÇÃO<br>DE PROJETO</h3>
            <p>Nós te ajudamos a chegar lá</p>
            <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Gestão e Implementação de Projeto' ) ) ); ?>" class="btn btn-carrot">Detalhes</a>
        </div>
    </div>

    <div class="col-md-4">
        <div class="hexagon-services">
            <div class="hexagon-mask">
                <span class="num num-grey">3</span>
                <span class="mask"></span>
                <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Profissionais de Engenharia e Metodologia Ágil' ) ) ); ?>"><span class="mask-bg"></span></a>
                <img src="<?php bloginfo('template_directory'); ?>/images/dev/airplane.jpg" alt="">
            </div>
            <h3>PROFISSIONAIS DE<br>ENGENHARIA E AGILE</h3>
            <p>Nossas pessoas são experts</p>
            <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Profissionais de Engenharia e Metodologia Ágil' ) ) ); ?>" class="btn btn-grey">Detalhes</a>
        </div>
    </div>


<?php endif; ?>