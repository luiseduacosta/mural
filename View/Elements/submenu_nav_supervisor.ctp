<nav class='navbar navbar-expand-lg navbar-light py-0 navbar-fixed-top' style="background-color: #2b6c9c;">
    <?php $logo = $this->Html->image('logoess_horizontal-azul.svg', ['height' => '50', 'width' => '150', 'alt' => 'ESS']); ?>
    <?= $this->Html->link($logo, "http://www.ess.ufrj.br", ['class' => 'navbar-brand', 'style' => 'color: white', 'escape' => false]) ?>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarPrincipal">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div style='font-size: 90%', class='collapse navbar-collapse' id='navbarPrincipal'>
        <ul class="navbar-nav mr-auto">

            <li class="nav-item active">
                <?php echo $this->Html->link("Mural", ['controller' => 'Murals', 'action' => 'index'], ['class' => 'nav-link', 'style' => 'color: white;']); ?>
            </li>

            <li class="nav-item">
                <?php echo $this->Html->link("Termo de compromisso", "/Inscricaos/termosolicita", ['class' => 'nav-link', 'style' => 'background-color: #2b6c9c; color: white;']); ?>
            </li>
            <li class="nav-item">
                <?php echo $this->Html->link("Folha de avaliação discente", "/Alunos/avaliacaosolicita", ['class' => 'nav-link', 'style' => 'background-color: #2b6c9c; color: white']); ?>
            </li>
            <li class="nav-item">
                <?php echo $this->Html->link("Formulário de avaliação discente on-line", "/Avaliacoes/busca_dre", ['class' => 'nav-link', 'style' => 'background-color: #2b6c9c; color: white']); ?>
            </li>
            <li class="nav-item">
                <?php echo $this->Html->link("Folha de atividades", "/Alunos/folhasolicita", ['class' => 'nav-link', 'style' => 'background-color: #2b6c9c; color: white']); ?>
            </li>
            <li class="nav-item">
                <?php echo $this->Html->link("Folha de atividades on-line", "/folhadeatividades/busca_dre", ['class' => 'nav-link', 'style' => 'background-color: #2b6c9c; color: white']); ?>
            </li>
            <li class="nav-item">
                <?php echo $this->Html->link("Declaração de estágio", "/Estagiarios/view?registro=" . $this->Session->read('numero'), ['class' => 'nav-link', 'style' => 'background-color: #2b6c9c; color: white']); ?>
            </li>

            <li class = "nav-item">
                <?php echo $this->Html->link('Grupo Google', 'https://groups.google.com/forum/#!forum/estagio_ess', ['class' => 'nav-link', 'style' => 'background-color: #2b6c9c; color: white']); ?>
            </li>
            <li class = "nav-item">
                <?php echo $this->Html->link('Fale conosco', 'mailto: estagio@ess.ufrj.br', ['class' => 'nav-link', 'style' => 'background-color: #2b6c9c; color: white']); ?>
            </li>

            <li class="nav-item">
                <?php echo $this->Html->link("Meus dados", "/Alunonovos/view?registro=" . $this->Session->read('numero'), ['class' => 'nav-link', 'style' => 'background-color: #2b6c9c; color: white']); ?>
            </li>
            <li class = "nav-item">
                <?php echo $this->Html->link('Sair', '/Users/logout/', ['class' => 'nav-link', 'style' => 'background-color: #2b6c9c; color: white']); ?>
            </li>

        </ul>

    </div>
</nav>
