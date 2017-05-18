<?php
namespace Kondrashin\CallbackBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * Класс с данными формы обратной связи
 *
 * @ORM\Entity
 * @ORM\Table(name="hellotrade")
 */
class Task
{
    /**
     * Идентификтор отзыва(integer)
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * Имя(string)
     *
     * @Assert\NotBlank()
     * @Assert\Type(
     *     type="string",
     *     message="{{ value }} не корректное имя"
     * )
     * @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage = "Ваше имя должно быть длинее 2 символов",
     *      maxMessage = "Ваше имя должно быть короче 50 символов"
     * )
     * @ORM\Column(type="string", length=50)
     */
    protected $name;

    /**
     * Электронная почта(string/email)
     *
     * @Assert\NotBlank()
     * @Assert\Email(
     *     message = "Email {{ value }} не корректный",
     *     checkMX = true
     * )
     * @Assert\Length(
     *      min = 5,
     *      max = 50,
     *      minMessage = "Ваш email должен быть длинее 5 символов",
     *      maxMessage = "Ваше имя должно быть короче 50 символов"
     * )
     * @ORM\Column(type="string", length=50)
     */
    protected $email;

    /**
     * Текст комментария(string)
     *
     * @Assert\NotBlank()
     * @Assert\Type(
     *     type="string",
     *     message="{{ value }} не корректный комментарий"
     * )
     * @Assert\Length(
     *      min = 5,
     *      max = 250,
     *      minMessage = "Ваше сообщение должно быть длинее 5 символов",
     *      maxMessage = "Ваше сообщение должно быть короче 250 символов"
     * )
     * @ORM\Column(type="text")
     */
    protected $comment;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getComment()
    {
        return $this->comment;
    }

    public function setComment($comment)
    {
        $this->comment = $comment;
    }
}
