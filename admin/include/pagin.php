
<?php
	$adjacents = 3;	
	if(isset($_GET['page'])){$page = $_GET['page'];} else {$page=1;}
	if($page) { 		$start = strval(($page - 1) * $limit); 	}	
	else {		$start = 0;	}						
	$url=$targetpage."page=";
	
        
         $total_pages=DB::count();
	
	/* Setup page vars for display. */
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//&laquo; page is page - 1
	$next = $page + 1;							//&raquo; page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = strval($lastpage - 1);						//last page minus 1
	
	/* 
		Now we apply our rules and draw the pagination object. 
		We're actually saving the code to a variable in case we want to draw it more than once.
	*/
	$pagination = "";
	if($lastpage > 1)
	{	
		$pagination .= "<ul class=\"pagination mt-5 pagination-circle justify-content-center\">";
		//&laquo; button
		if ($page > 1) 
			$pagination.= "<li class=\"page-item\">
                                    <a class=\"page-link\" href=\"".$url.$prev."\" aria-label=\"Previous\">
                                        <span aria-hidden=\"true\"><</span>
                                    </a>
                                </li>
";
		else
			$pagination.= "<li  class=\"page-item disabled\"><a class=\"page-link\" href=\"#\" class='disableClick' aria-label=\"Previous\"><span class=\"disabled\"><</span></a></li>
";	
		
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<li  class=\"page-item active\"><a class=\"page-link\" href=\"#\" class='disableClick currentpagi'><span class=\"\">$counter</span></a></li>
";
				else
					$pagination.= "<li  class=\"page-item\"><a class=\"page-link\" href=\"".$url.$counter."\">$counter</a></li>
";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<li  class=\"page-item disabled\" ><a class=\"page-link\" href=\"#\" ><span >$counter</span></a></li>
";
					else
						$pagination.= "<li  class=\"page-item\"><a class=\"page-link\" href=\"".$url.$counter."\">$counter</a></li>
";					
				}
				$pagination.= "...";
				$pagination.= "<li  class=\"page-item\"><a class=\"page-link\" href=\"".$url.$lpm1."\">$lpm1</a></li>
";
				$pagination.= "<li  class=\"page-item\"><a class=\"page-link\" href=\"".$url.$lastpage."\">$lastpage</a></li>
";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<li  class=\"page-item\"><a class=\"page-link\" href=\"".$url."1\">1</a></li>
";
				$pagination.= "<li  class=\"page-item\"><a class=\"page-link\" href=\"".$url."2\">2</a></li>
";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<li  class=\"page-item disabled\"><a class=\"page-link\" href=\"#\" ><span class=\"\">$counter</span></a></li>
";
					else
						$pagination.= "<li  class=\"page-item\"><a class=\"page-link\" href=\"".$url.$counter."\">$counter</a></li>
";					
				}
				$pagination.= "...";
				$pagination.= "<li class=\"page-item\"><a class=\"page-link\" href=\"".$url.$lpm1."\">$lpm1</a></li>
";
				$pagination.= "<li class=\"page-item\"><a class=\"page-link\" href=\"".$url.$lastpage."\">$lastpage</a></li>
";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<li class=\"page-item\"><a class=\"page-link\" href=\"".$url."1\">1</a></li>
";
				$pagination.= "<li class=\"page-item\"><a class=\"page-link\" href=\"".$url."2\">2</a></li>
";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<li  class=\"page-item disabled\"><a class=\"page-link\" href=\"#\" ><span class=\"\">$counter</span></a></li>
";
					else
						$pagination.= "<li  class=\"page-item\"><a class=\"page-link\" href=\"".$url.$counter."\">$counter</a></li>
";					
				}
			}
		}
		
		//&raquo; button
		if ($page < $counter - 1) 
			$pagination.= "<li  class=\"page-item\">
                                    <a href=\"".$url.$next."\"  class=\"page-link\" aria-label=\"Next\">
                                        <span aria-hidden=\"true\">></i></span>
                                    </a>
                                </li>
";
		else
			$pagination.= "<li  class=\"page-item disabled\" > <a href=\"#\" class=\"page-link\"  aria-label=\"Next\"><span class=\"\">></span></a></li>
";
		$pagination.= "</ul>\n";		
	}
	
	$pag=$page-1;
?>

	


	