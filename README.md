widgetRequest
=============

Виджет обратной заявки/звонка для Yii. Гибкий и настраиваемый.

Widget attribute | Description
------------- | -------------
type  | тип модального окна default: *modal*,*block*,*button* 
сssFile  | имя подключаемого файла стилей, помещаются в папку assets. default: *style.css*
title |  заголовок виджета
template  | шаблон формы, default: *{name}{email}{phone}{text}{captcha}*
mailText  | файл который рендериться при отправке письма, содержит текст письма. файлы располагаются в папке *view/mail*
successMessage | сообщение при успешной отправке
errorMessage | сообщение при ошибке отправки
optionsWidget | array() опции виджета
optionsButton | array() опции кнопки вызовы виджета
optionsForm |	array() опции формы


