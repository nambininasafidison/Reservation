<?php
require_once '../utils/Database_connection.php';

class ReservationDao {
    public function saveReservation($reservation) {
        $status = 0;
        try {
            $conn = DatabaseConnection::getConnection();
            $stmt = $conn->prepare("INSERT INTO reservations (clientName, reservationDate, reservationTime) VALUES (?, ?, ?)");
            $stmt->bindParam(1, $reservation->getClientName(), PDO::PARAM_STR);
            $stmt->bindParam(2, $reservation->getReservationDate(), PDO::PARAM_STR);
            $stmt->bindParam(3, $reservation->getReservationTime(), PDO::PARAM_STR);
            $status = $stmt->execute();

            if ($status) {
                $reservation->setId($conn->lastInsertId());
                $status = $stmt->rowCount();
            }
            $stmt = null;
            $conn = null;
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
            $stmt->bindParam(1, $reservation->getReservationDate(), PDO::PARAM_STR);
            $stmt->bindParam(2, $reservation->getReservationTime(), PDO::PARAM_STR);
            $stmt->bindParam(3, $reservation->getId(), PDO::PARAM_INT);
            $stmt->bindParam(4, $reservation->getClientName(), PDO::PARAM_STR);
            $status = $stmt->execute();
            if ($status) {
                $status = $stmt->rowCount();
            }
            $stmt = null;
            $conn = null;
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
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            $stmt->bindParam(2, $name, PDO::PARAM_STR);
            $status = $stmt->execute();
            if ($status) {
                $status = $stmt->rowCount();
            }
            $stmt = null;
            $conn = null;
        } catch (Exception $e) {
            error_log($e->getMessage());
        }
        return $status;
    }
}
?>
