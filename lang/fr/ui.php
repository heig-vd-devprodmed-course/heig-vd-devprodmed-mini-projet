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
    'auth' => [
        'login' => [
            'title' => 'Connexion',
            'description' => 'Connectez-vous à votre compte :app_name.',
            'form' => [
                'fields' => [
                    'email' => [
                        'label' => 'Adresse e-mail',
                        'placeholder' => 'Entrez votre adresse e-mail',
                    ],
                    'password' => [
                        'label' => 'Mot de passe',
                        'placeholder' => 'Entrez votre mot de passe',
                    ],
                    'remember' => [
                        'label' => 'Se souvenir de moi',
                    ],
                ],
                'actions' => [
                    'submit' => 'Se connecter',
                ],
            ],
            'no_account' => 'Pas encore de compte ?',
            'register' => "S'inscrire",
        ],
        'register' => [
            'title' => 'Inscription',
            'description' => 'Créez votre compte sur :app_name pour commencer à partager vos idées.',
            'form' => [
                'fields' => [
                    'username' => [
                        'label' => "Nom d'utilisateur",
                        'placeholder' => "Choisissez votre nom d'utilisateur",
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
                    'password' => [
                        'label' => 'Mot de passe',
                        'placeholder' => 'Choisissez un mot de passe sécurisé',
                    ],
                    'password_confirmation' => [
                        'label' => 'Confirmation du mot de passe',
                        'placeholder' => 'Confirmez votre mot de passe',
                    ],
                ],
                'actions' => [
                    'submit' => "S'inscrire",
                ],
            ],
            'already_have_account' => 'Vous avez déjà un compte ?',
            'login' => 'Se connecter',
        ],
    ],
    'my_profile' => [
        'edit' => [
            'title' => 'Modifier son profil',
            'description' => 'Page pour modifier son propre profil utilisateur',
        ],
        'show' => [
            'title' => 'Visualiser mon profil',
            'description' => 'Page de visualisation de son propre profil utilisateur.',
            'member_since' => 'Membre depuis le :date.',
            'actions' => [
                'edit' => 'Modifier le profil',
                'view_public' => 'Voir le profil public',
                'manage_tokens' => "Gérer les jetons d'accès",
                'logout' => 'Se déconnecter',
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
    'tokens' => [
        'index' => [
            'title' => "Jetons d'accès",
            'description' => "Gérez vos jetons d'accès pour :app_name.",
            'new_token_created' => 'Votre jeton a été créé. Copiez-le maintenant, il ne sera plus affiché.',
            'no_tokens' => "Aucun jeton d'accès.",
            'table' => [
                'name' => 'Nom',
                'scopes' => 'Permissions',
                'last_used_at' => 'Dernière utilisation',
                'expiration_date' => 'Expiration',
                'never' => 'Jamais',
                'no_expiry' => 'Sans expiration',
                'actions' => 'Actions',
                'delete' => 'Supprimer',
                'delete_confirm' => 'Souhaitez-vous vraiment supprimer ce jeton ? Cette action est irréversible.',
            ],
        ],
        'create' => [
            'title' => "Créer un nouveau jeton d'accès",
            'description' => "Créez un nouveau jeton d'accès pour :app_name.",
        ],
        'form' => [
            'fields' => [
                'name' => [
                    'label' => 'Nom',
                    'placeholder' => 'Nom du jeton',
                ],
                'scopes' => [
                    'label' => 'Permissions',
                    'options' => [
                        'posts_create' => 'Créer des posts',
                        'posts_read' => 'Lire les posts',
                        'posts_update' => 'Modifier des posts',
                        'posts_delete' => 'Supprimer des posts',
                    ],
                ],
                'content' => [
                    'label' => 'Contenu',
                    'placeholder' => 'Contenu du jeton',
                ],
                'expiration_date' => [
                    'label' => 'Expiration (optionnel)',
                    'help' => 'Laissez vide pour un jeton sans expiration.',
                ],
            ],
            'actions' => [
                'submit' => 'Créer le jeton',
                'cancel' => 'Annuler',
            ],
        ],
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
