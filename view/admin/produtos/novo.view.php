<section>
    <a href="/index.php/admin/produtos/listar" class="iconUrubu">
        <i class="bi bi-arrow-left"></i>
    </a>
    <div class="flex-column center-secondary">
        <form method="POST" action="/index.php/admin/produtos/gravar" enctype="multipart/form-data">
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
                    <label for="imagem">
                        <p>Imagem:</p>
                    </label>
                </iltext>
                <ilinput style="height: 30px;">
                    <label id="imagem" for="imageminput" style="width: 100%;">
                        <buttonFile>Enviar</buttonFile>
                    </label>
                    <input type="file" id="imageminput" name="imagem">
                </ilinput>
            </inputLine>

            <inputLine>
                <iltext>
                    <label for="descricao">
                        <p>Descrição:</p>
                    </label>
                </iltext>
                <ilinput>
                    <textarea style="width: 100%;" id="descricao" name="descricao"></textarea>
                </ilinput>
            </inputLine>

            <inputLine>
                <iltext>
                    <label for="preco">
                        <p>Preço:</p>
                    </label>
                </iltext>
                <ilinput>
                    <input style="width: 100%;" type="number" id="preco" name="preco" min="0">
                </ilinput>
            </inputLine>

            <inputLine>
                <iltext>
                    <label for="quantidade">
                        <p>Quantidade:</p>
                    </label>
                </iltext>
                <ilinput>
                    <input style="width: 100%;" type="number" id="quantidade" name="quantidade" min="0">
                </ilinput>
            </inputLine>

            <?php
            if($erro){
                ?>
                <p>Preencha todos os campos!</p>
                <?php
            }
            ?>
            <button type="submit" style="width: 300px;">Cadastrar</button>
        </form>
    </div>

</section>