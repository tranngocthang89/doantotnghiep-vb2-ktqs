<div class="mass mass-top clearfix">
    <div class="boxheader boxheader-main clearfix">
        <h3><?php echo $html->img('img/icon-home.png');?> :: Tìm kiếm</h3>
        <div class="pagination">
            <ul>
                <li><?php echo $html->link("All",array('controller'=>'drugs','action'=>'index'),array('class'=>'item'));?></li>
                <?php foreach ($alpa as $key => $value) {?>
                <li><?php echo $html->link($value,array('controller'=>'drugs','action'=>'label/key:'.$key),array('class'=>'item'));?></li>
                <?php }?>
            </ul>
        </div>
        <div class="row">
            <form action="<?php echo BASE_PATH;?>/commons/find" method="POST" class="span12">
                <input type="hidden" name="model" value="<?php echo $this->_controller;?>" />
                <div class="span4">
                    <input type="text" placeholder="Từ khóa" name= 'q' class="span12">
                    <select name="distribute" id="distribute" class="span12">
                        <option value="">Nhà phân phối</option>
                        <?php
                            foreach ($list_dis as $key => $value) {
                        ?>
                        <option value="<?php echo $value['Distribute']['id'];?>"><?php echo $value['Distribute']['ten'];?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="span4">
                    <select name="type" id="type" class="span12">
                        <option value="All">Nhóm dược lý</option>
                        <?php
                            foreach ($sidebar as $key => $value) {
                        ?>
                        <option value="<?php echo $value['Menu']['id'];?>"><?php echo $value['Menu']['ten'];?></option>
                        <?php }?>
                    </select>
                    <select name="manu" id="manu" class="span12">
                        <option value="All">Nhà sản xuất</option>
                        <?php
                            foreach ($list_manus as $key => $value) {
                        ?>
                        <option value="<?php echo $value['Manu']['id'];?>"><?php echo $value['Manu']['ten'];?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="span3">
                    <input type="submit" name="" class="btn btn-primary" value="Tìm kiếm" />
                </div>
            </form>
        </div>
    </div>
    <div class="boxheader boxheader-main clearfix">
        <h3><?php echo $html->img('img/icon-home.png');?> :: Danh mục thuốc</h3>
        <div class="box-ct clearfix row-fluid">
            <ul class='ulitem row-fluid'>
                <?php foreach ($drugs as $k=> $drug):?>
                <li class='article'>
                    <?php echo $html->link($html->img('files/drugs/'.$drug['Drug']['anh'],array("width"=>'100px',"height"=>'80px')),
                                           array('controller'=>'drugs','action'=>'view/'.$drug['Drug']['id'].'/'.$drug['Drug']['ten']),
                                           array('class'=>"left entry thumbnail"),false);?>
                	<h6 style="word-wrap:none;overflow: hidden;">
                    <?php echo $html->link($drug['Drug']['ten'],array('controller'=>'drugs','action'=>'view/'.$drug['Drug']['id'].'/'.$drug['Drug']['ten']),array('class'=>'item'));?>
            		</h6>
            		<?php //debug( $drug);?>
            		<p class="item">Nhóm dược lý : <?php echo $html->link($drug['Type']['ten'],array('controller'=>'drugs','action'=>'label/Type:'.$drug['Type']['id']),array('class'=>'item'));?></p>
                    <p class="item">Nhà phân phối: <?php echo $html->link($drug['Distribute']['ten'],array('controller'=>'drugs','action'=>'label/Distribute:'.$drug['Distribute']['id']),array('class'=>'item'));?></p>
                    <p class="item">Nhà sản xuất: <?php echo $html->link($drug['Manu']['ten'],array('controller'=>'drugs','action'=>'label/Manu:'.$drug['Manu']['id']),array('class'=>'item'));?></p>
                    <div class='item rates'>
                        <?php echo $view->rateres($drug['Rate_drug'],'drug');?>
                    </div>
                	<div class="clearfix"></div>
                </li>
                <?php if(($k+1)%2==0 && $k>0) echo "<hr class='clearfix'/>";?>
                <?php endforeach?>
                <?php //debug($drug);?>
            </ul>
            <?php echo $this->Drug->paginate();?>

        </div>
    </div>
</div>