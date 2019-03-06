<?php
/**
Plugin Name: RandomUser
Description: Add random users.
Version: 1.0
Author: Genia
 */

if ( ! defined( 'WPINC' ) ) {
    die;
}

if ( !is_admin() ){return;}

add_action('admin_menu', 'randomUser_nav_menu');
function randomUser_nav_menu(){
    add_menu_page(
        'randomUser',
        'RandomUser',
        'manage_options',
        'randomUser',
        'randomUser_page',
        plugins_url( 'randomUser/icon.png' ),
        30 );
}

function randomUser_page()
{
    if (wp_verify_nonce($_POST['randomUser_init'])) {

       if( $_POST['randomUserNumb'] >0){

           $i=1;
           while($i<=$_POST['randomUserNumb']){
               $ch = curl_init();
               curl_setopt($ch, CURLOPT_URL, "https://randomuser.me/api/");
               curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
               $response = curl_exec($ch);
               curl_close($ch);

               $usersData[] = $response;

               $i++;
           }
       }


        foreach ( $usersData as  $userData) {
            $data = json_decode($userData, true);
            $results = $data['results'];
            $result = $results[0];



            $user_login = $result['login']['username'];
            $user_email = $result['email'];
            $user_pass  = $result['login']['password'];
            $nickname   = $result['login']['username'];
            $first_name = $result['name']['first'];
            $last_name  = $result['name']['last'];

            $userdata = compact( 'user_login', 'user_email', 'user_pass', 'nickname', 'first_name', 'last_name');

            wp_insert_user( $userdata );

       }

        add_settings_error('randomUser', 'settings_updated','Добавил: '.$_POST['randomUserNumb'] , 'updated');



    }
    include_once ('randomUserPage.php');
}

