<div class="row">
    <div class='col-lg-4 order-lg-1 order-2'>
        <h5>Login</h5>
        <?= $this->Form->create('User'); ?>
        <div class="form-group">
            <?= $this->Form->input('email', ['label' => 'Email', 'type' => 'text', 'class' => 'form-control']); ?>
        </div>
        <div class="form-group">
            <?= $this->Form->input('password', ['label' => 'Senha', 'class' => 'form-control']); ?>
        </div>
        <?= $this->Form->input('Login', ['label' => false, 'type' => 'submit', 'class' => 'btn btn-primary position-static']); ?>
        <?= $this->Form->end(); ?>
        <div class="nav nav-tabs justify-content-center">
            <?= $this->Html->link('Esqueceu a senha?', '/Users/cadastro?recadastro=1', ['class' => ['nav-item', 'nav-link']]); ?>
            <?= $this->Html->link('Fazer cadastro', '/Users/cadastro/', ['class' => ['nav-item', 'nav-link']]); ?>
        </div>
    </div>
    <div class='col-lg-8 order-lg-2 order-1'>
        <p>
            Prezadas(os) usuárias(os),
            <br />
            <br />
O Mural de Estágio tem a função de: permitir a consulta e inscrição em vagas de estágio; retirar o Termo de Compromisso, folha de atividades, avaliação do/a supervisor/a, declaração de estágio, dentre outros.
            <br />
            <br />
É a sua primeira vez por aqui? Faça o cadastro com dados completos. Não abrevie seu nome.
            <br />
            <br />
Vai retirar o Termo de Compromisso? Preencha os dados da supervisão de campo e do/a docente de OTP.
            <br />
            <br />
Supervisores/as e docentes também podem fazer o cadastro e contribuir para mantermos atualizados os dados das instituições, assim como seus dados profissionais, incluindo e-mail e telefone.
            <br />
            <br />
Ficou alguma dúvida? Escreva um e-mail detalhado para: estagio@ess.ufrj.br . Estamos à disposição.
            <br />
            <br />
        <p style="text-align: right">Coordenação de Estágio</p>
    </div>
</div>