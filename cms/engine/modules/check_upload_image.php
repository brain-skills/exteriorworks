<?php
    /*
    =====================================================
    Skills Energy - by MEGA Media Group
    -----------------------------------------------------
    https://skills.energy/license
    -----------------------------------------------------
    Copyright (c) 2023-2024 MEGA Media Group
    =====================================================
    This code is protected by copyright
    =====================================================
    */
	
	if (empty($folder) || empty($p_id)) {
		die("Не указаны необходимые параметры.");
	}
	
	$image = '';
	
	// Проверка загруженного изображения (не с редактора)
	if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
		$dir = 'uploads/images/' . $folder . '/' . date('Y') . '/' . date('m') . '/';
		$uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/' . $dir;
	
		if (!is_dir($uploadDir)) {
			mkdir($uploadDir, 0777, true);
		}
	
		$file_count = count(scandir($uploadDir)) - 1;
		$imageName = $p_id . '_' . $file_count . '_' . basename($_FILES['image']['name']);
		$imagePath = $uploadDir . $imageName;
	
		if (move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
			$image = $dir . $imageName;
		} else {
			die("Не удалось переместить загруженный файл.");
		}
	}
	
	// Если новое изображение не загружено, используем текущее значение из БД (если оно есть)
	if (empty($image)) {
		// Подключение к базе данных (предполагается, что $db_connect уже установлено)
		$sqlimage = "SELECT image FROM $folder WHERE id = ? AND image IS NOT NULL AND image != ''";
		$stmtimage = $db_connect->prepare($sqlimage);
	
		if ($stmtimage === false) {
			die("MySQL prepare statement failed: " . $db_connect->error);
		}
	
		$stmtimage->bind_param('i', $p_id);
		$stmtimage->execute();
		$resultimage = $stmtimage->get_result();
	
		if ($resultimage->num_rows > 0) {
			$row = $resultimage->fetch_assoc();
			$image = $row['image'];
		} else {
			die("Изображение не найдено в базе данных.");
		}
	
		$stmtimage->close();
	}
	
	// Теперь обновляем запись в базе данных
	$updateSql = "UPDATE $folder SET image = ? WHERE id = ?";
	$stmtupdate = $db_connect->prepare($updateSql);
	
	if ($stmtupdate === false) {
		die("MySQL prepare statement failed: " . $db_connect->error);
	}
	
	$stmtupdate->bind_param('si', $image, $p_id);
	if (!$stmtupdate->execute()) {
		die("Ошибка выполнения запроса: " . $stmtupdate->error);
	}