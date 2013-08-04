 
    <?php echo $form->create("Clinic",array('controller'=>'clinics','action'=>'edit/'.$clinic['Clinic']['id']));?>
    <h4>Cập nhật thông tin phòng khám</h4>
    <hr class="separator">
    <div class="row-fluid">
      <div class="span8">
        <?php echo $session->setFlash("Clinic");?>
        <div class="control-group">
            <label class="control-label" for="ten">Tên phòng khám</label>
            <div class="controls">
              <?php echo $form->input('ten',array('class'=>'span12','id'=>'ten','value'=>$clinic['Clinic']['ten']));?>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="daidien">Người đại diện</label>
          <div class="controls">
              <?php echo $form->input('daidien',array('class'=>'span12','id'=>'daidien','value'=>$clinic['Clinic']['daidien']));?>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="chuyenkhoa">Chuyên khoa</label>
          <div class="controls">
              <?php echo $form->input('chuyenkhoa',array('class'=>'span12','id'=>'chuyenkhoa','value'=>$clinic['Clinic']['chuyenkhoa']));?>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="diachi">Địa chi</label>
          <div class="controls">
              <?php echo $form->input('diachi',array('class'=>'span12','id'=>'diachi','value'=>$clinic['Clinic']['diachi']));?>
          </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="trangthai">Thành phố</label>
            <div class="controls">
              <?php echo $form->select('cities_id',$cities,array('empty'=>false,'selected'=>$clinic['Clinic']['cities_id']));?>
            </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="dienthoai">Điện thoại</label>
          <div class="controls">
              <?php echo $form->input('dienthoai',array('class'=>'span12','id'=>'dienthoai','value'=>$clinic['Clinic']['dienthoai']));?>
          </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="gioithieu">Thông tin</label>
            <div class="controls">
              <?php echo $form->textarea('gioithieu',$clinic['Clinic']['gioithieu'],array('class'=>'span12','id'=>'gioithieu'));?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="map">Vị trí trên bản đồ</label>
            <div class="controls">
               <?php echo $form->input('map',array('class'=>'span12','id'=>'map','value'=>$clinic['Clinic']['map']));?>
            </div>
        </div>
        
       <div class="control-group">
            <label class="control-label" for="trangthai">Trạng thái</label>
            <div class="controls">
              <?php echo $form->select('trangthai',array(1=>"Hiển thị",0=>"Ẩn"),array('empty'=>false,'selected'=>$clinic['Clinic']['trangthai']));?>
            </div>
        </div>
      </div>
    </div>
    <hr class="separator">
    <div class="form-actions">
      <button type="submit" class="btn btn-icon btn-primary glyphicons circle_ok"><i></i>Save</button>
      <button type="reset" class="btn btn-icon btn-default glyphicons circle_remove"><i></i>Cancel</button>
    </div>
 