<?php


namespace App\Helper;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Tests\Controller;


class EntityHelper extends AbstractController
{

    const USER = "User";
    const ITEMFORM = "itemform";
    const ACTION = "action";
    const METHOD = "method";
    const ID = "id";
    const ZERO = 0;
    const ONE = 1;
    const ADMINITMEADDEDIT = "admin_item_details";
    const ITEMTYPE = "itemType";
    const ITEMTITLE = "itemTitle";

    private $em;

    public function __construct(ObjectManager $entityManager)
    {
        $this->em = $entityManager;
    }

    public function Entity($entityName, $id)
    {
        $entity = $this->EntityRepository($entityName)->find($id);
        if (isset($entity)) {
            return $entity;
        } else {
            switch ($entityName) {
                case EntityHelper::USER:
                    return new User();
            }
        }
        throw new \Exception('Not Found Entity');
    }

    public function EntityRepository($entityName)
    {
        switch ($entityName) {
            case EntityHelper::USER:
                return $this->em->getRepository(User::class);

        }
        throw new \Exception('Not Found Repository');
    }

    public function EntityForm($entityName)
    {
        switch ($entityName) {
            case EntityHelper::USER:
                return UserType::class;
        }
        throw new \Exception('Not Found Entity Form type');
    }

    public function EntityTitle($entityName)
    {
        switch ($entityName) {
            case EntityHelper::USER:
                return "User";
        }
        throw new \Exception('Not Found Entity Title');
    }

    public function ListTwig($entityName)
    {
        switch ($entityName) {

        }
        throw new \Exception('Not Found Entity Twig List');
    }

    public function DetailsTwig($entityName)
    {
        switch ($entityName) {
            case EntityHelper::USER:
                return "dashboard/form.html.twig";
        }
        throw new \Exception('Not Found Entity Detail twig');
    }


}