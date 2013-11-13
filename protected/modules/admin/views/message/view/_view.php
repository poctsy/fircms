<?php
/* @var $this MessageController */
/* @var $data MessageReply */
?>

<div class="view">
    <?php echo CHtml::encode($data->from_user_id); ?>
    <br />
	<?php echo CHtml::encode($data->content); ?>
	<br />
    <?php echo CHtml::encode($data->create_time); ?>


    <br />
    <br />


</div>