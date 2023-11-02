<a name="readme-top"></a>

<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table des matières</summary>
  <ol>
    <li>
      <a href="#a-propos-du-projet">About The Project</a>
      <ul>
        <li><a href="#developpe-avec">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequis">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#avancee">Avancée</a></li>
  </ol>
</details>



<!-- ABOUT THE PROJECT -->
## A propos du projet

<h1>Projet : Site To-do list</h1>

<p align="right">(<a href="#readme-top">top</a>)</p>



### Développé avec

* [![Symfony][Symfony.com]][Symfony-url]

<p align="right">(<a href="#readme-top">top</a>)</p>



<!-- GETTING STARTED -->
## Getting Started

### Prérequis

* PHP 8.1.13
* Symfony 6.2
* Composer

### Installation

1. Cloner le repo
    ```sh
        git clone https://github.com/rosedorleans/Task.git
    ```
2. Mettre à jour les packages
    ```sh
        composer update
    ```
    
2. Lancer le serveur
    ```sh
        symfony server:start -d
    ```

3. créer une BDD dans phpmyadmin <br>
    changer .env : DATABASE_URL="mysql://root:@127.0.0.1:3306/[NOMDELABASE]?serverVersion=8.0.32&charset=utf8mb4" <br>
    puis lancer les migrations
    ```sh
        php bin/console doctrine:schema:update --force
    ```

<p align="right">(<a href="#readme-top">top</a>)</p>



<!-- Avancée -->
## Avancée

- [ ] ORM 
- [ ] Formulaire / Validation
- [x] Logs
- [x] Tests 
- [ ] Sécurité
- [ ] Traduction 
- [x] Mail + Messenger
- [ ] Api / Serialization


<p align="right">(<a href="#readme-top">top</a>)</p>


<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->

[Symfony.com]: https://shields.io/badge/Symfony-FF2D20?style=for-the-badge&logo=symfony&logoColor=white
[Symfony-url]: https://symfony.com