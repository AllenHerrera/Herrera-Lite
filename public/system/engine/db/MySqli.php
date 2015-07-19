<?php
namespace db;

class MySqli
{
protected $db_host = DB_HOST;
protected $db_user = DB_USER;
protected $db_pass = DB_PASS;
protected $db_name = DB_NAME;

  public function __construct ()
  {
    $this->db = new \mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
    if ($this->db->connect_errno) {
        echo "Failed to connect to MySQL: (" . $this->db->connect_errno . ") " . $this->db->connect_error;
    }
    $this->db->close();
  }

  private function connect ()
  {
    $this->db = new \mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
    if ($this->db->connect_errno) {
        trigger_error("Failed to connect to MySQL: ("
          .$this->db->connect_errno . ") " .$this->db->connect_error);
    }
  }

  public function query($sql)
  {
    $this->connect();
    $result = $this->db->query($sql);

    if($result){

      if($result === true) {
        $this->db->close();
        return true;
      }
       // Cycle through results
      while ($row = $result->fetch_assoc()) {
          $user_arr[] = $row;
      }
      // Free result set
      $result->close();
      $this->db->close();

        return $user_arr;

    } else {
    $this->UpdateLog( "Database error : ".$sql , '/DB_ERROR_LOG_FILE' );
      trigger_error(
        'There was an error running the query ['.$this->db->error.']');
    }
  }
  function UpdateLog ( $string , $logfile ) {
     $fh = fopen ( $logfile , 'a' );
     fwrite( $fh , strftime ('%F %T %z')." ".$string."\n");
     fclose ( $fh );
  }

}

?>
