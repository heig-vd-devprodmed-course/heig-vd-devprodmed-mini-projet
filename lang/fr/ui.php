<?php

declare(strict_types=1);

return [
    'home' => [
        'title' => 'Accueil',
        'description' => "Page d'accueil de la galerie d'art.",
        'introduction' => 'Bienvenue sur :app_name !',
        'recent_paintings' => 'Œuvres récentes',
        'see_all_paintings' => 'Voir toutes les œuvres',
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
                'description' => [
                    'label' => 'Description',
                    'placeholder' => 'Décrivez votre œuvre...',
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
        'paintings_heading' => 'Œuvres de :first_name :last_name',
        'number_of_paintings' => '{0} Aucune œuvre|{1} :count œuvre|[2,*] :count œuvres',
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
                        'paintings_create' => 'Créer des œuvres',
                        'paintings_read' => 'Lire les œuvres',
                        'paintings_update' => 'Modifier des œuvres',
                        'paintings_delete' => 'Supprimer des œuvres',
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
    'paintings' => [
        'no_paintings' => 'Aucune œuvre à afficher.',
        'likes_count' => '{0} Aucune réaction|{1} :count réaction|[2,*] :count réactions',
        'view_painting' => 'Voir l\'œuvre',
        'create' => [
            'title' => 'Créer une nouvelle œuvre',
            'description' => 'Créez une nouvelle œuvre pour partager votre travail sur :app_name.',
        ],
        'form' => [
            'fields' => [
                'title' => [
                    'label' => 'Titre',
                    'placeholder' => 'Entrez un titre pour votre œuvre',
                ],
                'description' => [
                    'label' => 'Description',
                    'placeholder' => 'Décrivez votre œuvre, ses inspirations, techniques...',
                ],
                'image' => [
                    'label' => 'Image de l\'œuvre',
                    'help' => 'Formats acceptés: JPG, JPEG, PNG, BMP, GIF, WEBP. Taille maximale: 5 Mo.',
                    'placeholder' => 'Choisissez une image pour votre œuvre',
                ],
                'category' => [
                    'label' => 'Catégorie',
                    'placeholder' => 'Choisir une catégorie',
                ],
                'options' => [
                    'acrylique' => 'Acrylique',
                    'gouache' => 'Gouache',
                    'aquarelle' => 'Aquarelle',
                    'huile' => "Peinture à l'huile",
                ],
                'dimensions' => [
                    'label' => 'Dimensions',
                    'placeholder' => 'ex: 50x70 cm',
                ],
                'year' => [
                    'label' => 'Année de création',
                    'placeholder' => 'ex: 2023',
                ],
            ],

            'actions' => [
                'submit' => 'Sauvegarder',
                'cancel' => 'Annuler',
                'delete' => 'Supprimer',
                'delete_confirm' => 'Souhaitez-vous vraiment supprimer cette œuvre ? Cette action est irréversible.',
            ],
        ],
        'index' => [
            'title' => 'Toutes les œuvres',
            'description' => 'Découvrez toutes les œuvres de :app_name.',
        ],
        'edit' => [
            'title' => 'Modifier l\'œuvre ":painting_title"',
            'title_without_painting_title' => 'Modifier l\'œuvre',
            'description' => 'Modifiez l\'œuvre ":painting_title" pour mettre à jour ses informations.',
            'description_without_painting_title' => 'Modifiez l\'œuvre pour mettre à jour ses informations.',
        ],
        'show' => [
            'title' => '":painting_title" par :first_name :last_name',
            'title_without_painting_title' => 'Œuvre par :first_name :last_name',
            'description' => '":painting_title" par :first_name :last_name.',
            'description_without_painting_title' => 'Œuvre de :first_name :last_name.',
            'author' => 'Œuvre de :first_name :last_name',
            'dimensions' => 'Dimensions: :dimensions',
            'year' => 'Année: :year',
        ],
    ],
];
