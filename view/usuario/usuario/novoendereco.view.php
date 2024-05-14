<subnav>
    <a href="/index.php/usuario/usuario/compras">COMPRAS</a>
    <a href="/index.php/usuario/usuario/enderecos">ENDEREÇOS</a>
    <a href="/index.php/usuario/usuario/infos">INFORMAÇÕES</a>
    <a href="/index.php/usuario/usuario/sair">SAIR</a>
</subnav>
<section>
    <a href="/index.php/usuario/usuario/enderecos" class="iconUrubu">
        <i class="bi bi-arrow-left"></i>
    </a>
    <div class="flex-column center-secondary">
        <form method="POST" action="/index.php/usuario/usuario/procurarendereco">
            <inputLine>
                <iltext>
                    <label for="cep">
                        <p>CEP:</p>
                    </label>
                </iltext>
                <ilinput>
                    <input style="width: 100%;" type="text" id="cep" name="cep">
                </ilinput>
            </inputLine>

            <?php
            if($erro){
                ?>
                <p>CEP não encontrado!</p>
                <?php
            }
            ?>

            <button type="submit" style="width: 300px;">Procurar</button>
        </form>
    </div>
</section>