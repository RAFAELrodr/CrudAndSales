<?php
class Connection{
  private static $dbName='lpads2019';
  private static $dbHost='localhost';
  private static $dbUser='root';
  private static $dbPassword='';
  
  private static $cont=null;

  public function __construct()
  {
  }

  public static function connect(){
      if (self::$cont==null){
          try{
              self::$cont = new PDO("mysql:host="
              .self::$dbHost.";"."dbname="
              .self::$dbName,
              self::$dbUser,
              self::$dbPassword);
          }
          catch(PDOException $exception){
              exit($exception->getMessage());
          }
      }
      return self::$cont;
  }
  public static function disconnect(){
      self::$cont=null;
  }
}
?>