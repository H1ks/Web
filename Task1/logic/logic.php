<?php
    $data = [
        ['Иванов', 'Математика', 5],
        ['Иванов', 'Математика', 4],
        ['Иванов', 'Математика', 5],
        ['Петров', 'Математика', 5],
        ['Сидоров', 'Физика', 4],
        ['Иванов', 'Физика', 4],
        ['Петров', 'ОБЖ', 4],
    ];

    $result_output = [];

    foreach ($data as $item) {
        $surname = $item[0];
        $subject = $item[1];
        $grade = $item[2];
    
        if (!isset($result_output[$surname])) {
            $result_output[$surname] = [];
        }
    
        if (isset($result_output[$surname][$subject])) {
            $result_output[$surname][$subject] += $grade;
        } else {
            $result_output[$surname][$subject] = $grade;
        }
        
    }

    function generateTableFromResultOutput($result_output)
    {
        $subjectData = [];
        foreach ($result_output as $surname => $subjects) {
            foreach ($subjects as $subject => $grade) {
                if (!isset($subjectData[$subject])) {
                    $subjectData[$subject] = [];
                }
                $subjectData[$subject][$surname] = $grade;
            }
        }

        $tableHTML = '<table border="1">';
        $tableHTML .= '<tr><th>Фамилия</th>';

        // Выводим заголовки предметов
        foreach ($subjectData as $subject => $students) {
            $tableHTML .= '<th>' . $subject . '</th>';
        }
        $tableHTML .= '</tr>';

        // Выводим фамилии и оценки по предметам
        foreach ($result_output as $surname => $subjects) {
            $tableHTML .= '<tr>';
            $tableHTML .= '<td>' . $surname . '</td>';

            foreach ($subjectData as $subject => $students) {
                $grade = isset($students[$surname]) ? $students[$surname] : '';
                $tableHTML .= '<td>' . $grade . '</td>';
            }

            $tableHTML .= '</tr>';
        }

        $tableHTML .= '</table>';

        return $tableHTML;
    }
    
?>



