<?php
include_once ("360_safe3.php");
include_once ("config.php");
if (isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['xlh'])) {
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$xlh = $_POST['xlh'];
	$sql = "select id from perfectpeople where phone='" . $phone . "'";
	$result = mysql_query($sql);
	$num = mysql_num_rows($result);
	mysql_free_result($result);
	if ($num == 0) {
		$sql = "update perfectpeople set name='" . $name . "',phone='" . $phone . "' where guid='" . $xlh . "'";
		if (mysql_query($sql)) {
			// 将guid传入新的页面，让用户输入信息。
			if (mysql_affected_rows()) {
				echo "{\"code\":1,\"message\":\"恭喜你，获得流量了，活动结束后我们会统一给大家操作哦，请耐心等待。\"}";
			} else {
				echo "{\"code\":2,\"message\":\"不要想作弊呦。\"}";
			}
		} else {
			echo "{\"code\":2,\"message\":\"哎呦，服务器抽风了，过会再来呦!\"}";
		}
	} else {
		echo "{\"code\":2,\"message\":\"已经获的流量了，告诉朋友们快来拿流量。\"}";
	}
	mysql_close();
} else {
	echo "{\"code\":3,\"message\":\"数据各式不正确\"}";
}
?>