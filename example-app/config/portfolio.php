<?php

return [
    'categories' => [
        'web' => 'Web applications',
        'backend' => 'Backend & PHP',
        'systems' => 'Python & systems',
        'ui' => 'UI frameworks',
    ],
    'projects' => [
        [
            'id' => 'tradesphere',
            'repositories' => [
                'TradeSphere' => 'https://github.com/qh1xe/TradeSphere',
            ],
            'title' => 'TradeSphere',
            'category' => 'web',
            'description' => 'A community for traders to ask questions, share ideas and learn through integrated courses.',
            'tags' => ['Laravel', 'JavaScript', 'Supabase'],
            'image' => 'images/tradesphere-homepage.png',
            'alt' => 'TradeSphere homepage with courses and community navigation',
        ],
        [
            'id' => 'portfolio-cv',
            'repositories' => [
                'Portfolio.CV' => 'https://github.com/qh1xe/Portfolio.CV',
            ],
            'title' => 'Portfolio.CV',
            'category' => 'web',
            'description' => 'A personal portfolio bringing together software projects, a CV and photography.',
            'tags' => ['Laravel', 'Blade', 'CSS'],
            'art' => "folio ✳\nPortfolio.CV",
        ],
        [
            'id' => 'python-advanced',
            'repositories' => [
                'Python application' => 'https://github.com/qh1xe/PYTHON-ADVANCED-applicatie',
            ],
            'title' => 'PYTHON-ADVANCED-applicatie',
            'category' => 'systems',
            'description' => 'An academic project exploring application development in Python.',
            'tags' => ['Python'],
            'art' => "$ python\n>>>",
        ],
        [
            'id' => 'microcontrollers',
            'repositories' => [
                'microcontrollers' => 'https://github.com/qh1xe/microcontrollers',
            ],
            'title' => 'microcontrollers',
            'category' => 'systems',
            'description' => 'Experiments with microcontroller programming and hardware interfaces.',
            'tags' => ['Embedded', 'Hardware'],
            'art' => "I/O\nGPIO",
        ],
        [
            'id' => 'laravel-pdo',
            'repositories' => [
                'Laravel exercises' => 'https://github.com/qh1xe/learning-laravel',
                'PDO exercises' => 'https://github.com/qh1xe/PDO-expert',
            ],
            'title' => 'learning-laravel & PDO-expert',
            'category' => 'backend',
            'description' => 'Exercises in Laravel and database access with PHP Data Objects.',
            'tags' => ['PHP', 'Laravel', 'PDO'],
            'art' => "$ php artisan\nPDO",
        ],
        [
            'id' => 'ui-frameworks',
            'repositories' => [
                'Tailwind rebuild' => 'https://github.com/qh1xe/Tailwind-spotiy-rebuild',
                'Bulma exercises' => 'https://github.com/qh1xe/Bulma-BitAcademy-Rooster-doelen',
                'Bootstrap exercises' => 'https://github.com/qh1xe/Bootstrap',
            ],
            'title' => 'Tailwind Rebuilds & CSS Frameworks',
            'category' => 'ui',
            'description' => 'Interface studies exploring responsive layouts with CSS frameworks.',
            'tags' => ['Tailwind CSS', 'Bulma', 'Bootstrap'],
            'art' => "<interface>\n  responsive\n</interface>",
        ],
    ],
];
