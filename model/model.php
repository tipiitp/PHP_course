<?php

defined ('ACCESS') or die ('Попыка обратиться к файлу напрямую !'); // проверка ЗАКЛАДКИ





// создадим функцию которая будет универсальна в плане формирования запроса на выборку из базыданных
 
 

function string_query($table, $pole , $elem){
	
	 
	if(isset($pole))
	{
		$str3 = " AND ". $pole."=".$elem;
	}
	if ($table=="content")
	{
		$str2= " WHERE id_status=1";	
	}
	$str = "SELECT * FROM ".$table.$str2.$str3;
	
	return $str;
	 	
}
 


// универсальная функция. АРГУМЕНТ - ИМЯ НУЖНОЙ ТАБЛИЦЫ
function viborka($table, $pole , $elem){
	
	$str = string_query($table, $pole , $elem ); // вызвали функцию которая формирует запрос, где в строке запроса нет только имени таблицы, которое мы зададим АРГУМЕНТОМ этой функции
	
	$query = mysql_query($str); // функция запроса на выборку из базы данных. В качестве аргумента передаем переменную $str которая содержит в себе строку запроса
	
	$rezult = array(); // определили НОВУЮ ПЕРЕМЕННУЮ которая будет являться МАССИВОМ
	
	while( $rez = mysql_fetch_assoc($query) ){
		
		$rezult[] = $rez;  
		
	}//end while
	
	return $rezult; 
	
} // end F
 
 
function viboka_bread ($page , $id){
	
	if($page == 'category'){
		
		$query_string = 'SELECT name_category
											FROM category
											WHERE id =' . $id ; 
		
	} if ($page == 'single') {
		
		$query_string = 'SELECT
												category.id,
												category.name_category,
												content.title
											FROM
												category ,
												content
											WHERE
												content.id_categories = category.id 
												AND
												content.id =' . $id ; 
	}
	
	$query_array_string = mysql_query($query_string);
	
	$query_array = mysql_fetch_array($query_array_string);
	
	return $query_array;
	
	
	
	
	
	
	
}





?>