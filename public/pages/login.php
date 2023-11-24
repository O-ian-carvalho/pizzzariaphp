

<div class="login">  
    <div class="form">        
        <form action="../././app/functions/adduser.php" method="post">
        <h1 class='loginh1'>
            <?php
                if(isset($_GET['errop'])){
                    echo  'Senha Incorreta';
                } else{
                    echo 'Faça LOGIN ou CRIE UMA CONTA';
                }
            ?>
            </h1>
        
            <input type="text" name='email' require>
            <input type="text" name="password" require>
            <button type="submit">Enviar</button>
        </form>
    </div>
</div>