<?php

declare(strict_types=1);

return [
    'title' => 'Contact',
    'lead' => 'Tell us what you need. We read every message and reply by email.',
    'fields' => [
        'name' => 'Name',
        'email' => 'Email',
        'company' => 'Company',
        'message' => 'Message',
    ],
    'optional' => 'optional',
    'placeholders' => [
        'message' => 'What do you want to build, and what problem should it solve?',
    ],
    'submit' => 'Send message',
    'privacy' => 'Your details are only used to reply to this message.',
    'privacy_link' => 'Read the privacy policy',
    'errors_title' => 'Your message has not been sent. Check these fields:',
    'sent' => [
        'title' => 'Message sent',
        'body' => 'Thank you. We will reply to the email address you provided.',
    ],
];
