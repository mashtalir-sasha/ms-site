<?
	if(isset ($_POST['title'])) {$title=$_POST['title'];}
	if(isset ($_POST['subttl'])) {$subttl=$_POST['subttl'];}
	if(isset ($_POST['name'])) {$fio=$_POST['name'];}
	if(isset ($_POST['phone'])) {$phonenum=$_POST['phone'];}
	if(isset ($_POST['step1'])) {$step1=$_POST['step1'];}
	if(isset ($_POST['target'])) {
		foreach ( $_POST['target'] as $key => $value ) {
			$target .= "$value,\n";
		}
	}
	if(isset ($_POST['step3'])) {$step3=$_POST['step3'];}
	if(isset ($_POST['step4'])) {$step4=$_POST['step4'];}
	if(isset ($_POST['step5'])) {$step5=$_POST['step5'];}
	if(isset ($_POST['adv'])) {
		foreach ( $_POST['adv'] as $key => $value ) {
			$adv .= "$value,\n";
		}
	}
	if(isset ($_POST['step7'])) {$step7=$_POST['step7'];}

	$to = "info@ms-digital.top"; // Замениь на емаил клиента

	$message = "Форма: $title <br><br>";
	if ( $subttl || $fio || $phonenum || $step1 || $target || $step3 || $step4 || $step5 || $adv || $step7 ) {
		echo $message .= ""
			. ( $subttl ?" Услуга:  $subttl <br>" : "")
			. ( $fio ?" Имя:  $fio <br>" : "")
			. ( $phonenum ?" Телефон:  $phonenum <br><br>" : "")
			. ( $step1  ? " Сфера деятельности: $step1 <br>" : "")
			. ( $target  ? " Маркетинговые цели: $target <br>" : "")
			. ( $step3  ? " Сколько заявок на сегодняшний день: $step3<br>" : "")
			. ( $step4  ? " Сколько заявок можем обработать в день: $step4 <br>" : "")
			. ( $step5  ? " Бюджет на рекламу: $step5 <br>" : "")
			. ( $adv  ? " Уже использовали: $adv <br>" : "")
			. ( $step7  ? " Подарок: $step7 <br>" : "");
	}

	$headers = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=UTF-8\r\n";
	$headers .= "From: no-reply@ms-digital.top"; // Заменить домен на домен клиента

	if (!$title && !$phonenum) {
	} else {
		mail($to,"New lead(ms-digital.top)",$message,$headers); // Заменить домен на домен клиента
	}
?>