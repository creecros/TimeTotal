<?php

namespace Kanboard\Plugin\TimeTotal;

use Kanboard\Core\Plugin\Base;
use Kanboard\Core\Translator;

class Plugin extends Base
{
  public function initialize()
  {
    //template
        $this->template->hook->attach('template:task:details:third-column', 'timeTotal:task/totaltimes');

  }
  public function getPluginName()
  {
    return 'TimeTotal';
  }
  public function getPluginAuthor()
  {
    return 'Craig Crosby';
  }
  public function getPluginVersion()
  {
    return '1.0.0';
  }
  
  public function getPluginDescription()
  {
    return 'Calculate Total Time Spent and Estimated within main task that milestones target';
  }
  public function getPluginHomepage()
  {
    return 'https://github.com/creecros/TemplateTitle';
  }
}