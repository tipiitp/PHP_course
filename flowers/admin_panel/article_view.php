﻿  <?php include "header.php";?>
  <?php include "content.php";
	$sort = $_GET['sort'];?>

    
			
		  
 <?php 

	$click = " <ul class='sort'>
							<li><a href='?sort=1'> по дате</a></li>							
							<li><a href='?sort=2'>по категории</a>  </li>
							<li><a href='?sort=3'>по алфавиту</a></li>
			      </ul> ";

 

		switch($sort){
			 
		 case 1 :  $click = "<ul class='sort'>
																<li style='background:red;padding:10px;'>  по дате</li>							
																<li><a href='?sort=2'>по категории</a>  </li>
																<li><a href='?sort=3'>по алфавиту</a></li>
			        							</ul> ";break;
			 
		 case 2 : $click = "<ul class='sort'>
		 										<li><a href='?sort=1'> по дате</a></li>
		 								   <li style='background:red;padding:10px;'>по категории</li>
										   <li><a href='?sort=3'>по алфавиту</a></li></ul>";break;
			 
		 case 3 : $click = "<ul class='sort'>
		 									<li><a href='?sort=1'> по дате</a></li>
		 								   <li><a href='?sort=2'>по категории</a>  </li>
										   <li style='background:red;padding:10px;'> по алфавиту </li></ul>";break; 
			 
    }  

 echo $click;

 ?>  
   
				
				
	     
    
	
	 <table class="table_adm">
			<thead>
				<tr>
					<td rowspan="2">№</td>
					<td rowspan="2">Название статьи</td>
					<td rowspan="2">Категории</td>
					<td colspan="2">Операции</td> 
				</tr> 
				
				<tr>
					<td>редактировать</td>
					<td>удалить</td> 
				</tr>
			</thead>
			
			
			
	<?php 
		 $query_table_art = mysql_query( 'SELECT 	
		 																	articles.article_name, 								categories.category_name	
																		FROM 
																			articles ,categories	
																		WHERE						
																			articles.id_category = categories.id', $db);
		 
		 
		 
		 
		 switch($sort){
			 case 1 : $query_table_art=mysql_query( 'SELECT
																								articles.article_name,
																								categories.category_name
																							FROM
																								articles ,
																								categories
																							WHERE
																								articles.id_category = categories.id
																							ORDER BY
																								articles.id ASC', $db);break;
			 case 2 : $query_table_art=mysql_query( 'SELECT
																								articles.article_name,
																								categories.category_name
																							FROM
																								articles ,
																								categories
																							WHERE
																								articles.id_category = categories.id
																							ORDER BY
																								categories.category_name ASC', $db);break;
			 case 3 : $query_table_art=mysql_query( 'SELECT
																								articles.article_name,
																								categories.category_name
																							FROM
																								articles ,
																								categories
																							WHERE
																								articles.id_category = categories.id
																							ORDER BY
																								articles.article_name DESC', $db);break;
		 }
		 
		$num =1;								
		while($array_table3 = mysql_fetch_array($query_table_art)){ 
			
			echo   "<tbody>
								<tr>
									<td>" . $num . "</td>
									<td> <a href='#'>". $array_table3[article_name] . "</a></td>
									<td>" . $array_table3[category_name] . "</td> 
									<td><a href='#'>править</a></td>
									<td><a href='#'>удалить</a></td>
								</tr>
							</tbody>"; 
		  $num++;
		} 
	?>		 
		 
		 
	</table>   
	
	 
	
         



		   
	 