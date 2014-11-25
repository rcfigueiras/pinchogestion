<?php
// file: model/UserMapper.php

require_once(__DIR__."/../core/PDOConnection.php");

/**
 * Class UserMapper
 *
 * Database interface for User entities
 * 
 * @author lipido <lipido@gmail.com>
 */
class UserMapper {

  /**
   * Reference to the PDO connection
   * @var PDO
   */
  private $db;
  
  public function __construct() {
    $this->db = PDOConnection::getInstance();
  }

  /**
   * Saves a User into the database
   * 
   * @param User $user The user to be saved
   * @throws PDOException if a database error occurs
   * @return void
   */      
  public function save($user) {
    $stmt = $this->db->prepare("INSERT INTO users values (?,?)");
    $stmt->execute(array($user->getUsername(), $user->getPasswd()));  
  }
  
  /**
   * Checks if a given username is already in the database
   * 
   * @param string $username the username to check
   * @return boolean true if the username exists, false otherwise
   */
  public function usernameExists($username) {
    $stmt = $this->db->prepare("SELECT count(nombre_admin) FROM administrador where nombre_admin=?");
    $stmt2 = $this->db->prepare("SELECT count(nombre_estab) FROM establecimiento where nombre_estab=?");
	$stmt3 = $this->db->prepare("SELECT count(nombre_jurPro) FROM jurado_profesional where nombre_jurPro=?");
	$stmt4 = $this->db->prepare("SELECT count(nombre_jurPop) FROM jurado_popular where nombre_jurPop=?");
	$stmt->execute(array($username));
	$stmt2->execute(array($username));
	$stmt3->execute(array($username));
	$stmt4->execute(array($username));
    
    if ($stmt->fetchColumn() > 0 OR $stmt2->fetchColumn() > 0 OR $stmt3->fetchColumn() > 0 OR $stmt4->fetchColumn() > 0) {   
      return true;
    } 
  }
  
  /**
   * Checks if a given pair of username/password exists in the database
   * 
   * @param string $username the username
   * @param string $passwd the password
   * @return boolean true the username/passwrod exists, false otherwise.
   */
  public function isValidUser($username, $passwd) {
    $stmt = $this->db->prepare("SELECT count(nombre_admin) FROM administrador where nombre_admin=? and contrasenha_admin=?");
    $stmt2 = $this->db->prepare("SELECT count(nombre_estab) FROM establecimiento where nombre_estab=? and contrasenha_estab=?");
	$stmt3 = $this->db->prepare("SELECT count(nombre_jurPro) FROM jurado_profesional where nombre_jurPro=? and contrasenha_jurPro=?");
	$stmt4 = $this->db->prepare("SELECT count(nombre_jurPop) FROM jurado_popular where nombre_jurPop=? and contrasenha_jurPop=?");
	$stmt->execute(array($username, $passwd));
	$stmt2->execute(array($username, $passwd));
    $stmt3->execute(array($username, $passwd));
	$stmt4->execute(array($username, $passwd));
	
    if ($stmt->fetchColumn() > 0 OR $stmt2->fetchColumn() > 0 OR $stmt3->fetchColumn() > 0 OR $stmt4->fetchColumn() > 0) {   
      return true;        
    }
  }
}