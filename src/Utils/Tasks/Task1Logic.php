<?php

namespace OloloCms\Utils\Tasks;

/**
 *
 */
class Task1Logic
{
    public static function getBBCodes($bbString)
    {
        preg_match_all('/\[(?P<bb_tag>\w+)(?::?(?P<description>.*?))?\](?P<content>.*?)\[\/\1\]/s', $bbString, $matches);

        $bbTagData = $bbTagDescription = [];
        foreach ($matches['bb_tag'] as $key => $tag) {
            $bbTagData[$tag] = $matches['content'][$key];
            $bbTagDescription[$tag] = $matches['description'][$key];
        }

        return [
            $bbTagData,
            $bbTagDescription,
        ];
    }

}
