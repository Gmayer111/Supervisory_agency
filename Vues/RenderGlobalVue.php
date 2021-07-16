<?php

namespace Vues;

class RenderGlobalVue
{
    private function renderHeader()
    {
        include_once 'Header.php';
    }

    private function renderFooter()
    {
        include_once 'Footer.php';
    }

    public function print($content)
    {
        ?> <style> <?php include_once 'Public/Css/header.css' ?></style><?php
        $this->renderHeader();
        echo $content;
        $this->renderFooter();
    }
}