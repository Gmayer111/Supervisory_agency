<?php

namespace Vues;

class NotFoundVue extends RenderGlobalVue
{
    public function render($message)
    {
        $this->print('<span class="alert alert-danger">'. $message .'</span>');
    }
}