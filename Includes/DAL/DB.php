 <?php 
 
class DB
{
    var $DB_name;
    var $DB_user;
    var $DB_pass;
    var $DB_host;    
    var $DB_link;
	
	function DB()
    {
		$this->DB_host = "localhost";
        $this->DB_name = "rehana";
        $this->DB_user = "root";
        $this->DB_pass = "M_LINUX123"; 
    }
	
	
	function changeUser($user)
    {
        $this->DB_user = $user;
    }
 
    function changePass($pass)
    {
            $this->DB_pass = $pass;
    }
 
    function changeHost($host)
    {
        $this->DB_host = $host;
    }
 
    function changeName($name)
    {
        $this->databse_name = $name;
    }
 
    function changeAll($user, $pass, $host, $name)
    {
        $this->DB_user = $user;
        $this->DB_pass = $pass;
        $this->DB_host = $host;
        $this->DB_name = $name;
    }
	
    function connect()
    {
        $this->DB_link = mysql_connect($this->DB_host, $this->DB_user, $this->DB_pass) or die("Could not make connection to MySQL");
        mysql_select_db($this->DB_name) or die ("Could not open DB: ". $this->DB_name);        
    }
	
	function disconnect()
    {
        if(isset($this->DB_link)) mysql_close($this->DB_link);
        else mysql_close();    
    }
	
	function executeCRUDquery($qry)
    {
        if(!isset($this->DB_link)) $this->connect();
        $temp = mysql_query($qry, $this->DB_link) or die("Error: ". mysql_error());        
    }
	
	
	function executeQuery($qry)
    {
        if(!isset($this->DB_link)) $this->connect();
        $result = mysql_query($qry, $this->DB_link) or die("Error: ". mysql_error());
        $returnArray = array();
        $i=0;
        while ($row = mysql_fetch_array($result, MYSQL_BOTH))
            if ($row)
         $returnArray[$i++]=$row;
        mysql_free_result($result);
        return $returnArray;
    }
 
}
 ?>