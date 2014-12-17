widgetRequest
=============

Виджет обратной заявки/звонка для Yii. Гибкий и настраиваемый.

######Опции######
Widget attribute |Type| Description|Default value|
------------- |------| -------------|-------|
type  |*string*| тип модального окна. доступно *modal*,*block*,*buttom* |*modal*| 
сssFile  |*string*| имя подключаемого файла стилей, помещаются в папку assets |*style.css*|
title |*string*|заголовок виджета|*Заявка на обратный звонок*|
template  |*string*| шаблон формы |*{name}{email}{phone}{text}{captcha}*|
mailText  |*string*| файл который рендериться при отправке письма, содержит текст письма. файлы располагаются в папке *view/mail*|*_text*|
successMessage |*string*| сообщение при успешной отправке|*Мы вскоре свяжемся с Вами!*|
errorMessage |*string*| сообщение при ошибке отправки|*Произашла ошибка отправки, попробуйте еще раз*|
optionsButton |*array()*|  опции кнопки вызовы виджета|-------|
optionsForm |*array()*| опции формы|-------|

######Опции кнопки######
optionsButton |Type| Description| Default value|
------------- |------| -------------|-------|
type  |*string*|see Bootstrap TbButton. При изменении типа на другой переход на резервную страницу будет сомнителен |*link*|
label  |*string*| текст кнопки|*Оставить заявку*|
url |*string*|ссылка на action, отрабатывает если необходимо сделать заявку на отдельной странице, или если отсутствует js |*CHtml::normalizeUrl( array('site/request' )*|
htmlOptions |*array()*| see htmlOptions Bootstrap. Если кнопка используется для вызова модального окна необходимо указать *data-target => modal* и *data-modal => #request*|*array( 'data-toggle' => 'modal','data-target' => '#request' )*|

######Опции формы######
optionsForm |Type| Description| Default value|
------------- |------| -------------|-------|
type  |*string*|see Bootstrap TbformAction.|*horizontal*|
id |*string*|идентификатор формы, обязательно изменять если на странице имееться несколько виджетов|*request-form*|
action |*string*|action для валидации формы|*CHtml::normalizeUrl( array( $this->controller->getUniqueId() .'/request' ) )*|
actionCaptcha |*string*|action для конструирования captcha|*CHtml::normalizeUrl( array( $this->controller->getUniqueId().'/captcha' ) )*|
ajax |*boolean*|включить ajax-валидацию|*true*|
reset |*boolean*|очистка формы после отправки письма|*true*|
serviceList |*array(key=>value)*|список значений для поля формы *services* |*array()*|
prevText |*string*|текст вставляемый перед формой|*null*|
afterText |*string*|текст вставляемый после формы|*null*|
htmlOptions |*array()*| see htmlOptions Bootstrap|*array()*|

######Доступные template######
+name
+phone
+phoneMasked
+email
+text
+service
+captcha
+qaptcha

######Структура assest######
+css - файлы стилей
+img - изображения
+js - js-файлы
+plugins - плагины

