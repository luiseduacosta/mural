<?php
// pr($estagios);
?>

<div class='container'>

    <?= $this->element('submenu_alunonovos') ?>
    <?php if ($alunos['Alunonovo']['nomesocial']): ?>
        <h1 class='h2'>
            <?php echo $alunos['Alunonovo']['nome'] . " - Nome social: " . $alunos['Alunonovo']['nomesocial']; ?>
        </h1>
        <h1 class='h4'>
            <?php echo "Ingresso: " . $alunos['Alunonovo']['ingresso'] . " - " . ' Turno: ' . $alunos['Alunonovo']['turno']; ?>
        </h1>
    <?php else: ?>
        <h1 class='h2'>
            <?php echo $alunos['Alunonovo']['nome']; ?>
        </h1>
        <h1 class='h4'>
            <?php echo "Ingresso: " . $alunos['Alunonovo']['ingresso'] . " - " . ' Turno: ' . $alunos['Alunonovo']['turno']; ?>
        </h1>
    <?php endif; ?>

    <div class="row">
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#estudante" role="tab" aria-controls="Instituição"
                    aria-selected="true">Estudante</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#inscricoes" role="tab"
                    aria-controls="Inscrições para seleção de estágio" aria-selected="false">Inscrições para seleção</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#estagios" role="tab" aria-controls="Estágios cursados"
                    aria-selected="false">Estágios cursados</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="tab-content">
            <div id="estudante" class="tab-pane container fade show active">

                <table class='table table-striped table-hover table-responsive'>
                    <tr>
                        <td style='text-align:left'>Registro:
                            <?php echo $alunos['Alunonovo']['registro']; ?>
                        </td>
                        <td style='text-align:left'>CPF:
                            <?php echo $alunos['Alunonovo']['cpf']; ?>
                        </td>
                        <td style='text-align:left'>Cartera de identidade:
                            <?php echo $alunos['Alunonovo']['identidade']; ?>
                        </td>
                        <td style='text-align:left'>Orgão:
                            <?php echo $alunos['Alunonovo']['orgao']; ?>
                        </td>
                    </tr>
                    <tr style='text-align:left'>
                        <td style='text-align:left'>Nascimento:
                            <?= isset($alunos['Alunonovo']['nascimento']) ? date('d-m-Y', strtotime($alunos['Alunonovo']['nascimento'])) : ""; ?>
                        </td>
                        <td style='text-align:left'>Email:
                            <?php echo $alunos['Alunonovo']['email']; ?>
                        </td>
                        <td style='text-align:left'>Telefone:
                            <?php echo "(" . $alunos['Alunonovo']['codigo_telefone'] . ")" . $alunos['Alunonovo']['telefone']; ?>
                        </td>
                        <td style='text-align:left'>Celular:
                            <?php echo "(" . $alunos['Alunonovo']['codigo_celular'] . ")" . $alunos['Alunonovo']['celular']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style='text-align:left'>CEP:
                            <?php echo $alunos['Alunonovo']['cep']; ?>
                        </td>
                        <td style='text-align:left'>Endereço:
                            <?php echo $alunos['Alunonovo']['endereco']; ?>
                        </td>
                        <td style='text-align:left'>Bairro:
                            <?php echo $alunos['Alunonovo']['bairro']; ?>
                        </td>
                        <td style='text-align:left'>Municipio:
                            <?php echo $alunos['Alunonovo']['municipio']; ?>
                        </td>
                    </tr>
                </table>
                <?php if (($this->Session->read('id_categoria') == '2') && ($this->Session->read('numero') == $alunos['Alunonovo']['registro'])): ?>
                    <p>
                        <?php echo $this->Html->link('Editar', '/Alunonovos/edit/' . $alunos['Alunonovo']['id'], ['role' => 'button', 'type' => 'button', 'class' => 'btn btn-danger']); ?>
                    </p>
                <?php endif; ?>
                <?php if ($this->Session->read('id_categoria') == '1'): ?>
                    <p>
                        <?php echo $this->Html->link('Editar', '/Alunonovos/edit/' . $alunos['Alunonovo']['id'], ['role' => 'button', 'type' => 'button', 'class' => 'btn btn-danger']); ?>
                    </p>
                <?php endif; ?>
            </div>

            <div id="inscricoes" class="tab-pane container fade">
                <?php if ($inscricoes): ?>

                    <h1 class='h3 text-center'>Inscrições para seleção de estágio</h1>

                    <div class='table-responsive'>
                        <table class='table table-striped table-hover table-responsive'>
                            <caption style="caption-side: top">Inscrições realizadas</caption>
                            <?php foreach ($inscricoes as $c_inscricao): ?>
                                <tr>

                                    <?php if ($this->Session->read('id_categoria') === 1): ?>
                                        <td>
                                            <?php echo $this->Html->link('Excluir', '/Inscricaos/delete/' . $c_inscricao['Inscricao']['id'], NULL, 'Confirma?'); ?>
                                        </td>
                                        <td>
                                            <?php echo $this->Html->link($c_inscricao['Mural']['instituicao'], '/Inscricaos/view/' . $c_inscricao['Inscricao']['id']); ?>
                                        </td>
                                        <td>
                                            <?php echo $c_inscricao['Mural']['periodo']; ?>
                                        </td>
                                    <?php else: ?>
                                        <td>
                                            <?php echo $this->Html->link('Inscrição', '/Inscricaos/view/' . $c_inscricao['Inscricao']['id']); ?>
                                        </td>
                                        <td>
                                            <?php echo $this->Html->link($c_inscricao['Mural']['instituicao'], '/Inscricaos/index/' . $c_inscricao['Mural']['id']); ?>
                                        </td>
                                        <td>
                                            <?php echo $c_inscricao['Mural']['periodo']; ?>
                                        </td>
                                    <?php endif; ?>

                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>

                <?php endif; ?>
            </div>

            <div id="estagios" class="tab-pane container fade">
                <?php if ($estagios): ?>
                    <h1 class='h3 text-center'>Estágios cursados</h1>
                    <div class='table-responsive'>
                        <table class='table table-striped table-hover table-responsive'>
                            <tr>
                                <?php if ($this->Session->read('id_categoria') == '1'): ?>
                                    <th>Ações</th>
                                <?php endif; ?>
                                <th>Ação</th>
                                <th>Período</th>
                                <th>Modalidade</th>
                                <th>Nível</th>
                                <th>Turno</th>
                                <th>TC</th>
                                <th>Instituição</th>
                                <th>Supervisor</th>
                                <th>Professor</th>
                                <th>Área</th>
                                <th>Ajuste 2020</th>
                                <th>Nota</th>
                                <th>CH</th>
                            </tr>

                            <?php foreach ($estagios as $aluno_estagio): ?>
                                <?php // pr($aluno_estagio['Estagiario']); ?>
                                <?php // die(); ?>
                                <?php if ($aluno_estagio['Estagiario']['ajuste2020'] == '0'): ?>
                                    <?php $cargaHoraria = '120'; ?>
                                <?php elseif ($aluno_estagio['Estagiario']['ajuste2020'] == '1'): ?>
                                    <?php $cargaHoraria = '135'; ?>
                                <?php endif; ?>
                                <?php if (($aluno_estagio['Estagiario']['nota'] < '5') || ($aluno_estagio['Estagiario']['ch'] < $cargaHoraria)): ?>
                                    <tr class='bg-warning'>
                                    <?php else: ?>
                                    <tr>
                                    <?php endif; ?>
                                    <td>
                                        <?php if ($this->Session->read('id_categoria') == '1'): ?>
                                            <?= $this->Html->link('Ação', '/Estagiarios/view/' . $aluno_estagio['Estagiario']['id']); ?>
                                        <?php else: ?>
                                            <?= $this->Html->link('Ação', '/Estagiarios/view/' . $aluno_estagio['Estagiario']['id']); ?>
                                        <?php endif; ?>
                                    </td>

                                    <td>
                                        <?php echo $aluno_estagio['Estagiario']['periodo'] ?>
                                    </td>
                                    <td>
                                        <?php echo $aluno_estagio['Complemento']['periodo_especial'] ?>
                                    </td>
                                    <?php if ($aluno_estagio['Estagiario']['nivel'] == '9'): ?>
                                        <td style='text-align:center'>
                                            <?php echo 'Não obrigatório'; ?>
                                        </td>
                                    <?php else: ?>
                                        <td style='text-align:center'>
                                            <?php echo $aluno_estagio['Estagiario']['nivel']; ?>
                                        </td>
                                    <?php endif; ?>
                                    <td style='text-align:center'>
                                        <?php echo $aluno_estagio['Estagiario']['turno']; ?>
                                    </td>
                                    <td style='text-align:center'>
                                        <?php echo $aluno_estagio['Estagiario']['tc']; ?>
                                    </td>
                                    <td>
                                        <?php echo $this->Html->link($aluno_estagio['Instituicao']['instituicao'], '/Instituicaos/view/' . $aluno_estagio['Estagiario']['id_instituicao']); ?>
                                    </td>
                                    <td>
                                        <?php echo $this->Html->link($aluno_estagio['Supervisor']['nome'], '/Supervisors/view/' . $aluno_estagio['Estagiario']['id_supervisor']); ?>
                                    </td>
                                    <td>
                                        <?php echo $this->Html->link($aluno_estagio['Professor']['nome'], '/Professors/view/' . $aluno_estagio['Estagiario']['id_professor']); ?>
                                    </td>
                                    <td>
                                        <?php echo $this->Html->link($aluno_estagio['Area']['area'], '/Areas/view/' . $aluno_estagio['Estagiario']['id_area']); ?>
                                    </td>
                                    <?php if ($aluno_estagio['Estagiario']['ajuste2020'] == '0'): ?>
                                        <td style='text-align:center'>Não</td>
                                    <?php elseif ($aluno_estagio['Estagiario']['ajuste2020'] == '1'): ?>
                                        <td style='text-align:center'>Sim</td>
                                    <?php endif; ?>
                                    <td style='text-align:center'>
                                        <?php echo $aluno_estagio['Estagiario']['nota']; ?>
                                    </td>
                                    <td style='text-align:center'>
                                        <?php echo $aluno_estagio['Estagiario']['ch']; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                <?php else: ?>
                    <p>
                        <?= $this->Html->link('Declaração de período', ['controller' => 'Alunonovos', 'action' => 'certificadoperiodo', $alunos['Alunonovo']['id']], ['role' => 'button', 'type' => 'button', 'class' => 'btn btn-warning']); ?>
                    </p>
                <?php endif; ?>

                <?php if (isset($nao_obrigatorio) && !(empty($nao_obrigatorio))): ?>
                    <h2>Estágios não obrigatórios</h2>
                    <div class='table-responsive'>
                        <table class='table table-striped table-hover table-responsive'>
                            <?php foreach ($nao_obrigatorio as $aluno_nao_estagio): ?>
                                <tr>
                                    <?php if ($this->Session->read('categoria') === 'administrador'): ?>
                                        <td>
                                            <?php echo $this->Html->link('Ver', '/Estagiarios/view/' . $aluno_nao_estagio['Estagiario']['id']); ?>
                                        </td>
                                    <?php endif; ?>

                                    <td>
                                        <?php echo $aluno_nao_estagio['Estagiario']['periodo'] ?>
                                    </td>
                                    <td>
                                        <?php echo $aluno_estagio['Complemento']['periodo_especial'] ?>
                                    </td>
                                    <td style='text-align:center'>
                                        <?php echo "Não obrigatório"; ?>
                                    </td>
                                    <td style='text-align:center'>
                                        <?php echo $aluno_nao_estagio['Estagiario']['turno']; ?>
                                    </td>
                                    <td style='text-align:center'>
                                        <?php echo $aluno_nao_estagio['Estagiario']['tc']; ?>
                                    </td>
                                    <td>
                                        <?php echo $this->Html->link($aluno_nao_estagio['Instituicao']['instituicao'], '/Instituicaos/view/' . $aluno_nao_estagio['Estagiario']['id_instituicao']); ?>
                                    </td>
                                    <td>
                                        <?php echo $this->Html->link($aluno_nao_estagio['Supervisor']['nome'], '/Supervisors/view/' . $aluno_nao_estagio['Estagiario']['id_supervisor']); ?>
                                    </td>
                                    <td>
                                        <?php echo $this->Html->link($aluno_nao_estagio['Professor']['nome'], '/Professors/view/' . $aluno_estagio['Estagiario']['id_professor']); ?>
                                    </td>
                                    <td>
                                        <?php echo $this->Html->link($aluno_nao_estagio['Area']['area'], '/Areas/view/' . $aluno_nao_estagio['Estagiario']['id_area']); ?>
                                    </td>
                                    <td style='text-align:center'>
                                        <?php echo $aluno_nao_estagio['Estagiario']['nota']; ?>
                                    </td>
                                    <td style='text-align:center'>
                                        <?php echo $aluno_nao_estagio['Estagiario']['ch']; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                <?php endif; ?>
                <?php if ($this->Session->read('id_categoria') == '1'): ?>
                    <p>
                        <?php echo $this->Html->link('Inserir estágio', '/Estagiarios/add?registro=' . $alunos['Alunonovo']['registro'], ['role' => 'button', 'type' => 'button', 'class' => 'btn btn-success']); ?>
                    </p>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>