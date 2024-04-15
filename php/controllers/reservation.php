<?php
require_once '/php/Dao/reservation_dao.php';
require_once '/php/models/Reservation.php';

session_start();

$reservationDao = new ReservationDao();

function processRequest() {
    $clientName = $_POST['clientName'] ?? $_GET['clientName'];
    $reservationDate = $_POST['reservationDate'] ?? $_GET['reservationDate'];
    $reservationTime = $_POST['reservationTime'] ?? $_GET['reservationTime'];
    $action = $_POST['action'] ?? $_GET['action'];

    if (isset($_SESSION['utilisateurConnecte'])) {
        $utilisateurConnecte = $_SESSION['utilisateurConnecte'];
        $clientEmail = $utilisateurConnecte->getEmail();

        $sqlDate = date('Y-m-d', strtotime($reservationDate));

        if ($action == 'reserve') {
            $reservation = new Reservation();
            $reservation->setClientName($clientName);
            $reservation->setReservationDate($sqlDate);
            $reservation->setReservationTime($reservationTime);

            $reservationDao->saveReservation($reservation);

            $_SESSION['id'] = $reservation->getId();
            $_SESSION['nom'] = $clientName;
            $_SESSION['date'] = $sqlDate;
            $_SESSION['heure'] = $reservationTime;
            $_SESSION['email'] = $clientEmail;

            header('Location: /views/reservation-confirmee.php');
            exit();
        } elseif ($action == 'update') {
            $id = intval($_POST['id'] ?? $_GET['id']);

            $reservation = new Reservation();
            $reservation->setId($id);
            $reservation->setClientName($clientName);
            $reservation->setReservationDate($sqlDate);
            $reservation->setReservationTime($reservationTime);

            $res = $reservationDao->updateReservation($reservation);
            if ($res > 0) {
                $_SESSION['id'] = $id;
                $_SESSION['nom'] = $clientName;
                $_SESSION['date'] = $sqlDate;
                $_SESSION['heure'] = $reservationTime;
                $_SESSION['email'] = $clientEmail;

                header('Location: /views/reservation-modifiee.php');
                exit();
            } else {
                $_SESSION['error'] = "L'identifiant et le nom de la reservation que vous essayez de modifier ne sont pas compatible ou la reservation n'existe pas";
                header('Location: /views/erreur-reservation.php');
                exit();
            }
        } elseif ($action  == 'delete') {
            $id = intval($_POST['id'] ?? $_GET['id']);
        
            $res = $reservationDao->deleteReservation($id, $clientName);
            if ($res > 0) {
                $_SESSION['id'] = $id;
                $_SESSION['nom'] = $clientName;

                header('Location: /views/annulee.php');
                exit;
            } else {
                $_SESSION['error'] = "L'identifiant et le nom de la reservation que vous essayez d'annuler ne sont pas compatible ou la reservation n'existe pas";
                header('Location: /views/erreur-reservation.php');
                exit;
            }
        }
    } else {
        header('Location: /views/connexion.php');
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    processRequest();
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    processRequest();
}
?>
