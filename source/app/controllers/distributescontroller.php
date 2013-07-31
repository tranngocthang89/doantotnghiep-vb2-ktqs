<?php
	class DistributesController extends AppController{
		function beforeAction () {
		}
		function admin_index(){
			// $this->Drug->showHasOne();
			// $this->Drug->orderBy('ten','ASC');
			// $this->Drug->setLimit('15');
			$distributes = $this->Distribute->find();
			$this->set('distributes',$distributes);
		}
		function admin_add(){
			if(isset($_POST['Distribute']) && !empty($_POST['Distribute'])){
				if($this->Distribute->save()){
					$this->redirect(array('controller'=>'distributes','action'=>'index'));
				}
			}
		}
		
		function admin_edit($id = null){
			$distribute = $this->Distribute->read($id);
			if(isset($_POST['Distribute']) && !empty($_POST['Distribute'])){
				$this->Distribute->id = $id;
				if($this->Distribute->save()){
					$this->redirect(array('controller'=>'distributes','action'=>'index'));
				}
			}
			$this->set(compact('distribute','distribute'));
		}
		function admin_delete($id){
			$this->Distribute->id = $id;
			$this->Distribute->delete();
			$this->redirect(array('controller'=>'distributes','action'=>'index'));
		}
		function afterAction () {
		}
	}
?>