<div class="heading-buttons">

    <h3 class="glyphicons display"><i></i> Quản lý chuyên khoa</h3>
    <div class="buttons pull-right">
        <?php echo $html->link("<i></i>Thêm mới", array('controller'=>'departments','action'=>'add'),array('class'=>"btn btn-default btn-icon glyphicons edit"),false);?>
    </div>
    <div class="buttons pull-right">
        <?php echo $html->link("<i></i>Nhập Excel", array('controller'=>'departments','action'=>'reader'),array('class'=>"btn btn-default btn-icon glyphicons edit"),false);?>
    </div>
    <div class="clearfix" style="clear: both;"></div>
</div>
<div class="separator"></div>
<div class="row-liquid">
    <form action="<?php echo BASE_PATH;?>/admin/commons/find" method="POST" class="span10">
        <div class="span4">
            <input type="hidden" name="model" value="<?php echo $this->_controller;?>" />
            <input type="text" placeholder="Từ khóa" name= 'q' value="<?php echo isset($q)?$q:"";?>">
        </div>
        <div class="span4">
            <input type="submit" name="" class="btn btn-primary" value="Tìm kiếm" />
        </div>
    </form>
</div>
<div class="separator"></div>
<table class="table table-bordered table-hover" width=100%>
	<tr>
		<th><input type='checkbox' value='' class='checkall' name='checkall' id='checkall' /></th>
        <th>Tên chuyên khoa</th>
		<th>Trạng thái</th>
		<th>Tùy chọn</th>

	</tr>
	 <?php foreach ($departments as $department):?>
    <tr>
    	<td><input type='checkbox' value='<?php echo $department['Department']['id'];?>' name='check'/></td>
    	<td>
    	<?php echo $department['Department']['ten'];?>
    	</td>
        <td><?php echo $html->stt($department['Department']['trangthai']);?></td>
    	<td>
        <?php echo $html->link("Sửa",
                            array('controller'=>'departments','action'=>'edit/'.$department['Department']['id']));?>
         - <?php echo $html->link("Xóa",
                            array('controller'=>'departments','action'=>'delete/'.$department['Department']['id']),null,true);?></td>
    </tr>
    <?php endforeach?>
</table>
<table>
    <tr>
        <td>
            <a href="javascript:void(0);" class="delall">Xóa các mục đã chọn</a>
        </td>
        <td></td>
    </tr>
</table>