<section class="flex-column center-secondary">
    <p>CARRINHO:</p>

    <?php if($erro){ ?>
        <h1>Carrinho Vazio!</h1>
    <?php }else{ ?>
        <div class="flex-row center-primary" style="flex-wrap: wrap; width: 100%">
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
        <form method="POST" action="/index.php/usuario/produtos/limpar" style="width: 100%;">
            <button type="submit" style="width: 100%;">Limpar Carrinho</button>
        </form>
        <div style="height: 10px">

        </div>
        <form method="POST" action="/index.php/usuario/produtos/comprar" style="width: 100%;">
            <button type="submit" style="width: 100%;">Finalizar Compra</button>
        </form>
    <?php } ?>

    
</section>