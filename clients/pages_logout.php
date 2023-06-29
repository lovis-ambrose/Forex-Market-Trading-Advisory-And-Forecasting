<?php
    session_start();
    unset($_SESSION['f_id']);
    session_destroy();

    header("Location: login");
    exit;
