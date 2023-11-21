<?php

// list of accessible routes of your application, add every new route here
// key : route to match
// values : 1. controller name
//          2. method name
//          3. (optional) array of query string keys to send as parameter to the method
// e.g route '/item/edit?id=1' will execute $itemController->edit(1)
return [
    '' => ['HomeController', 'index',],
    'items' => ['ItemController', 'index',],
    'items/edit' => ['ItemController', 'edit', ['id']],
    'items/show' => ['ItemController', 'show', ['id']],
    'items/add' => ['ItemController', 'add',],
    'items/delete' => ['ItemController', 'delete',],
    'signup' => ['UserController', 'addUser',],
    'login' => ['LoginController', 'login'],
    'contact' => ['ContactController', 'addContact',],
    'personal_bouquet' => ['PersonalBouquetController', 'index',],
    'dashboard' => ['AdminDashboardController', 'index',],
    'stock' => ['StockController', 'index',],
    'Admin/stock/edit' => ['StockController', 'edit', ['id']],
    'Admin/stock/restock' => ['StockController', 'increment', ['id']],
    'catalogue' => ['CategorieController', 'index',],
    'catalogue/vase' => ['CategorieController', 'sortVase',],
    'catalogue/bouquet' => ['CategorieController', 'sortBouquet',],
    'catalogue/fleur' => ['CategorieController', 'sortFleur',],
    'catalogue/coffret' => ['CategorieController', 'sortcoffret',],
    'produit/show' => ['CategorieController', 'show', ['id']],
    'message' => ['AdminMessageController', 'index'],
    'message/delete' => ['AdminMessageController', 'delete', ['id']],
    'gestionProduit' => ['GestionProduitController', 'index',],
    'gestionProduit/edit' => ['GestionProduitController', 'edit', ['id']],
    'gestionProduit/delete' => ['GestionProduitController', 'delete', ['id']],
    'gestionProduit/add' => ['GestionProduitController', 'add',],
    'logout' => ['LoginController', 'logout',],
    'commandes' => ['CommandesController', 'index',],
    'error' => ['HomeController', 'pageError',],
];
