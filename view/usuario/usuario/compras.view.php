<subnav>
    <a href="/index.php/usuario/usuario/compras">COMPRAS</a>
    <a href="/index.php/usuario/usuario/enderecos">ENDEREÇOS</a>
    <a href="/index.php/usuario/usuario/infos">INFORMAÇÕES</a>
    <a href="/index.php/usuario/usuario/sair">SAIR</a>
</subnav>
<section class="flex-column center-secondary">
    <p>COMPRAS</p>
    <table>
        <tr>
            <th>Data</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($listaCompras as $compra) : ?>
            <tr>
                <td><?= $compra->getData(); ?></td>
                <td><a href="/index.php/usuario/usuario/compra/?id=<?= $compra->getId(); ?>">Visualizar</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</section>