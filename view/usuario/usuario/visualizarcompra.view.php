<subnav>
    <a href="/index.php/usuario/usuario/compras">COMPRAS</a>
    <a href="/index.php/usuario/usuario/enderecos">ENDEREÇOS</a>
    <a href="/index.php/usuario/usuario/infos">INFORMAÇÕES</a>
    <a href="/index.php/usuario/usuario/sair">SAIR</a>
</subnav>
<section>
    <a href="/index.php/usuario/usuario/compras" class="iconUrubu">
        <i class="bi bi-arrow-left"></i>
    </a>
    <div class="flex-column center-secondary">
        <p>COMPRA: <?= $data; ?></p>
        <div class="flex-row center-primary" style="flex-wrap: wrap">
            <?php foreach ($listaProdutos as $produto) : ?>
                <produtolist>
                    <plimagem>
                        <?php
                            $id = $produto->getId(); 
                            $imageUrl = 'model/exibirimagem.php';
                            require($imageUrl); 
                            
                            ?>
                    </plimagem>
                    <plnome>
                        <h2 style="margin: 0"><?= $produto->getNome(); ?></h2>
                    </plnome>
                    <plpreco>
                        <h2 style="margin: 0"><?= $produto->getPreco(); ?></h2>
                    </plpreco>
                    <pldescricao>
                        <p style="margin: 0"><?= $produto->getDescricao(); ?></p>
                    </pldescricao>
                </produtolist>
            <?php endforeach; ?>
        </div>
        <h1>TOTAL: <?= 'R$' . number_format($preco, 2, ',', '.')?></h1>
    </div>
</section>