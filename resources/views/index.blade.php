@extends('layout.main')
@section('content')
    <h2>Тестовое задание для RugbyOne</h2>
    <h3>Документация по данному сервису :</h3>
    <ul>
        <li>
            <font color="blue">GET</font> : <b>"/"</b> - документация по данному API.
        </li>
        <li>
            <font color="blue">GET</font> : <b>"/metricks"</b> - 
            получение списка всех снятых метрик со всех сайтов.
            Представлено в виде постраничной таблицы со всеми необходимыми данными.
        </li>
        <li>
            <font color="blue">GET</font> : <b>"/metricks/stat"</b> - 
            получение графика зависимости колличества кликов от временного промежутка в течении дня.
        </li>
        <li>
            <font color="blue">GET</font> : <b>"/api/metricks/{id}"</b> - 
            получение по api конкретной метрики по id.
            Ответ представлен в формате json.
        </li>
        <li>
            <font color="green">POST</font> : <b>"/api/metricks"</b> - 
            добавление по api новой метрики.
            Ответ представлен в формате json.
        </li>
        <li>
            <font color="red">DELETE</font> : <b>"/api/metricks/{id}"</b> - 
            удаление по api конкретной метрики по id.
            Ответ представлен в формате json.
        </li>
    </ul>
    <h4>Ссылка на задание : 
        <a href="https://phptest.rb1.co/">
            https://phptest.rb1.co/
        </a>
    </h4>
    <h4>Ссылка на github данного проекта : 
        <a href="https://github.com/Artusss/RugbyOneTestTask">
            https://github.com/Artusss/RugbyOneTestTask
        </a>
    </h4>
@endsection