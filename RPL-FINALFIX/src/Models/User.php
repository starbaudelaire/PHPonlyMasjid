<?php

namespace Models;

class User extends \Core\Model {

    // Cari user berdasarkan alamat email
    public function findByEmail($email) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch();
    }
}