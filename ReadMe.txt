1. Списки.
1.1.Добавить новый элемент.
1.2.Удалить элемент.
1.3.Изменить текст элемента.
1.4.Сохранить данные элемента в базе.
1.5.Прочитать список из базы.
1.6.Отобразить список на экране.
2. Проекты.
2.1.Добавить новый проект.
2.2.Удалить проект.
2.3.Изменить содержимое проекта.
2.4.Прочитать список проектов из базы.
2.5.Сохранить проект в базе.
3. Справочник.
3.1.Добавить новую запись.
3.2.Удалить запись.
3.3.Изменить запись.
3.4.Найти запись по ключевым словам.
3.5.Сохранить запись в базе.
3.6.Вывести список записей из базы
4.Управление.
4.1.Перенаправление в нужный модуль по url
4.2.Перемещение между модулями

Принцип работы:
Открываем главную страницу perfectum/
На ней размещаем view для Корзины и ссылки на остальные три модуля.
При переходе по ссылке вызываем контроллер модуля и передаем ему нужные параметры в $_POST или $_REQUEST.
Контроллер вызывает нужные функции модели и передает результаты view.
View отображает нужные данные в главном блоке.
Файловая структура:
assets/
- style.css
- script.js
- jquery.js
- reset.css
lists/
- controller.php
- model.php
- view.php
projects/
- controller.php
- model.php
- view.php
reference/
- controller.php
- model.php
- view.php

Сценарии:
1.Списки.
1.1.Вывод текущего состояния списка:
Пример url: http://localhost/perfectum/list/inbox
Контроллер получает данные из url - название списка.
Контроллер вызывает метод модели для получения данных из базы.
Если данные получены успешно, массив данных передается представлению.
Представление отображает список на экране.
1.2.Добавление нового элемента:
Пример url: http://localhost/perfectum/list/inbox/add
Пользователь отправляет форму add
Контроллер получает данные из url и формы: название списка, действие, содержимое пункта.
Если данные полные, контроллер вызывает метод модели для записи данных в базу.
Модель пишет в базу полученные сведения с новым id.
Выводится новое состояние списка (аналогично п.1.1)
1.3.Удаление элемента:
Пример url: http://localhost/perfectum/list/inbox/del
Пользователь отправляет форму del
Контроллер получает данные из url и формы: название списка, действие, id пункта.
Если данные получены успешно, контроллер вызывает метод модели для удаления записи из базы.
Модель удаляет запись из соответствующей таблицы.
Выводится новое состояние списка (аналогично п.1.1)
1.4.Редактирование элемента:
Пример url: http://localhost/perfectum/list/inbox/edit
Пользователь отправляет форму edit
Контроллер получает данные из url и формы: название списка, действие, id пункта.
Контроллер вызывает представление с формой для редактирования.
После завершения редактирования контроллер вызывает метод модели для записи в базу пункта с нужным id.
Модель переписывает содержимое записи с заданным id.
Выводится новое состояние списка (аналогично п.1.1).