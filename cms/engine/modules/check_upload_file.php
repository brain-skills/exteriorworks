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
	
	$file = '';
	
	// Проверка загруженного файла
	if (isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK) {
		$dir = 'uploads/files/' . $folder . '/' . date('Y') . '/' . date('m') . '/';
		$uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/' . $dir;
	
		if (!is_dir($uploadDir)) {
			mkdir($uploadDir, 0777, true);
		}
	
		$file_count = count(scandir($uploadDir)) - 1;
		$fileName = $p_id . '_' . $file_count . '_' . basename($_FILES['file']['name']);
		$filePath = $uploadDir . $fileName;
	
		if (move_uploaded_file($_FILES['file']['tmp_name'], $filePath)) {
			$file = $dir . $fileName;
		} else {
			die("Не удалось переместить загруженный файл.");
		}
	}
	
	// Если новый файл не загружен, используем текущее значение из БД (если оно есть)
	if (empty($file)) {
		// Подключение к базе данных (предполагается, что $db_connect уже установлено)
		$sqlfile = "SELECT file_path FROM $folder WHERE id = ? AND file_path IS NOT NULL AND file_path != ''";
		$stmtfile = $db_connect->prepare($sqlfile);
	
		if ($stmtfile === false) {
			die("MySQL prepare statement failed: " . $db_connect->error);
		}
	
		$stmtfile->bind_param('i', $p_id);
		$stmtfile->execute();
		$resultfile = $stmtfile->get_result();
	
		if ($resultfile->num_rows > 0) {
			$row = $resultfile->fetch_assoc();
			$file = $row['file_path'];
		} else {
			die("Файл не найден в базе данных.");
		}
	
		$stmtfile->close();
	}
	
	// Теперь обновляем запись в базе данных
	$updateSql = "UPDATE $folder SET file_path = ? WHERE id = ?";
	$stmtupdate = $db_connect->prepare($updateSql);
	
	if ($stmtupdate === false) {
		die("MySQL prepare statement failed: " . $db_connect->error);
	}
	
	$stmtupdate->bind_param('si', $file, $p_id);
	if (!$stmtupdate->execute()) {
		die("Ошибка выполнения запроса: " . $stmtupdate->error);
	}