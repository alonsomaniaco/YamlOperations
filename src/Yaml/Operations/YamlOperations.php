<?php

namespace YamlUtils\Yaml\Operations;


class YamlOperations
{
    /**
     * @param array ...$yamlContents
     */
    public static function merge(...$yamlContents): array
    {
        return array_merge_recursive(...$yamlContents);
    }
}
