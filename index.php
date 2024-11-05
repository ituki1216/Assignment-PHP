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
            <!-- 前月のリンク -->
            <a href="?ym=<?php echo date('Y-m', strtotime('-1 month', strtotime($currentMonth))); ?>">&lt;</a>
            
            <!-- 現在の年月を表示 -->
            <?php
            // 現在の月と年をGETパラメータで取得（無ければデフォルトで現在の年月）
            $currentMonth = isset($_GET['ym']) ? $_GET['ym'] : date('Y-m'); 
            
            // 年月表示
            echo date('Y年n月', strtotime($currentMonth));
            ?>
            
            <!-- 次月のリンク -->
            <a href="?ym=<?php echo date('Y-m', strtotime('+1 month', strtotime($currentMonth))); ?>">&gt;</a>
        </h2>

        <?php
        // 月と年を抽出
        list($year, $month) = explode('-', $currentMonth);

        // カレンダー表示用のPHPをインクルード
        include 'app.php';

        // カレンダー表示
        render_calendar($month, $year);
        ?>
    </div>
</body>

</html>
