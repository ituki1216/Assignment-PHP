<?php
function render_calendar($month, $year) {
    //月の取得をおこないます
    $monthDays= cal_days_in_month(CAL_GREGORIAN, $month, $year)
}