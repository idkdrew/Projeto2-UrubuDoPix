<section class="flex-column center-primary center-secondary">
    <form method="POST" action="/index.php/usuario/usuario/login">
        <inputLine>
            <iltext>
                <label for="login">
                    <p>Login:</p>
                </label>
            </iltext>
            <ilinput>
                <input style="width: 100%;" type="text" id="login" name="login">
            </ilinput>
        </inputLine>

        <inputLine>
            <iltext>
                <label for="senha">
                    <p>Senha:</p>
                </label>
            </iltext>
            <ilinput>
                <input style="width: 100%;" type="password" id="senha" name="senha">
            </ilinput>
        </inputLine>

        <div style="width: 300px; justify-content: space-between;" class="flex-row">
            <p>Não tem conta?</p>
            <a href="/index.php/usuario/usuario/cadastro" class="cadastro"> Fazer seu cadastro</a>
        </div>

        <?php
            if($erro){
                ?>
                <p>Credenciais Incorretas!</p>
                <?php
            }
        ?>

        <button type="submit" style="width: 300px;">Entrar</button>
    </form>
</section>