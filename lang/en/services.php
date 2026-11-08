<?php

declare(strict_types=1);

return [
    'title' => 'Services',
    'lead' => 'From company websites to internal systems, all done the same way: discuss, design, build, launch.',
    'back' => 'All services',
    'learn_more' => 'See details',
    'includes' => 'What you get',
    'cta' => [
        'title' => 'Talk about your needs',
        'body' => 'Tell us what you want to build. We reply to schedule a first conversation.',
        'button' => 'Book a consultation',
    ],
    'items' => [
        'web-development' => [
            'name' => 'Web development',
            'summary' => 'Company websites, portals, and web apps that load fast and are easy to manage.',
            'intro' => 'We build websites and web apps you can manage yourself: content that is easy to change, a layout that works on phones, and a structure that search engines can read.',
            'includes' => ['Page design and user flows', 'Responsive layout for phones and desktops', 'A content management panel when needed', 'Documentation and handover'],
        ],
        'mobile-apps' => [
            'name' => 'Mobile apps',
            'summary' => 'Android and iOS apps for your customers or your field team.',
            'intro' => 'We design mobile apps that are clear to use and connect to the systems you already have, from prototype to release on the app stores.',
            'includes' => ['A prototype you can try before we build', 'Android and iOS apps', 'Connection to your existing systems or services', 'Help with the app store release process'],
        ],
        'custom-systems' => [
            'name' => 'Custom systems',
            'summary' => 'Internal systems for work that off-the-shelf software does not cover.',
            'intro' => 'When your process does not fit off-the-shelf software, we build a system that follows it: records, approvals, reports, and access control.',
            'includes' => ['Mapping of the process as it runs today', 'Roles and access permissions', 'Reports and data export', 'Testing and documentation'],
        ],
        'maintenance-support' => [
            'name' => 'Maintenance and support',
            'summary' => 'Fixes, updates, and guidance once your product is running.',
            'intro' => 'A running product needs care. We handle fixes, security updates, and small changes, including for systems we did not build.',
            'includes' => ['Bug fixes', 'Security and dependency updates', 'Small changes and additions', 'Basic monitoring'],
        ],
    ],
];
