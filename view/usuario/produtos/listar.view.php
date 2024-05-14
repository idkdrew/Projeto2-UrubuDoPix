<section class="flex-row center-primary" style="flex-wrap: wrap">
    <?php foreach ($listaProdutos as $produto) : ?>
        <produto>
            <pnome>
                <h2 style="margin: 0"><?= $produto->getNome(); ?></h2>
            </pnome>
            <pimagem>
                <?php
                    $id = $produto->getId(); 
                    $imageUrl = 'model/exibirimagem.php';
                    require($imageUrl); 
                    
                    ?>
            </pimagem>
            <ppreco>
                <h2 style="margin: 0"><?= $produto->getPreco(); ?></h2>
            </ppreco>
            <pbutton>
                <form method="POST" action="/index.php/usuario/produtos/adicionar/?id=<?= $produto->getId(); ?>">
                    <button type="submit" style="width: 100%;">Adicionar no Carrinho</button>
                </form>
            </pbutton>
        </produto>
    <?php endforeach; ?>
</section>