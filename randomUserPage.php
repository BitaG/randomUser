<?php   settings_errors();?>
<div class ="wrap">
    <div class ="postbox"  style="width: 500px; margin: 0 auto; text-align: center; padding: 3rem 2rem 0rem 2rem;">
        <img  src="<?php echo  plugins_url( 'randomUser/logo.svg' );?>" width="82px">
        <h1>
            RandomUser
        </h1>

    <form method="post" novalidate="novalidate" style="margin: 0 auto; padding-top: 2rem;">
        <?php wp_nonce_field('-1','randomUser_init'); ?>
        <input name="randomUserNumb" type="number" min="1" max="20" value="1"  aria-describedby="randomUser_desc" style="width: 200px;"/>
        <p class="description" id="randomUser_desc">Количество пользователей</p>

        <p class="submit" style="text-align: center; padding: 2rem;">
            <input type="submit" name="submit" id="submit" class="button button-primary" value="Добавить">

        </p>
    </form>
   <p style="text-align: right; font-style: italic; color: #555d66;">
       <img  src="<?php echo  plugins_url( 'randomUser/pokeball.svg' );?>" width="20px"> <span style="vertical-align: super;">Биловол</span>
   </p>

    </div>
</div>

