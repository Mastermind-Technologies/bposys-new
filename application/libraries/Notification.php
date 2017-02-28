<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification {
	private $notificationId = null;
	private $notifMessage = null;
	private $createdAt = null;
	private $referenceNum = null;
	private $role = null;
	private $status = null;

	public function __construct()
	{
		$this->CI =& get_instance();
	}

	protected function unset_CI()
	{
		if(isset($this->CI))
			unset($this->CI);
	}

    public function get_NotificationId()
    {
        return $this->notificationId;
    }

    private function set_NotificationId($notificationId)
    {
        $this->notificationId = $notificationId;

        return $this;
    }

    public function get_NotifMessage()
    {
        return $this->notifMessage;
    }

    private function set_NotifMessage($notifMessage)
    {
        $this->notifMessage = $notifMessage;

        return $this;
    }

    public function get_CreatedAt()
    {
        return $this->createdAt;
    }

    private function set_CreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function get_ReferenceNum()
    {
        return $this->referenceNum;
    }

    private function set_ReferenceNum($referenceNum)
    {
        $this->referenceNum = $referenceNum;

        return $this;
    }

    public function get_Role()
    {
        return $this->role;
    }

    private function set_Role($role)
    {
        $this->role = $role;

        return $this;
    }

    public function get_Status()
    {
        return $this->status;
    }

    private function set_Status($status)
    {
        $this->status = $status;

        return $this;
    }
}