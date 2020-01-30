<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="theme-color" content="#333" />
        <title>Sistema de retorno de funcionários | Capgemini</title>
        <link rel="stylesheet" href="/css/boot.css">
        <link rel="stylesheet" href="/css/style.css">
    </head>
    <body>
        <section class="row section-padding lotation">

            <div class="wrap-g">

                <h1>FUNCIONÁRIOS ALOCADOS EM SÃO PAULO</h1>

                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NOME</th>
                            <th>DATA_NASCIMENTO</th>
                            <th>CIDADE</th>
                            <th>TELEFONE</th>
                            <th>NOME_POSTO</th>
                            <th>SETOR_POSTO</th>
                            <th>LOTAÇÃO</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($db->getSaoPaulo() as $employee): ?>
                            <tr>
                                <td><?= $employee->getId() ?></td>
                                <td><?= $employee->getNome() ?></td>
                                <td><?= $employee->getData_nascimento() ?></td>
                                <td><?= $employee->getCidade() ?></td>
                                <td><?= $employee->getTelefone() ?></td>
                                <td><?= $employee->getWorkstation()->getNome() ?></td>
                                <td><?= $employee->getWorkstation()->getSetor() ?></td>
                                <td><?= Date('d/m/Y', strtotime($employee->getLotation()->getTempo_de_alocacao())) ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>

            </div>

        </section>


        <section class="row section-padding lotation">

            <div class="wrap-g">

                <h1>TODOS OS FUNCIONÁRIOS</h1>

                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NOME</th>
                            <th>DATA_NASCIMENTO</th>
                            <th>CIDADE</th>
                            <th>TELEFONE</th>
                            <th>NOME_POSTO</th>
                            <th>SETOR_POSTO</th>
                            <th>LOTAÇÃO</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($db->getAll() as $employee): ?>
                            <tr>
                                <td><?= $employee->getId() ?></td>
                                <td><?= $employee->getNome() ?></td>
                                <td><?= $employee->getData_nascimento() ?></td>
                                <td><?= $employee->getCidade() ?></td>
                                <td><?= $employee->getTelefone() ?></td>
                                <td><?= $employee->getWorkstation()->getNome() ?></td>
                                <td><?= $employee->getWorkstation()->getSetor() ?></td>
                                <td><?= Date('d/m/Y', strtotime($employee->getLotation()->getTempo_de_alocacao())) ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>

            </div>

        </section>


    </body>
</html>