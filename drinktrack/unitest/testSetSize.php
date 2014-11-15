public function testSetSize()
    {
		include_once ($_SERVER['DOCUMENT_ROOT']."/drinkTrack/class/Glasses.php"); 
        // Arrange
        $a = new Glasses();

        // Act
		for($x = 0; $x <= 1000; $x++) {
			 $b = $a->setSizeGlasses($x);
			$this->assertEquals(true,$b);
		} 
    }