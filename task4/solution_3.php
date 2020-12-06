<?php
$template = file_get_contents('./templateForSolution_3.html');
$fields = ['title' => 'Главная страница - страница обо мне', 'h1' => 'Информация обо мне', 'year' => '2018'];

foreach ($fields as $key => $value) {
  $template = str_replace("{{ " . $key . " }}", $fields[$key], $template);
}
echo $template;
