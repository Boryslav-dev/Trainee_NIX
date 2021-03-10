<?php

namespace application\core;

class View
{
    public $layout_view; // default template

    /*
    $content_file - views displaying page content;
    $template_file - template common for all pages;
    $data is an array containing page content items. Usually filled in the model.
    */
    public function generate($content_view, $layout_view, $data = null)
    {

        if (is_array($data)) {
            // converting array elements to variables
            extract($data);
        }

        /*
        dynamically connecting a common template (view),
        inside which the view will be embedded
        to display the content of a specific page.
        */
        include 'application/views/' . $layout_view;
    }
}
