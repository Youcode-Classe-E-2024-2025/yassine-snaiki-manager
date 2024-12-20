<?php

global $db;

$db->query('CREATE EXTENSION IF NOT EXISTS "uuid-ossp"');

$tableExists = $db->query("SELECT EXISTS (SELECT FROM information_schema.tables WHERE table_name = 'users')")->fetchColumn();
if (!$tableExists) {
    $db->query('
        CREATE TABLE users (
            id UUID PRIMARY KEY DEFAULT uuid_generate_v4(),
            name TEXT NOT NULL,
            email TEXT NOT NULL,
            password TEXT NOT NULL,
            isconfirmed BOOLEAN DEFAULT false,
            isarchived BOOLEAN DEFAULT false   
        );
    ');
}

// Check if the roles table exists, and create it if not
$tableExists = $db->query("SELECT EXISTS (SELECT FROM information_schema.tables WHERE table_name = 'roles')")->fetchColumn();
if (!$tableExists) {
    $db->query("
        CREATE TABLE roles (
            id UUID PRIMARY KEY DEFAULT uuid_generate_v4(),
            name CHARACTER(1) NOT NULL DEFAULT 'u',
            user_id UUID NOT NULL,
            CONSTRAINT fk_user_id FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
        );
    ");
}


$tableExists = $db->query("SELECT EXISTS (SELECT FROM information_schema.tables WHERE table_name = 'movements')")->fetchColumn();
if (!$tableExists) {
    $db->query("
        CREATE TABLE movements (
            id UUID PRIMARY KEY DEFAULT uuid_generate_v4(),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            amount NUMERIC(10, 2) NOT NULL,
            type CHAR(1) NOT NULL CHECK (type IN ('w', 'd')),
            user_id UUID NOT NULL,
            CONSTRAINT fk_user_id FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
        );
    ");
}


$tableExists = $db->query("SELECT EXISTS (SELECT FROM information_schema.tables WHERE table_name = 'messages')")->fetchColumn();
if (!$tableExists) {
    $db->query('
        CREATE TABLE messages (
            id UUID PRIMARY KEY DEFAULT uuid_generate_v4(),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            text TEXT NOT NULL,
            user_id UUID NOT NULL,
            CONSTRAINT fk_user_id FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
        );
    ');
}


$rowsCount = $db->query('SELECT COUNT(*) FROM users')->fetch()['count'];
if ($rowsCount === 0) {
    $hashedPassword = password_hash('admin', PASSWORD_DEFAULT);
    try {
        $id = $db->query("INSERT INTO users(name, email, password, isconfirmed) VALUES (?, ?, ?, ?) RETURNING id;", ['admin', 'admin@gmail.com', $hashedPassword, true])->fetch()['id'];
        $db->query("INSERT INTO roles(name, user_id) VALUES(?, ?)", ['a', $id]);
    } catch (PDOException $err) {
        echo "$err failed to execute query";
    }
}

?>
