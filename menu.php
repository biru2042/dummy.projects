<?php 

function getArray($array=array(), $parent_id=0){
	if(!empty($array[$parent_id])){
		echo '<ul>';
		foreach($array[$parent_id] as $item){


		echo '<li>';
		echo '<a href= "#">'.$item['menu_name'].'</a>';
		getArray($array, $item['menu_id']);
		echo '</li>';
		}
		echo '</ul>';
	}
}

function display_menu(){
	$conn = mysqli_connect("localhost", "root", "", "dynamic_menu");
	$query =$conn->query("SELECT * FROM menu");
	$array = array();
	if (mysqli_num_rows($query) > 0) {
		while($rows = mysqli_fetch_array($query)){
			
			$array[$rows['parent_id']][] = $rows;

		}

		getArray($array);
		
	}
	
}



 ?>