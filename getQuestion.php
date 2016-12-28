<?php
include_once("360_safe3.php");
include_once ("config.php");

$questionIdArray = getRandomQuestionId($v_question_count, $v_question_select_num);
$questionIdStr = arrayToStr($questionIdArray);
$questionsJson = getQuestionJson($questionIdStr);
echo $questionsJson;

// 获取随机题目id,countId为id总数，no为随机n道题目。
function getRandomQuestionId($CountId, $no) {
	$numbers = range(1, $CountId);
	//shuffle 将数组顺序随即打乱
	shuffle($numbers);
	//少出一道题，然后放入一个我们希望的题目
	$result = array_slice($numbers, 0, $no-1);

	// 作弊，将某些题着重出现，题目id 为多少区间的
	// array_push($result,rand(257,258));
	array_push($result, $CountId);
	return $result;
}

// 将array形式转化为字符串
function arrayToStr($questionIdArray) {
	$questionIdStr = "";
	for ($i = 0; $i < count($questionIdArray); $i++) {
		$questionIdStr = $questionIdStr . strval($questionIdArray[$i]) . ",";
	}
	return substr($questionIdStr, 0, -1);
}

// 获取问题的详细数据，返回json格式
function getQuestionJson($questionIdStr) {
	$sql = "select * from questions where id in (" . $questionIdStr . ")";
	$result = mysql_query($sql);
	$num = mysql_num_rows($result);
	if ($num == 0) {
		echo "网络错误！";
		mysql_close();
	}
	$tmpId = 0;
	$questionsArray = Array();
	while ($rs = mysql_fetch_object($result)) {
		$question = new StdClass;
		$question -> id = $rs -> id;
		$question -> content = $rs -> content;
		$question -> answer1 = $rs -> answer1;
		$question -> answer2 = $rs -> answer2;
		$question -> answer3 = $rs -> answer3;
		$question -> answer4 = $rs -> answer4;
		$question -> answer5 = $rs -> answer5;
		$question -> answer6 = $rs -> answer6;
		$question -> answer7 = $rs -> answer7;
		$question -> answer8 = $rs -> answer8;
		$question -> isMult = $rs -> isMult;
		$questionsArray[$tmpId] = $question;
		$tmpId++;
	}
	$questionsJson = json_encode($questionsArray);
	mysql_free_result($result);
	mysql_close();
	return $questionsJson;
}

// 测试代码
//$questions = array();
//for ($x = 0; $x < 2; $x++) {
//	$question = array("id" => $x, "content" => "题目内容题目内容题目内容题目内容" . rand(100000, 20000), "answer1" => rand(1, 4), "answer2" => rand(1, 4), "answer3" => rand(1, 4), "answer4" => rand(1, 4), "answer5" => rand(1, 4), "answer6" => rand(1, 4), "answer7" => rand(1, 4), "isMult" => rand(0, 1));
//	$questions[$x] = $question;
//}
//$jsdata = json_encode($questions);
//echo $jsdata;
?>
