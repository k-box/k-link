<?php

return [
    // Information about the website
    'siteName' => 'K-Link',
    'siteDescription' => 'Connects various information sources to a common digital library and provides search, retrieval and exchange of information from different platforms.',

    // Base URL of the website
    'baseUrl' => '',

    // Jigsaw configuration https://jigsaw.tighten.co/docs/content/
    'production' => false,
    'collections' => [],

    // helpers
    'isActive' => function ($page, $path) {
        return ends_with(trimPath($page->getPath()), trimPath($path));
    },

    'url' => function ($page, $path) {
        return starts_with($path, 'http') ? $path : '/' . trimPath($path);
    },
];
