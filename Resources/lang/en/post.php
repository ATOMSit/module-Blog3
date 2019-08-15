<?php

return [
    'fields' => [
        'title' => [
            'label' => "Titre de votre article",
            'validations' => [
                'required' => "Le champ prénom est requis.",
                'regex' => "Le champ prénom doit absolument être une chaîne de caractères.",
                'min' => "Le champ prénom doit être composé au minimum de 2 caractères.",
                'max' => "Le champ prénom peut être composé au maximum de 255 caractères."
            ]
        ],
        'body' => [
            'label' => "Contenu de votre article",
            'validations' => [
                'required' => "Le champ nom de famille est requis.",
                'regex' => "Le champ nom de famille doit absolument être une chaîne de caractères.",
                'min' => "Le champ nom de famille doit être composé au minimum de 2 caractères.",
                'max' => "Le champ nom de famille peut être composé au maximum de 255 caractères."
            ]
        ],
        'submit' => [
            'label' => "Sauvegarder"
        ]
    ],
];
