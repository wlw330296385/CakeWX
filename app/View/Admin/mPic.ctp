<?php
	$this->extend('/Common/Admin/index');
	
	// load script
	$this->Html->script(array(
		"/assets/js/bootbox.min",
		"Action/webchat",
		"Action/twPreview",
	), array('block' => "script_extra", 'inline' => false));
?>
<div style="margin-bottom:15px">
	<button class="btn btn-sm btn-primary radius5" onclick="location.href='<?= "{$WC_URL}?_a=add" ?>'">
		<i class="icon-plus align-top bigger-125"></i>
		添加单图文
	</button>
    <button class="btn btn-sm btn-primary radius5" onclick="location.href='<?= "{$WC_URL}?_a=add" ?>'">
        <i class="icon-plus align-top bigger-125"></i>
        添加多图文
    </button>
</div>
<div class="a_types">
    <ul class="ttp cl">
        <li id="ttp_all" class="a"><a href="<?php echo $WC_URL; ?>">全部</a></li>
		<?php foreach ($data['category'] as $key => $vals): ?>
			 <li>
				<a href="<?php echo $vals['link']; ?>"><?php echo $vals['name']; ?>
					<?php if ($vals['count']): ?>
						<span class="num"><?php echo $vals['count']; ?></span>
					<? endif ?>
				</a>
			</li>
		<? endforeach ?>
    </ul>
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="table-responsive">
			<table id="sample-table-1" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th class="al-center">图文类型</th>
                        <th>图文名称</th>
						<th>创建时间</th>
						<th>更新时间</th>
						<th>
							<i class="icon-time bigger-110 hidden-480"></i>
							操作
						</th>
					</tr>
				</thead>

				<tbody>
					<? if (is_array($data['datalist'])): ?>
						<? foreach ($data['datalist'] as $key => $vals): ?>
							<tr>
                                <td class="al-center">
                                    <?php switch ($vals['WxDataTw']['FType']) {
                                          case 0:
                                    ?>
                                    <?= $this->Html->image("img.png", array('title' => '单图文')) ?>
                                    <?php
                                              break;
                                          case 1:
                                    ?>
                                    <?= $this->Html->image("imgs.png", array('title' => '多图文')); ?>
                                    <?php
                                              break;
                                          default:
                                    ?>
                                    <?= "无类型"; ?>
                                    <?} ?>
                                   <!-- <?= $vals['WxDataTw']['C_FType'] ?> -->
                                </td>
								<td>
									<?= $vals['WxDataTw']['FTitle'] ?>
								</td>

								<td class="hidden-480">
									<p><?= $vals['WxDataTw']['FCreatedate'] ?></p>
								</td>
								<td>
									<p><?= $vals['WxDataTw']['FUpdatedate'] ?></p>
								</td>

								<td>
									<div class="visible-md visible-lg hidden-sm hidden-xs btn-group">

										<button class="btn btn-xs btn-info" onclick="parent.location.href='<?php echo "{$WC_URL}?_a=edit&_id={$vals['WxDataTw']['Id']}" ?>'">
											<i class="icon-edit bigger-120" title="编辑"></i>
										</button>

										<button class="btn btn-xs btn-danger bootbox-confirm" alt="<?php echo "{$WC_URL}?_a=del&_id={$vals['WxDataTw']['Id']}" ?>">
											<i class="icon-trash bigger-120" title="删除"></i>
										</button>
										
										<button class="btn btn-xs btn-warning twPreview" id="<?php echo $vals['WxDataTw']['Id'] ?>">
											<i class="icon-search bigger-120" title="预览"></i>
										</button>
									</div>
								</td>
							</tr>
						<? endforeach ?>
					<? endif ?>
				</tbody>
			</table>
			<ul class='pagination' style="margin-top:0">
				<?php 
					echo $this->Paginator->hasPrev() ? $this->Paginator->prev(
					  '« 上一页',
					  array('tag' => "li"),
					  null,
					  array('class' => 'disabled', 'tag' => "li", 'disabledTag' => "a")
					) : '';
					echo $this->Paginator->numbers(array('tag' => "li", 'separator' => "", 'currentClass' => "active", 'currentTag' => "a"));
				
					// Shows the next and previous links
					echo $this->Paginator->hasNext() ? $this->Paginator->next(
					  '下一页 »',
					  array('tag' => "li"),
					  null,
					  array('class' => 'disabled', 'tag' => "li", 'disabledTag' => "a")
					) : '';
				 ?>
			 </ul>
		</div><!-- /.table-responsive -->
	</div>
</div>