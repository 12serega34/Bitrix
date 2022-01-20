<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule('iblock');


/* ----------------- работаю с элементами инфоблока ---------------*/
$arFilter = [
    'IBLOCK_ID' => 19,
    'ACTIVE' => 'Y',
    'IBLOCK_ACTIVE' => 'Y' //не знаю, за что отвечает фильтр
];

//GetList получает элементы инфоблока по фильтру - выводит только нужные поля по последнему аргументу
$elements = CIBlockElement::GetList(
    ['SORT' => 'ASC'],
    $arFilter,
    false,
    false,
    ['ID', 'NAME', 'PROPERTY_Property', 'PROPERTY_Property1']
);

//GetNext является методом класса CIBlockResult. Но как может $result, являясь объектом класса CIBlockElement вызывать методы класса CIBlockResult? конкретно - GetNext
$result = new CIBlockElement;

while($forOutput = $elements->GetNext()){

    $PropertyValue = $forOutput['PROPERTY_PROPERTY_VALUE'];
    $PropertyValue1 = $forOutput['PROPERTY_PROPERTY1_VALUE'];

    /*добавляем значение в свойство
        //CIBlockElement::SetPropertyValuesEx($forOutput['ID'], false, ['Property' => $PropertyValue , 'Property1' => $PropertyValue1]);
    */

    //добавляем к имени '+1'
    if(!strstr($forOutput['NAME'], '1', true)) {
        $result->Update(
            $forOutput['ID'],
            ['NAME' => $forOutput['NAME'] . '+1']
        );
    }
    //pr($forOutput);
}

/* ----------------- (end) работаю с элементами инфоблока ---------------*/




/* ----------------- создаю новое свойство в информационном разделе ---------------*/

$arFields = Array(
    "NAME" => "Еще одно свойство",
    "ACTIVE" => "Y",
    "SORT" => "600",
    "CODE" => "TWO_PROPERTY",
    "PROPERTY_TYPE" => "S", // не знаю, за что отвечает
    "IBLOCK_ID" => 2, // свойство будет создано в инфоблоке с этим ID
);

$ibp = new CIBlockProperty; // CIBlockProperty работает со свойствами информационных разделов
//$PropID = $ibp->Add($arFields);

/* ----------------- (end) создаю новое свойство в информационном разделе ---------------*/



/* ----------------- создаю новую запись в инфоблоке и заполняю созданные выше свойства---------------*/
$el = new CIBlockElement;

$PROP = [];
$PROP['NEW_PROPERTY'] = "Создал значение свойства";
$PROP['TWO_PROPERTY'] = "Создал еще одно значение свойства";

$arLoadProductArray = Array(
    "CODE" => "goodNewNew",     // заголовок создаваемой новости
    "MODIFIED_BY"    => 1,      // ID пользователя, который меняет свойство
    "IBLOCK_ID"      => 2,      // код инфоблока в котором создается новая новость
    "IBLOCK_SECTION_ID" => 1,   // элемент лежит в корне раздела - если false. Если указать id, эта новость добавится в нужный подраздел выбранного раздела
    "PROPERTY_VALUES"=> $PROP,
    "NAME"           => "Новое свойство",
    "ACTIVE"         => "Y",            // активен
    "PREVIEW_TEXT"   => "текст для списка элементов",
    "DETAIL_TEXT"    => "текст для детального просмотра",
);

if($PRODUCT_ID = $el->Add($arLoadProductArray))
    echo "New ID: ".$PRODUCT_ID;
else
    echo "Error: ".$el->LAST_ERROR;
/* -----------------(end) создаю новую запись в инфоблоке и заполняю созданные выше свойства---------------*/

