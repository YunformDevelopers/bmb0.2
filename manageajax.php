<?php
require 'includes/includes.inc.php';
$string=explode('-', $_GET['data']);
$question_num=$string[0];
$id=$string[1];
connect();
$result=mysql_query("select * from answer where form_id='".$id."'");
$j=1;
while($rows=mysql_fetch_assoc($result)){
									$string="";
									$answer_array=explode('$$$ans_all',$rows['answer_string']);
									$answer=explode('$$$ans_end',$answer_array[intval($question_num)-1]);
									if(strpos($answer[0],'$_FILES-')===0){
										$filename=explode('$_FILES-', $answer[0]);
										echo '
										<tr class="a-all-msg" id="'.$rows['id'].'" onClick="aAllMsgPopOver();">
	 									<td class="col-1 a-order">
	 									'.($j++).'
	 									</td>
										<a href="uploads/'.$filename[1].'">
	 									<td class="col-2 a-content">';
										echo '<a href="uploads/'.$filename[1].'">'.'点击我查看文件'.'</a>
										</td>
							 			<td class="col-3 q-number">
							 			</td>
							 			<td class="col-4 a-time">
							 			'.$rows['date'].'
							 			</td>
							 			</tr>
										';
									}else{
										$string="";
										$answer_array=explode('$$$ans_all',$rows['answer_string']);
										$answer=explode('$$$ans_end',$answer_array[intval($question_num)-1]);
										echo '<tr class="a-all-msg" id="'.$rows['id'].'" onClick="aAllMsgPopOver();">
	 									<td class="col-1 a-order">
	 									'.($j++).'
	 									</td>
	 									<td class="col-2 a-content">';
										for($i=0;$i<count($answer)-1;$i++){
											$string.=$answer[$i].";";
										}
										echo $string.'</td>
							 			<td class="col-3 q-number">
							 			</td>
							 			<td class="col-4 a-time">
							 			'.$rows['date'].'
							 			</td>
							 			</tr>';
									}
									
									
								
							}