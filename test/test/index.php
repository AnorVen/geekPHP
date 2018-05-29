<?php

class MathClass{
   public function factorial($n){
      if ($n == 0) 
        return 1;
      else
        return $n * $this->factorial($n - 1);
    }
   }

class MathClass1{
   public function factorial($n){
      if ($n == 0) 
        return 1;
      else
        return $n * $this->factorial($n - 1);
    }
   }


class TextClass
{
	public function MyText($str)
	{
		return "Квадрат числа: " . $str*$str;
	}
}

class ArrayClass
{
	public function ArrayFunc($arr)
	{
		return $arr;
	}
}




/*
Наборы тестов

наборы тестов — несколько связанных единой задачей тестов. Можно объединить в набор и запускать его. Наборы реализованы классом PHPUnit_Framework_TestSuite. Необходимо создать экземпляр этого класса и добавить в него необходимые тесты с помощью метода addTestSuite(). Так же с помощью метода addTest() возможно добавление другого набора.
*/


class SpecificTests
{
    public static function suite()
    {
        $suite = new PHPUnit_Framework_TestSuite('MySuite');
        // добавляем тест в набор
        $suite->addTestSuite('MathClassTest'); 
		$suite->addTestSuite('MathClass1Test'); 
		$suite->addTestSuite('TextClassTest');
		$suite->addTestSuite('ArrayClassTest');
        return $suite; 
    }
}


class ArrayClassTest extends PHPUnit_framework_TestCase
{
		/**
		* @dataProvider providerMyText
		*/
		
		public function testArrayFunc($arr,$arr2)
		{
			$my = new ArrayClass();
			$this->assertEquals($arr2, $my->ArrayFunc($arr));
		}
		
		public function providerMyText()
		{
			return array
			(
			array
				(array(1,2,3), 
				array(1,2,3)),
			array(
				array(1,2,3), 
				array(3,2,1)),
			array(
				array(1,2,3), 
				array(1,2,3))
			);	
		}
		
	
}


/*
Создадим тест для класса MathClass
*/
class MathClassTest extends PHPUnit_Framework_TestCase
{
	/**
	* @dataProvider providerFactorial
	*/
	
	public function testFactorial($a,$b)
	{
		$my = new MathClass();
		$this->assertEquals($b, $my->factorial($a));
	}
	
	public function providerFactorial()
	{
		return array
		(
		array(0,1),
		array(2,2),
		array(5,120)
		);
	}
	
}

/*
Создадим тест для класса TextClass
*/

class TextClassTest extends PHPUnit_Framework_TestCase
{
	/**
	* @dataProvider providerMyText
	*/
	
	public function testMyText($a,$b)
	{
		$my = new TextClass();
		$this->assertEquals($b, $my->MyText($a));
	}
	
	public function providerMyText()
	{
		return array
		(
		array(0,'Квадрат числа: 0'),
		array(2,'Квадрат числа: 4'),
		array(5, 'Квадрат числа: 25')
		);
	}
	
}


class MathClass1Test extends PHPUnit_Framework_TestCase {
	//механизм принадлежностей теста (fixtures).
    protected $fixture;
	
	//
	//механизм принадлежностей установливается защищенным методом setUp(), который вызывается один раз перед началом каждого теста. 
	//После окончания теста вызывается метод tearDown()
	//
    protected function setUp()
    {
        $this->fixture = new MathClass1 (); 
    }

    protected function tearDown()
    {
        $this->fixture = NULL;
    }

    /** 
    * @dataProvider providerFactorial1 
    */
 
    public function testFactorial($a,$b)
    {
        $this->assertEquals($b, $this->fixture->factorial($a));
    }
    
	public function providerFactorial1()
	{
		return array
		(
		array(0,1),
		array(2,2),
		array(5,120)
		);
	}

}



?>



