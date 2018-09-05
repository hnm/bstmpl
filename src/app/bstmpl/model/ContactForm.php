<?php
namespace bstmpl\model;

use n2n\web\dispatch\Dispatchable;
use n2n\mail\MailUtils;
use n2n\web\dispatch\map\bind\BindingDefinition;
use n2n\impl\web\dispatch\map\val\ValNotEmpty;
use n2n\impl\web\dispatch\map\val\ValEmail;
use n2n\mail\Transport;
use n2n\web\dispatch\map\bind\MappingDefinition;

class ContactForm implements Dispatchable {
	
	protected $name;
	protected $email;
	protected $subject;
	protected $message;

	public function getName() {
		return $this->name;
	}

	public function setName($name) {
		$this->name = $name;
	}

	public function getEmail() {
		return $this->email;
	}

	public function setEmail($email) {
		$this->email = $email;
	}

	public function getSubject() {
		return $this->subject;
	}

	public function setSubject($subject) {
		$this->subject = $subject;
	}

	public function getMessage() {
		return $this->message;
	}

	public function setMessage($message) {
		$this->message = $message;
	}
	
	private function _mapping(MappingDefinition $md, \n2n\l10n\DynamicTextCollection $dtc) {
		$md->getMappingResult()->setLabels(array(
				'name' => $dtc->translate('contact_form_name_label'),
				'email' => $dtc->translate('contact_form_email_label'),
				'subject' => $dtc->translate('contact_form_subject_label'),
				'message' => $dtc->translate('contact_form_message_label')));
	}

	private function _validation(BindingDefinition $bd) {
		$bd->val('name', new ValNotEmpty());
		$bd->val('email', new ValNotEmpty(), new ValEmail());
		$bd->val('subject', new ValNotEmpty());
		$bd->val('message', new ValNotEmpty());
	}
	
	public function send() {
		$mail = MailUtils::createNotificationMail($this->subject, $this->prepareContentToSend());
		$mail->addReplyTo($this->email);
		Transport::send($mail);
	}
	
	private function prepareContentToSend() {
		return 'Name     : ' . $this->name . "\n\n"
				. 'E-Mail   : ' . $this->email . "\n\n"
				. "Nachricht: \n------------------\n\n" . $this->message . "\n\n"
				. 'IP: ' . $_SERVER['REMOTE_ADDR'] . ' Datum: ' . date('d.m.Y h:m:s');
	}
}