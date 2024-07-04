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

    // Функция для генерации блока с пагинацией
    function generatePagination($currentPage, $totalPages) {
        $pagination = [];
        // Определение количества отображаемых кнопок на пагинации
        $numVisibleButtons = 5;
        // Определение начальной и конечной страниц для отображения
        $start = max($currentPage - floor($numVisibleButtons / 2), 1);
        $end = min($start + $numVisibleButtons - 1, $totalPages);
        // Коррекция начальной страницы, чтобы не выйти за границы
        $start = max(1, $end - $numVisibleButtons + 1);
        // Генерация видимых кнопок
        for ($i = $start; $i <= $end; $i++) {
            $pagination[] = ['label' => $i, 'number' => $i, 'class' => ($i == $currentPage) ? 'active' : ''];
        }
        return $pagination;
    }