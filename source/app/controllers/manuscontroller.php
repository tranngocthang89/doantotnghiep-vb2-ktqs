<?php
	class ManusController extends AppController{
		function beforeAction () {
		}
		function admin_index(){
			// $this->Drug->showHasOne();
			// $this->Drug->orderBy('ten','ASC');
			// $this->Drug->setLimit('15');
			$manus = $this->Manu->find();
			$this->set('manus',$manus);
		}
		function admin_add(){
			if(isset($_POST['Manu']) && !empty($_POST['Manu'])){
				//var_dump($_POST['Manu']);
				if($this->Manu->save()){
					$this->redirect(array('controller'=>'manus','action'=>'index'));
				}
			}
		}
		function admin_edit($id = null){
			$manu = $this->Manu->read($id);

			if(isset($_POST['Manu']) && !empty($_POST['Manu'])){
				$this->Manu->id = $id;
				if($this->Manu->save()){
					$this->redirect(array('controller'=>'manus','action'=>'index'));
				}
			}
			$this->set(compact('manu','manus'));
		}
		function admin_delete($id){
			if($this->_ischild($id) == false){
				$this->Manu->id = $id;
				$this->Manu->delete();
			}
			$this->redirect(array('controller'=>'manus','action'=>'index'));
		}
		function _ischild($id){
			$c1 = $this->Manu->query("SELECT COUNT(*) as tong FROM drugs WHERE manus_id='$id'");
			$c2 = $this->Manu->query("SELECT COUNT(*) as tong FROM equips WHERE manus_id='$id'");
			if($c1[0][""]['tong'] >0 || $c2[0][""]['tong']>0)
				return true;
			return false;
		}
		function admin_multidel($str = null){
			if($str!=null){
				$ar = explode(',', $str);

				foreach ($ar as   $v) {
					if(!empty($v) && is_numeric($v)){
						if($this->_ischild($v) == false){
							$this->Manu->id = $v;
							$this->Manu->delete();
						}
					}
				}
			}
			$this->redirect(array('controller'=>'manus','action'=>'index'));
		}
		function admin_search($q){
			$this->_view = "manus/admin_index";
			$aq 	= explode(':',$q);
			$q = "";
			if(!empty($aq[1]) && strtolower($aq[1]) != "all")
			{
				$array['extend'] = " MATCH(Manu.ten) AGAINST ('+".$aq[1]."*' IN BOOLEAN MODE)";
				//$array['ten LIKE'] = '%'.$aq[1].'%';
				$q = $aq[1];
			}
			$this->Manu->where($array);
			$manus = $this->Manu->find();
			$this->set(compact("manus",'q'));

		}
		function admin_reader(){
			$mgs = "";
			if(isset($_POST['Manu']) && !empty($_POST['Manu']))
			{
				$fileupload = CommonsController::upload($_FILES,'file','files/temps/');
				if($fileupload != '1' && $fileupload != '2')
				{
					$excel = new Spreadsheet_Excel_Reader(WEBROOT."/files/temps/".$fileupload);
					$sheet = 0;
					for($row=2;$row<=($excel->rowcount($sheet));$row++)
					{
						$this->data = array();
						if(!$excel->sheets[$sheet]['cellsInfo'][$row][$col]['dontprint'])
						{
							$ten = $excel->val($row,1);
							$gioithieu = $excel->val($row,2);
							$trangthai = $excel->val($row,3);

							$this->data['Manu']['ten'] = $ten;
							$this->data['Manu']['gioithieu'] = $gioithieu;
							$this->data['Manu']['trangthai'] = (string)$trangthai;
						}
						//debug($this->data);

						if(!$this->Manu->save($this->data)){
							$mgs = "Có lỗi trong quá trình nhập dữ liệu. Xuất hiện lỗi ở bản ghi số :".($i);
							break;
						}
					}
					@unlink(WEBROOT."/files/temps/".$fileupload);
					$mgs = "Quá trình nhập đã hoàn tất!";
				}else{
					$mgs = "File upload không đúng!";
				}

			}
			$this->set(compact('mgs'));
		}
		function afterAction () {
		}
	}
?>