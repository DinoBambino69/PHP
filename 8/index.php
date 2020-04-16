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
        $calendar .= '<th class="dayName';

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

    $arrweek = array();
    $counter = 0;
    $begin = new DateTime();
    $begin->setDate(date('Y'), $varMonth, 1);
    $step = new DateInterval('P1D');
    $period = new DatePeriod($begin, $step, date('t', mktime(0, 0, 0, $varMonth)) - 1);

    foreach ($period as $value) {
        $days_in_week = date('w', $value->getTimestamp());
        $days_in_week--;
        if ($days_in_week == -1) {
            $days_in_week = 6;
        }
        $arrweek[$counter][$days_in_week] = date('d', $value->getTimestamp());
        if ($days_in_week == 6) $counter++;
    }


    for ($i = 0; $i < count($arrweek); $i++) {
        $calendar .= "<tr>";
        for ($j = 0; $j < 7; $j++) {
            if (!empty($arrweek[$i][$j])) {
                if ($varMonth == date("m") && $arrweek[$i][$j] == date('d')) {
                    $calendar .= "<td class='now'><div>" . $arrweek[$i][$j] . "</div></td>";
                }
                elseif ($j == 6 || $j == 5) {
                    $calendar .= "<td class='weekend'><div>" . $arrweek[$i][$j] . "</div></td>";
                }
                else $calendar .= "<td><div>" . $arrweek[$i][$j] . "</div></td>";

            } else $calendar .= "<td></td>";
        }
        $calendar .= "</tr>";
    }

    $calendar .= "</table>";

    echo $calendar;


} else
    include "8.html";