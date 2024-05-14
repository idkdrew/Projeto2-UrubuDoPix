<section class="flex-column center-primary center-secondary">
    <form method="POST" action="/index.php/usuario/usuario/cadastrar">
        <inputLine>
            <iltext>
                <label for="nome">
                    <p>Nome:</p>
                </label>
            </iltext>
            <ilinput>
                <input style="width: 100%;" type="text" id="nome" name="nome">
            </ilinput>
        </inputLine>

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

        <?php
            if($erro){
                ?>
                <p>Preencha todos os campos!</p>
                <?php
            }
        ?>

        <?php
            if($indisponivel){
                ?>
                <p>Login não disponível!</p>
                <?php
            }
        ?>

        <button type="submit" style="width: 300px;">Cadastrar</button>
    </form>
</section>