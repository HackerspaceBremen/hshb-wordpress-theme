<?php

$cal_url = 'https://www.google.com/calendar/embed?showCalendars=0&amp;showTitle=0&amp;height=600&amp;wkst=2&amp;bgcolor=%23FFFFFF&amp;src=laej7omuttmt8ip063lmie548k%40group.calendar.google.com&amp;color=%230F4B38&amp;ctz=Europe%2FBerlin';

$content = file_get_contents($cal_url);

#$content = str_replace('</head>','<link rel="stylesheet" href="http://www.hackerspace-bremen.de/google.css" /></head>', $content);

$content = str_replace('</title>','</title><base href="https://www.google.com/calendar/" />', $content);

echo $content;

?>
