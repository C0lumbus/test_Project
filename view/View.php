<?php
class View {
	public $template = 'index';
	public $output, $body, $layout, $message, $pageTitle, $heading;

	protected static $instance;  // object instance

	private	$vars = Array();
    private function __clone() { /* ... */ }

	/**
	 * get instance of View
	 *
	 * @static
	 * @return View
	 */
    public static function getInstance() {
        if ( is_null(self::$instance) ) {
            self::$instance = new self;
        }
        return self::$instance;
    }

	/**
	 * set variable
	 *
	 * @param $name
	 * @param $value
	 * @return void
	 */
	public function __set($name, $value) {
		$this->vars[$name] = $value;
	}

	/**
	 * get variable
	 *
	 * @param $name
	 * @return bool
	 */
	public function __get($name) {
		if (array_key_exists($name, $this->vars)) {
            return $this->vars[$name];
        }
		return false;
	}

	/**
	 * load main template of site
	 *
	 * @return void
	 */
	public function loadTemplate() {
		$template = $this->template;
		if($template) {
			// Load variables
			foreach ($this->vars as $key => $value) {
				$$key = $value;
			}
			ob_start();
			include (sitePath . 'templates' . DS . $template . '.php');
			$this->output = ob_get_contents();
			ob_end_clean();
		}
	}

	/**
	 * load layout of some block for View
	 * @return void
	 */
	public function loadLayout() {
		// Load variables
        foreach ($this->vars as $key => $value) {
			$$key = $value;
        }
		$template = $this->template;
		ob_start();
		include (sitePath . 'templates' . DS . $template . '.php');
		$this->layout = ob_get_contents();
		ob_end_clean();
	}

	/**
	 * render output of component to main body
	 *
	 * @return void
	 */
	public function render() {
		$this->loadTemplate();
		if($this->message) {
			$this->body = '<strong>i:</strong> ' . $this->message;
		}
		$this->body .= $this->output;
	}

	/**
	 * print out rendered html
	 *
	 * @return void
	 */
	public function displayBody() {
		echo $this->layout;
	}
}