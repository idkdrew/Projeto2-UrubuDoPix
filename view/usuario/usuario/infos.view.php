<subnav>
    <a href="/index.php/usuario/usuario/compras">COMPRAS</a>
    <a href="/index.php/usuario/usuario/enderecos">ENDEREÇOS</a>
    <a href="/index.php/usuario/usuario/infos">INFORMAÇÕES</a>
    <a href="/index.php/usuario/usuario/sair">SAIR</a>
</subnav>
<section class="flex-column center-secondary">
    <p>INFORMAÇÕES</p>
    <inputLine>
        <iltext>
            <label for="nome">
                <p>Nome:</p>
            </label>
        </iltext>
        <ilinput>
            <input style="width: 100%;" type="text" id="nome" value="<?= $usuario->getNome(); ?>" disabled>
        </ilinput>
    </inputLine>

    <inputLine>
        <iltext>
            <label for="login">
                <p>Login:</p>
            </label>
        </iltext>
        <ilinput>
            <input style="width: 100%;" type="text" id="login" value="<?= $usuario->getLogin(); ?>" disabled>
        </ilinput>
    </inputLine>
</section>