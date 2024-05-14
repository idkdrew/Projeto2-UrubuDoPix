<subnav>
    <a href="/index.php/usuario/usuario/compras">COMPRAS</a>
    <a href="/index.php/usuario/usuario/enderecos">ENDEREÇOS</a>
    <a href="/index.php/usuario/usuario/infos">INFORMAÇÕES</a>
    <a href="/index.php/usuario/usuario/sair">SAIR</a>
</subnav>
<section>
    <a href="/index.php/usuario/usuario/novoendereco" class="iconUrubu">
        <i class="bi bi-plus"></i>
    </a>
    <div class="flex-column center-secondary">
        <p>ENDEREÇOS</p>
        <table>
            <tr>
                <th>CEP</th>
                <th>Logradouro</th>
                <th>Complemento</th>
                <th>Número</th>
                <th>Bairro</th>
                <th>Cidade</th>
                <th>UF</th>
            </tr>
            <?php foreach ($listaEnderecos as $endereco) : ?>
                <tr>
                    <td><?= $endereco->getCep(); ?></td>
                    <td><?= $endereco->getLogradouro(); ?></td>
                    <td><?= $endereco->getComplemento(); ?></td>
                    <td><?= $endereco->getNumero(); ?></td>
                    <td><?= $endereco->getBairro(); ?></td>
                    <td><?= $endereco->getCidade(); ?></td>
                    <td><?= $endereco->getUF(); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</section>