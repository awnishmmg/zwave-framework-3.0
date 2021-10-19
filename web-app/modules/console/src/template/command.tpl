class {{classname}} extends {{superclassname}}{

	public $title = '{{title}}';
	public $version = '{{version}}';
	public $description = '{{description}}';
	public $commands = [];
	public $input = NULL;
	public $execute = [];

	public function __construct(){
		parent::__construct();
		
	}

	public function {{methodname}}(){
		$this->info();
	}

}