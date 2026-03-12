<?php

declare(strict_types=1);

return [
    'home' => [
        'title' => 'Accueil',
        'description' => "Page d'accueil du réseau social.",
        'introduction' => 'Bienvenue sur :app_name !',
        'recent_posts' => 'Posts récents',
        'see_all_posts' => 'Voir tous les posts',
    ],
    'my_profile' => [
        'edit' => [
            'title' => 'Modifier son profil',
            'description' => 'Page pour modifier son propre profil utilisateur',
        ],
        'show' => [
            'title' => 'Mon profil - :username',
            'description' => 'Page de visualisation de son propre profil utilisateur.',
            'member_since' => 'Membre depuis le :date.',
            'actions' => [
                'edit' => 'Modifier le profil',
                'view_public' => 'Voir le profil public',
            ],
        ],
        'form' => [
            'fields' => [
                'profile_picture' => [
                    'label' => 'Photo de profil',
                    'help' => 'Formats acceptés: JPG, JPEG, PNG, BMP, GIF, WEBP. Taille maximale: 2 Mo.',
                ],
                'username' => [
                    'label' => "Nom d'utilisateur",
                    'placeholder' => "Entrez votre nom d'utilisateur",
                ],
                'email' => [
                    'label' => 'Adresse e-mail',
                    'placeholder' => 'Entrez votre adresse e-mail',
                ],
                'first_name' => [
                    'label' => 'Prénom',
                    'placeholder' => 'Entrez votre prénom',
                ],
                'last_name' => [
                    'label' => 'Nom',
                    'placeholder' => 'Entrez votre nom',
                ],
            ],
            'actions' => [
                'submit' => 'Sauvegarder',
                'cancel' => 'Annuler',
                'delete' => 'Supprimer le compte',
                'delete_confirm' => 'Souhaitez-vous vraiment supprimer votre compte ? Cette action est irréversible.',
            ],
        ],
    ],
    'profile' => [
        'title' => 'Profil de :username',
        'description' => 'Page de profil pour :username.',
        'posts_heading' => 'Posts de :first_name :last_name',
        'number_of_posts' => '{0} Aucune publication|{1} :count publication|[2,*] :count publications',
        'member_since' => 'Membre depuis le :date.',
    ],
    'about' => [
        'title' => 'À propos',
        'description' => 'Page à propos de notre réseau social.',
        'introduction' => 'Ce réseau social a été créé pour permettre aux utilisateur.trices de partager leurs pensées et leurs idées avec le monde entier.',
        'disclaimer' => "Ce réseau social est un projet réalisé dans le cadre d'un cours de la HEIG-VD, Suisse.",
        'copyright' => '© :year Tous droits réservés.',
    ],
    'posts' => [
        'no_posts' => 'Aucun post à afficher.',
        'likes_count' => '{0} Aucun like|{1} :count like|[2,*] :count likes',
        'view_post' => 'Voir le post',
        'create' => [
            'title' => 'Créer un nouveau post',
            'description' => 'Créez un nouveau post pour partager vos pensées avec le monde sur :app_name.',
        ],
        'form' => [
            'fields' => [
                'title' => [
                    'label' => 'Titre (optionnel)',
                    'placeholder' => 'Entrez un titre pour votre post (optionnel)',
                ],
                'content' => [
                    'label' => 'Contenu',
                    'placeholder' => 'Exprimez-vous librement dans votre post...',
                ],
            ],
            'actions' => [
                'submit' => 'Sauvegarder',
                'cancel' => 'Annuler',
                'delete' => 'Supprimer',
                'delete_confirm' => 'Souhaitez-vous vraiment supprimer ce post ? Cette action est irréversible.',
            ],
        ],
        'index' => [
            'title' => 'Tous les posts',
            'description' => 'Tous les posts de :app_name.',
        ],
        'edit' => [
            'title' => 'Modifier le post ":post_title"',
            'title_without_post_title' => 'Modifier le post',
            'description' => 'Modifiez le post ":post_title" pour mettre à jour son contenu.',
            'description_without_post_title' => 'Modifiez le post pour mettre à jour son contenu.',
        ],
        'show' => [
            'title' => '":post_title" par :first_name :last_name',
            'title_without_post_title' => 'Post par :first_name :last_name',
            'description' => '":post_title" par :first_name :last_name.',
            'description_without_post_title' => 'Post de :first_name :last_name.',
            'author' => 'Publié par :first_name :last_name',
        ],
    ],
];
