<?php
/*
Template Name: Landing Page
*/
get_header();
?>
<main id="site-content" role="main" class="landing-page">
    <section class="landing-hero">
        <div class="container">
            <div>איך קוראים לך?</div>
            <div class="gray-text">הקלידו כאן שם מלא</div>
            <button class="button">הבא</button>
        </div>
    </section>

    <section class="landing-hero">
        <div class="container">
            <div>מה האימייל שלך?</div>
            <div class="gray-text">הקלידו כאן את האימייל שלכם</div>
            <button class="button">הבא</button>
        </div>
    </section>

    <section>
        <div class="container">
            <div>מה הטכנולוגיות הרלוונטיות?</div>
                <ul>
                    <li class="technology"><span dir="ltr">C+/C++</span><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/c++.svg" alt="C+/C++"></li>
                    <li class="technology"><span>React</span><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/react.svg" alt="React"></li>
                    <li class="technology"><span>Php</span><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/php.svg" alt="Php"></li>
                    <li class="technology"><span>Flutter</span><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/flutter.png" alt="Flutter"></li>
                    <li class="technology"><span>Sharepoint</span><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/sharepoint.svg" alt="Sharepoint"></li>
                    <li class="technology"><span>Nodejs</span><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/nodejs.svg" alt="Nodejs"></li>
                    <li class="technology"><span>HTML5</span><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/html5.svg" alt="HTML5"></li>
                    <li class="technology"><span>Elementor</span><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/elementor.svg" alt="Elementor"></li>
                    <li class="technology"><span>WordPress</span><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/wordpress.svg" alt="WordPress"></li>
                    <li class="technology"><span>Vue.js</span><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/vue.svg" alt="Vue.js"></li>
                    <li class="technology"><span>Python</span><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/python.svg" alt="Python"></li>
                    <li class="technology"><span>IOS</span><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/ios.svg" alt="IOS"></li>
                    <li class="technology"><span>Angular</span><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/angular.svg" alt="Angular"></li>
                    <li class="technology"><span>.NET</span><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/net.svg" alt=".NET"></li>
                    <li class="technology"><span>MySQL</span><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/mysql.svg" alt="MySQL"></li>
                    <li class="technology"><span>Android</span><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/android.svg" alt="Android"></li>
                    <li class="technology"><span>Webflow</span><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/webflow.svg" alt="Webflow"></li>
                    <li class="technology"><span>Typescript</span><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/typescript.svg" alt="Typescript"></li>
                    <li class="technology"><span>Bubble</span><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/bubble.svg" alt="Bubble"></li>
                    <li class="technology"><span>Ruby</span><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/ruby.png" alt="Ruby"></li>
                    <li class="technology"><span>Javascript</span><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/javascript.svg" alt="Javascript"></li>
                </ul>
                <div class="technology"><span>לא בטוחים, צריכים ייעוץ</span><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/question.svg" alt="question mark"></div>

            <div>מספר המומחים</div>
            <div class="technology number-buttons">
                <button class="number-button">-</button>
                <span>1</span>
                <button class="number-button">+</button>
            </div>
            <div>כמה שנות ניסיון?</div>
            <ul class="experience-list">
        <li class="technology">8+</li>
        <li class="technology">6-8</li>
        <li class="technology">4-6</li>
        <li class="technology">2-4</li>
        <li class="technology">0-2</li>
    </ul>
        </div>
    </section>

    <section class="empty-background">
        <div class="container container-row">
            
            <div class="flex">
            <div>מה מספר הטלפון שלך?</div>
            <div class="gray-text">הקלידו כאן את הטלפון שלכם</div>
            <button class="button">סיום</button>
            </div>
            <div class="flex">
            <img class="image-cubes" src="<?php echo get_template_directory_uri(); ?>/assets/image.png" alt="הקלידו כאן את הטלפון שלכם">
            </div>
        </div>
    </section>

    <section class="empty-background">
        <div class="container container-column">
            <img class="image-circle" src="<?php echo get_template_directory_uri(); ?>/assets/circle.png" alt="ממש בקרוב ניצור איתכם קשר!">
            <div class="flex">
            <div class="gray-text white-text">ממש בקרוב ניצור איתכם קשר!</div>
            <div class="container-row">
            <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/facebook.svg" alt="facebook"></a>
            <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/instagram.svg" alt="instagram"></a>
            <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/linkedin.svg" alt="linkedin"></a>
            <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/gmail.svg" alt="gmail"></a>
</div>
</div>
        </div>
    </section>


</main>
<?php get_footer(); ?>