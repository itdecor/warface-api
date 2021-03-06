<?php

namespace Warface\Methods;

use Warface\RequestController;
use Warface\Reveal\ParserAchievement;

class Achievement
{
    private RequestController $class;

    /**
     * User constructor.
     * @param RequestController $controller
     */
    public function __construct(RequestController $controller)
    {
        $this->class = $controller;
    }

    /**
     * @param array $cfg
     * @return array
     */
    public function catalog(array $cfg = []): array
    {
        $request = $this->class->request('achievement/catalog');
        $parse = (new ParserAchievement($cfg))->get();

        foreach ($request as $value) {
            foreach ($parse as $v) {
                if ($value['name'] === $v['name']) $res[] = array_merge($v, ['id' => $value['id']]);
            }
        }

        return $res;
    }
}