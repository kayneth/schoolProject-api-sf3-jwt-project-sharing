# Api d'un projet de Licence Pro.

Projet de Licence Pro. Multimédia à Le Puy. Réaliser un site de partage de créations (site web, vidéos, etc)

## TODOLIST

* Resize de l'image à l'upload sous les formats
    * 125*125
    * 476*476
    * Originale ou max 1080*1080
    * https://openclassrooms.com/courses/concevez-votre-site-web-avec-php-et-mysql/creer-des-images-en-php
    * https://github.com/liip/LiipImagineBundle

## Ma documentation pour ce projet

### JWT TOKEN

* https://github.com/lexik/LexikJWTAuthenticationBundle/blob/master/Resources/doc/index.md#getting-started

* https://github.com/gesdinet/JWTRefreshTokenBundle
    * et/ou
* https://github.com/gfreeau/GfreeauGetJWTBundle

### API REST

* https://zestedesavoir.com/tutoriels/1280/creez-une-api-rest-avec-symfony-3/
    * Documentation +++, meilleur site au monde. Surtout pour le $form->submit(). Il vous sauvera la vie ! 

* Commencer rapidement avec FosRestBundle et JMSSerializerBundle 
    * http://obtao.com/blog/2013/12/creer-une-api-rest-dans-une-application-symfony/
        * elle prépare également à sérialiser des données de librairies tierces avec pour exemple FOSUserBundle

* https://www.cloudways.com/blog/rest-api-in-symfony-3-1/

* https://github.com/nelmio/NelmioApiDocBundle

* https://github.com/nelmio/NelmioCorsBundle

* Une très bonne documentation sur les bonnes manières de faire une API :
    * http://afsy.fr/avent/2013/06-best-practices-pour-vos-apis-rest-http-avec-symfony2
        * Utilisation de Hateoas
    
* https://ypereirareis.github.io/blog/2016/03/16/symfony-lexikjwtauthenticationbundle-client-user-authenticator-provider/

* http://symfony.com/doc/master/bundles/FOSRestBundle/index.html
    * http://symfony.com/doc/master/bundles/FOSRestBundle/5-automatic-route-generation_single-restful-controller.html

* http://jmsyst.com/bundles/JMSSerializerBundle
    * http://jmsyst.com/bundles/JMSSerializerBundle/master/configuration
    * https://github.com/willdurand/BazingaHateoasBundle/blob/master/Resources/doc/index.md
    
* Le tuto suivant m'a débloqué sur les réponses qui ne sérialisaient pas mes entités et retournaient des objets vides. 
    * http://www.foulquier.info/tutoriaux/mise-en-place-d-une-api-rest-avec-fosrestbundle-dans-symfony-2
    
* http://louis.hatier.me/blog/developper-api-rest-symfony-3/

* https://gist.github.com/Graceas/6505663

* https://github.com/SimplonReunion/developpeur-web/wiki/API-Rest-&-Symfony-:-les-d%C3%A9buts

* Utiliser le serializer de base de symfony
   * http://symfony.com/doc/current/components/serializer.html#deserializing-an-object
   
   ### Comment faire des requêtes POST/PUT/DELETE sur une API Symfony3
   
   ``` Example JQUERY
   $.ajax({
          type:"POST",
          url: "api_url",
          data: JSON.stringify(datasObj),
      });
   ```
   Ajouter des headers, si besoin ou utiliser CORSBundle
   ```
$headers = array(
   'Access-Control-Allow-Origin' => '* ou url spécifique'
);
```
