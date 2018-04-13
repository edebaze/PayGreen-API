<?php
/**
 * Created by PhpStorm.
 * User: Etienne
 * Date: 13/04/2018
 * Time: 16:24
 */

namespace App\Controllers;


class TransactionsController
{



    public function findAll() {
        $bdd = new \PDO('mysql:host=localhost;dbname=paygreen', 'root', '');
        $data = $bdd->query('SELECT * FROM transactions');

        $transactions = [];

        while($transaction = $data->fetch()) {
            $transactions[] = $transaction;
        }

        // RETOUR
        echo json_encode($transactions);
    }




    public function findOne($id) {
        $bdd = new \PDO('mysql:host=localhost;dbname=paygreen', 'root', '');
        $data = $bdd->query('SELECT * FROM transactions WHERE id =' . $id);

        $transaction = $data->fetch();

        // RETOUR
        echo json_encode($transaction);
    }




    public function add() {

        // INITIALISATION

        $bdd = new \PDO('mysql:host=localhost;dbname=paygreen;charset=utf8', 'root', '');
        date_default_timezone_set('UTC');

        $amount = $_POST['amount'];
        $currency = $_POST['currency'];
        $status = 'waiting';
        // $createdAT = géré automatiquement par la BDD (valeur par défaut : Current TimeStamp)


        // TRAITEMENT

        $req = $bdd->prepare('INSERT INTO transactions(amount, currency, status) VALUES(:amount, :currency, :status)');
        $req->execute(array(
            'amount' => $amount,
            'currency' => $currency,
            'status' => $status,
        ));



        // RETOUR

        echo 'Modifications enregistrées';

    }




    public function validate($id) {

        $bdd = new \PDO('mysql:host=localhost;dbname=paygreen;charset=utf8', 'root', '');
        $bdd->exec('UPDATE transactions SET status = \'validate\' WHERE id =' . $id);


        $this->findOne($id);
    }




    public function denied($id) {

        $bdd = new \PDO('mysql:host=localhost;dbname=paygreen;charset=utf8', 'root', '');
        $bdd->exec('UPDATE transactions SET status = \'denied\' WHERE id =' . $id);


        $this->findOne($id);
    }


}