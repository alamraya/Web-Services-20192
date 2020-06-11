<?php

class array_object{
	function arrayKeObject($array)
	{
		$object = new stdClass();
		if (is_array($array))
		{
			foreach ($array as $kolom=>$isi)
			{
				$kolom = strtolower(trim($kolom));
				$object->$kolom = $isi;
			}
		}
		return $object;
	}

	function objectKeArray($object)
	{
		$array = array();
		if (is_object($object)) {
			$array = get_object_vars($object);
		}
		return $array;
	}
}


// //mengisi nilai dari array
// $arr = array('kolom_1' => 'isi_1','kolom_2' => 'isi_2','kolom_3' => 'isi_3');

// //definisi object baru
// $obj_baru = new array_object();

// //mengubah array ke dalam bentuk object
// echo "Array ke Object";
// $ubah_objek = $obj_baru->arrayKeObject($arr);
// foreach ($ubah_objek as $kolom_obj=>$isi_obj)
// {
// 	echo '<br>'.$ubah_objek->$kolom_obj;
// }

// //mengubah object ke dalam bentuk array
// echo "<br>Object ke Array";
// $ubah_array = $obj_baru->objectKeArray($ubah_objek);
// foreach ($ubah_array as $kolom_arr=>$isi_arr)
// {
// 	echo '<br>'.$ubah_array[$kolom_arr];
// }
