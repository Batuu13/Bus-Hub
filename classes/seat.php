<?php

class Seat 
{
	public static function getCoor($type,$seatNum)
	{
		if($type == 1)
		{
			switch($seatNum)
			{
				case 1:
					return "1_1";
					break;
				case 2:
					return "1_2";
					break;
				case 3:
					return "1_3";
					break;
				case 4:
					return "2_1";
					break;
				case 5:
					return "2_2";
					break;
				case 6:
					return "2_3";
					break;
				case 7:
					return "3_1";
					break;
				case 8:
					return "3_2";
					break;
				case 9:
					return "3_9";
					break;
				case 10:
					return "4_1";
					break;
				case 11:
					return "4_2";
					break;
				case 12:
					return "4_3";
					break;
				case 13:
					return "5_1";
					break;
				case 14:
					return "6_1";
					break;
				case 15:
					return "6_2";
					break;
				case 16:
					return "6_3";
					break;
				case 17:
					return "7_1";
					break;
				case 18:
					return "7_2";
					break;
				case 19:
					return "7_3";
					break;
				case 20:
					return "8_1";
					break;
				case 21:
					return "8_2";
					break;	
				case 22:
					return "8_3";
					break;
				case 23:
					return "9_1";
					break;
				case 24:
					return "9_2";
					break;				
				case 25:
					return "9_3";
					break;
				case 26:
					return "9_4";
					break;
			}	
		}
		else if($type == 2)
		{
			switch($seatNum)
			{
				case 1:
					return "1_1";
					break;
				case 2:
					return "1_2";
					break;
				case 3:
					return "1_3";
					break;
				case 4:
					return "1_4";
					break;
				case 5:
					return "2_1";
					break;
				case 6:
					return "2_2";
					break;
				case 7:
					return "2_3";
					break;
				case 8:
					return "2_4";
					break;
				case 9:
					return "3_1";
					break;
				case 10:
					return "3_2";
					break;
				case 11:
					return "3_3";
					break;
				case 12:
					return "3_4";
					break;
				case 13:
					return "4_1";
					break;
				case 14:
					return "4_2";
					break;
				case 15:
					return "4_3";
					break;
				case 16:
					return "4_4";
					break;
				case 17:
					return "5_1";
					break;
				case 18:
					return "6_1";
					break;
				case 19:
					return "6_2";
					break;
				case 20:
					return "6_3";
					break;
				case 21:
					return "6_4";
					break;	
				case 22:
					return "7_1";
					break;
				case 23:
					return "7_2";
					break;
				case 24:
					return "7_3";
					break;				
				case 25:
					return "7_4";
					break;
				case 26:
					return "8_1";
					break;
				case 27:
					return "8_2";
					break;
				case 28:
					return "8_3";
					break;
				case 29:
					return "8_4";
					break;
				case 30:
					return "9_1";
					break;
				case 31:
					return "9_2";
					break;
				case 32:
					return "9_3";
					break;
				case 33:
					return "9_4";
					break;
				case 34:
					return "9_5";
					break;
			}	
		}
	}
		
}

?>