<style type="text/css">
    .dayName {
        padding: 5px;
        border-bottom: 1px solid black;
    }
    .weekend {
        color: red;
    }

    .now {
        color: black;
        font-weight: 600;
    }

</style>
<?php
if (isset($_POST["month"])) {
    $varMonth = $_POST["month"];
    if ($varMonth == 0) {
        $varMonth = date("m");
    }
    $calendar = '<table>';

    $daysName = array('Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб', 'Вс');
    $calendar .= '<tr>';
    for ($i = 0; $i <= 6; $i++) {
        $calendar.= '<th class="dayName';

        if ($i != 0) {
            if (($i % 5 == 0) || ($i % 6 == 0)) {
                $calendar .= ' weekend';
            }
        }
        $calendar .= '">';
        $calendar .= '<div>' . $daysName[$i] . '</div>';
        $calendar .= '</th>';
    }
    $calendar .= '</tr>';

    $day = date('w', mktime(0, 0, 0, $varMonth, 1, date('Y')));
    $day = $day - 1;
    if ($day == -1) {
        $day = 6;
    }

    $days_in_month = date('t', mktime(0, 0, 0, $varMonth, 1, date('Y')));
    $counter = 0;
    $days_in_week = 1;

    $calendar .= '<tr>';

    for ($i = 0; $i < $day; $i++) {
        $calendar .= '<td></td>';
        $days_in_week++;
    }

    for ($i = 1; $i <= $days_in_month; $i++) {
        $calendar .= '<td class="';

        if ($day != 0) {
            if (($day % 5 == 0) || ($day % 6 == 0)) {
                $calendar .= ' weekend';
            }
        }
        if ($varMonth == date("m") && $i == date("d")) {
            $calendar .= ' now';
        }
        $calendar .= '">';

        $calendar .= '<div>' . $i . '</div>';
        $calendar .= '</td>';

        if ($day == 6) {
            $calendar .= '</tr>';
            if (($counter + 1) != $days_in_month) {
                $calendar .= '<tr>';
            }
            $day = -1;
            $days_in_week = 0;
        }

        $days_in_week++;
        $day++;
        $counter++;
    }

    $calendar .= '</tr>';
    $calendar .= '</table>';

    echo $calendar;


} else
    include "8.html";
