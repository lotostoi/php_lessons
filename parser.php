<?php

include "chenge.php";


if (isset($_POST['link']) != 0 && isset($_POST['pars'])) {

	$url = $_POST['link'];

	$path = dirname(__FILE__) . '/img';

	$html = file_get_contents($url);

	preg_match_all('/\/[а-я]*\/обои\/[\d]*\/[\w.]*\//iu', $html, $images, PREG_SET_ORDER);
	$i = 0;
	foreach ($images as $val) {
		$ur = "https://www.1zoom.ru$val[0]";
		$strHtml =  file_get_contents($ur);
		preg_match_all('/src=["\']https\:(.*?)big0(.*?).jpg["\']/i', $strHtml, $linkImg, PREG_SET_ORDER);
		$arr[$i++] = $linkImg;
	}

	$k = 0;
	for ($j = 0; $j < count($arr); $j++) {

		if ($arr[$j][0][0]) {
			$new = preg_replace('/src\=/', '', $arr[$j][0][0]);
			$new = preg_replace('/["]/', '', $new);
			$newArr[$k++] = $new;
		}
	}

	for ($i = 0; $i < count($newArr); $i++) {
		$img = file_get_contents("$newArr[$i]");
		$pathImg = "BigImg/$i.jpg";
		file_put_contents($pathImg, $img);
	}

	$listBigImg = scandir('BigImg');
	sort($listBigImg, SORT_NUMERIC | SORT_FLAG_CASE);


	$dif = 0;
	for ($i = 0; $i < count($listBigImg); $i++) {
		$k = $i - $dif;
		$image = new SimpleImage();
		if (preg_match('/.jpg/', $listBigImg[$i])) {
			$image->load("BigImg/$listBigImg[$i]");
			$image->resizeToHeight(130);
			$image->save("SmollImg/$k.jpg");
		} else {
			$dif++;
		}
	}
	$_POST['link'] = "";
}
