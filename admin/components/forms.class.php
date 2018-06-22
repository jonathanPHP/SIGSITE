<?php
/*PROJECTED BY JONATHAN DAVID 2013*/
class form{
/*------------FORM-------------*/
public function open($action, $method, $enctype=''){
echo '<form class="form-horizontal" action="'.$action.'" method="'.$method.'" enctype="'.$enctype.'"><fieldset>';
}
public function close($submit){
echo '<div class="form-actions">
		<input type="hidden" name="form" value="form"/>
		<button type="submit" class="btn btn-primary">'.$submit.'</button>
		<button class="btn">Cancelar</button>
	  </div></fieldset></form>';
}
/*----------ELEMENTS-----------*/
public function element_open($legend=''){
echo '<div class="control-group">
		<label class="control-label" for="Legend">'.$legend.'</label>
	<div class="controls">';
}
public function element_close(){
echo '</div></div>';
}
public function help($legend){
echo  '<span class="help-inline">'.$legend.'</span>';
}
/*-----------INPUT------------*/
public function input($type, $class, $name, $id, $value='', $accept=''){
/*
THE CLASS ADMITED BY THE FUNCTION CAN BE
auto;datepicker;focused;disabled
THE TYPE ADMITED BY THE FUNCTION CAN BE
text;file;hidden
*/
if ($class=='disabled'){$readonly = 'readonly';}else{$readonly = '';}
echo '<input class="input-xlarge '.$class.'" id="'.$id.'" name="'.$name.'" type="'.$type.'" value="'.$value.'" accept="'.$accept.'"'.$readonly.'>';
}
/*-----------SELECT------------*/
public function select($id, $name, array $options, array $values, $selected='', $status=''){
$qtd_options = count($options);
echo '<select id="'.$id.'" name="'.$name.'" '.$status.'>';
	for ($i=0;$i<$qtd_options;$i++){								
	echo '<option value="'.$values[$i].'" ';
	if ($values[$i]==$selected){echo 'selected';}
	echo '>'.$options[$i].'</option>';
	}
echo '</select>';
}
/*-----------BUTTONS------------*/
public function buttons($type, array $names, array $options, array $values, array $status=null, array $selecteds=null){
/*
THE STATUS ADMITED BY THE FUNCTION CAN BE
abled; disabled
THE TYPE ADMITED BY THE FUNCTION CAN BE
checkbox; radio
*/
$qtd_options = count($options);
for ($i=0;$i<$qtd_options;$i++){
if (isset($status[$i])){	
if($status[$i]==1){
$disabled = 'disabled';}else{$disabled='';}
}
else{$disabled='';}
if (isset($selecteds[$i])){
if($selecteds[$i]==1){
$selected = 'checked';}else{$selected='';}
}
else{$selected='';}
echo '<label class="checkbox inline">';
echo '<input type="'.$type.'" name="'.$names[$i].'" value="'.$values[$i].'"'.$selected.' '.$disabled.'>'.$options[$i];
echo '</label>';
}
}
/*-----------TEXTAREA------------*/
public function textarea($name, $value='', $class='ckeditor', $rows=3, $cols=3){
echo '<textarea class="ckeditor" id="'.$name.'" name="'.$name.'" rows="'.$rows.'" cols="'.$cols.'">'.$value.'</textarea>';
}
public function labels($message, $type=''){
/*
THE TYPE ADMITED BY THE FUNCTION CAN BE
success; warning; important; info; inverse
*/
if ($type!=''){$mode = 'label-'.$type;}else{$mode='';}
echo '<span class="label '.$mode.'">'.$message.'</span>';
}
/*-----------NOTIFICATIONS------------*/
public function boxes(array $message, $id, $type='', $close=1){
/*
THE TYPE ADMITED BY THE FUNCTION CAN BE
success; error; info; block
*/
if ($type!=''){$mode = 'label-'.$type;}else{$mode='';}
echo '<div class="alert alert-'.$type.'"><center style="font-weight:bold;font-size:18px;">';
if ($close==1){
echo '<button type="button" class="close" data-dismiss="alert">x</button>';
}
echo $message[$id].'</center></div>';
}
}
?>