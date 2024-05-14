<section>
    <a href="/index.php/admin/produtos/novo" class="iconUrubu">
        <i class="bi bi-plus"></i>
    </a>
    <div class="flex-column center-secundary" style="margin: 10px 5px">
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Estoque</th>
                <th>Ações</th>
            </tr>
            <?php foreach ($listaProdutos as $produto) : ?>
                <tr>
                    <td><?= $produto->getId(); ?></td>
                    <td><?= $produto->getNome(); ?></td>
                    <td><?= $produto->getPreco(); ?></td>
                    <td><?= $produto->getEstoque(); ?></td>
                    <td><a href="/index.php/admin/produtos/remover/?id=<?= $produto->getId(); ?>">Excluir</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</section>


