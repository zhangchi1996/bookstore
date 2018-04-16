<?php

	#数据库连接
	@$link = mysqli_connect($host,$user,$password,$database);
	if (!$link) {
		echo "数据库连接失败".mysqli_connect_error();
	} else {
		mysqli_set_charset($link, "utf8");
	}

?>