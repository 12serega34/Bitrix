<?php
Памятки:
* https://gist.github.com/marvell/8473253 - памятка по типам свойств
* https://dev.1c-bitrix.ru/learning/course/index.php?COURSE_ID=95&LESSON_ID=7817&LESSON_PATH=7785.7817 - курс по битрикс


Всячина:
* local/php_interface/init.php // файл, содержимое которого доступно везде в структуре.
* https://dev.1c-bitrix.ru/api_help/main/reference/cmain/getcurpage.php
	$APPLICATION->GetCurPage(); - Возвращает путь к текущей странице относительно корня. 
	Конструкция помогает блокировать(или наоборот, выводить) отображение определенных элементов для определенных страниц. 
	Если аргумент true - вернет адрес страницы с /index.php. 
	Если аргумент false - вернет путь к папке без /index.php

* id="<?= $this->GetEditAreaId($arItem['ID']); ?>" - не забывать добавлять id в цикл, чтобы отслеживать каждую итерацию цикла.



КЛАССЫ БИТРИКС



КОНСТАНТЫ
* SITE_TEMPLATE_PATH - выдает путь до текущего шаблона
