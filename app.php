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