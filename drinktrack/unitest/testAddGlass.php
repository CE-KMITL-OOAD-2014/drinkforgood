class GlassTest extends PHPUnit_Framework_TestCase
{
    // ...

    public function testAdd()
    {
		include_once ($_SERVER['DOCUMENT_ROOT']."/drinkTrack/class/Glasses.php"); 
        // Arrange
        $a = new Glasses();

        // Act
		for($x = 0; $x <= 1000; $x++) {
			 $b = $a->AddGlasses($x);
			$this->assertEquals(true,$b);
		} 
    }
}