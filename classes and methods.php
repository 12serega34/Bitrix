<?php

***подключаем класс для работы с модулями***
 	require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");
		CModule::IncludeModule('iblock'); // 

***
	* Использовать метод getNext. getNextElement устарел
	* Если нужно вывести свойство, нужно в arSelectFields указывать (PROPERTY_НАЗВАНИЕСВОЙСТВА(оно берется из настроек свойств))

***
CIBlockElement() - для работы с ЭЛЕМЕНТАМИ инфоблоков (записями и т.д.)
	GetList - получает элементы инфоблока
	GetNext - передает элементы инфоблока
	SetPropertyValuesEx - добавляет значения в свойства инфоблока

		CIBlockElement::GetList( //GetList работает не по инфоблоку, а по всем элементам, поэтому нужно выполнять жесткую выборку 
		 array arOrder = Array("SORT"=>"ASC"), // метод сортировки
		 array arFilter = Array('nPageSize' => 20), //выборка - по каким параметрам выбираем элемент
		 mixed arGroupBy = false, // порядок сортировки; mixed arGroupBy = array('' => 20)
		 mixed arNavStartParams = false, //Параметры для постраничной навигации
		 array arSelectFields = Array('ID', 'NAME') //столбец, по которому производится выборка
		);

***
CIBlockProperty() - для работы со свойствами информационных разделов (разделы, по которым сортируются/распределяются инфоблоки)

***
CFile() - Класс для работы с файлами и изображениями
	MakeFileArray - для добавления картинок 


CIBlockResult()
	




для D7 - пока не изучали
$dbItems = \Bitrix\Iblock\ElementTable::getList(array(
	'order' => array('SORT' => 'ASC'), // сортировка
	'select' => array('ID', 'NAME', 'IBLOCK_ID', 'SORT', 'TAGS'), // выбираемые поля, без свойств. Свойства можно получать на старом ядре \CIBlockElement::getProperty
	'filter' => array('IBLOCK_ID' => 4), // фильтр только по полям элемента, свойства (PROPERTY) использовать нельзя
	'group' => array('TAGS'), // группировка по полю, order должен быть пустой
	'limit' => 1000, // целое число, ограничение выбираемого кол-ва
	'offset' => 0, // целое число, указывающее номер первого столбца в результате
	'count_total' => 1, // дает возможность получить кол-во элементов через метод getCount()
	'runtime' => array(), // массив полей сущности, создающихся динамически
	'data_doubling' => false, // разрешает получение нескольких одинаковых записей
	'cache' => array( // Кеш запроса, почему-то в офф. документации об этом умалчивают
	'ttl' => 3600,
	'cache_joins' => true
	),
));



"MODIFIED_BY"    => $USER->GetID() //сюда добавляем 1 - типа как меняет пользователь с id = 1
"IBLOCK_ID" => '' // ID инфоблока, в который добавляем раздел




