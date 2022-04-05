<h1>Olá</h1>
<?php
function enqueue_scripts() {
  wp_enqueue_script('main', get_template_directory_uri() . '/main.js', array('jquery'), null, true);
  wp_enqueue_style('style', get_template_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'enqueue_scripts');


function cpt_paciente() {

$labels = array(
    'name' => 'Pacientes',
    'singular_name' => 'paciente',
    'add_new' => 'Adicionar paciente',
    'add_new_item' => 'Adicionar paciente',
    'edit_item' => 'Editar paciente',
    'new_item' => 'Novo paciente',
    'all_items' => 'Todos Pacientes',
    'view_item' => 'Ver paciente',
    'search_items' => 'Buscar Pacientes',
    'not_found' =>  'Nenhum paciente encontrado',
    'not_found_in_trash' => 'Nenhum paciente encontrado',
    'parent_item_colon' => '',
    'menu_name' => 'Pacientes',
);

// register post type
$args = array(
    'labels' => $labels,
    'public' => true,
    'has_archive' => true,
    'show_ui' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'rewrite' => array('slug' => 'paciente'),
    'query_var' => true,
    'menu_icon' => 'dashicons-building',
    'supports' => array(
        'title',
        'thumbnail',
        'author',
    )
);
register_post_type( 'paciente', $args );

}
add_action( 'init', 'cpt_paciente' );

function cpt_doutor() {

$labels = array(
    'name' => 'Doutores',
    'singular_name' => 'doutor',
    'add_new' => 'Adicionar doutor',
    'add_new_item' => 'Adicionar doutor',
    'edit_item' => 'Editar doutor',
    'new_item' => 'Novo doutor',
    'all_items' => 'Todos Doutores',
    'view_item' => 'Ver doutor',
    'search_items' => 'Buscar Doutores',
    'not_found' =>  'Nenhum doutor encontrado',
    'not_found_in_trash' => 'Nenhum doutor encontrado',
    'parent_item_colon' => '',
    'menu_name' => 'Doutores',
);

// register post type
$args = array(
    'labels' => $labels,
    'public' => true,
    'has_archive' => true,
    'show_ui' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'rewrite' => array('slug' => 'doutor'),
    'query_var' => true,
    'menu_icon' => 'dashicons-building',
    'supports' => array(
        'title',
        'thumbnail',
        'author',
    )
);
register_post_type( 'doutor', $args );

}
add_action( 'init', 'cpt_doutor' );

//Formulário de registro
function register_form(){
?>
<div id="container">
<form method="post" name="myForm">
Usuário <input type="text"  name="uname" />
Email <input id="email" type="text" name="uemail" />
Senha <input type="password"  name="upass" />
Idade <input type="text"  name="uidade" />
<p>Sexo:</p>
<label>Masculino</label>
<input type="radio" id="contactChoice1" name="sexo" value="masculino">
<label>Feminino</label>
<input type="radio" id="contactChoice1" name="sexo" value="feminino">
<?php
$args = array(
'post_type'=> 'doutor',
'post_status' => 'publish',
'posts_per_page' => -1,
);
$result = new WP_Query( $args );
if ( $result-> have_posts() ) : ?>
<p> Seu doutor: </p>
<?php while ( $result->have_posts() ) : $result->the_post(); ?>
<label><?php the_title()?></label>
<input type="radio" id="<?php the_title()?>" name="doutor" value="<?php the_title()?>">
<?php endwhile;?>
<?php endif;?>
<input type="submit" name="cadastrar" value="Cadastrar" />
</form>
</div>
<?php
}
add_shortcode('register_form_shortcode', 'register_form');

if (isset($_POST['cadastrar'])) {
add_action('init','create_account');
function create_account(){
    $user = ( isset($\_POST['uname']) ? $_POST['uname'] : '' );
    $pass = ( isset($\_POST['upass']) ? $_POST['upass'] : '' );
    $email = ( isset($\_POST['uemail']) ? $\_POST['uemail'] : '' );

    if ( !username_exists( $user )  && !email_exists( $email ) ) {
    $user_id = wp_create_user( $user, $pass, $email );
    if( !is_wp_error($user_id) ) {
        //user has been created
        $user = new WP_User( $user_id );
        $user->set_role( 'Paciente' );
        //Redirect
        wp_redirect( 'http://localhost/clinica/' );
        exit;
    } else {
        //$user_id is a WP_Error object. Manage the error
    }
    }

}

}else{
}

//Criar nova regra de usuário
add_role(
'Paciente',
\_\_( 'Paciente' ),
array(
'read' => false,
'delete_posts' => false,
'delete_published_posts' => false,
'edit_posts' => false,
'publish_posts' => false,
'upload_files' => false,
'edit_pages' => false,
'edit_published_pages' => false,
'publish_pages' => false,
'delete_published_pages' => false,
)
);

//Aproveitar informações do usário no cpt

add_action( 'user_register', 'wpse_216921_company_cpt', 10, 1 );
function wpse_216921_company_cpt( $user_id )
{
// Resgata informação do usuário
$user_info = get_userdata( $user_id );

// Cria um novo post
$user_post = array(
    'post_title'   => $user_info->nickname,
    'post_content' => $user_info->description,
    'post_status' => 'publish',
    'post_type'    => 'paciente', // <- change to your cpt
);
// Insere o post no banco
$post_id = wp_insert_post( $user_post );

// Adiciona informações customizadas no acf
add_post_meta( $post_id, 'paciente_id', $user_id );
add_post_meta( $post_id, 'paciente_email', $_POST['uemail'] );
add_post_meta( $post_id, 'idade', $_POST['uidade'] );
add_post_meta( $post_id, 'sexo', $_POST['sexo']);
add_post_meta( $post_id, 'relacao', $_POST['doutor']);

}

?>