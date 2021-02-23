# The Queen's Chocolaterie
A website created with PHP and MySQL, about a chocolate store.

<table>
  <tr>
    <td align="center">
      <img alt="HomePage" src="https://user-images.githubusercontent.com/70654891/108834136-13c01400-75ce-11eb-96f3-732277abf522.jpg" width="85%">
    </td>
    <td align="center">
      <img alt="HomePage" src="https://user-images.githubusercontent.com/70654891/108834667-bbd5dd00-75ce-11eb-8372-d07db9226684.jpg" width="85%">
    </td>
    <td align="center">
      <img alt="HomePage" src="https://user-images.githubusercontent.com/70654891/108835542-ea07ec80-75cf-11eb-9e09-e9ad232a4ef7.jpg" width="85%">
    </td>
  <tr>
  
  <tr>
    <td align="center">
      <img alt="HomePage" src="https://user-images.githubusercontent.com/70654891/108835618-060b8e00-75d0-11eb-9bb8-dddc69aa6dfd.jpg" width="85%">
    </td>
    <td align="center">
      <img alt="HomePage" src="https://user-images.githubusercontent.com/70654891/108835646-10c62300-75d0-11eb-8d13-318d12f0c7da.jpg" width="85%">
    </td>
    <td align="center">
      <img alt="HomePage" src="https://user-images.githubusercontent.com/70654891/108835674-1c194e80-75d0-11eb-8bd5-7e64d2a14bd1.jpg" width="85%">
    </td>
  <tr>
</table>

## Features
__2 accounts:__ client account and admin account

## Content
When connected as client :

- show all chocolates available in the shop
- search for specific chocolates by name or by categorie

When connected as administrator :

- show the list of chocolates
- add new chocolates
- delete or update chocolates in the shop

## Usage

1. Download the project into a local server (Wamp, Mamp, Xampp)
2. Create a SQL database named : ``chocolaterie``
3. Open ``base2reco.sql`` and copy/paste the sql requests to create the tables and insert datas
4. Modify ``web2reco/inc/accessBDD.php`` with your own server informations
5. Run ``web2reco/index.php`` with a local server
