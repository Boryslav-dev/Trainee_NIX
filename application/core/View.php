<?php

namespace application\core;

class View
{
    public $layout_view; // шаблон по умолчанию.

    /*
    $content_file - виды отображающие контент страниц;
    $template_file - общий для всех страниц шаблон;
    $data - массив, содержащий элементы контента страницы. Обычно заполняется в модели.
    */
    public function generate($content_view, $layout_view, $data = null)
    {

        if (is_array($data)) {
            // преобразуем элементы массива в переменные
            extract($data);
        }

        /*
        динамически подключаем общий шаблон (вид),
        внутри которого будет встраиваться вид
        для отображения контента конкретной страницы.
        */
        include 'application/views/' . $layout_view;
    }
}
