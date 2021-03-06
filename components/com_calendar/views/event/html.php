<?php
class ComCalendarViewEventHtml extends ComCalendarViewHtml
{
	protected function _initialize(KConfig $config)
    {
        $config->append(array(
            'template_filters' => array('module'),
        ));

        parent::_initialize($config);
    }
    
    public function display()
    {
        $model = $this->getModel();
        $event = $model->getItem();
        
        $pathway = JFactory::getApplication()->getPathway();
        $pathway->addItem($this->escape($event->title), $this->createRoute('view=event&id='.$event->id.'&slug='.$event->slug));
        
        if ($event->id && $event->isAttachable()) {
            $this->assign('attachments', $event->getAttachments());
        }
        
        switch ($this->getLayout()) {
            case 'form':
                if(JFactory::getUser()->gid == 18)
                {
                    $editor_settings = array(
                        'theme_advanced_statusbar_location' => 'none',
                        'theme_advanced_buttons1'           => 'bold,italic,strikethrough,underline,|,bullist,numlist,blockquote,|,link,unlink',
    					'theme_advanced_buttons2'           => '',
                		'valid_elements'					=> 'a[href],b,blockquote,em,i,li,ol,p,span,strong,u,ul'
                    );
                } else $editor_settings = array();
                $this->assign('editor_settings', $editor_settings);
                
                break;
        }
        
        return parent::display();
    }
}