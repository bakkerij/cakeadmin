    public function beforeRender(Event $event)
    {
        $this->viewBuilder()->layout('admin');
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->deny();
    }

    public function isAuthorized($user)
    {
        // Registered Users can access
        if (in_array($this->request->action, [<% foreach($actions as $action) {echo "'$action', ";} %>])) {
            return true;
        }

        return parent::isAuthorized($user);
    }