<?php
class UnidadsController extends AppController {
    public $scaffold;
    public $components = array('Mpdf');

    public function index(){
    	$this->layout = 'index';
    	$this->setLogUsuario('Administracion de flota');
    }

 	public function index2(){
    	$this->layout = 'index';
    	$this->setLogUsuario('Habilitar Unidades');
    }

	public function dataTable($limit = ""){
        $rows = array();
        $this->loadModel('Unidad');
        if($limit == "todos"){
            $unidades = $this->Unidad->find('all');
        }else{
            $unidades = $this->Unidad->find('all',array('limit' => $limit));
        }
        foreach ($unidades as $unidad) {
        	$estado = ($unidad['Unidad']['estado'])?'Activa':'Inactiva';
        	$excluir = ($unidad['Unidad']['excluir'])?'Si':'No';

        	$rows[] = array(
                $unidad['Unidad']['id'],
                $unidad['Unidad']['orden'],
                $unidad['Categoria']['categoria'],
                $unidad['Unidad']['marca'],
                $unidad['Unidad']['modelo'],
                $unidad['Unidad']['patente'],
                $unidad['Unidad']['km'],
                $unidad['Unidad']['habilitacion'],
                $unidad['Unidad']['periodo'],
                $unidad['Unidad']['baja'],
                $estado,
                $excluir
            );

        }


        $this->set('aaData',$rows);
        $this->set('_serialize', array(
            'aaData'
        ));
    }

	public function dataTable2($limit = ""){
        $rows = array();
        $this->loadModel('Unidad');
        if($limit == "todos"){
            $unidades = $this->Unidad->find('all',array('conditions' => (array('Categoria.activa' => 1)), 'recursive' => 2));
        }else{
            $unidades = $this->Unidad->find('all',array('limit' => $limit,'conditions' => (array('Categoria.activa' => 1)), 'recursive' => 2));
        }
        foreach ($unidades as $unidad) {

        	$activa = ($unidad['Unidad']['activa'])?'Si':'No';
        	$rows[] = array(
                $unidad['Unidad']['id'],
                $unidad['Categoria']['categoria'],
                $unidad['Unidad']['marca'],
                $unidad['Unidad']['modelo'],
                $unidad['Unidad']['patente'],
                $activa
            );

        }


        $this->set('aaData',$rows);
        $this->set('_serialize', array(
            'aaData'
        ));
    }

	public function crear(){
        $this->layout = 'form';
		//lista de unidades
        $this->set('categorias', $this->Unidad->Categoria->find('list'));

    }

    public function editar($id = null){
        $this->layout = 'form';
        $this->set('categorias', $this->Unidad->Categoria->find('list'));
		$this->Unidad->id = $id;
        $this->request->data = $this->Unidad->read();
        $unidad = $this->request->data;

        $this->set('unidad', $this->Unidad->read());
    }

	public function editar2($id = null){
        $this->layout = 'form';
        $this->set('categorias', $this->Unidad->Categoria->find('list'));
		$this->Unidad->id = $id;
        $this->request->data = $this->Unidad->read();
        $unidad = $this->request->data;

        $this->set('unidad', $this->Unidad->read());
    }

	public function guardar(){



        //print_r($this->request->data);
        if(!empty($this->request->data)) {

         	//vaildo reserva
            $unidad = $this->request->data['Unidad'];
            $this->Unidad->set($unidad);
            if(!$this->Unidad->validates()){
                $errores['Unidad'] = $this->Unidad->validationErrors;
            }

            //muestro resultado
            if(isset($errores) and count($errores) > 0){
                $this->set('resultado','ERROR');
                $this->set('mensaje','No se pudo guardar');
                $this->set('detalle',$errores);
            }else{

                $this->Unidad->save();



                $this->set('resultado','OK');
                $this->set('mensaje','Datos guardados');
                $this->set('detalle','');
            }
            $this->set('_serialize', array(
                'resultado',
                'mensaje' ,
                'detalle'
            ));
        }
    }

}
?>
