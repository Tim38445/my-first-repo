---
marp: true
paginate: true
---
# API 1 GET /user

The GET /user api gets all the users from the database and reads them out.

Building Rest API Server with PHP.pdf slide 27 - 40
---
# API 2 GET /users/{id}

Gets a singular user by the id from the database
Building Rest API Server with PHP.pdf slide 27 - 40
---
# API 3 POST /users 

Creates a new user and adds it to the database
Building Rest API Server with PHP.pdf slide 27 - 40
---

# API 4 PUT /users/{id}

Updates a singular user with all new information to the database
Building Rest API Server with PHP.pdf slide 27 - 40
---

# API 5 DELETE /users{id} 

Deletes a user by id and removes it from the database
Building Rest API Server with PHP.pdf slide 27 - 40
--- 
# API 6 GET /users/pastpurchase 

Gets users by pastpurchase.
Reads all users by pastpurchase
Building Rest API Server with PHP.pdf slide 27 - 40
---
# API 7 DELETE /users/name

Uses name column to delete a user from the database
Building Rest API Server with PHP.pdf slide 27 - 40
--- 
# API 8 DELETE /users/pastpurchase 

Deletes a user by the pastpurchase column.
Building Rest API Server with PHP.pdf slide 27 - 40
---
 # Index.php

 Index is the main entry point and routing. Uses the cases to route which handler is which method.

 Testing Rest api server.pdf slides 26 - 30
 Building Rest API Server with PHP.pdf slides 5 - 19.
---
# handler.php
Handler contains has all handler functions for the api endpoints.
It conains all the utility functions as well.
It also uses user.php which contains the model class.
Building Rest API Server with PHP.pdf slides 23 - 40.
---
# users.php
Contains the model class.
Provides the setters and getters.
Contains all the info about the user information. 
Building Rest API Server with PHP.pdf slides 20 - 22.
---
# database.php
Contains the code for the connector to the mysql databse.
---
# testjavascript
Contains the javascript tests for all api's. 
Uses functions to test.
Used AAA pattern.

Testing REST API server.pdf slides 26 - 30. 


