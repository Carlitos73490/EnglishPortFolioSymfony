<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CvController extends AbstractController
{
    #[Route('/', name: 'cv')]

    public function index(): Response
    {
        $designSkills = array();
        $technicalSkills = array();
        $osSkills = array();

        array_push( $technicalSkills ,new IconSkill("HTML/CSS",100,"fab fa-html5"),new IconSkill("CSS",88,"fab fa-css3"),new IconSkill("LESS",80,"fab fa-less"),new Skill("KOTLIN",70),new Skill("FLUTTER",66),new Skill("TYPESCRIPT",80),new IconSkill("JAVASCRIPT",80,"fab fa-js"),new Skill("C#/.NET",91),new IconSkill("PHP",85,"fab fa-php"),new Skill("SQL",64));

        array_push( $designSkills,new Skill("PHOTOSHOP",60),new Skill("FINAL CUT",50),new Skill("BLENDER",40));
        array_push( $osSkills,new IconSkill("Windows",100,"fab fa-windows"),new IconSkill("macOS",95,"fab fa-apple"),new IconSkill("Linux",80,"fab fa-ubuntu"));


        return $this->render('cv/index.html.twig', [

            'controller_name' => 'CvController',
            'technicalSkills' => $technicalSkills,
            'designSkills' => $designSkills,
            'osSkills' => $osSkills
        ]);
    }
}

class Skill{
    public string $name;
    public int $level;

    function __construct(string $aname,int $alevel) {
        $this->name = $aname;
        $this->level = $alevel;
    }
}
class IconSkill extends Skill{
    public string $icon;
    function __construct(string $aname,int $alevel,string $aicon) {
        $this->name = $aname;
        $this->level = $alevel;
        $this->icon = $aicon;
    }
}
