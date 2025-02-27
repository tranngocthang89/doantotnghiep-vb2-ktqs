 
	 <?php //debug($type);?>
    <?php echo $form->create("Type",array('controller'=>'types','action'=>'edit/'.$type['Type']['id']));?>
    <h4>Cập nhật thông tin nhóm dược lý</h4>
    <hr class="separator">
    <div class="row-fluid">
      <div class="span8">
        <?php echo $session->setFlash("Type");?>
        <div class="control-group">
          <label class="control-label" for="firstname">Tên nhóm dược lý</label>
          <div class="controls">
            <?php echo $form->input('ten',array('class'=>'span12','id'=>'ten','value'=>$type['Type']['ten']));?>
        </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="lastname">Thông tin chung</label>
          <div class="controls">
            <?php echo $form->textarea('mota',$type['Type']['mota'],array('class'=>'span12','id'=>'mota'));?>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="trangthai">Trạng thái</label>
          <div class="controls">
            <?php echo $form->select('trangthai',array(1=>"Hiển thị",0=>"Ẩn"),array('empty'=>false,'selected'=>$type['Type']['trangthai']));?>
          </div>
        </div>
      </div>
    </div>
    <hr class="separator">
    <div class="form-actions">
      <button type="submit" class="btn btn-icon btn-primary glyphicons circle_ok"><i></i>Save</button>
      <button type="reset" class="btn btn-icon btn-default glyphicons circle_remove"><i></i>Cancel</button>
    </div>
 