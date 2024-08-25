<?php

class AreasController extends AppController
{

    public $name = "Areas";
    public $components = array('Auth', 'Paginator', 'Flash');

    public function beforeFilter()
    {

        parent::beforeFilter();
        // Admin
        if ($this->Session->read('id_categoria') == '1') {
            $this->Auth->allow();
            // $this->Session->setFlash("Administrador");
            // Estudantes
        } elseif ($this->Session->read('id_categoria') == '2') {
            $this->Auth->allow('index', 'view');
            // $this->Session->setFlash("Estudante");
        } elseif ($this->Session->read('id_categoria') == '3') {
            $this->Auth->allow('index', 'view');
            // $this->Session->setFlash("Professor");
            // Professores, Supervisores
        } elseif ($this->Session->read('id_categoria') == '4') {
            $this->Auth->allow('index', 'view');
            // $this->Session->setFlash("Professor/Supervisor");
        } else {
            $this->Session->setFlash("Não autorizado");
            $this->redirect('/murals/index/');
        }
        // die(pr($this->Session->read('user')));
    }

    public function index()
    {

        $this->Area->virtualFields['virtualMinPeriodo'] = 'min(Estagiario.periodo)';
        $this->Area->virtualFields['virtualMaxPeriodo'] = 'max(Estagiario.periodo)';

        $this->Paginator->settings = array(
            'fields' => array('Area.id', 'Area.area', 'Professor.id', 'Professor.nome', 'Professor.departamento', 'min(Estagiario.periodo) as Area__virtualMinPeriodo', 'max(Estagiario.periodo) as Area__virtualMaxPeriodo'),
            'limit' => 10,
            'order' => 'Area.area',
            'group' => array('Estagiario.id_professor', 'Estagiario.id_area')
        );

        $this->set('areas', $this->Paginator->paginate($this->Area->Estagiario));
        // $this->set('areas', $areas);
    }

    public function lista()
    {

        $this->Paginator->settings = [
            'Area' => [
                'order' => ['area'],
                'limit' => 10
            ]
        ];

        $this->set("areas", $this->Paginator->paginate('Area'));
    }

    public function view($id = NULL)
    {

        $area = $this->Area->find('first', array(
            'conditions' => array('Area.id' => $id)
        )
        );
        // pr($supervisor);

        $this->set('area', $area);
    }

    public function edit($id = NULL)
    {

        $this->Area->id = $id;

        if (empty($this->data)) {
            $this->data = $this->Area->read();
        } else {
            if ($this->Area->save($this->data)) {
                // print_r($this->data);
                $this->Flash->success(__("Atualizado"));
                $this->redirect('/Areas/view/' . $id);
            }
        }
    }

    public function add()
    {

        if ($this->data) {
            if ($this->Area->save($this->data)) {
                $this->Flash->success(__('Dados inseridos'));
                $this->redirect('/Areas/view/' . $this->Area->getLastInsertId());
            }
        }
    }

    public function delete($id = NULL)
    {

        $area = $this->Area->find('first', array(
            'conditions' => array('Area.id' => $id)
        )
        );

        // $this->loadModel('Estagiario');
        $estagiarios = $this->Area->Estagiario->find('first', array(
            'conditions' => 'Estagiario.id_area = ' . $id
        )
        );
        // pr($estagiarios);

        if ($estagiarios) {
            $this->Flash->error(__("Error: Há estagiários vinculados com esta área"));
            // die("Estagiarios vinculados com essa área");
            $this->redirect('/Areas/view/' . $id);
        } else {
            $this->Area->delete($id);
            $this->Flash->success(__("Área excluída"));
            // die("Área excluída");
            $this->redirect('/Areas/index/');
        }
    }

}

?>