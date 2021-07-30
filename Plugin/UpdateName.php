<?php
namespace AHT\Training\Plugin;

class UpdateName
{
    public function beforeSetSlug(\AHT\Training\Model\Student $subject, $slug)
    {
        $slug =  $subject->getEmail();
        return [$slug];
    }

    public function afterGetName(\AHT\Training\Model\Student $subject, $result)
    {
        $result = $subject->getEmail();
        return $result;
    }

    // public function aroundSetSlug(\AHT\Training\Model\Student $subject,$slug)
    // {
    //     $slug =  $subject->getDob();
    //     return $slug;
    // }
}
