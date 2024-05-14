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

            <button type="submit" style="width: 300px;">Procurar</button>
        </form>

        <div style="height: 30px"></div>

        <form method="POST" action="/index.php/usuario/usuario/cadastrarendereco">
            <inputLine>
                <iltext>
                    <label for="cep2">
                        <p>CEP:</p>
                    </label>
                </iltext>
                <ilinput>
                    <input style="width: 100%;" type="text" id="cep2" name="cep" value="<?= $cep;?>">
                </ilinput>
            </inputLine>

            <inputLine>
                <iltext>
                    <label for="logradouro">
                        <p>Logradouro:</p>
                    </label>
                </iltext>
                <ilinput>
                    <input style="width: 100%;" type="text" id="logradouro" name="logradouro" value="<?= $logradouro;?>">
                </ilinput>
            </inputLine>

            <inputLine>
                <iltext>
                    <label for="complemento">
                        <p>Complemento:</p>
                    </label>
                </iltext>
                <ilinput>
                    <input style="width: 100%;" type="text" id="complemento" name="complemento" value="<?= $complemento;?>">
                </ilinput>
            </inputLine>

            <inputLine>
                <iltext>
                    <label for="numero">
                        <p>Número:</p>
                    </label>
                </iltext>
                <ilinput>
                    <input style="width: 100%;" type="text" id="numero" name="numero" value="<?= $numero;?>">
                </ilinput>
            </inputLine>

            <inputLine>
                <iltext>
                    <label for="bairro">
                        <p>Bairro:</p>
                    </label>
                </iltext>
                <ilinput>
                    <input style="width: 100%;" type="text" id="bairro" name="bairro" value="<?= $bairro;?>">
                </ilinput>
            </inputLine>

            <inputLine>
                <iltext>
                    <label for="cidade">
                        <p>Cidade:</p>
                    </label>
                </iltext>
                <ilinput>
                    <input style="width: 100%;" type="text" id="cidade" name="cidade" value="<?= $cidade;?>">
                </ilinput>
            </inputLine>

            <inputLine>
                <iltext>
                    <label for="uf">
                        <p>UF:</p>
                    </label>
                </iltext>
                <ilinput>
                    <input style="width: 100%;" type="text" id="uf" name="uf" value="<?= $uf;?>">
                </ilinput>
            </inputLine>

            <?php
            if($erro){
                ?>
                <p>Preencha todos os campos!</p>
                <?php
            }
            ?>

            <button type="submit" style="width: 300px;">Salvar</button>
        </form>
    </div>
</section>