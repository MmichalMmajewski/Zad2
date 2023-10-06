
METODA ENDPOINT DANE_WEJŚCIOWE

GET /api/v1/categories

GET /api/v1/entries/{entries_id}

POST /api/v1/categories {"name":"Edukacja wyższa"}

POST /api/v1/entries {"name":"Company name","www":"https://domain.pl","address":"Towarowa 35","content":"Profesjonalne pozycjonowanie stron","category_id":"2"}

PUT /api/v1/categories/{category_id} {"name":"Edukacja przedszkolna"}

PUT /api/v1/entries/{entry_id} {"name":"Company name after change","www":"https://newdomain.pl","address":"Plac Andersa 3","content":"Profesjonalne pozycjonowanie stron","category_id":"10"}

DELETE api/v1/categories/{category_id}

DELETE api/v1/entries/{entry_id}  
