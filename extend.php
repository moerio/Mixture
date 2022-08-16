<?php

use Flarum\Extend;
use Flarum\Frontend\Document;
use s9e\TextFormatter\Configurator;

return [
    (new Extend\Frontend('forum'))
        ->content(function (Document $document) {
            $document->head[] = '
            <link href="https://cdn.jsdelivr.net/gh/moerio/Mixture@latest/APlayer.min.css">
            <script src="https://cdn.jsdelivr.net/gh/moerio/Mixture@latest/APlayer.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/meting@2.0.1/dist/Meting.min.js"></script>
            ';
        }),
    (new Extend\Formatter)
        ->configure(function (Configurator $config) {
            $config->BBCodes->addCustom(
                '[automusic src="{TEXT1?}" mini="{URL1?}" autoplay="{URL2?}" loop="{URL3?}" volume="{URL4?}"][/automusic]',
                '<div><meting-js auto="{TEXT1}" mini="{URL1}" autoplay="{URL2}" loop="{URL3}" volume="{URL4}"></meting-js></div>'
            );
            $config->BBCodes->addCustom(
                '[cloudmusic server="{TEXT1?}" type="{URL5?}" url="{URL6?}" mini="{URL1?}" autoplay="{URL2?}" loop="{URL3?}" volume="{URL4?}" cover="{URL7?}"][/automusic]',
                '<div><meting-js server="{TEXT1}" type="{URL5}" url="{URL6}" mini="{URL1}" autoplay="{URL2}" loop="{URL3}" volume="{URL4}" cover="{URL7}"></meting-js></div>'
            );
	        $config->BBCodes->addCustom(
                '[localmusic name="{TEXT1?}" artist="{TEXT2?}" url="{TEXT3?}" cover="{TEXT4?}" lrc="{TEXT5?}" mini="{URL1?}" autoplay="{URL2?}" loop="{URL3?}" volume="{URL4?}"][/localmusic]',
                '<div><meting-js name="{TEXT1}" artist="{TEXT2}" url="{TEXT3}" cover="{TEXT4}" lrc="{TEXT5}" mini="{URL1}" autoplay="{URL2}" loop="{URL3}" volume="{URL4}"></meting-js></div>'
            );
	        $config->BBCodes->addCustom(
                '[video url="{URL1?}" width="{URL2?}" height="{URL3?}"][/video]',
                '<iframe src="{URL1}" allowfullscreen="allowfullscreen" mozallowfullscreen="mozallowfullscreen" msallowfullscreen="msallowfullscreen" oallowfullscreen="oallowfullscreen" webkitallowfullscreen="webkitallowfullscreen" width="{URL2}" height="{URL3}" frameborder="0"></iframe>'
            );
        })
];
