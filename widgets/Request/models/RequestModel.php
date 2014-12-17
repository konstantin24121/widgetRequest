<?php

class RequestModel extends CFormModel{

	private $rules = array(array('name, phone, phoneMasked, email, text, service, qaptcha, verifyCode','safe'));

	//Attributes
	public $name;
	public $email;
	public $phone;
	public $phoneMasked;
	public $text;
	public $service;
	public $qaptcha;
	public $verifyCode;

	/*your var@attributes*/


	public function rules(){	
		return $this->rules;
	}

	public function attributeLabels(){
		return array(
			'name'=>'Ваше имя',
			'email'=>'Ваш E-mail',
			'phone'=>'Ваш телефон',
			'phoneMasked'=>'Ваш телефон',
			'text'=>'Комментарий к заявке',
			'service'=>'Выберите услугу',
			'verifyCode'=>'Проверочный код',
			'qaptcha' => 'Проведите ползунок вправо для отправки формы'
		);
	}

	public function qaptchaVerify($attribute){
		$qaptcha = $_COOKIE['qaptcha_key'];
		if($attribute != $qaptcha){
			$this->addError('qaptcha','Если Вы хотите отправить заявку проведите штучку дрючку');
		}
	}

	public function setRules($template){
		preg_replace_callback("/{(\w+)}/",array($this,'addRule'),$template);
	}

	protected function addRule($matches){
		$method='addRule'.$matches[1];
		if(method_exists($this,$method)){
			foreach ($this->$method() as $rule) {
				array_unshift($this->rules,$rule);
			}
		}
		else
			throw new CException(Yii::t('zii', 'Нет такого атрибута. Это тебе не шахтерский ребус, не надо тут угадывать. Загляни в исходный код, или допиши свое.'));
	}

	public function addRuleName(){
		return array(
				array('name', 'required')
			);
	}

	public function addRulePhone(){
		return array(
				array('phone','required'),
				array('phone','numerical')
			);
	}

	public function addRulePhoneMasked(){
		return $_COOKIE['js']?
			array(
				array('phoneMasked', 'match', 'pattern'=>'/^8\(\d{3}\)\d{3}\-\d{2}\-\d{2}$/', 'message'=>'Неверно набран номер'),
				array('phoneMasked', 'required'),
			): 
			array(
				array('phone','required'),
				array('phone','numerical')
			);
	}

	public function addRuleEmail(){
		return array(
				array('email','email','message'=>'Неверный формат E-mail'),
			);
	}

	public function addRuleText(){
		return array(
				array('text','safe'),
			);
	}

	public function addRuleService(){
		return array(
				array('service','required'),
			);
	}

	public function addRuleCaptcha(){
		return array(
				array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
			);
	}

	public function renderQaptcha(){
		return array(
				array('qaptcha','qaptchaVerify'),
			);
	}

	/*Write your rules here*/

}

?>