<?php

    $user_ip = Request::ip();
    $user_agent = Request::userAgent();

    echo $user_agent;
    echo $user_ip;
