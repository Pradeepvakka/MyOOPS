<?php

function connect(){
	$servername = "localhost";
	$username = "root";
	$password = "";

	try {
	    $conn = new PDO("mysql:host=$servername;dbname=world", $username, $password);
	    // set the PDO error mode to exception
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    echo "Connected successfully";
	    }
	catch(PDOException $e)
	    {
	    echo "Connection failed: " . $e->getMessage();
	    }
}

function pagination(){
	//Always show 11 links on the page
	$max_visible_links = 11;
	//Get number of buttons left and right of the active button
	//Round the fraction number to bottom
	$left_right_visible_buttons = floor($max_visible_links/2);
	//Get page number from URL Ex: /index.php?page=1
	//If page variable iss set and hold any value return the int value of page variable value else return 1 the default value
	$page_number = (isset($_GET['page']) && !empty($_GET['page'])) ? (int) $_GET['page'] : 1;
	//The number of records visible in each page
	$number_of_records_to_show = 10;
	//Total number of records available in the database table
	$total_number_of_records = 115;
	//Define the last page number: total number of records devided by number of record to show.
	$total_number_of_pages = ceil($total_number_of_records/$number_of_records_to_show);
	//Round up to top value to avoid fraction
	$last_page_number = $total_number_of_pages;
	//Set page number value minimum and maximum
	//if the page number is less than one: means 0 , -1 etc
	if ($page_number < 1) {
		//reset the page number value to 1
		$page_number = 1;
	} elseif ($page_number > $total_number_of_pages) {
		//reset the page number value to the total number of pages
		$page_number = $total_number_of_pages;
	}
	// SHowing the current page number out of total n umber of pages
	echo "Showing {$page_number} page / out of {$total_number_of_pages }<br>";
	//To build the pagination links on the bottom
	$create_links = '';
	//The bootstrap html concatenated together
	$create_links .= '<nav aria-label="..."><ul class="pagination">';
	//Set the active links
	//If the following conditions satisfies
	//if the page number is always less than maximum visible links AND
	//if last page number is greater than equal to maximum visible links
	echo $page_number. '<' . $max_visible_links.'<br>';
	echo $total_number_of_pages. '=' . $max_visible_links.'<br>';
	echo $total_number_of_pages. '>' . $max_visible_links.'<br>';

	echo '----------------------------------ELSE----------------<br>';
	echo $page_number. '>=' . $max_visible_links.'<br>';
	echo $last_page_number. '>' . $max_visible_links.'<br>';

	if ($page_number < $max_visible_links AND ($total_number_of_pages == $max_visible_links OR $total_number_of_pages > $max_visible_links)) {
		echo 'Kadannu'.'<br>';
		//Loop through the pages and create links
		for ($i=1; $i<=$max_visible_links; $i++) {
			if ($i == $page_number) {
				$create_links .= '<li class="page-item active">';
              	$create_links .= '<a class="page-link" href="index.php?page='.$page_number.'">'.$page_number.'</a></li>';
			} else {
				$create_links .= '<li class="page-item"><a class="page-link" href="index.php?page='.$i.'">'.$i.'</a></li>';
			}
		}
		//Visible next button if the total number is greater than maximum visible links
		if ($total_number_of_pages > $max_visible_links) {
			//The next page number
			$next_page_number = $max_visible_links+1;
			$create_links .= '<li class="page-item"><a class="page-link" href="index.php?page='.$next_page_number.'">&raquo</a></li>';
		}

	}
	else if ($page_number >= $max_visible_links AND $last_page_number > $max_visible_links) {
		echo 'Elsil Kadannu'.'<Br>';
		if ($page_number+$left_right_visible_buttons >= $last_page_number) {
			$previous_page_number = $max_visible_links-1;
			$create_links .= '<li class="page-item"><a class="page-link" href="index.php?page='.$previous_page_number.'">&laquo</a></li>';
			for ($i=($max_visible_links - $left_right_visible_buttons); $i<=$page_number + $left_right_visible_buttons; $i++) {
				if ($i == $page_number) {
					$create_links .= '<li class="page-item active">';
	              	$create_links .= '<a class="page-link" href="index.php?page='.$page_number.'">'.$page_number.'</a></li>';
				} else {
					$create_links .= '<li class="page-item"><a class="page-link" href="index.php?page='.$i.'">'.$i.'</a></li>';
				}
			}
		} else if($page_number+$left_right_visible_buttons < $last_page_number) {
			$create_links .= '<li class="page-item"><a class="page-link" href="index.php?page='.(($page_number - $left_right_visible_buttons) - 1).'">&laquo</a></li>';
		}

	}
	$create_links .= '<nav><ul>';
	echo $create_links;

}