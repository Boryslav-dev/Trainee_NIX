<?php

return [
    "" => [
        "GET" => [
            "controller" => "\\controllers\\controller_main",
            "action" => "actionIndex",
            "params" => "",
        ],
    ],
    "login/actionIndex" => [
        "GET" => [
            "controller" => "\\controllers\\controller_login",
            "action" => "actionIndex",
            "params" => "",
        ],
    ],
    "login/actionLogout" => [
        "GET" => [
            "controller" => "\\controllers\\controller_login",
            "action" => "actionLogout",
            "params" => "",
        ],
    ],
    "registration" => [
        "GET" => [
            "controller" => "\\controllers\\controller_registration",
            "action" => "actionIndex",
            "params" => "",
        ],
    ],
    "profile" => [
        "GET" => [
            "controller" => "\\controllers\\controller_profile",
            "action" => "actionIndex",
            "params" => "",
        ],
    ],


];
