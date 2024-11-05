<?php
function render_calendar($month, $year) {
    // 月の日数を取得
    $monthDays = cal_days_in_month(CAL_GREGORIAN, $month, $year);
    // 月初の曜日を取得
    $firstDayOfWeek = date('w', strtotime("$year-$month-01"));

    // カレンダーのテーブルを開始
    echo "<table class='calendar-table'>";
    echo "<tr>";
    
    // 曜日を設定
    $days = ["日", "月", "火", "水", "木", "金", "土"];
    foreach ($days as $day) {
        echo "<th>$day</th>";
    }
    echo "</tr>";

    // 月初の曜日まで空のセルを追加
    echo "<tr>";
    for ($i = 0; $i < $firstDayOfWeek; $i++) {
        echo "<td></td>";
    }

    // 日付を表示
    for ($day = 1; $day <= $monthDays; $day++) {
        echo "<td>$day</td>";
        // 7日ごとに新しい行に移動
        if (($day + $firstDayOfWeek) % 7 == 0) {
            echo "</tr><tr>";
        }
    }
    echo "</tr></table>";
}
?>





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
            <a href="?ym=<?php 
                // 前月のリンク作成
                $currentMonth = isset($_GET['ym']) ? $_GET['ym'] : date('Y-m');
                echo date('Y-m', strtotime('-1 month', strtotime($currentMonth))); 
            ?>">&lt;</a>
            
            <!-- 現在の年月を表示 -->
            <?php
            // 現在の月と年をGETパラメータで取得（無ければデフォルトで現在の年月）
            $currentMonth = isset($_GET['ym']) ? $_GET['ym'] : date('Y-m'); 
            
            // 年月表示
            echo date('Y年n月', strtotime($currentMonth));
            ?>
            
            <!-- 次月のリンク -->
            <a href="?ym=<?php 
                // 次月のリンク作成
                echo date('Y-m', strtotime('+1 month', strtotime($currentMonth))); 
            ?>">&gt;</a>
        </h2>

        <?php
        // 月と年を抽出
        list($year, $month) = explode('-', $currentMonth);

        include 'app.php';
        
        // カレンダー表示
        render_calendar($month, $year);
        ?>
    </div>
</body>

</html>