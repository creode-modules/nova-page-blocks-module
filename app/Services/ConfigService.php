<?php

namespace Modules\PageBlocks\app\Services;

class ConfigService
{

    public static function getBlockFormatOptions(string $blockName)
    {
        $options = explode(',', config('pageblocks.' . $blockName . '_formats'));
    
        $options = array_combine(range(1, count($options)), $options);

        return $options;
    }

}
