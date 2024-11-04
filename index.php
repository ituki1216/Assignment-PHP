<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>月送りカレンダー</title>
    <style>
        .calendar-table {
            width: 100%;
            border-collapse: collapse;
        }
        .calendar-table th, .calendar-table td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }
        .calendar-table th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>
            <a href="?ym=<?php echo date('Y-m', strtotime('-1 month')); ?>">&lt;</a>
            <?php echo date('Y年n月'); ?>
            <a href="?ym=<?php echo date('Y-m', strtotime('+1 month')); ?>">&gt;</a>
        </h2>

        <?php
        // カレンダー表示用のPHPをインクルード
        include 'app.php';
        
        // 現在の月と年を取得
        $month = date('n'); 
        $year = date('Y'); 

        // カレンダー表示
        render_calendar($month, $year);
        ?>
    </div>
</body>

</html>


http://localhost:8080/calendar/index.php