# APayI - Paygreen 

Présentation de l'API - APayI.

Objectif - Gestion de transactions en ligne :

    Afficher toutes les transactions
    
    Afficher une transaction unique via son ID
    
    Ajouter une transaction
    
    Modifier le status d'une transaction    


Requête acceptée  : HTTP request

Format de retour  : Json

                              


## Getting Started (PHP version)

Methodes d'utilisation 

### GET
```
GET	      Récup. tous les liens   	            monsite/transactions
GET	      Récup. un lien unique   	            monsite/transactions/id
```

### POST
```
POST	  Poster une nouvelle transaction   	    monsite/transactions
```

### PUT
```
PUT	      Valider la transaction   	            monsite/validate/id
PUT	      Annuler la transaction   	            monsite/denied/id
```





## Getting Started (C# version)

Methodes d'utilisation 

### GET
```
GET	      Récup. tous les liens   	            monsite/api/todo
GET	      Récup. un lien unique   	            monsite/api/todo/id
```

### POST
```
POST	  Poster une nouvelle transaction   	    monsite/api/todo
```

### PUT
```
PUT	      Valider la transaction   	            monsite/api/todo/id
PUT	      Annuler la transaction   	            monsite/api/todo/id
```

