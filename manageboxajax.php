<?php
require 'includes/includes.inc.php';
connect();
$result2=mysql_query("select * from answer where id='".$_GET['id']."'") or die(mysql_error());
$rows2=mysql_fetch_assoc($result2);
$result1=mysql_query("select * from question where form_id='".$rows2['form_id']."'");
					$rows1=mysql_fetch_assoc($result1);
					$title=$rows1['form_title'];
					$string=explode('δ', $rows1['question_string']);
					$answer=explode('δ', $rows2['answer_string']);
					$question_amount=count(explode('δ', $rows1['question_string']));
					for($i=0;$i<count($answer)-1;$i++){
						$answer_array[$i]=explode('γ', $answer[$i]);
					}
					echo '<div id="form-field">';
					echo '<div id="form-title">';
					echo '<h3>'.$title.'</h3>';
					echo '</div>';
					echo '<div id="form-intro" >
           '.$rows1['form_intro'].'
        </div>
        <ul id="form-body">
        	<form method="post" enctype="multipart/form-data" action="formaction.php?action=update&id='.$_GET['id'].'&amount='.($question_amount-1).'">';
				for($i=0;$i<count($string)-1;$i++){
					$explode1 = explode('α', $string[$i]);
					$question = $explode1[0];
					$explode2 = explode('β', $explode1[1]);
					$type=$explode2[0];
					$choice=explode('γ', $explode2[1]);
					$re=end($choice);
					if($re=='required'){
						$re='required="required"';
					}else{
						$re='';
					}
					echo '<li id="" class="q'.($i+1).' q-field '.$type.'">';
					echo '<div class="q-number"><span>'.($i+1).'</span></div>';
					echo '<div class="q-whole">';
					if($type=="free-multichoice"){
						echo '<div class="q-title">'.$question.'(多选)</div>';
					}
					else {
						echo '<div class="q-title">'.$question.'</div>';
					}
					if($re){
						echo '<div class="q-alternative">*</div>';
					}
					echo '<div class="q-body">';
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
						echo '<textarea disabled="disabled" name="q'.($i+1).'-body" class="body edit">'.$answer_array[$i][0].'</textarea>';
					}
					if($type=="free-singleline"){
						echo '<input disabled="disabled" type="text" name="q'.($i+1).'-body" class="body edit" '.$re.' value="'.$answer_array[$i][0].'">';
					}
					if($type=="logic-name"){
						echo '<input disabled="disabled" type="text" name="q'.($i+1).'-body" class="body edit" '.$re.' value="'.$answer_array[$i][0].'"/>';
					}
					if($type=="logic-studentID"){
						echo '<input disabled="disabled" type="number" name="q'.($i+1).'-body" class="body edit" '.$re.' value="'.$answer_array[$i][0].'"/>';
					}
					if($type=="logic-address"){
						echo '<input disabled="disabled" type="text" name="q'.($i+1).'-body" class="body edit" '.$re.' value="'.$answer_array[$i][0].'"/>';
					}
					if($type=="logic-tel"){
						echo '<input disabled="disabled" type="tel" name="q'.($i+1).'-body" class="body edit" '.$re.' value="'.$answer_array[$i][0].'"/>';
					}
					if($type=="logic-email"){
						echo '<input disabled="disabled" type="email" name="q'.($i+1).'-body" class="body edit" '.$re.' value="'.$answer_array[$i][0].'"/>';
					}
					if($type=="logic-class"){
						echo '<input disabled="disabled" type="text" name="q'.($i+1).'-body" class="body edit" '.$re.' value="'.$answer_array[$i][0].'"/>';
					}
					if($type=="free-file"){
						echo '<input disabled="disabled" type="file" name="q'.($i+1).'-body" class="body edit" '.$re.' ></input>';
					}
					echo '</div>';
					echo '</div>';
					echo '</li>';
				}
				echo '
					</form>
					</ul>';

