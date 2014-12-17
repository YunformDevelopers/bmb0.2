<?php
require 'includes/includes.inc.php';
connect();
$result2=mysql_query("select * from answer where id='".$_GET['id']."'") or die(mysql_error());
$rows2=mysql_fetch_assoc($result2);
$result1=mysql_query("select * from question where form_id='".$rows2['form_id']."'");
					$rows1=mysql_fetch_assoc($result1);
					$title=$rows1['form_title'];
					$string=explode('$$$que_end', $rows1['question_string']);
					$answer=explode('$$$ans_all', $rows2['answer_string']);
					$question_amount=count(explode('$$$que_end', $rows1['question_string']));
					for($i=0;$i<count($answer)-1;$i++){
						$answer_array[$i]=explode('$$$ans_end', $answer[$i]);
					}
					echo '
					<script>
						function showBtn(id){
							$id = $(id);
							$id.children(\'.btn\').show();	
						}
						function hideBtn(id){
							$id = $(id);
							$id.children(\'.btn\').hide();
						}
					</script>
					<style>
					.box .box-table {
						width:100%;
						border-collapse:collapse;
					}
					.box .box-table td {
						padding:5px;
						border:solid 1px #ccc;
					}
					.box .box-table tr:nth-child(even) {
						bachground:f7f7f7;
					}
					.box .box-table .q-number {
						text-align:center;
					}
					.box .box-table .q-title {
						font-weight:bold;
					}
					.box .box-table .q-body {
						position:relative;
					}
					.box .box-table .copy {
						position:absolute;
						right: 2px;
						bottom: 4px;
					}
					
					</style>';
					echo '<div id="form-field">';
					echo '<table class="box-table" cellspacing="0" cellpadding="0" >';
				for($i=0;$i<count($string)-1;$i++){
					$explode1 = explode('$$$quetit_end', $string[$i]);
					$question = $explode1[0];
					$explode2 = explode('$$$quetyp_end', $explode1[1]);
					$type=$explode2[0];
					$choice=explode('$$$quebod_end', $explode2[1]);
					$re=end($choice);
					if($re=='required'){
						$re='required="required"';
					}else{
						$re='';
					}
					echo '<tr id="" class="q'.($i+1).' q-field '.$type.'">';
					echo '<td class="q-number" style=""><span>'.($i+1).'</span></td>';
					echo '';
					if($type=="free-multichoice"){
						echo '<td class="q-title"><span class="q-title">'.$question.'(多选)</span>';
					}
					else {
						echo '<td class="q-title"><span class="q-title">'.$question.'</span>';
					}
					if($re){
						echo '<span class="q-alternative">*</span></td>';
					}
					echo '<td class="q-body" onmouseover="showBtn(this);" onmouseout="hideBtn(this);" >';
					if($type=="logic-sex"){
						for($j=0;$j<count($choice)-1;$j++){
							if(in_array($choice[$j], $answer_array[$i])){
								echo '<label><input disabled="disabled" name="q'.($i+1).'-body" type="radio" '.$re.' value="'.$choice[$j].'" checked="checked"/>'.$choice[$j].'</label>';
							}else{
								echo '<label><input disabled="disabled" name="q'.($i+1).'-body" type="radio" '.$re.' value="'.$choice[$j].'"/>'.$choice[$j].'</label>';
							}
						}
					}
					if($type=="free-multichoice")
					for($j=0;$j<count($choice)-1;$j++){
						echo '<label><input disabled="disabled" name="q'.($i+1).'-'.$choice[$j].'" type="checkbox" '.$re.' value="'.$choice[$j].'"/>'.$choice[$j].'</label>';
					}
					if($type=="free-singlechoice")
					for($j=0;$j<count($choice)-1;$j++){
						if(in_array($choice[$j], $answer_array[$i])){
							echo '<label><input disabled="disabled" name="q'.($i+1).'-body" type="radio" '.$re.' value="'.$choice[$j].'" checked="checked"/>'.$choice[$j].'</label>';
						}
						else{
							echo '<label><input disabled="disabled" name="q'.($i+1).'-body" type="radio" '.$re.' value="'.$choice[$j].'"/>'.$choice[$j].'</label>';
						}
					}
					if($type=="free-multiline"){
						echo '<p name="q'.($i+1).'-body" class="body edit">'.$answer_array[$i][0].'</p>';
					}
					if($type=="free-singleline"){
						echo '<p class="body edit">'.$answer_array[$i][0].'</p>';
					}
					if($type=="logic-name"){
						echo '<p class="body edit">'.$answer_array[$i][0].'</p>';
					}
					if($type=="logic-studentID"){
						echo '<p class="body edit">'.$answer_array[$i][0].'</p>';
					}
					if($type=="logic-address"){
						echo '<p class="body edit">'.$answer_array[$i][0].'</p>';
					}
					if($type=="logic-tel"){
						echo '长号：<p class="long-tel body edit">'.$choice[0].'</p>短号：<p class="short-tel body edit" >'.$choice[1].'</p>';
					}
					if($type=="logic-email"){
						echo '<p class="body edit">'.$answer_array[$i][0].'</p>';
					}
					if($type=="logic-class"){
						echo '<p class="body edit">'.$answer_array[$i][0].'</p>';
					}
					if($type=="free-file"){
						echo '<p><input disabled="disabled" type="file" name="q'.($i+1).'-body" class="body edit" '.$re.' ></input></p>';
					}
					echo '<input class=" copy btn green" type="button" value="复制"></input>';
					echo '</td>';
					echo '';
					echo '</tr>';
				}
				echo '
					</table>
					</div>';

