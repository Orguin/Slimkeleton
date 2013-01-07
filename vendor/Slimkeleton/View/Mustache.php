<?php

namespace Slimkeleton\View;

class Mustache extends \Slim\View
{
    public function render($template)
    {
        $m = new \Mustache_Engine();
        $contents = file_get_contents($this->getTemplatesDirectory() . '/' . ltrim($template, '/'));
        return $m->render($contents, $this->data);
    }
}
