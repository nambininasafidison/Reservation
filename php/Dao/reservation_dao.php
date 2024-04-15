<?php
require_once '/php/utils/Database_connection.php';

class ReservationDao {
    public function saveReservation($reservation) {
        $status = 0;
        try {
            $conn = DatabaseConnection::getConnection();
            $stmt = $conn->prepare("INSERT INTO reservations (clientName, reservationDate, reservationTime) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $reservation->getClientName(), $reservation->getReservationDate(), $reservation->getReservationTime());
            $status = $stmt->execute();

            if ($status) {
                $reservation->setId($conn->insert_id);
            }
        } catch (Exception $e) {
            error_log($e->getMessage());
        }
        return $status;
    }

    public function updateReservation($reservation) {
        $status = 0;
        try {
            $conn = DatabaseConnection::getConnection();
            $stmt = $conn->prepare("UPDATE reservations SET reservationDate=?, reservationTime=? WHERE id=? AND clientName=?");
            $stmt->bind_param("ssis", $reservation->getReservationDate(), $reservation->getReservationTime(), $reservation->getId(), $reservation->getClientName());
            $status = $stmt->execute();
        } catch (Exception $e) {
            error_log($e->getMessage());
        }
        return $status;
    }

    public function deleteReservation($id, $name) {
        $status = 0;
        try {
            $conn = DatabaseConnection::getConnection();
            $stmt = $conn->prepare("DELETE FROM reservations WHERE id=? AND clientName=?");
            $stmt->bind_param("is", $id, $name);
            $status = $stmt->execute();
        } catch (Exception $e) {
            error_log($e->getMessage());
        }
        return $status;
    }
}
?>
