<?php
class Reservation {
    private $id;
    private $clientName;
    private $reservationDate;
    private $reservationTime;

    public function __construct() {
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setClientName($clientName) {
        $this->clientName = $clientName;
    }

    public function setReservationDate($reservationDate) {
        $this->reservationDate = date('Y-m-d', strtotime($reservationDate));
    }

    public function setReservationTime($reservationTime) {
        $this->reservationTime = $reservationTime;
    }

    public function getId() {
        return $this->id;
    }

    public function getClientName() {
        return $this->clientName;
    }

    public function getReservationDate() {
        return $this->reservationDate;
    }

    public function getReservationTime() {
        return $this->reservationTime;
    }
}
?>
