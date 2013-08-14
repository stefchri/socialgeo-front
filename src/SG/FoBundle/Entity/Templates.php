<?php

namespace SG\FoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Templates
 *
 * @ORM\Table(name="templates")
 * @ORM\Entity
 */
class Templates
{
    /**
     * @var integer
     *
     * @ORM\Column(name="template_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $templateId;

    /**
     * @var string
     *
     * @ORM\Column(name="template_name", type="string", length=45, nullable=false)
     */
    private $templateName;

    /**
     * @var string
     *
     * @ORM\Column(name="template_body", type="text", nullable=false)
     */
    private $templateBody;



    /**
     * Get templateId
     *
     * @return integer 
     */
    public function getTemplateId()
    {
        return $this->templateId;
    }

    /**
     * Set templateName
     *
     * @param string $templateName
     * @return Templates
     */
    public function setTemplateName($templateName)
    {
        $this->templateName = $templateName;
    
        return $this;
    }

    /**
     * Get templateName
     *
     * @return string 
     */
    public function getTemplateName()
    {
        return $this->templateName;
    }

    /**
     * Set templateBody
     *
     * @param string $templateBody
     * @return Templates
     */
    public function setTemplateBody($templateBody)
    {
        $this->templateBody = $templateBody;
    
        return $this;
    }

    /**
     * Get templateBody
     *
     * @return string 
     */
    public function getTemplateBody()
    {
        return $this->templateBody;
    }
}