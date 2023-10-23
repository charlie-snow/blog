<?php 
/************************************************************************
Visitor counter v1.01 - 
Counter class to register visitors on a website with PHP and MySQL

Copyright (C) 2004 - Olaf Lederer

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

_________________________________________________________________________
available at http://www.finalwebsites.com 
Comments & suggestions: http://www.finalwebsites.com/contact.php 

Updates:
version 1.01 - I cleaned up some vars and made the functions more compact.
In this release the database is defined inside the class file.
*************************************************************************/
define("DB_SERVER", "localhost");
define("DB_NAME", "charche_charche");
define ("DB_USER", "charche_charche");
define ("DB_PASSWORD", "charche");

class count_visitors {

	var $hostname = DB_SERVER;
	var $database = DB_NAME;
	var $table_name = "visits";
	var $db_user = DB_USER;
	var $db_password = DB_PASSWORD;
	var $db;
	var $remote_adr;
	var $visits;
	var $delay = 1;
	
	var $zona=3600; //españa, coño!
	var $fecha;
	var $horas;
	var $hora;
	var $hora_margen;
	var $hora_sql;
	
	function count_visitors($remote_adr) {
		$this->db_connect($this->hostname);
		$this->remote_adr = $remote_adr;
		$this->hora_sql = gmdate("H:i:s", time() + $this->zona);
		$this->horas = gmdate("H", time() + $this->zona);
		$this->hora = date($this->horas."is");
		$this->horas = $this->horas - $this->delay;
		$this->hora_margen = date($this->horas."is");
		$this->fecha = gmdate("Y-m-d", time() + $this->zona);
		/*echo $this->fecha;
		echo $this->hora;
		echo $this->hora_sql;*/
	}
	function process_visitor() {
		
		$this->insert_new_visit();
	}
	function db_connect() {
		$this->db = mysql_pconnect($this->hostname, $this->db_user, $this->db_password) or die(mysql_error());
		mysql_select_db($this->database);
	}
	function check_last_visit() {
		$check_sql = "SELECT time + 0 FROM ".$this->table_name." WHERE visit_date = '".$this->fecha."' AND ip_adr = '".$this->remote_adr."' ORDER BY time DESC LIMIT 0, 1";
		$check_visit = mysql_query($check_sql);
		$check_row = mysql_fetch_array($check_visit);
		
		if (mysql_num_rows($check_visit) != 0) {
		
			//echo "margen: ".$this->hora_margen;
			//echo "row: ".$check_row[0];
			
			if ($check_row[0] < $this->hora_margen) {
				return true;
			} else {
				return false;
			}
			
		} else {
			return true;
		}
		
	}
	function insert_new_visit() {
		global $HTTP_REFERER, $HTTP_USER_AGENT, $PHP_SELF;
		if ($this->check_last_visit()) {
			$sql = "INSERT INTO visits (id, ip_adr, referer, client,  visit_date, time, on_page) VALUES (NULL, '".$this->remote_adr."', '$HTTP_REFERER', '".$_SERVER['HTTP_USER_AGENT']."', '".$this->fecha."', '".$this->hora_sql."', '$PHP_SELF')";
			mysql_query($sql);
		}
	}
	function show_all_visits() {
		$sql = "SELECT COUNT(*) as count FROM ".$this->table_name."";
		$result = mysql_query($sql);
		$this->visits = mysql_result($result, 0, "count");
		return $this->visits;
	}
}
?>